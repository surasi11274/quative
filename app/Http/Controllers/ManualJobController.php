<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Courses;
use App\Designer;
use App\Jobs;
use App\Notifications\JobsNoti;
use App\References;
use App\Review;
use App\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManualJobController extends Controller
{
    //
    public function show($token)
    {
        //

        $designer = Designer::where('token',$token)->get();
        // $users = Auth::user()->designer();

        $jobs = Jobs::where('designer_id', $designer->first()->id)->where('jobstatus_id',9)->get();
        $reviews = Review::where('designer_id',$designer->first()->id)->get();
        // $complacency = Review::where('designer_id',$designer->first()->id)->avg('complacency');
        // return $this->show()->where('designer','=','confirmed');
        $works = Jobs::where('designer_id', $designer->first()->id)->where('canshow',1)->get();
  
        // $artworks = Jobfiles::select('fileimgname')->where('job_id',$works->id)->get();
        // dd($artworks);
        // exit();
        $tags = Tags::all();

        $designer->first()->tag = json_decode($designer->first()->tag);


        if ($designer->count() == 0){
            return "หาไม่เจอ ทำอะไรดี";
        }
        return view('manualjob.show',[
            'designer'=>$designer->first(),
            'tags'=>$tags,
            'reviews'=>$reviews,
            // 'users'=>$users,
            'jobs'=>$jobs,
            'works'=>$works,
            // 'complacency'=>$complacency,

            ]);

    }

    public function createJobStep1($token)
    {
        //
        $isdesigner = Auth::user()->role;

        $jobs = Auth::user()->job();
        // if ($jobs){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     // return redirect(route('designer.show',['token'=>$jobs->token]));
        //     return redirect(route('job.show',['token'=>$jobs->token]));

        // }
        if ($isdesigner == 1){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
            // return redirect(route('designer.show',['token'=>$jobs->token]));
            $designers = Designer::all();

            return view('home',[
                'designers'=>$designers
                ]);

        }

        $designer = Designer::where('token',$token)->get();
        $users = Auth::user(); 
        $cats = Categories::all();    
        $refs = References::inRandomOrder()->limit(9)->get();             
         
             
        $tags = Tags::all();
        return view('manualjob.search',[
            'designer'=>$designer->first(),
            'cats'=>$cats,
            'tags'=>$tags,
            'refs'=>$refs,
            'users'=>$users
            ]);
    }
    public function jobStep1Store(Request $request)
    {
        //$jobs = Auth::user()->job();
        // $users = Auth::user()->job();
        // $jobs = Jobs::all();

        $cats = Categories::all();             

        // if ($designer){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     return view('designer.edit');
        // } $filenameWithExt = $request->file('profilepic')->getClientOriginalName();
        $filenameWithExt = $request->file('productPic')->getClientOriginalName();
        // $filenameWithExt = $request->file('refpicbyUser')->getClientOriginalName();

        //get file name

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('productPic')->getClientOriginalExtension();
        // $extension = $request->file('refpicbyUser')->getClientOriginalExtension();

        //create new file name
//        $filenameTostore = $filename.'_'.time().'.'.$extension;

        $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;
    

        $jobs = Jobs::create([
            'categories'=>$request->input('categories'),
            // 'categories'=>'0',
            // 'categories_id'=>'0',
            // 'url'=>'0',
            // 'finishdate'=>'1111/11/11',




            'categories_id'=>$request->input('categories_id'),
            'productPic'=>$request->file('productPic')->move('uploads/productPic',$filenameTostore),
            'tags'=>$request->input('tags'),
            'url'=>$request->input('url'),

            // 'finishdate'=>$request->input('finishdate'),

            // 'refpicbyUser'=>$request->file('refpicbyUser')->move('uploads/refpicbyUser',$filenameTostore),
            'requirement'=>$request->input('requirement'),
            // 'pricerate'=>$request->input('pricerate'),
            // 'reference'=>json_encode($request->input('reference')),

           
            // 'file'=>'0',
            
            'designer_id'=>$request->input('designer_id'),
            'user_id'=>Auth::user()->id,
            'token'=> str_random(16),
            

            

        ]);

        // $jobb = DB::getPdo()->lastInsertId();;
        // dd($jobs->token); // $jobs->save();

        // exit();
       

        try{
            // return redirect(route('search.create.step2'))->with('id', $jobs->id);
            return redirect(route('startjob.createref',
            [
                'jobs'=>$jobs->token,
                
            ]));

        }catch (\Exception $x){
            return back()->withInput();
        }
        // return redirect('/',['token'=>$designer->token]);

    }

    public function createJobStep2($token)
    {
            //
            $jobs = Auth::user()->job();
    
            $jobs = Jobs::where('token',$token)->get();
    
            $isdesigner = Auth::user()->role;
    
            
    
            // if ($jobs){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
            //     // return redirect(route('designer.show',['token'=>$jobs->token]));
            //     return redirect(route('job.show',['token'=>$jobs->token]));
    
            // }
            if ($isdesigner == 1){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
                // return redirect(route('designer.show',['token'=>$jobs->token]));
                $designers = Designer::all();
    
                return view('home',[
                    'designers'=>$designers
                    ]);
    
            }
    
            $users = Auth::user(); 
            // $cats = Categories::all();    
            $refs = References::where('categories_id',$jobs->first()->categories_id)->limit(9)->get();             
             
                 
            // $tags = Tags::all();
            return view('manualjob.searchref',[
                'jobs'=>$jobs->first(),
                // 'tags'=>$tags,
                'refs'=>$refs,
                'users'=>$users
                ]);
    }

    public function jobStep2Store(Request $request)
    {
            //$jobs = Auth::user()->job();
            // $users = Auth::user()->job();
            // $jobs = Jobs::all();
    
            // if ($designer){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
            //     return view('designer.edit');
            // } $filenameWithExt = $request->file('profilepic')->getClientOriginalName();
            // $filenameWithExt = $request->file('productPic')->getClientOriginalName();
            $filenameWithExt = $request->file('refpicbyUser')->getClientOriginalName();
    
            //get file name
    
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    
            // $extension = $request->file('productPic')->getClientOriginalExtension();
            $extension = $request->file('refpicbyUser')->getClientOriginalExtension();
    
            //create new file name
    //        $filenameTostore = $filename.'_'.time().'.'.$extension;
    
            $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;
        
    
            $updateJob = Jobs::find($request->job_id);
            $updateJob->refpicbyUser = $request->file('refpicbyUser')->move('uploads/refpicbyUser',$filenameTostore);
            $updateJob->reference = json_encode($request->input('reference'));
            $updateJob->save();
    
            // $jobs = Jobs::create([
                // 'categories'=>$request->input('categories'),
                // 'categories'=>'0',
                // 'categories_id'=>'0',
                // 'url'=>'0',
                // 'finishdate'=>'1111/11/11',
    
    
    
    
                // 'categories_id'=>$request->input('categories_id'),
                // 'productPic'=>$request->file('productPic')->move('uploads/productPic',$filenameTostore),
                // 'tags'=>json_encode($request->input('tags')),
                // 'url'=>$request->input('url'),
    
                // 'finishdate'=>$request->input('finishdate'),
    
                // 'refpicbyUser'=>$request->file('refpicbyUser')->move('uploads/refpicbyUser',$filenameTostore),
                // 'requirement'=>$request->input('requirement'),
                // 'pricerate'=>$request->input('pricerate'),
                // 'reference'=>json_encode($request->input('reference')),
    
               
                // 'file'=>'0',
                
                // 'designer_id'=>NULL,
                // 'user_id'=>Auth::user()->id,
                // 'token'=> str_random(16),
                
    
                
    
            // ]);
    
            // $jobb = DB::getPdo()->lastInsertId();;
            // dd($jobs->token); // $jobs->save();
    
            // exit();
           
    
            try{
                // สำเร็จแล้ว ส่งไป step2
                // return redirect(route('search.create.step2'))->with('id', $jobs->id);
                return redirect(route('startjob.createprice',
                [
                    'token'=>$updateJob->token                
                ]));
    
            }catch (\Exception $x){
                return back()->withInput();
            }
            // return redirect('/',['token'=>$designer->token]);
    
          
    
    
    
    
        }
    
      
    public function createJobStep3($token)
    {
        //
        $jobs = Auth::user()->job();

        // if ($jobs){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     // return redirect(route('designer.show',['token'=>$jobs->token]));
        //     return redirect(route('job.show',['token'=>$jobs->token]));

        // }
        $jobs = Jobs::where('token',$token)->get();

        $designer = Designer::where('id',$jobs->first()->designer_id)->get();

        $courses = Courses::where('designer_id',$designer->first()->id)->get();


        $courses->first()->course_id = json_decode($courses->first()->course_id);
        $courses->first()->course_rate = json_decode($courses->first()->course_rate);

        $courses->first()->course_duration_id = json_decode($courses->first()->course_duration_id);
        $courses->first()->course_duration = json_decode($courses->first()->course_duration);
        $courses->first()->course_duration_rate = json_decode($courses->first()->course_duration_rate);
        
        
        $tags = Tags::all();
        $refs = References::inRandomOrder()->limit(8)->get();     
        $jobs->first()->tags = json_decode($jobs->first()->tags);


        
        
        // $coursesid = json_decode($courses->first()->courses_id,true);
        // $coursesrate = json_decode($courses->first()->courses_rate,true);

        // $coursesdurationid = json_decode($courses->first()->courses_duration_id,true);
        // $coursesduration = json_decode($courses->first()->courses_duration,true);
        // $coursesdurationrate = json_decode($courses->first()->courses_duration_rate,true);

        // dd($courses->first()->courses_id);
        // exit();

        // dd($coursesid,$coursesrate,$coursesdurationid,$coursesduration,$coursesdurationrate);
        // exit();

        if ($jobs->count() == 0){
            return "หาไม่เจอ ทำอะไรดี";
        }
        return view('manualjob.showmatchfinal',[
            'jobs'=>$jobs->first(),
            'tags'=>$tags,
            'courses'=>$courses->first(),
            // 'coursesid'=>$coursesid,
            // 'coursesrate'=>$coursesrate,
            // 'coursesdurationid'=>$coursesdurationid,
            // 'coursesduration'=>$coursesduration,
            // 'coursesdurationrate'=>$coursesdurationrate,

            

            'refs'=>$refs,
            ]);

    }
 
    public function jobStep3Store(Request $request,Jobs $updateJob)
    {
   

        $updateJob = Jobs::find($request->job_id);
        $updateJob->jobstatus_id = $request->jobstatus_id;
        $updateJob->finishdate = Carbon::today()->addDay($request->finishdate);
        $updateJob->package_price = $request->package_price;
        $updateJob->dateextra_price = $request->dateextra_price;

        $updateJob->pricerate = $updateJob->package_price + $updateJob->dateextra_price;
        $updateJob->package = $request->package;

        $updateJob->save();

        $designer = Designer::where('id',$updateJob->designer_id)->first();
        auth()->user()->find($designer->user_id)->notify(New JobsNoti($updateJob));
      
        try{
            
            return redirect(route('matched',['token'=>$updateJob->token]));

        }catch (\Exception $x){
            return back()->withInput();
        }
    }


    public function matched($token)
    {
        $auth = Auth::user();

        if (!$auth){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
            // return redirect(route('designer.show',['token'=>$jobs->token]));

            return view('auth.login',[
                ]);

        }

        $jobs = Jobs::where('token',$token)->get();

        return view('manualjob.matchfinish',[
            'jobs'=>$jobs->first(),

        ]);
    }


}

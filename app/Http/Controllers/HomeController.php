<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



use App\Designer;
use App\Categories;
use App\Jobfiles;
use App\References;
use App\Tags;
use App\Jobs;
use App\Jobstatus;
use App\Payment;
use App\Review;
use App\User;

use Illuminate\Support\Facades\Session;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use DB;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $designers = Designer::all();
        $cats = Categories::all();  
        return view('home',[
            'designers'=>$designers
            ]);
    }


    public function createSearchStep1()
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

        $users = Auth::user(); 
        $cats = Categories::all();    
        $refs = References::inRandomOrder()->limit(9)->get();             
         
             
        $tags = Tags::all();
        return view('matching.search',[
            'cats'=>$cats,
            'tags'=>$tags,
            'refs'=>$refs,
            'users'=>$users
            ]);
    }
    public function storeSearchStep1(Request $request)
    {
        //$jobs = Auth::user()->job();
        // $users = Auth::user()->job();
        // $jobs = Jobs::all();

        $cats = Categories::all();             

        // if ($designer){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     return view('designer.edit');
        // } $filenameWithExt = $request->file('profilepic')->getClientOriginalName();
        $filenameWithExt = $request->file('productPic')->getClientOriginalName();
        $filenameWithExt = $request->file('refpicbyUser')->getClientOriginalName();

        //get file name

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('productPic')->getClientOriginalExtension();
        $extension = $request->file('refpicbyUser')->getClientOriginalExtension();

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
            'tags'=>json_encode($request->input('tags')),
            'url'=>$request->input('url'),

            // 'finishdate'=>$request->input('finishdate'),

            'refpicbyUser'=>$request->file('refpicbyUser')->move('uploads/refpicbyUser',$filenameTostore),
            'requirement'=>$request->input('requirement'),
            // 'pricerate'=>$request->input('pricerate'),
            'reference'=>json_encode($request->input('reference')),

           
            // 'file'=>'0',
            
            // 'designer_id'=>NULL,
            'user_id'=>Auth::user()->id,
            'token'=> str_random(16),
            

            

        ]);

        // $jobb = DB::getPdo()->lastInsertId();;
        // dd($jobs->token); // $jobs->save();

        // exit();
       

        try{
            // สำเร็จแล้ว ส่งไป step2
            // return redirect(route('search.create.step2'))->with('id', $jobs->id);
            return redirect(route('search.show',
            [
                'jobs'=>$jobs->token,
                
            ]));

        }catch (\Exception $x){
            return back()->withInput();
        }
        // return redirect('/',['token'=>$designer->token]);

      




    }
    public function deleteStoreStep1($id){

        // $deleteJob = Jobs::find($request->job_id);
        // Jobs::where('token',$token)->delete();
        $deleteJob = Jobs::find($id);
        $deleteJob->delete();
       

        
        return view('matching.search');
    }


        // เอาไอดีจาก create มาสร้าง insertรูปภาพRefต่อ

    
    
   
    // เอาไอดีจาก create มาสร้าง insert Designer ที่เลือก

    // public function createSearchStep3()
    
    // {
    //     return view('search');
    // }
    // public function storeSearchStep3(Request $request)
    // {
    //     return view('search');
    // }
    
//   ------------ this is show match ----------------- //
    public function show($token)
    {
        //
        $jobs = Auth::user()->job();

        // if ($jobs){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     // return redirect(route('designer.show',['token'=>$jobs->token]));
        //     return redirect(route('job.show',['token'=>$jobs->token]));

        // }
        $jobs = Jobs::where('token',$token)->get();
        
        // $designers = Designer::where('tag',$jobstags)->get();


    // $jobtags = Jobs::where('tags',$jobs->tags)->get();
    foreach($jobs as $record){
        $tags = $record->tags;
        // ....
        }
 
    $designers = DB::table('designers')
                ->when($tags, function ($query) use ($tags) {
                    return $query->where('designers.tag', $tags);
                    
                })
                ->where('hasjob',0)
                // ->limit(1)
                ->get();
        
        
        $tags = Tags::all();
        $refs = References::inRandomOrder()->limit(8)->get();     
        $jobs->first()->tags = json_decode($jobs->first()->tags);
        

        // $designers = Designer::where('tag' ,'==', $jobs->tag);

        // $designers = DB::table('designers')
        //     ->select('id')
        //     ->where('tag',$jobs)
        //     ->limit(1)
        //     ->get();

        // $jobs->first()->tag = json_decode($designer->first()->tag);


        if ($jobs->count() == 0){
            return "หาไม่เจอ ทำอะไรดี";
        }
        return view('showmatch',[
            'jobs'=>$jobs->first(),
            'tags'=>$tags,
            'designers'=>$designers,
            'refs'=>$refs,
            ]);

    }
    public function storeSearchStep2(Request $request)
    {
    //    dd($request->all());
    // echo $request->designer_id;
// exit;

        // $users = Auth::user()->job();
        // $jobs = Jobs::where('token',$token)->get();
        // $cats = Categories::all();     
        // $ref = References::all();
     
        // $jobs = Jobs::find($token);
        // $jobs->designer_id = $request->input('designer_id');

        $updateJob = Jobs::find($request->job_id);
        $updateJob->designer_id = $request->designer_id;
        $updateJob->save();


      
        try{
          
            return redirect(route('search.showfinal',['token'=>$updateJob->token]));

        }catch (\Exception $x){
            return back()->withInput();
        }
    }

    public function searchstep3($token)
    {
        //
        $jobs = Auth::user()->job();

        // if ($jobs){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     // return redirect(route('designer.show',['token'=>$jobs->token]));
        //     return redirect(route('job.show',['token'=>$jobs->token]));

        // }
        $jobs = Jobs::where('token',$token)->get();


 
        
        
        $tags = Tags::all();
        $refs = References::inRandomOrder()->limit(8)->get();     
        $jobs->first()->tags = json_decode($jobs->first()->tags);
        

      


        if ($jobs->count() == 0){
            return "หาไม่เจอ ทำอะไรดี";
        }
        return view('matching.showmatchfinal',[
            'jobs'=>$jobs->first(),
            'tags'=>$tags,
            // 'designers'=>$designers,
            'refs'=>$refs,
            ]);

    }
    public function storeSearchStep3(Request $request)
    {
   

        $updateJob = Jobs::find($request->job_id);
        $updateJob->jobstatus_id = $request->jobstatus_id;
        $updateJob->finishdate = $request->finishdate;
        $updateJob->pricerate = $request->pricerate;
        $updateJob->save();


      
        try{
            
            return redirect(route('job.show',['token'=>$updateJob->token]));

        }catch (\Exception $x){
            return back()->withInput();
        }
    }

















    public function showjob($token)
    {
        $jobs = Jobs::where('token',$token)->get();
        // $designers = Designer::where('tag',$jobstags)->get();


 

        $jobstatus = Jobstatus::all();
        $tags = Tags::all();
        $file = Jobfiles::all();

        $jobs->first()->tags = json_decode($jobs->first()->tags);
        $jobs->first()->file = json_decode($jobs->first()->file,true);

        // $jobs->first()->tags = json_decode($jobs->first()->tags);
        // $jobs->jobstatus_id = json_decode($jobs->jobstatus_id);




        if ($jobs->count() == 0){
            return "หาไม่เจอ ทำอะไรดี";
        }
        return view('jobs.showjob',[
            'jobs'=>$jobs->first(),
            'tags'=>$tags,
            'file'=>$file,
            'jobstatus'=>$jobstatus
           // 'designers'=>$designers
            ]);
        // return view('search');
    }

    public function storeShowJob(Request $request)
    {
   

        $updateJob = Jobs::find($request->job_id);
        $updateJob->jobstatus_id = $request->jobstatus_id;
    
        $updateJob->save();


      
        try{
            
            return redirect(route('job.show',['token'=>$updateJob->token]));

        }catch (\Exception $x){
            return back()->withInput();
        }
    }

    public function storeShowJob2(Request $request)
    {
   

        $updateJob = Jobs::find($request->job_id);
        $updateJob->jobstatus_id = $request->jobstatus_id;
        $updateJob->canshow = $request->canshow;

    
        $updateJob->save();


      
        try{
            
            return redirect(route('job.review',['token'=>$updateJob->token]));

        }catch (\Exception $x){
            return back()->withInput();
        }
    }

    // 

    public function reviewJob($token)
    {
        //
        $jobs = Auth::user()->job();


        // if ($jobs){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     // return redirect(route('designer.show',['token'=>$jobs->token]));
        //     return redirect(route('job.show',['token'=>$jobs->token]));

        // }
        $jobs = Jobs::where('token',$token)->first();
        // $designer = Designer::all();
        // $designer = Auth::user()->designer();
        // dd($jobs);

    // exit();

        $designer = Designer::where('designers.id',$jobs->designer_id)->get();


 
        
        
        $tags = Tags::all();
        // $refs = References::inRandomOrder()->limit(8)->get();     
        $designer->first()->tag = json_decode($designer->first()->tag);
        

      


        if ($jobs->count() == 0){
            return "หาไม่เจอ ทำอะไรดี";
        }
        return view('jobs.reviewjob',[
            'jobs'=>$jobs,
            'tags'=>$tags,
            'designer'=>$designer,
            // 'designers'=>$designers,
            // 'refs'=>$refs,
            ]);

    }
    public function storeReviewJob(Request $request)
    {
        $reviews = Review::create([
            'rating'=>$request->input('rating'),

            'reviewdescription'=>$request->input('reviewdescription'),
            'complacency'=>$request->input('complacency'),
            'reasonableprice'=>$request->input('reasonableprice'),
            'skillandexpertise'=>$request->input('skillandexpertise'),
            
            'user_id'=>Auth::user()->id,
            'designer_id'=>$request->input('designer_id'),
            'jobs_id'=>$request->input('jobs_id'),

        ]);
        
        // $updateJob = Jobs::update('update users set votes = 100 where name = ?', ['John']);
        $updateJob = DB::table('jobs')->where('id', $reviews->jobs_id)->update([
            'reviews_id' => $reviews->id
            ]);
        // $updateJob = Jobs::find($request->$reviews->jobs_id);
        // $updateJob->reviews_id = $reviews->id;
    
        // $updateJob->save();
        // dd($updateJob);
        // exit();

        // return 'success';
        // exit();
        try{
            
            return redirect(route('show.alljob',[
                'reviews'=>$reviews
                ]));

        }catch (\Exception $x){
            return back()->withInput();
        }

    }
  

    public function paymentJob($token)
    {
        //
        $jobs = Auth::user()->job();


        // if ($jobs){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     // return redirect(route('designer.show',['token'=>$jobs->token]));
        //     return redirect(route('job.show',['token'=>$jobs->token]));

        // }
        $jobs = Jobs::where('token',$token)->first();
        // $designer = Designer::all();
        // $designer = Auth::user()->designer();
        // dd($jobs);

    // exit();

        $designer = Designer::where('designers.id',$jobs->designer_id)->get();


 
        
        
        $tags = Tags::all();
        // $refs = References::inRandomOrder()->limit(8)->get();     
        $designer->first()->tag = json_decode($designer->first()->tag);
        

      


        if ($jobs->count() == 0){
            return "หาไม่เจอ ทำอะไรดี";
        }
        return view('jobs.payment',[
            'jobs'=>$jobs,
            'tags'=>$tags,
            'designer'=>$designer,
            // 'designers'=>$designers,
            // 'refs'=>$refs,
            ]);

    }
    public function storePaymentJob(Request $request)
    {
        // $jobs = Jobs::where('token',$token)->get();




        $filenameWithExt = $request->file('fileTransfer')->getClientOriginalName();

        //get file name

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('fileTransfer')->getClientOriginalExtension();

        //create new file name

        $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;

        $payment = Payment::create([
            'name'=>$request->input('name'),
            'surname'=>$request->input('surname'),

            'price'=>$request->input('price'),
            'bank'=>$request->input('bank'),
            'dateatTransfer'=>$request->input('dateatTransfer'),
            'timeatTransfer'=>$request->input('timeatTransfer'),
            'description'=>$request->input('description'),
            'fileTransfer'=>$request->file('fileTransfer')->move('uploads/paymentPic',$filenameTostore),

            
            'user_id'=>Auth::user()->id,
            'designer_id'=>$request->input('designer_id'),
            'job_id'=>$request->input('job_id'),

        ]);
        
        // $updateJob = Jobs::update('update users set votes = 100 where name = ?', ['John']);

        $updateJob = DB::table('jobs')->where('id', $payment->job_id)->update([
            'payment_id' => $payment->id,
            'jobstatus_id' => 3
            ]);
            
        $jobs = Jobs::where('id',$payment->job_id)->first();


    // $updateJob2 = Jobs::find($request->$reviews->jobs_id);
        // $updateJob->reviews_id = $reviews->id;
    
        // $updateJob->save();
        // dd($jobs->token);
        // exit();

        // return 'success';
        // exit();
        try{
            
            return redirect(route('job.show',['token'=>$jobs->token]));
            
        }catch (\Exception $x){
            return back()->withInput();
        }

    }
    public function getDownload($fileimgname)
    {
    
        //PDF file is stored under project/public/download/info.pdf
    
        // $dl= Jobfiles::find($fileimgname);
    
     

    // return Storage::download($dl->path,$dl->title);
    return response()->download(public_path('/uploads/Files/'.$fileimgname));
    // return response()->download(public_path('/uploads/Files/', $fileimgname, $headers));
    
    }

    public function alljob(Designer $designer)
    {
        //

        $user = Auth::user();
        

        $jobs = Jobs::where('jobs.user_id',$user->id)->get();
        ;
        // $jobstatusid = \App\Jobstatus::find($jobs->jobstatus_id)->statusName;


        


        return view('jobs.alljob',[
            'user'=>$user,
            'jobs'=>$jobs,
            // 'jobstatusid'=>$jobstatusid
            ]);
    }
}

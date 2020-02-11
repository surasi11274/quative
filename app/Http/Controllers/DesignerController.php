<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Designer;
use App\Jobfiles;
use App\Tags;
use App\User;
use App\Jobs;
use App\Jobstatus;



use DB;
use Illuminate\Support\Facades\Storage;

class DesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //        return view('auth.registerDesigner');
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $designer = Auth::user()->designer();
        if ($designer){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
            return redirect(route('designer.show',['token'=>$designer->token]));
        }
        $tags = Tags::all();
        return view('designer.designer',[
            'tags'=>$tags
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $designer = Auth::user()->designer();
        if ($designer){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
            return view('designer.edit');
        }
        // $designer = Designer::find($id);
            //    dd($request->all());

        // $isDesigner = Auth::user()->designer();
        // if ($isDesigner){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     return redirect('route('actors.edit''));
        // }

        $filenameWithExt = $request->file('profilepic')->getClientOriginalName();
        $filenameWithExt = $request->file('selfieID')->getClientOriginalName();
        $filenameWithExt = $request->file('pictureIDCard')->getClientOriginalName();

        //get file name

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('profilepic')->getClientOriginalExtension();
        $extension = $request->file('selfieID')->getClientOriginalExtension();
        $extension = $request->file('pictureIDCard')->getClientOriginalExtension();

        //create new file name
//        $filenameTostore = $filename.'_'.time().'.'.$extension;

        $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;

           //upload img
        // $request->file('profilepic')->move('uploads/profilepic',$filenameTostore);
        // $request->file('selfieID')->move('uploads/selfieID',$filenameTostore);
        // $request->file('pictureIDCard')->move('uploads/pictureIDCard',$filenameTostore);

        DB::table('designers')->insert([
            'description'=>$request->input('description'),
            'phonenumber'=>$request->input('phonenumber'),
            'tag'=>json_encode($request->input('tag')),
            'personalID'=>$request->input('personalID'),
            'titlename'=>$request->input('titlename'),
            'name'=>$request->input('name'),
            'surname'=>$request->input('surname'),
            'birthdate'=>$request->input('birthdate'),
            'address'=>$request->input('address'),
            'zipcode'=>$request->input('zipcode'),
            // 'pricerate'=>$request->input('pricerate'),
            'bankname'=>$request->input('bankname'),
            'bankaccount'=>$request->input('bankaccount'),
            'profilepic'=>$request->file('profilepic')->move('uploads/profilepic',$filenameTostore),
            'selfieID'=>$request->file('selfieID')->move('uploads/selfieID',$filenameTostore),
            'pictureIDCard'=>$request->file('pictureIDCard')->move('uploads/pictureIDCard',$filenameTostore),
            // 'hasjob'=>'0',
            // 'rating'=>'0',
            'user_id'=>Auth::user()->id,
            'token'=> str_random(16)

            




        ]);
        DB::table('designers')->insert([
            
            'tag'=>json_encode($request->input('tag')),


        ]);

      
        try{
            // สำเร็จแล้ว
            // $designer->save();
            // เด้งไปหน้าโชว์ของใครของมันเลย
            return redirect(route('designer.show',['token'=>$designer->token]));
        }catch (\Exception $x){
            return back()->withInput();
        }
        // return redirect('/',['token'=>$designer->token]);

      


        // tags เก็บยาวเป็น String แล้วไป split ทีหลัง
        // รูปแบบ : id|id|id
      
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
        
    public function show($token)
    {
        //

        $designer = Designer::where('token',$token)->get();
        $users = Auth::user()->designer();
        // return $this->show()->where('designer','=','confirmed');
    

        $tags = Tags::all();

        $designer->first()->tag = json_decode($designer->first()->tag);


        if ($designer->count() == 0){
            return "หาไม่เจอ ทำอะไรดี";
        }
        return view('designer.show',[
            'designer'=>$designer->first(),
            'tags'=>$tags,
            'users'=>$users
            ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function edit(Designer $designer)
    {
        //

        $designer = Auth::user()->designer();
        if (!$designer){ // ยังเคยสร้างโปรไฟล์ เด้งไปหน้าสร้าง
            return redirect('/designer');
        }
        return view('designer.edit');;
    }

    public function requestjob(Designer $designer)
    {
        //

        $designer = Auth::user()->designer();
        

        $jobs = Jobs::where('jobs.designer_id',$designer->id)->get();
        ;
        // $jobstatusid = \App\Jobstatus::find($jobs->jobstatus_id)->statusName;

        $jobs->first()->tags = json_decode($jobs->first()->tags);

        


        return view('designer.requestjob',[
            'designer'=>$designer,
            'jobs'=>$jobs,
            // 'jobstatusid'=>$jobstatusid
            ]);
    }
    
    public function showjobdetail($id)
    {
            
        $jobs = Jobs::where('id',$id)->get();
        // $jobs = Jobs::find($id);

        // $designers = Designer::where('tag',$jobstags)->get();


        $tags = Tags::all();

        $jobs->first()->tags = json_decode($jobs->first()->tags);



        
        return view('designer.jobdetail',[
            'jobs'=>$jobs,
            'tags'=>$tags,

            

           // 'designers'=>$designers
            ]);
        // return view('search');
    }
    // public function storeDownloadFile($id){
    //     // $dl = Jobfiles::find($id);
    //     // return Storage::download($dl->fileimgname); 
    //     return  response()->download(public_path('uploads/ArtworkFiles/'.$id));
    // }

    public function jobStatusStore(Request $request)
    {
   

        $updateJob = Jobs::find($request->job_id);
        $updateJob->jobstatus_id = $request->jobstatus_id;
        $updateJob->save();


      
        try{
            
            return redirect(route('designer.jobdetail',['id'=>$updateJob->id]));

        }catch (\Exception $x){
            return back()->withInput();
        }
    }

    public function storeFilesJob(Request $request)
    {
        // $jobs = Jobs::where('token',$token)->get();




       $filesimg = $request->file('fileimgname');
       $filesartwork = $request->file('fileartworkname');
       if(!empty($filesimg)) :

        foreach ($filesimg as $fileimg ):
            $filenameWithExt = $fileimg->getClientOriginalName();

            //get file name
    
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    
            $extension = $fileimg->getClientOriginalExtension();
    
            //create new file name
    
            $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;

            $fileinput = Jobfiles::create([
                // foreach (file as $file){

                'fileimgname'=>$fileimg->move('uploads/Files',$filenameTostore),
    
              
    
                
                'user_id'=>$request->input('user_id'),
                'designer_id'=>$request->input('designer_id'),
                'job_id'=>$request->input('job_id'),
    
            ]);
        endforeach;
        endif;

        if(!empty($filesartwork)) :
            foreach ($filesartwork as $fileartwork ):
                $filenameWithExt = $fileartwork->getClientOriginalName();

                //get file name
        
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
                $extension = $fileartwork->getClientOriginalExtension();
        
                //create new file name
        
                $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;

                $fileinput = Jobfiles::create([
                    // foreach (file as $file){

                    'fileartworkname'=>$fileartwork->move('uploads/ArtworkFiles',$filenameTostore),
        
                
        
                    
                    'user_id'=>$request->input('user_id'),
                    'designer_id'=>$request->input('designer_id'),
                    'job_id'=>$request->input('job_id'),
        
                ]);
            endforeach;

    endif;
    $query = DB::table('jobfiles')->select('id')->where('job_id', $fileinput->job_id)->get();
    $updateJob = DB::table('jobs')->where('id', $fileinput->job_id)->update([
        'file' => json_encode($query),
        'jobstatus_id' => '5'
        // 'reference'=>json_encode($request->input('reference')),

        ]);
        // dd($query);
        // exit();
    // return 'success';
    // exit();

       

                // $jobs = Jobs::where('id',$files->job_id)->first();

        // }
       
        

        // $updateJob = DB::table('jobs')->where('id', $files->job_id)->update([
        //     'payment_id' => $files->id
        //     ]);
            


    // $updateJob2 = Jobs::find($request->$reviews->jobs_id);
        // $updateJob->reviews_id = $reviews->id;
    
        // $updateJob->save();
        // dd($files);
        // exit();

        // return 'success';
        // exit();
        try{
            
            return redirect(route('job.show',['id'=>$jobs->id]));
            
        }catch (\Exception $x){
            return back()->withInput();
        }

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Designer $designer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designer $designer)
    {
        //
    }
}

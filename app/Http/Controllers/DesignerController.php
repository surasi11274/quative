<?php

namespace App\Http\Controllers;

use App\Courses;
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

        $designers = Designer::create([
            'description'=>$request->input('description'),
            'phonenumber'=>$request->input('phonenumber'),
            'tag'=>json_encode($request->input('tag')),
            'personalID'=>$request->input('personalID'),
            'titleName'=>$request->input('titleName'),
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
        
        
        $courses = DB::table('courses')->get();
        $coursesdurations = DB::table('courses_duration')->get();

        foreach ($courses as $cl) {
            $clid[] = $cl->id;
            $clr[] = $cl->default_rate;

        }
        foreach ($coursesdurations as $cdl) {
            $cdlid[] = $cdl->id;
            $cdlcd[] = $cdl->course_duration;
            $cdlr[] = $cdl->default_rate;

        }
        // dd($clid);
        // exit();
        $course = Courses::create([
            'designer_id'=>$designers->id,
            'user_id'=>$designers->user_id,
            
            'course_id'=>json_encode($clid),
            'course_rate'=>json_encode($clr),
            'course_duration_id'=>json_encode($cdlid),
            'course_duration'=>json_encode($cdlcd),
            'course_duration_rate'=>json_encode($cdlr),

        ]);
        $updatecourse = DB::table('designers')->where('id', $course->designer_id)->update([
            'designers_courses_id' => $course->id,
    
            ]);
        // dd($updatecourse);
        // exit();
        
        

      
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
        

        $jobs = Jobs::where('jobs.designer_id',$designer->id)->orderBy('id', 'DESC')->get();
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
    $query = DB::table('jobfiles')->select('id')->where('job_id', $fileinput->job_id)->pluck('id')->toarray();
    
    DB::table('jobs')->where('id', $fileinput->job_id)->update([
        'file' => json_encode($query),
        'jobstatus_id' => '5'
        // 'reference'=>json_encode($request->input('reference')),

        ]);
        // dd($updateJob);
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

    public function course($token) {


        $designer = Designer::where('token',$token)->get();
        
        $courses = Courses::where('designer_id',$designer->first()->id)->get();

       

        // foreach ($courses as $course){
            // $jobtag = json_decode($jobtags->tags,true);
            $courses->first()->course_id = json_decode($courses->first()->course_id);
            $courses->first()->course_rate = json_decode($courses->first()->course_rate);
    
            $courses->first()->course_duration_id = json_decode($courses->first()->course_duration_id);
            $courses->first()->course_duration = json_decode($courses->first()->course_duration);
            $courses->first()->course_duration_rate = json_decode($courses->first()->course_duration_rate);
        // }

        // foreach($courses_course_id as $ccid) {
        //     $ccid_decode = DB::table('courses')->select('course')->where('id', $ccid)->get();
        //     $ccid_decode_description = DB::table('courses')->select('description')->where('id', $ccid)->get();

        // }
        // foreach($courses_course_duration_id as $ccdid) {
        //     $ccdid_decode = DB::table('courses_duration')->where('id', $ccdid)->get();

        // }
        // foreach($courses_course_duration as $ccd) {
        //     $ccd_decode = DB::table('courses_duration')->where('id', $ccd)->get();

        // }

        

        // dd($courses);
        // exit();
        // $users = Auth::user()->designer();

        // $courses = DB::table('courses')->get();
        // $coursesdurations = DB::table('courses_duration')->get();

        return view('designer.course',[
            // 'courses_course_rate'=>$courses_course_rate,
            // 'courses_course_duration'=>$courses_course_duration,
            // 'courses_course_duration_rate'=>$courses_course_duration_rate,
            'courses'=>$courses->first(),
            'designer'=>$designer->first()
            ]);
    }
    public function includecourse($id) {

        // $hascourse = designer()->courses();

        // if ($hascourse){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     return redirect('/');
        // }
        $courses = Courses::find($id);
        $designer = Designer::where('id',$courses->designer_id)->get();


        $courses->course_id = json_decode($courses->course_id);
        $courses->course_rate = json_decode($courses->course_rate);

        $courses->course_duration_id = json_decode($courses->course_duration_id);
        $courses->course_duration = json_decode($courses->course_duration);
        $courses->course_duration_rate = json_decode($courses->course_duration_rate);
        // $designer = Designer::where('token',$token)->get();
        

        // $users = Auth::user()->designer();

        // $courses = DB::table('courses')->get();
        // $coursesdurations = DB::table('courses_duration')->get();

        return view('designer.includecourse',[
            'courses'=>$courses,
            // 'coursesdurations'=>$coursesdurations,
            'designer'=>$designer->first()
            ]);
    }

    public function courseStore(Request $request) {
        // $courses = DB::table('courses')->get();
        // $coursesdurations = DB::table('courses_duration')->get();
        // $designer = Designer::where('id',$courses->designer_id)->get();

        $courses = Courses::find($request->id);
        // $courses->designer_id = $request->designer_id;
        $courses->course_rate = json_encode($request->course_rate);
        $courses->course_duration = json_encode($request->course_duration);
        $courses->course_duration_rate = json_encode($request->course_duration_rate);

        $courses->save();

        $designer = Designer::where('id',$courses->designer_id)->get();
    //  dd($designer);
    //         exit();
        
        // $courses = Courses::create([
            // $courses = Courses::where('id', $request->designer_id)->update([
            //     'course_rate' => json_encode($request->course_rate),
            //     // 'jobstatus_id' => '5'
            //     // 'reference'=>json_encode($request->input('reference')),
        
            //     ]);
                

            
        //     'user_id'=>$request->input('user_id'),
        //     'designer_id'=>$request->input('designer_id'),
        //     'course_id'=>json_encode($request->input('course_id')),
        //     'course_rate'=>json_encode($request->input('course_rate')),
        //     'course_duration_id'=>json_encode($request->input('course_duration_id')),
        //     'course_duration'=>json_encode($request->input('course_duration')),
        //     'course_duration_rate'=>json_encode($request->input('course_duration_rate')),




        // ]);

        // $query = DB::table('designer_courses')->select('id')->where('id', $courses->id)->get();
       
        // $update = DB::table('designers')->where('id', $courses->designer_id)->update([
        //     'designers_courses_id' => $query,
    
        //     ]);
        //     dd($update);
        //     exit();
        
        return redirect()->route('designer.course',$designer->first()->token);
    }

    public function billing() {
        return view('designer.billing');
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

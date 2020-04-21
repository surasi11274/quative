<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Jobfiles;
use App\Jobs;
use App\Like;
use App\Tags;
use App\User;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    //
    
    
    public function gallery()
    {
        // $jobs = DB::table('jobs')->where('canshow',1)->get();

        $jobs = Jobs::where('canshow',1)->orderBy('id', 'DESC')->get();
        $jobbox = Jobs::where('canshow',1)->where('categories','กล่อง')->orderBy('id', 'DESC')->get();
        $jobbottle = Jobs::where('canshow',1)->where('categories','ขวด')->orderBy('id', 'DESC')->get();
        $jobcup = Jobs::where('canshow',1)->where('categories','แก้ว')->orderBy('id', 'DESC')->get();
        $jobbag = Jobs::where('canshow',1)->where('categories','ถุง')->orderBy('id', 'DESC')->get();
        $jobcan = Jobs::where('canshow',1)->where('categories','กระป๋อง')->orderBy('id', 'DESC')->get();
        
        // $jobfiles = $jobs->find()->file;
        // $jobfiles = json_decode($jobfiles,true);
        // $jobs->first()->file = json_decode($jobs->first()->file);
        
        // $jobfiles = \App\Jobfiles::where('job_id',$job->id)->get();
        $jobfiles = Jobfiles::all();

        // foreach ($jobs as $job){
        //     // $object->title 
        //     $jobtags = json_decode($job->tags,true);


        // }
        // foreach ($jobbox as $jobbo){
        //     $jobtagsjobbo = json_decode($jobbo->tags,true);


        // }
        // foreach ($jobbottle as $jobbot){
        //     $jobtagsjobbot = json_decode($jobbot->tags,true);


        // }
        // foreach ($jobcup as $jobc){
        //     $jobtagsjobc = json_decode($jobc->tags,true);


        // }
        // foreach ($jobbag as $jobba){
        //     $jobtagsjobba = json_decode($jobba->tags,true);


        // }
        // foreach ($jobcan as $jobca){
        //     $jobtagsjobca = json_decode($jobca->tags,true);


        // }
        // foreach($jobs as $record){
        //     $jobid = $record->id;
        //     // ....
        //     }

        // $file = Jobfiles::where('job_id',$jobid)->pluck('job_id')->toarray();

        


        // $cats = Categories::all();  
        return view('vote.vote',[
            'jobs'=>$jobs,
            'jobfiles'=>$jobfiles,
            // 'jobtags'=>$jobtags,
            'jobbox'=>$jobbox,
            // 'jobtagsjobbo'=>$jobtagsjobbo,

            'jobbottle'=>$jobbottle,
            // 'jobtagsjobbot'=>$jobtagsjobbot,


            'jobcup'=>$jobcup,
            // 'jobtagsjobc'=>$jobtagsjobc,

            'jobbag'=>$jobbag,
            // 'jobtagsjobba'=>$jobtagsjobba,

            'jobcan'=>$jobcan,
            // 'jobtagsjobca'=>$jobtagsjobca,



            ]);
    }

    // public function search(Request $request)
    // {
    //     $jobfiles = Jobfiles::all();

    //     $search = $request->get('search');

    //     $jobs = Jobs::where('canshow',1)->orderBy('id', 'DESC')->get();
    //     foreach($jobs as $job){
    //         $jobtags = json_decode($job->tags,true);
    //         foreach($jobtags as $jobtag) {
    //             $tagname = Tags::find($jobtag)->tagName;

    //         }

    //     }


    //     $searchjobs = DB::table('jobs')->where($tagname,'like','%'.$search.'%');
    //     return view('vote.vote',[
    //         'searchjobs'=>$searchjobs,
    //         'jobs'=>$jobs,
    //         'jobfiles'=>$jobfiles,

    //         'jobtags'=>$jobtags

    //     ]);
    // }
    public function galleryDetail($id)
    {

        $jobs = Jobs::find($id);
        $jobsde = Jobs::where('canshow',1)->where('designer_id',$jobs->designer_id)->where('id','!=',$jobs->id)->limit(3)->get();
        $jobsotherde = Jobs::where('canshow',1)->where('designer_id','!=',$jobs->designer_id)->where('id','!=',$jobs->id)->limit(3)->get();

        // dd($jobs);
            // $object->title 
        $jobtag = json_decode($jobs->tags,true);
        $jobfile = json_decode($jobs->file,true);

        // $jobsdetail = Jobs::where('canshow',1)->where('categories','กล่อง')->orderBy('id', 'DESC')->get();

        $jobfiles = Jobfiles::all();


        $jobkey = 'job_' . $jobs->id;
        if(!Session::has($jobkey)){
            $jobs->increment('view_count');
            Session::put($jobkey,1);
        }

      
        // $cats = Categories::all();  
        return view('vote.votedetail',[
            'jobs'=>$jobs,
            'jobtag'=>$jobtag,
            'jobfile'=>$jobfile,
            'jobsde'=>$jobsde,
            'jobsotherde'=>$jobsotherde,


            'jobfiles'=>$jobfiles,

            ]);
    }

    // public function likepost(Request $request)
    // {
        
    //         $job_id = $request['jobId'];
    //         $is_like = $request['isLike'] === 'true';
    //         $update = false;
    //         $job = Jobs::find($job_id);
    
    //         if(!$job) {
    //             return null;
    //         }
    
    //         $user = Auth::user();
    //         $like = $user->likes()->where('job_id', $job_id)->first();
    //         if($like) {
    //             $already_like = $like->like;
    //             $update = true;
    //             if($already_like == $is_like) {
    //                 $like->delete();
    //                 return null;
    //             }
    //         } else {
    //             $like  = new Like();
    //         }
    
    //         $like->like = $is_like;
    //         $like->user_id = $user->id;
    //         $like->job_id = $job->id;
            
    //         if($update) {
    //             $like->update();
    //         } else {
    //             $like->save();
    //         }
    
    //         return null;
        
        
    // }

    public function add($job){

        $user = Auth::user();
        $isFavorite = $user->favorite_jobs()->where('jobs_id',$job)->count();
        
        if($isFavorite == 0) {
            $user->favorite_jobs()->attach($job);
            Toastr::success('Job successfully added to your favorite list :)','Success');
            return redirect()->back();
        } else {
            $user->favorite_jobs()->detach($job);
            Toastr::success('Job successfully remove from your favorite list :)','Success');
            return redirect()->back();
        }
    }
    public function favList(){
        $user = Auth::user();
        $jobs = $user->favorite_jobs()->orderBy('id', 'DESC')->get();

        $jobfiles = Jobfiles::all();

        foreach ($jobs as $jobtags){
            // $object->title 
            $jobtag = json_decode($jobtags->tags,true);


        }
        return view('vote.favoritelist',[
            'jobs'=>$jobs,
            'jobfiles'=>$jobfiles,
            'jobtag'=>$jobtag
            ]);
    }

    public function store(Request $request,$job){
        $this->validate($request,[
            'comment' => 'required'
        ]);

        $comment = New Comments();
        $comment->user_id = Auth::id();
        $comment->jobs_id = $job;
        $comment->comment = $request->comment;
        $comment->save();
        Toastr::success('Comment Successfully Publish  :)','Success');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Jobfiles;
use App\Jobs;
use App\Like;
use App\User;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    //
    
    
    public function gallery()
    {
        // $jobs = DB::table('jobs')->where('canshow',1)->get();

        $jobs = Jobs::where('canshow',1)->get();
        // $jobfiles = $jobs->find()->file;
        // $jobfiles = json_decode($jobfiles,true);
        // $jobs->first()->file = json_decode($jobs->first()->file);
        
        // $jobfiles = \App\Jobfiles::where('job_id',$job->id)->get();
        $jobfiles = Jobfiles::all();


        // foreach($jobs as $record){
        //     $jobid = $record->id;
        //     // ....
        //     }

        // $file = Jobfiles::where('job_id',$jobid)->pluck('job_id')->toarray();

        


        // $cats = Categories::all();  
        return view('vote.vote',[
            'jobs'=>$jobs,
            'jobfiles'=>$jobfiles
            ]);
    }
    public function galleryDetail($id)
    {
        $jobs = Jobs::find($id);
        // dd($jobs);

        // $cats = Categories::all();  
        return view('vote.votedetail',[
            'jobs'=>$jobs
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
}

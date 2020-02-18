<?php

namespace App\Http\Controllers;

use App\Jobs;
use App\Like;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    //
    public function gallery()
    {
        $jobs = Jobs::where('canshow',1)->get();

        // $cats = Categories::all();  
        return view('vote.vote',[
            'jobs'=>$jobs
            ]);
    }
    public function galleryDetail($id)
    {
        $jobs = Jobs::find($id)->first();
        dd($jobs);

        // $cats = Categories::all();  
        return view('vote.votedetail',[
            'jobs'=>$jobs
            ]);
    }

    public function likepost(Request $request)
    {
        
            $job_id = $request['jobId'];
            $is_like = $request['isLike'] === 'true';
            $update = false;
            $job = Jobs::find($job_id);
    
            if(!$job) {
                return null;
            }
    
            $user = Auth::user();
            $like = $user->likes()->where('job_id', $job_id)->first();
            if($like) {
                $already_like = $like->like;
                $update = true;
                if($already_like == $is_like) {
                    $like->delete();
                    return null;
                }
            } else {
                $like  = new Like();
            }
    
            $like->like = $is_like;
            $like->user_id = $user->id;
            $like->job_id = $job->id;
            
            if($update) {
                $like->update();
            } else {
                $like->save();
            }
    
            return null;
        
        
    }
}

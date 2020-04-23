<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Designer;
use App\Jobfiles;
use App\Jobs;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $designers = Designer::all();
        $cats = Categories::all();  
        $jobs = Jobs::where('canshow',1)->orderBy('id', 'DESC')->limit(6)->get();
        // $jobfiles = $jobs->find()->file;
        // $jobfiles = json_decode($jobfiles,true);
        // $jobs->first()->file = json_decode($jobs->first()->file);
        
        // $jobfiles = \App\Jobfiles::where('job_id',$job->id)->get();
        $jobfiles = Jobfiles::all();

        // foreach ($jobs as $job){
        //     // $object->title 
        //     $jobtags = json_decode($job->tags,true);


        // }
        return view('home',[
            'designers'=>$designers,
            'jobs'=>$jobs,
            'jobfiles'=>$jobfiles,
            // 'jobtags'=>$jobtags
            ]);
    }

}

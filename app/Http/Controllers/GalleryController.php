<?php

namespace App\Http\Controllers;

use App\Jobs;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function gallery()
    {
        $jobs = Jobs::all();
        // $cats = Categories::all();  
        return view('vote.vote',[
            'jobs'=>$jobs
            ]);
    }
}

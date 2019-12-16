<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Designer;
use App\Tags;
use App\User;


use DB;



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
        return view('home');
    }
    public function create()
    {
        //
       
        $tags = Tags::all();
        return view('search',[
            'tags'=>$tags
            ]);
    }
    public function search()
    {
        return view('search');
    }
}

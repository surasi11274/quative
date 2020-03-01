<?php

namespace App\Http\Controllers;

use App\Jobs;
use App\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('admin.admin');
    }
    public function payments()
    {
       
        $payments = Payment::all();
        return view('admin.payments',[
            'payments'=>$payments,
            // 'jobstatusid'=>$jobstatusid
            ]);
    }
    public function paymentsdetail($id)
    {
       
        $payments = Payment::find($id);
        return view('admin.paymentsdetail',[
            'payments'=>$payments,
            // 'jobstatusid'=>$jobstatusid
            ]);
    }
}

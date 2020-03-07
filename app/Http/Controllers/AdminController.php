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
       
        $payments = Payment::orderBy('id', 'DESC')->get();
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
    public function storeUpdatePayment(Request $request)
    {
        $updatePayment = Payment::find($request->id);
        $updatePayment->payments_status = $request->payments_status;
        $updatePayment->problem_note = $request->problem_note;
        $updatePayment->save();


      
        try{
          
            return redirect(route('admin.paymentsdetail',['id'=>$updatePayment->id]));

        }catch (\Exception $x){
            return back()->withInput();
        }
    }
}

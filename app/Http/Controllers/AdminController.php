<?php

namespace App\Http\Controllers;

use App\Jobs;
use App\Payment;
use App\User;
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
    // pang edit 
    // public function dashboard(){
    //     return view('admin.dashboard');
    // }
    
    // public function dashtotalJob(){
    //     return view('admin.totaljob');
    // }
    public function dashtotalPrice(){
        return view('admin.totalprice');
    }
    public function index()
    {
        $users = User::where('role','!=',2)->get();
        $jobs = Jobs::all();
        $canshows = Jobs::where('canshow',1)->get();

        $payments = Payment::orderBy('id', 'DESC')->get();
        $wtransfer = Payment::all()->sum('total_price');
        $transfered = Payment::where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
        $transferedToDesigner = Payment::all()->sum('priceTransferToDesigner');






        return view('admin.dashboard',[
            'users'=>$users,
            'jobs'=>$jobs,
            'canshows'=>$canshows,
            'payments'=>$payments,
            'wtransfer'=>$wtransfer,
            'transfered'=>$transfered,
            'transferedToDesigner'=>$transferedToDesigner,

            ]);
    }

    public function userinfo()
    {
       $users = User::where('role','!=',2)->get();
       
        return view('admin.userinfo',[
            'users'=>$users
            ]);
    }

    public function jobs()
    {
       $jobs = Jobs::all();
       
        return view('admin.totaljob',[
            'jobs'=>$jobs
            ]);
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
        $filenameWithExt = $request->file('fileTransferToDesigner')->getClientOriginalName();

        //get file name

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('fileTransferToDesigner')->getClientOriginalExtension();

        //create new file name

        $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;

        $updatePayment = Payment::find($request->id);
        $updatePayment->payments_status = $request->payments_status;
        $updatePayment->problem_note = $request->problem_note;
        $updatePayment->fileTransferToDesigner = $request->file('fileTransferToDesigner')->move('uploads/paymentPic',$filenameTostore);
        $updatePayment->priceTransferToDesigner = $request->priceTransferToDesigner;

        $updatePayment->save();


        $jobpayment = Jobs::where('payment_id',$updatePayment->id)->get();
        

        $updatejobpayment = Jobs::find($jobpayment->first()->id);
        $updatejobpayment->jobstatus_id = $request->jobstatus_id;
        $updatejobpayment->save();

        // dd($updatejobpayment);

        try{
          
            return redirect(route('admin.paymentsdetail',['id'=>$updatePayment->id]));

        }catch (\Exception $x){
            return back()->withInput();
        }
    }
}

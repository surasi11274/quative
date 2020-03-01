@extends('layouts.app')
@section('assets')
    
@endsection
@section('content')
<section class="showpayment">
    <div class="container bg-white mt-5 shadow-sm ">
        <div class="text-center pt-5  ">
            <h1 class="_hilight">ชำระ</h1>
            <h4>ใบรหัสการจ้างงาน No. W000000</h4>
            {{-- <h4>ใบรหัสการจ้างงาน No. W0{{$jobs->id}}</h4> --}}
        </div>
       <div class="container">
        <div class="form-row pl-pr-lg-_ex  mt-5">
          <div class="form-group col-md-12">
            <h5 class="font-weight-bold">ข้อมูลบัญชีของธนาคาร</h5>
            <p>ชำระเงินโดยการโอนเงินผ่านธนาคารนี้</p>
            <div class="row text-center show-payment shadow-sm mb-5">
              <div class="col-md-1">
                <img src="../photo/kbank.png" alt="">
              </div>
              <p class="col-md-3">ธนาคารกสิกรไทย</p> 
              <p class="col-md-4">123-4-56789-0</p> 
              <p class="col-md-4">บริษัท ควอลทีฟ จำกัด</p> 
              <div class="mt-5"></div>
              <div class="col-md-1">
                <img src="../photo/ktb.png" alt="">
              </div>
              <p class="col-md-3">ธนาคารกสิกรไทย</p> 
              <p class="col-md-4">123-4-56789-0</p> 
              <p class="col-md-4">บริษัท ควอลทีฟ จำกัด</p> 
             
            </div>
            <h5 class="font-weight-bold">รายละเอียดการการชำระเงิน</h5>
            <div class=" text-left bg-white p-3 shadow-sm mb-5">
              <h5 class="font-weight-bold">สรุปการชำระเงิน</h5>
              <hr>
            <div class="row">
              <div class="col-md-6">
                <p>01 - งานออกแบบฉลากติดสินค้าหน้าเดียว</p>
                <p>ต้องการงาน ด่วน</p>
              </div>
              <div class="col-md-6">
                <p>2,900 บาท</p>
                <p>500 บาท</p>
              </div>
             <hr>
            </div>
            
            <hr>
           <div class="row">
            
            <div class="col-md-6">
              <h5>รวมทั้งสิ้น</h5>
            </div>
            <div class="col-md-6">
              <p class="_hilight">3,400 บาท</p>
            </div>
           </div>
           

            </div>
            
          </div>
        </div>
       </div>
    </div>
</section>
@endsection
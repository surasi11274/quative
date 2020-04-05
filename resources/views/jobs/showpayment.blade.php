@extends('layouts.app')
@section('assets')
    
@endsection
@section('content')
<section class="showpayment">
    <div class="container bg-white mt-5 shadow-sm ">
        <div class="text-center pt-5  ">
            <h1 class="_hilight">ชำระเงิน</h1>
            <h4 class="_gray">ใบรหัสการจ้างงาน No. W{{$jobs->id}}</h4>
            {{-- <h4>ใบรหัสการจ้างงาน No. W0{{$jobs->id}}</h4> --}}
           
        </div>
       <div class="container">
        <div class="form-row pl-pr-lg-_ex  mt-5">
          <div class="form-group col-md-12">
            <h4 class="font-weight-bold mb-4">รายละเอียดการการชำระเงิน</h4>
            <div class=" text-left bg-white p-3 shadow-sm mb-5 border rounded">
                <h5 class="font-weight-bold">สรุปการชำระเงิน</h5>
                <hr>
            <div class="row">
                <div class="col-md-6">
                  <p>01 - งานออกแบบฉลากติดสินค้าหน้าเดียว ต้องการงาน ด่วน</p>
                 
                </div>
                <div class="col-md-6">
                  <p>{{$jobs->package_price}} บาท</p>
                  <p>{{$jobs->dateextra_price}} บาท</p>
                </div>
             <hr>
            </div> 
            <hr>
           <div class="row">
            
            <div class="col-md-6">
              <h5>รวมทั้งสิ้น</h5>
            </div>
            <div class="col-md-6">
              <p class="_hilight">{{$jobs->pricerate}} บาท</p>
            </div>
           </div>
            </div>
            {{-- 2  --}}
            <h4 class="font-weight-bold">ข้อมูลบัญชีของธนาคาร</h4>
            <p class="mb-3">ชำระเงินโดยการโอนเงินผ่านธนาคารนี้</p>
            <div class="container">
              <div class="row text-center show-payment shadow-sm mb-5">
                <div class="col-md-1">
                  <img src="../photo/kbank.jpg" alt="">
                </div>
                <p class="col-md-3">ธนาคารกสิกรไทย</p> 
                <p class="col-md-4">123-4-56789-0</p> 
                <p class="col-md-4">บริษัท ควอลทีฟ จำกัด</p> 
                <div class="mt-5"></div>
                <div class="col-md-1">
                  <img src="../photo/ktb.jpg" alt="">
                </div>
                <p class="col-md-3">ธนาคารกสิกรไทย</p> 
                <p class="col-md-4">123-4-56789-0</p> 
                <p class="col-md-4">บริษัท ควอลทีฟ จำกัด</p> 
               
              </div>
            </div>
            
            <div class="text-center mb-5">
              <button type="button" class="btn _secondary-btn btn-lg" >ยกเลิก</button>
              <a href="{{ route('job.payment', $jobs->token) }}">
                <button type="submit" class="btn _primary-black btn-lg">อัพโหลดหลักฐานการชำระเงิน</button>
              </a>
            </div>
           
          </div>
        </div>
       </div>
    </div>
</section>
@endsection
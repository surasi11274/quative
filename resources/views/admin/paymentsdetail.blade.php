@extends('layouts.app')

@section('content')

<section class="payment">
    <div class="container bg-white mt-5 shadow-sm ">
        <div class="text-center pt-5  ">
            <h1 class="_hilight">ตรวจสอบการโอนเงิน</h1>
            <h4>ใบรหัสการจ้างงาน No. W0{{$payments->job_id}}</h4>
            
            <img class="mt-5" src="/{{$payments->fileTransfer}}" alt="">

            <div class="container pl-pr-lg-_ex" >
                <div class="text-left">
                    <h4>ยอดที่ชำระเงิน</h4>
                    <div class="row alert alert-secondary" role="alert">
                        <div class="col">
                            <p>ยอดชำระเงินทั้งหมด</p>
                        </div>
                        <div class="col">
                            <p>{{$payments->price}} บาท</p>
                        </div>
                    </div>

                </div>
                <div class="text-left pt-3">
                    <h4>โอนเข้าบัญชีของธนาคาร</h4>
                    <p>{{$payments->bank}}</p>
                </div>
                <div class="row text-left pt-3">
                    <div class="col">
                        <h4>วันที่โอนเงิน</h4>
                        <p>{{$payments->bank}}</p>
                    </div>
                    <div class="col">
                        <h4>เวลาที่โอนเงิน</h4>
                        <p>{{$payments->bank}}</p>
                    </div>
                </div>
                <div class="text-left pt-3">
                    <h4>ข้อความเพิ่มเติม</h4>
                    <p>{{$payments->description}}</p>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-outline-dark text-center mb-5 ">ยกเลิก</button>
                    <button type="submit" class="btn btn-dark text-center mb-5">อนุมัติการโอนเงิน</button>
                </div>
            </div>

        </div>
       
    </div>
</section>
@endsection
@extends('layouts.app')
@section('assets')
<link rel="stylesheet" href="{{asset('css/_animate.css')}}">
@endsection
@section('content')
    <div class="container bg-white mt-5 shadow-sm p-3 text-center">
        <h1 class="_hilight bounceIn">ระบบได้บันทึกข้อมูลสำเร็จ</h1>
        <h3 class="mt-5">ใบรหัสการจ้างงาน No. W0001</h3>
        <p>นักออกแบบชื่อ ปลายฟ้า เป็นตาธรรม</p>
        <div class="row">
            <div class="col-12 mt-5">
                {{-- customer -> pic --}}
                <img class="rounded-circle shadow-sm border-avatar " src="https://picsum.photos/180" alt="">
                {{-- designer -> pic --}}
                <img class="rounded-circle shadow-sm border-avatar" src="https://picsum.photos/180" alt="">
            </div>            
                <div class="col-md-12 mt-5 mb-5">
                        <a href="#" class="btn _secondary-btn ">กลับไปหน้าหลัก</a>
                        <a href="#" class="btn _secondary-btn ">หน้ารวมการจ้าง</a>
                        <a href="#" class="btn _primary-black">ไปหน้าการจ้างงานของคุณ</a>
                </div> 
            </div>
        </div>
    </div>
@endsection
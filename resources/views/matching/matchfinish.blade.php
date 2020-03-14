@extends('layouts.app')
@section('assets')
<link rel="stylesheet" href="{{asset('css/_animate.css')}}">
@endsection
@section('content')
    <div class="container bg-white mt-5 shadow-sm p-3 text-center">
        <h1 class="_hilight bounceIn mt-5">ระบบได้บันทึกข้อมูลสำเร็จ</h1>
        @php
        $designer = \App\Designer::find($jobs->designer_id);
        $designerpic = \App\Designer::find($jobs->designer_id)->profilepic;


    @endphp
    <h4 class="font-weight-bold">ใบรหัสการจ้างงาน No. W0{{$jobs->id}}</h4>
    <p >นักออกแบบชื่อ {{$designer->name}} {{$designer->surname}}</p>
    {{-- <p class="_hilight">ราคารวม {{$jobs->pricerate}} บาท</p> --}}

                       
        <div class="row ">
            <div class="col-12 mt-5">
                {{-- customer -> pic --}}
                
                <img class="rounded-circle shadow-sm border-avatar " src="https://via.placeholder.com/150" width="180" alt="">
                {{-- designer -> pic --}}
                      
                <img class="rounded-circle shadow-sm border-avatar" src="/{{$designerpic}}" width="180" alt="">


            </div> 
              
            

                <div class="col-md-12 mt-md-5 mb-5">
                        <a href="/" class="btn _secondary-btn btn-lg">กลับไปหน้าหลัก</a>
                        <a href="/alljob" class="btn _secondary-btn btn-lg">หน้ารวมการจ้าง</a>
                        <a href="{{route('job.show',$jobs->token)}}" class="btn _primary-black btn-lg">ไปหน้าการจ้างงานของคุณ</a>
                </div> 
            </div>
        </div>
    </div>
@endsection
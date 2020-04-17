@extends('layouts.app')
@section('assets')
<link rel="stylesheet" href="{{asset('css/_animate.css')}}">
@endsection
@section('content')
    <div class="container bg-white mt-5 shadow-sm p-3 text-center">
        <h1 class="_hilight bounceIn mt-5 d-none d-md-block">ระบบได้บันทึกข้อมูลสำเร็จ</h1>
        <h5 class="_hilight bounceIn mt-5 d-md-none font-weight-bold">ระบบได้บันทึกข้อมูลสำเร็จ</h5>
        @php
        $designer = \App\Designer::find($jobs->designer_id);
        $designerpic = \App\Designer::find($jobs->designer_id)->profilepic;

        $user = Auth::user()->find(Auth::user()->id);
        $profile = $user->profile();
    @endphp
    <h4 class="font-weight-bold">ใบรหัสการจ้างงาน No. W{{$jobs->id}}</h4>
    <p >นักออกแบบชื่อ {{$designer->name}} {{$designer->surname}}</p>
    {{-- <p class="_hilight">ราคารวม {{$jobs->pricerate}} บาท</p> --}}
    
    <div class="row d-md-none mb-5 mt-5">
        <div class="col-6">
            @if ($profile)

                <img class="rounded-circle shadow-sm border-avatar  " src="/{{ $profile->profilepic }}" width="180" alt="">
            @else
                <img class="rounded-circle shadow-sm border-avatar " src="{{ Auth::user()->avatar }}" width="180" alt="">

            @endif

        </div>
        <div class="col-6">
            <img class="rounded-circle shadow-sm border-avatar" src="/{{$designerpic}}" width="180" alt="">

        </div>
    </div>
        <div class="row">

            <div class="col-12 mt-5 d-none d-md-block">
                {{-- customer -> pic --}}
                @if ($profile)

                <img class="rounded-circle shadow-sm border-avatar matched-img animated  slideInLeft" src="/{{ $profile->profilepic }}"   alt="">
                @else
                <img class="rounded-circle shadow-sm border-avatar matched-img" src="{{ Auth::user()->avatar }}"   alt="">

                @endif

                {{-- designer -> pic --}}
                      
                <img class="rounded-circle shadow-sm border-avatar matched-img animated   slideInRight" src="/{{$designerpic}}" alt="">


            </div> 
              
                <div class="col-md-12 mt-md-5 mb-5 d-none d-md-block">
                        <a href="/" class="btn _secondary-btn btn-lg">กลับไปหน้าหลัก</a>
                        <a href="/alljob" class="btn _secondary-btn btn-lg">หน้ารวมการจ้าง</a>
                        <a href="{{route('job.show',$jobs->token)}}" class="btn _primary-black btn-lg">ไปหน้าการจ้างงานของคุณ</a>
                </div> 
                
            </div>
     
            <div class="row mb-5 pt-md-5 d-md-none">
                <div class="col d-none d-md-block"></div>
                <div class="col-6">
                    <a href="/alljob" class="btn _secondary-btn  btn-block rounded btn-lg d-md-none ">รวมการจ้าง</a>
                </div>
                <div class="col-6">
                    <a href="{{route('job.show',$jobs->token)}}" class="btn _primary-black  btn-block rounded btn-lg d-md-none ">จ้าง</a>
                </div>
            </div>
        </div>
    </div>
@endsection
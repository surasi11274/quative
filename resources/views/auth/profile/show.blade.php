@extends('layouts.app')
@section('assets')
        <link rel="stylesheet" href="{{asset('css/style_match.css')}}">
@endsection
@section('content')
<section class="content mt_ex">

<div class="container">		
    <div class="row mt-3">
      <div class="col-12 col-md-4 card pb-md-5"  style=" background-color: #000;">
              <div class="profile-img text-center mt-5" style="width:120px;height:120px;margin:auto; ">
                <img id="profileImage" class="rounded-circle " style="width:120px;height:120px; object-fit:cover;" src="/{{$profiles->profilepic}}" />
            </div>
              {{-- <h5 class="text-center mt-5 text-white">ปลายฟ้า เป็นตาธรรม</h5> --}}
              <h5 class="titlename text-center text-white mt-5 font-weight-bold">{{$profiles->name}} {{$profiles->surname}}</h5>
             


      </div>
      <div class="col-12 col-md-8">		
          <div class="card-body bg-white">

              <div class="row">
              <div class="col-md-3">
            <h5 class="font-weight-bold" >ข้อมูลเบื้องต้น</h5>
            <p>เป็นสมาชิกเมื่อ </p>
            <p>เดือน/วัน/ปี เกิด</p>

            <p>จ้างงาน</p>

            </div>

            <div class="col-md-3 mt-2">
           <br>
            <p> {{date('F d,Y',strtotime($profiles->created_at))}}</p>
            <p>{{ date('F d,Y',strtotime($profiles->birthdate)) }}</p>

            <p>{{ $jobs->count() }} ครั้ง</p>

            </div>

            <div class="col-md-3">
            <h5 class="font-weight-bold">ยืนยันตัวตน</h5>
            <p><i class="fas fa-envelope-square"></i>  อีเมล  @if (Auth::user()->email !== NULL)<i class="fas fa-check" style="color: #523EE8;"></i></p>@endif
            <p><i class="fas fa-id-card"></i>  ประชาชน   @if ($profiles->personalID !== NULL)<i class="fas fa-check" style="color: #523EE8;"></i></p>@endif
            <p><i class="fas fa-phone-square-alt"></i>  เบอร์โทรศัพท์  @if ($profiles->phonenumber !== NULL)<i class="fas fa-check" style="color: #523EE8;"></i></p>@endif
            </div>
            </div>

            <hr>

            
           
          </div>
        </div>				  	
      

    </div>
</div>


</section>
@endsection
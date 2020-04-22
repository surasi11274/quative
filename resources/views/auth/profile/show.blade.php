@extends('layouts.app')
@section('assets')
        <link rel="stylesheet" href="{{asset('css/style_match.css')}}">
@endsection
@section('content')
<section class="content ">
{{-- user  --}}
<div class="container">		
    <div class="row mt-3">
      <div class="col-12 col-md-4 card pb-3 pb-md-5"  style=" background-color: #000;">
              <div class="profile-img text-center mt-5" style="width:120px;height:120px;margin:auto; ">
                @if ($profiles->profilepic == NULL)
                  <img id="profileImage" class="rounded-circle " style="width:120px;height:120px; object-fit:cover;" src="{{auth()->user()->avatar}}" />
                @else 
                <img id="profileImage" class="rounded-circle " style="width:120px;height:120px; object-fit:cover;" src="/{{$profiles->profilepic}}" />

                @endif
            </div>
              {{-- <h5 class="text-center mt-5 text-white">ปลายฟ้า เป็นตาธรรม</h5> --}}
              <h5 class="titlename text-center text-white mt-5 font-weight-bold">{{$profiles->name}} {{$profiles->surname}}</h5>
              <div class="mt-5 text-center">
                <a href="{{route('profile.edit',$profiles->token)}}">
                    <button class="btn btn-secondary">
                        แก้ไขข้อมูลส่วนตัว
                    </button>
                </a>
              </div>
      </div>
      <div class="col-12 col-md-8">		
          <div class="card-body bg-white">

              <div class="row">
              <div class="col-6 col-md-3">
                <h5 class="font-weight-bold d-none d-md-block" >ข้อมูลเบื้องต้น</h5>
                <h6 class="font-weight-bold d-md-none" >ข้อมูลเบื้องต้น</h6>
                <p class="d-none d-md-block _hilight font-weight-bold">เป็นสมาชิกเมื่อ</p>
                <p class="d-none d-md-block _hilight font-weight-bold">เดือน/วัน/ปี เกิด</p>
                <p class="d-none d-md-block _hilight font-weight-bold">จ้างงาน</p>
                <small class="d-md-none">เป็นสมาชิกเมื่อ</small>
                <small class="d-md-none">เดือน/วัน/ปี เกิด</small>
                <small class="d-md-none">จ้างงาน</small>
            </div>

            <div class="col-6 col-md-3 mt-4">
           

           <p class="d-none d-md-block">  {{date('F d,Y',strtotime($profiles->created_at))}}</p>
           <p class="d-none d-md-block">{{ date('F d,Y',strtotime($profiles->birthdate)) }}</p>
           <p class="d-none d-md-block">{{ $jobs->count() }} ครั้ง</p>
           <small class="d-md-none">  {{date('F d,Y',strtotime($profiles->created_at))}}</small>
           <br>
           <small class="d-md-none">{{ date('F d,Y',strtotime($profiles->birthdate)) }}</small>
           <br>
           <small class="d-md-none">{{ $jobs->count() }} ครั้ง</small>

          

            </div>

            <div class="col-12 col-md-6">
            <h5 class="font-weight-bold">ยืนยันตัวตน</h5>
            <div class="row">
              <div class="col-2">
                <i class="fas fa-envelope-square icon _hilight"></i>
                <i class="fas fa-phone-square-alt icon _hilight"></i> 
            </div>
            <div class="col-8">
                <p >อีเมล</p>
                <p>เบอร์โทรศัพท์</p>
            </div>
            <div class="col-2" style="display:grid;">
              @if (Auth::user()->email !== NULL)<i class="fas fa-check _hilight"></i>@endif
                @if ($profiles->phonenumber !== NULL) <i class="fas fa-check _hilight"></i>@endif
            </div>
            </div>
            </div>
            </div>


            
           
          </div>
          <div class="card mt-3">					
            <div class="card-body">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <h5 class="font-weight-bold ">  ผลงานบรรณจุภันฑ์ (<small>{{$works->count()}}</small>)</h5>
                      <div class="overflow-gallery grid-gallery">
                      <div class="row">
                          @if ($works->count() == 0)
                          
                            <div class="col-12 mt-3" style="height:130px; width:100%;">
                              <div class="row">
                                <div class="mx-auto my-auto">
                                  <p class="text-secondary" style="opacity:0.5">ไม่มีงานที่เคยจ้าง</p>
  
                                </div>
                              </div>
                              
                            </div>

                          @else
                            @foreach ($works as $work)
                            @php
                                // $artwork = json_decode($work->file);
                            $artworks = \App\Jobfiles::where('job_id',$work->id)->get();
    
                              
                            @endphp
                            <div class="col-12 mt-3">
                                @foreach ($artworks as $artwork)
    
                                    @if ($artwork->fileartworkname == NULL)
                                    <img class="rounded shadow-sm mt-3 mb-3 img-port"  style="width:100%; height:460px; object-fit: cover;" src="/{{ $artwork->fileimgname }}" />
    
                                    @endif
    
                                @endforeach
                            </div>
                            
                            @endforeach
                          @endif

                      </div>
                      </div>
      
                  </div>
                </div>
                
            </div>
          </div>
        </div>				  	
      

    </div>
</div>


</section>
@endsection
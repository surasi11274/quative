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
  
        </div>				  	
      

    </div>
    <div class="row mt-3">
      <div class="col-12 col-md-4 " style="padding-right: 0px !important; padding-left: 0px !important;">
          <div class="card" style="padding-bottom: 45px;">
              <div class="card-body">
                  <h5 class=" font-weight-bold mt-3">นักออกแบบที่เคยจ้างงาน</h5>
                      
                    @if ($designersw->count() == 0)
                    <div class="overflow-review" style="height:70px;">
                        <div class="row  mt-5 ">
                            <p class="mx-auto my-auto text-secondary" style="opacity:0.5;">ยังไม่มีการรีวิว</p>
                        </div>
                    </div>
                    @else
                    <div class="overflow-review">
                      
                            
                        @foreach ($designersw as $designers)
                        @php
                         
                         $designer = \App\Designer::find($designers->designer_id); 
                        @endphp
                           <a class="nav-link m-1 mt-3 m-md-1"  id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home-{{ $designer->id }}" onclick="addCart('{{$designer->id}}')" role="tab" aria-controls="v-pills-home" aria-selected="true">

                              <span class="row p-1 ">

                                 <div class="col-12 col-md-3  " style="padding-right:0px !important;padding-left:0px !important;">
                                       <img src="/{{$designer->profilepic}}" class="mx-auto d-block img-fluid rounded-circle border sm-img-circle" alt="...">
                                 </div>
                                 <span class="col-12 col-md-9">
                                    <div class="text-center text-md-left pt-3">
                                    <p class="font-weight-bold">{{$designer->name}}</p>
                                       @if ($designer->rating >= 1 AND $designer->rating < 2)
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    @elseif ($designer->rating >= 2 AND $designer->rating < 3)
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1 "></i>
                                    <i class="fas fa-star stargrey"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    @elseif ($designer->rating >= 3 AND $designer->rating < 4)
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    @elseif ($designer->rating >= 4 AND $designer->rating < 5)
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    @elseif ($designer->rating >= 5)
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    @else
                                    <i class="fas fa-star stargrey"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    <i class="fas fa-star stargrey"></i>
                                    @endif
                                    <small >({{number_format($designer->rating,1)}})</small>
                                    </div>
                                    {{-- <p>{{$designer->surname}}</p> --}}

                                    


                                 {{-- <button href="" class="btn _primary-btn" style="height:50px; width:189px; margin:0px auto;">ดูโปรไฟล์</button> --}}

                                 </span>
                              </span>
                           </a>
                           <hr>
                           
                           @endforeach
                </div>
                @endif

                    
                    <!-- comment -->
{{-- 
                    <div class="row">

                      <!-- comment -->
                      <div class="col-2">
                          <div class="profile-img2 mt-3">
                         <img class="rounded-circle" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                        </div>
                    </div>

                    <div class="col">

                      <h5 class="mt-3">ชาช่า <span><i class="fas fa-star star1" style="float: right;"> 
                          <span style="color: #000;">(4.9)</span></i> </span></h5>
                          <p class="text-black-50">วันที่รีวิว 07/12/2019</p>
                    </div>
                    </div> --}}
                    {{-- <h5 class="mt-3">ทำงานตรงใจเราเลย</h5> --}}
                    {{-- <hr> --}}
                    <!-- comment -->
                    
              </div>
          </div>
</div>

<div class="col-12 col-md-8">		

  <div class="card ">					
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
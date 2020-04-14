@extends('layouts.app')
@section('assets')
        <link rel="stylesheet" href="{{asset('css/style_match.css')}}">
@endsection
@section('content')
<section class="content">

<div class="container">		
    <div class="row mt-3">
      <div class="col-12 col-md-4 card pb-3 pb-md-5"  style=" background-color: #000;">
              <div class="profile-img text-center mt-5" style="width:120px; height:120px; margin:auto;">
                <img id="profileImage" class="rounded-circle" style="width:120px; height:120px; object-fit:cover;" src="/{{$designer->profilepic}}" />
              </div>
              {{-- <h5 class="text-center mt-5 text-white">ปลายฟ้า เป็นตาธรรม</h5> --}}
              <h5 class="titlename text-center text-white mt-5 font-weight-bold">{{$designer->name}} {{$designer->surname}}</h5>
              @if ($designer->rating >= 1 && $designer->rating < 2)
              <p class="mt text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>

              @elseif ($designer->rating >= 2 && $designer->rating < 3) 
              <p class="mt text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>

              @elseif ($designer->rating >= 3 && $designer->rating < 4) 
              <p class="mt text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>

              @elseif ($designer->rating >= 1 && $designer->rating < 5) 
              <p class="mt text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star"></i>

              @elseif ($designer->rating >= 5) 
                <p class="mt text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i>
                    
                    @else
                    <p class="mt text-center"><i class="fas fa-star star" id=""></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>

              @endif
              <span class="text-white">  ({{$designer->rating}})</span></p>

              <div class="mt-5 text-center">
                <a href="{{route('designer.edit',$designer->token)}}">
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
            <p class="d-none d-md-block">เป็นสมาชิกเมื่อ</p>
            <p class="d-none d-md-block">เดือน/วัน/ปี เกิด</p>
            <p class="d-none d-md-block">การจ้างงาน</p>
            <small class="d-md-none">เป็นสมาชิกเมื่อ</small>
            <small class="d-md-none">เดือน/วัน/ปี เกิด</small>
            <small class="d-md-none">การจ้างงาน</small>
            </div>

            <div class="col-6 col-md-3">
                <br>
                <p class="d-none d-md-block">  {{date('F d,Y',strtotime( Auth::user()->created_at))}}</p>
                <p class="d-none d-md-block">{{ date('F d,Y',strtotime($designer->birthdate)) }}</p>
                <p class="d-none d-md-block">{{ $jobs->count() }} ครั้ง</p>
                <small class="d-md-none"> {{date('F d,Y',strtotime( Auth::user()->created_at))}}</small>
                <br>
                <small class="d-md-none">{{ date('F d,Y',strtotime($designer->birthdate)) }}</small>
                <br>
                <small class="d-md-none">{{ $jobs->count() }} ครั้ง</small>
            </div>

            <div class="col-md-3">
            <h5 class="font-weight-bold">ยืนยันตัวตน</h5>
            <div class="row">
                <div class="col-2">
                    <i class="fas fa-envelope-square icon _hilight"></i>
                    <i class="fas fa-id-card icon _hilight "></i>
                    <i class="fas fa-phone-square-alt icon _hilight"></i> 
                </div>
                <div class="col-8">
                    <p >อีเมล</p>
                    <p >ประชาชน</p>
                    <p>เบอร์โทรศัพท์</p>
                </div>
                <div class="col-2" style="display:grid;">
                    @if (Auth::user()->email !== NULL) <i class="fas fa-check _hilight"></i>@endif
                    @if ($designer->personalID !== NULL) <i class="fas fa-check _hilight"></i>@endif
                    @if ($designer->phonenumber !== NULL) <i class="fas fa-check _hilight"></i>@endif
                </div>
            </div>
            {{-- <p><i class="fas fa-envelope-square"></i>  อีเมล   @if (Auth::user()->email !== NULL)<i class="fas fa-check" style="color: #523EE8;"></i></p>@endif
            <p><i class="fas fa-id-card"></i>  ประชาชน   @if ($designer->personalID !== NULL)<i class="fas fa-check" style="color: #523EE8;"></i></p>@endif
            <p><i class="fas fa-phone-square-alt"></i>  เบอร์โทรศัพท์               @if ($designer->phonenumber !== NULL)<i class="fas fa-check" style="color: #523EE8;"></i></p>@endif --}}
            </div>
            </div>

            <hr>

            <h5 class="font-weight-bold d-none d-md-block">ข้อมูลเบื้องต้น</h5>
            <h6 class="font-weight-bold d-md-none">ข้อมูลเบื้องต้น</h6>
            <p>{{$designer->description}}</p>
            
            <hr>
            <h5 class="font-weight-bold" >Tag</h5>
            @foreach($designer->tag as $tagn)
            <h5 class="btn box-tagse border" for="">
          

                    @php
                    $tagname = \App\Tags::find($tagn)->tagName;
                    @endphp
                    {{$tagname}}
                </h5>
                
                @endforeach
            </h5>
          </div>
        </div>				  	
      

    </div>
</div>
<div class="container">
<div class="row mt-3">
      <div class="col-12 col-md-4 " style="padding-right: 0px !important; padding-left: 0px !important;">
          <div class="card" style="padding-bottom: 45px;">
              <div class="card-body">
                  <h5 class=" font-weight-bold mt-3">รีวิวจากผู้ประกอบการ</h5>
                      <div class="row mt-3">
                         <div class="col-12 col-lg-3">
                            <div class="text-center mt-3">
                                <h3 class="font-weight-bold">{{$designer->rating}}</h3>
                                    <small class="_gray">จาก 5.0</small>
                            </div>
                         </div>
                         <div class="col-12 col-md-9">
                             @php
                                $complacency = $reviews->avg('complacency'); 
                                $reasonableprice = $reviews->avg('reasonableprice'); 
                                $skillandexpertise = $reviews->avg('skillandexpertise'); 

                             @endphp
                            <p>ความพึงพอใจ</p>
                          
                           <div class="d-flex">
                            @if (number_format($complacency) == 1)
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
          
                            @elseif (number_format($complacency) == 2) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
            
                            @elseif (number_format($complacency) == 3) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
            
                            @elseif (number_format($complacency) == 4) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star stargrey"></i>
            
                            @elseif (number_format($complacency) == 5) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i>
                                
                            @else
                                <i class="fas fa-star stargrey" id=""></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
            
                            @endif
                            @if (number_format($complacency) == 1)
                            <p class="_gray ml-2 mr-2">(น้อย)</p>
          
                            @elseif (number_format($complacency) == 2) 
                            <p class="_gray ml-2 mr-2">(พอใช้)</p>
            
                            @elseif (number_format($complacency) == 3) 
                            <p class="_gray ml-2 mr-2">(ปานกลาง)</p>
            
                            @elseif (number_format($complacency) == 4) 
                            <p class="_gray ml-2 mr-2">(ดีมาก)</p>
            
                            @elseif (number_format($complacency) == 5) 
                            <p class="_gray ml-2 mr-2">(ดีมากที่สุด)</p>
                                
                            @else
                            <p class="_gray ml-2 mr-2">(ไม่ดี)</p>
            
                            @endif
                           </div>
                           <p>ราคาเหมาะสมกับคุณภาพ</p>

                           <div class="d-flex">
                            @if (number_format($reasonableprice) == 1)
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
          
                            @elseif (number_format($reasonableprice) == 2) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
            
                            @elseif (number_format($reasonableprice) == 3) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
            
                            @elseif (number_format($reasonableprice) == 4) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star stargrey"></i>
            
                            @elseif (number_format($reasonableprice) == 5) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i>
                                
                            @else
                                <i class="fas fa-star stargrey" id=""></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
            
                            @endif
                            @if (number_format($reasonableprice) == 1)
                            <p class="_gray ml-2 mr-2">(น้อย)</p>
          
                            @elseif (number_format($reasonableprice) == 2) 
                            <p class="_gray ml-2 mr-2">(พอใช้)</p>
            
                            @elseif (number_format($reasonableprice) == 3) 
                            <p class="_gray ml-2 mr-2">(ปานกลาง)</p>
            
                            @elseif (number_format($reasonableprice) == 4) 
                            <p class="_gray ml-2 mr-2">(ดีมาก)</p>
            
                            @elseif (number_format($reasonableprice) == 5) 
                            <p class="_gray ml-2 mr-2">(ดีมากที่สุด)</p>
                                
                            @else
                            <p class="_gray ml-2 mr-2">(ไม่ดี)</p>
            
                            @endif
                           </div>
                           <p>ฝีมือและความเชี่ยวชาญ</p>

                           <div class="d-flex">
                            @if (number_format($skillandexpertise) == 1)
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
          
                            @elseif (number_format($skillandexpertise) == 2) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
            
                            @elseif (number_format($skillandexpertise) == 3) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
            
                            @elseif (number_format($skillandexpertise) == 4) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star stargrey"></i>
            
                            @elseif (number_format($skillandexpertise) == 5) 
                                <i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i>
                                
                            @else
                                <i class="fas fa-star stargrey" id=""></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i><i class="fas fa-star stargrey"></i>
            
                            @endif
                            @if (number_format($skillandexpertise) == 1)
                            <p class="_gray ml-2 mr-2">(น้อย)</p>
          
                            @elseif (number_format($skillandexpertise) == 2) 
                            <p class="_gray ml-2 mr-2">(พอใช้)</p>
            
                            @elseif (number_format($skillandexpertise) == 3) 
                            <p class="_gray ml-2 mr-2">(ปานกลาง)</p>
            
                            @elseif (number_format($skillandexpertise) == 4) 
                            <p class="_gray ml-2 mr-2">(ดีมาก)</p>
            
                            @elseif (number_format($skillandexpertise) == 5) 
                            <p class="_gray ml-2 mr-2">(ดีมากที่สุด)</p>
                                
                            @else
                            <p class="_gray ml-2 mr-2">(ไม่ดี)</p>
            
                            @endif
                           </div>
                        
                         </div>
                      
                         
                      
                      
                    </div>
                    <div class="overflow-review">
                    @foreach ($reviews as $review)
                    @php
                        $user = Auth::user()->find($review->user_id);
                        $profile = $user->profile();
                    @endphp
                    <div class="row  mt-2">

                        <div class="col-2">
                            <div class="profile-img2 mt-3" style="height:50px; width:50px;"> 
                                @if ($profile)
                                <img class="rounded-circle" style="height:50px; width:50px; object-fit:cover;" src="/{{$profile->profilepic}}" />



                                @else
                                <img class="rounded-circle" style="height:50px; width:50px; object-fit:cover;" src="{{$user->avatar}}" />

                                @endif
                          </div>
                        </div>
  
                          
                      <div class="col">
                     
                      <h5 class="mt-3">{{$user->name}} <span>
                            
                            <i class="fas fa-star star1" style="float: right;"> 
                               <span style="color: #000;">{{$review->rating}}</span>
                            </i> </span></h5>
                            <p class="text-black-50">{{date('F d,Y',strtotime($review->created_at))}}</p>
                      </div>
                    </div>
                    <h5 class="mt-3">{{$review->reviewdescription}}</h5>
                    <hr>

                    @endforeach
                </div>
                    
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
          <div class="card">					
          <div class="card-body">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <h5 class="font-weight-bold ">  ผลงานบรรณจุภันฑ์ (<small>{{$works->count()}}</small>)</h5>
                    <div class="overflow-gallery grid-gallery">
                    <div class="row">
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
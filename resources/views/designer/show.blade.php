@extends('layouts.app')
@section('assets')
        <link rel="stylesheet" href="{{asset('css/style_match.css')}}">
@endsection
@section('content')
<section class="content">

<div class="container">		
    <div class="row mt-3">
      <div class="col-12 col-md-4 card pb-3 pb-md-5"  style=" background-color: #000;">
              <div class="profile-img text-center mt-5" style="width:120px;height:120px;margin:auto;">
                <img id="profileImage" class="rounded-circle" src="/{{$designer->profilepic}}" />
            </div>
              {{-- <h5 class="text-center mt-5 text-white">ปลายฟ้า เป็นตาธรรม</h5> --}}
              <h5 class="titlename text-center text-white mt-5 font-weight-bold">{{$designer->name}} {{$designer->surname}}</h5>
              @if ($designer->rating == 1)
              <p class="mt text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>

              @elseif ($designer->rating == 2) 
              <p class="mt text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>

              @elseif ($designer->rating == 3) 
              <p class="mt text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>

              @elseif ($designer->rating == 4) 
              <p class="mt text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star"></i>

              @elseif ($designer->rating == 5) 
                <p class="mt text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i>
                    
                    @else
                    <p class="mt text-center"><i class="fas fa-star star" id=""></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>

              @endif
              <span class="text-white">  ({{$designer->rating}})</span></p>

      </div>
      <div class="col-12 col-md-8">		
          <div class="card-body bg-white">

              <div class="row">
              <div class="col-6 col-lg-3">
            <h5 class="font-weight-bold d-none d-md-block" >ข้อมูลเบื้องต้น</h5>
            <h6 class="font-weight-bold d-md-none" >ข้อมูลเบื้องต้น</h6>
            <p class="d-none d-md-block">เป็นสมาชิกเมื่อ</p>
            <p class="d-none d-md-block">ออกแบบงานแล้ว</p>
            <p class="d-none d-md-block">อัตรางานสำเร็จ</p>
            <small class="d-md-none">เป็นสมาชิกเมื่อ</small>
            <small class="d-md-none">ออกแบบงานแล้ว</small>
            <small class="d-md-none">อัตรางานสำเร็จ</small>
            </div>

            <div class="col-6 col-lg-3">
           <br>
            <p class="d-none d-md-block"> {{date('F d,Y',strtotime($designer->create_at))}}</p>
            <p class="d-none d-md-block">{{212 }} ครั้ง</p>
            <p class="d-none d-md-block">{{100%100}}</p>
            <small class="d-md-none"> {{date('F d,Y',strtotime($designer->create_at))}}</small>
            <br>
            <small class="d-md-none">{{212 }} ครั้ง</small>
            <br>
            <small class="d-md-none">{{100%100}}</small>
            </div>

            <div class="col-12 col-lg-3 ">
            <h5 class="font-weight-bold d-none d-md-block">ยืนยันตัวตน</h5>
            <h6 class="font-weight-bold d-md-none">ยืนยันตัวตน</h6>
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
                    <i class="fas fa-check _hilight"></i>
                    <i class="fas fa-check _hilight"></i>
                    <i class="fas fa-check _hilight"></i>
                </div>
            </div>
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
                         <div class="col-12 col-lg-9">
                            <p>ความพึงพอใจ</p>
                           <div class="d-flex">
                            <i class="fas fa-star star1"></i>
                            <i class="fas fa-star star1"></i> 
                            <i class="fas fa-star star1"></i> 
                            <i class="fas fa-star star1"></i> 
                            <i class="fas fa-star star1"></i>  
                            <p class="_gray ml-2 mr-2">(ดีมาก)</p>
                           </div>
                           <p>ราคาเหมาะสมกับคุณภาพ</p>
                           <div class="d-flex">
                            <i class="fas fa-star star1"></i>
                            <i class="fas fa-star star1"></i> 
                            <i class="fas fa-star star1"></i> 
                            <i class="fas fa-star star1"></i> 
                            <i class="fas fa-star star1"></i>  
                            <p class="_gray ml-2 mr-2">(ดีมาก)</p>
                           </div>
                           <p>ฝีมือและความเชี่ยวชาญ</p>
                           <div class="d-flex">
                            <i class="fas fa-star star1"></i>
                            <i class="fas fa-star star1"></i> 
                            <i class="fas fa-star star1"></i> 
                            <i class="fas fa-star star1"></i> 
                            <i class="fas fa-star star1"></i>  
                            <p class="_gray ml-2 mr-2">(ดีมาก)</p>
                           </div>
                        
                         </div>
                      
                         
                      
                     

                    
                   
                </div>
                <hr>
                <div class="row mt-3">
                    @foreach ($reviews as $review)
                    <div class="col-3">
                        <div class="profile-img2 mt-3">
                       <img class="rounded-circle" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                      </div>
                  </div>
                    <div class="col-9">
                    @php
                        $username = Auth::user()->find($review->user_id)->name;
                    @endphp
                    
                      <h5 class="mt-3">{{$username}} 
                        <span>
                          <i class="fas fa-star star1" style="float: right;"> 
                             <span style="color: #000;">({{$review->rating}})</span>
                          </i> 
                        </span>
                    </h5>
                          <small class="text-black-50">วันที่รีวิว {{date('F d,Y',strtotime($review->create_at))}}</small>
                          <hr class="w-100">
                          <p class="mt-3">{{$review->reviewdescription}}</p>
                    </div>
                    <hr class="w-100">
                
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
                    <h5 class="font-weight-bold ">  ผลงานบรรณจุภันฑ์ (<small>8</small>)</h5>
                    <div class="overflow-gallery grid-gallery">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <img class="rounded"  style=" object-fit: cover;"src="/photo/@product-8.png" />
                        </div>
                        <div class="col-12 mt-3">
                            <img class="rounded" style=" object-fit: cover;"src="/photo/@product-7.png" />
                        </div>
    
                        <div class="col-12 mt-3">
                            <img class="rounded"  style=" object-fit: cover;"src="/photo/@product-3.png" />
                        </div>
                        <div class="col-12 mt-3">
                            <img class="rounded" style=" object-fit: cover;"src="/photo/@product-4.png" />
                        </div>
                        <div class="col-12 mt-3">
                            <img class="rounded"  style=" object-fit: cover;"src="/photo/@product-6.png" />
                        </div>
                        <div class="col-12 mt-3">
                            <img class="rounded" style=" object-fit: cover;"src="/photo/@product-5.png" />
                        </div>
    
                        <div class="col-12 mt-3">
                            <img class="rounded"  style=" object-fit: cover;"src="/photo/@product-1.png" />
                        </div>
                        <div class="col-12 mt-3">
                            <img class="rounded" style=" object-fit: cover;"src="/photo/@product-2.png" />
                        </div>
    
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
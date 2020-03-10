@extends('layouts.app')
@section('assets')
        <link rel="stylesheet" href="{{asset('css/style_match.css')}}">
@endsection
@section('content')
<section class="content mt_ex">

<div class="container">		
    <div class="row mt-3">
      <div class="col-12 col-md-4 card pb-md-5"  style=" background-color: #000;">
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
              <div class="col-md-3">
            <h5 class="font-weight-bold" >ข้อมูลเบื้องต้น</h5>
            <p>เป็นสมาชิกเมื่อ </p>
            <p>ออกแบบงานเมื่อ</p>
            <p>อัตรางานสำเร็จ</p>
            </div>

            <div class="col-md-3">
           <br>
            <p> {{date('F d,Y',strtotime($designer->create_at))}}</p>
            <p>{{212 }} ครั้ง</p>
            <p>{{100%100}}</p>
            </div>

            <div class="col-md-3">
            <h5 class="font-weight-bold">ยืนยันตัวตน</h5>
            <p><i class="fas fa-envelope-square"></i>  อีเมล   <i class="fas fa-check" style="color: #523EE8;"></i></p> 
            <p><i class="fas fa-id-card"></i>  ประชาชน   <i class="fas fa-check" style="color: #523EE8;"></i></p>
            <p><i class="fas fa-phone-square-alt"></i>  เบอร์โทรศัพท์   <i class="fas fa-check" style="color: #523EE8;"></i></p>
            </div>
            </div>

            <hr>

            <h5 class="font-weight-bold">ข้อมูลเบื้องต้น</h5>
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
      <div class="col-md-4 " style="    padding-right: 0px !important;
      padding-left: 0px !important;">
          <div class="card" style="padding-bottom: 45px;">
              <div class="card-body">
                  <h5 class=" font-weight-bold mt-3">รีวิวจากผู้ประกอบการ</h5>
                      <div class="row mt-3">
                         <div class="col-md-3">
                            <div class="text-center mt-3">
                                <h3 class="font-weight-bold">{{$designer->rating}}</h3>
                                    <small class="_gray">จาก 5.0</small>
                            </div>
                         </div>
                         <div class="col-md-9">
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
                      
                         
                      
                      <div class="col-2">
                          <div class="profile-img2 mt-3">
                         <img class="rounded-circle" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                        </div>
                    </div>

                    @foreach ($reviews as $review)
                        
                    <div class="col">
                    @php
                        $username = Auth::user()->find($review->user_id)->name;
                    @endphp
                      <h5 class="mt-3">{{$username}} <span>
                          
                          <i class="fas fa-star star1" style="float: right;"> 
                             <span style="color: #000;">{{$review->rating}}</span>
                          </i> </span></h5>
                          <p class="text-black-50">{{date('F d,Y',strtotime($review->create_at))}}</p>
                    </div>
                    </div>
                    <h5 class="mt-3">{{$review->reviewdescription}}</h5>
                    @endforeach

                    <hr>
                    
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

<div class="col-8">
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

</section>
@endsection
@extends('layouts.app')
@section('assets')
<link rel="stylesheet" href="{{asset('css/base.css')}}">
@endsection
@section('content')
<div class="container mt-5 d-none d-md-block">

   <div class="text-center pt-5 p-5">
       <div id="wizard-progress">
           <ol class="step-indicator">
               <li class="complete">
                   <div class="step">1</div>
                   <div class="caption hidden-xs hidden-sm">ระบุความต้องการ</div>
               </li>
               <li class="complete">
                   <div class="step">2</div>
                   <div class="caption hidden-xs hidden-sm">เลือกรูปตัวอย่างงาน</div>
               </li>
               <li class="complete">
                   <div class="step">3</div>
                   <div class="caption hidden-xs hidden-sm">เลือกนักออกแบบที่ตรงใจ</div>
               </li>
               <li class="active">
                   <div class="step">4</div>
                   <div class="caption hidden-xs hidden-sm">เลือกขอบเขตงาน</div>
               </li>
           </ol>
       </div>

   </div>
</div>
<div class="container ">
         <div style="width: 100%;">
         <form class="form-match" action="/search/create/store2" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}

            <div class=" bg-white p-3 p-md-5">
               <h1 class=" text-center   pt-md-5 d-none d-md-block">ผลการ <span class="_hilight font-weight-bold">Matching</span></h1>

               <h4 class="font-weight-bold  pt-md-5 d-none d-md-block">เลือกนักออกแบบที่ตรงใจกับคุณ</h4>
               <h6 class="font-weight-bold p-3 pt-2 mb-md-5 d-md-none">เลือกนักออกแบบที่ตรงใจกับคุณ</h6>
               <div class="row  mb-md-5">

                  <input  type="hidden" class="detaill-select " name="designer_id" plachholder="sadas" id="output">

                  <div class="col-12 col-md-12 col-lg-4">
                     <div class="nav  nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @foreach ($designers as $count => $designer)
                           <a class="nav-link shadow-sm m-1 mt-3 m-md-1"  id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home-{{ $designer->id }}" onclick="addCart('{{$designer->id}}')" role="tab" aria-controls="v-pills-home" aria-selected="true">

                              <span class="row ">

                                 <div class="col-12 col-md-3  " style="padding-right:0px !important;padding-left:0px !important;">
                                       <img src="/{{$designer->profilepic}}" class="mx-auto d-block img-fluid rounded-circle border sm-img-circle" alt="...">
                                 </div>
                                 <span class="col-12 col-md-9">
                                    <div class="text-center text-md-left">
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
                           
                           @endforeach




                     </div>

                  </div>
                  <div class="col-12 col-md-12 col-lg-8 card p-3 shadow-sm border mt-5">
                     <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($designers as $count => $designer)

                           <div @if($count == 0) class="tab-pane fade show active"  @else class="tab-pane" @endif  id="v-pills-home-{{$designer->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              <div class="overflow-gallery grid-gallery">
                              <div class="row mt-md-3">
                                 <div class="col-auto col-md-3 col-lg-3 mx-auto ">
                                    <img src="/{{$designer->profilepic}}" class="img-fluid rounded-circle border sm-img-select" alt="...">
                                    <h2 class="font-weight-bold d-md-none text-center mt-3">{{$designer->name}}</h2>
                                    <div class="mb-md-3 d-md-none">

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
                                   
                                 </div>
                                    <div class="col-12 col-md-9 mx-auto">
                                 <h2 class="font-weight-bold d-none d-md-block text-center text-md-left">{{$designer->name}}</h2>
                                 
                                    {{-- <p class="_gray md-3">นักออกแบบ<p> --}}
                                       <div class="mb-md-3 d-none d-md-block text-center text-md-left">

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
                          
                                          <div class="form-tags ">
                                             <ul class=" d-flex justify-content-center justify-content-md-start">
                                          <i class="fas fa-tag icons p-1 m-1 d-none d-md-block"></i>
                                          @foreach($designerstag as $tagn)
   
                                          @php
                                          $tagname = \App\Tags::find($tagn)->tagName;
   
                                          @endphp
                                                <li class="m-1 ">
                                                   <div class="box-tags p-1 ">
                                                      <small>
                                                         {{$tagname}}
                                                      </small>
                                                   </div>
                                                </li>
                                          @endforeach
                                                
                                             </ul>
                                          </div>
                                          @php
                                                          $jobdesigners = \App\Jobs::where('canshow' ,1 )->where('designer_id', $designer->id)->get();
                                                         //  $works = Jobs::where('designer_id', Auth::user()->designer()->id)->where('canshow',1)->get();

                                          @endphp
   
                                      
                                    </div>
                                   
                                    <div class="col-12">
                                       <p class="mb-md-3">{{$designer->description}}</p>
                                       <h2 class="selectfillter ">  ผลงานบรรณจุภันฑ์ (<small>{{ $jobdesigners->count()}}</small>)</h2>
                                    </div>

                                 @foreach ($jobdesigners as $jobdesigner)
                                 @php
                                    $artworks = \App\Jobfiles::where('job_id',$jobdesigner->id)->get();

                                 @endphp
                                 <div class="col-6 col-md-4 col-lg-4 mt-3">
                                    @foreach ($artworks as $artwork)

                                       @if ($artwork->fileartworkname == NULL)
                                       {{-- <img class="rounded shadow-sm mt-3 mb-3 img-port"  style="width:100%; height:460px; object-fit: cover;" src="/{{ $artwork->fileimgname }}" /> --}}
                                       <img class="rounded sm-img-box" src="/{{ $artwork->fileimgname }}" />

                                       @endif
         
                                    @endforeach

                                 </div>
                                 {{-- <div class="col-5 mt-3">
                                    <img class="rounded"  style=" object-fit: cover;"src="{{ $ref->img}}" />
                              </div>
                              <div class="col-5 mt-3">
                                 <img class="rounded"  style=" object-fit: cover;"src="{{ $ref->img}}" />
                           </div>
                           <div class="col-7 mt-3">
                              <img class="rounded"  style=" object-fit: cover;"src="{{ $ref->img}}" />
                        </div> --}}
                                 @endforeach
                                 {{-- <div class="col-5 mt-3">
                                       <img class="rounded" style=" object-fit: cover;"src="photo/@product-7.png" />
                                 </div>

                                 <div class="col-5 mt-3">
                                       <img class="rounded"  style=" object-fit: cover;"src="photo/@product-3.png" />
                                 </div>
                                 <div class="col-7 mt-3">
                                       <img class="rounded" style=" object-fit: cover;"src="photo/@product-4.png" />
                                 </div>
                                 <div class="col-7 mt-3">
                                       <img class="rounded"  style=" object-fit: cover;"src="photo/@product-6.png" />
                                 </div>
                                 <div class="col-5 mt-3">
                                       <img class="rounded" style=" object-fit: cover;"src="photo/@product-5.png" />
                                 </div>

                                 <div class="col-5 mt-3">
                                       <img class="rounded"  style=" object-fit: cover;"src="photo/@product-1.png" />
                                 </div>
                                 <div class="col-7 mt-3">
                                       <img class="rounded" style=" object-fit: cover;"src="photo/@product-2.png" />
                                 </div> --}}

                              </div>
                              </div>

                           </div>
                           @endforeach

                     </div>
                  </div>
               </div>
               <input type="text" hidden id="designerId" name="output">
            <input type="text" hidden id="job_id" name="job_id" value="{{$jobs->id}}">


            {{-- <a href="{{URL::to('/search/show/delete/'.$jobs->id) }}"> --}}
               <div class="row mb-5 pt-md-5">
                  <div class="col d-none d-md-block"></div>
                  <div class="col">
                      <a href="/searchref" class="btn _secondary-btn  btn-block rounded btn-lg d-none d-md-block">ย้อนกลับ</a>
                      <a href="/searchref" class="btn _secondary-btn  btn-block rounded btn-lg d-md-none ">ย้อนกลับ</a>
                  </div>
                  <div class="col">
                      <button type="submit" class="btn _primary-black  btn-block rounded btn-lg d-none d-md-block">ถัดไป</button>
                      <button type="submit" class="btn _primary-black  btn-block rounded btn-lg d-md-none ">ถัดไป</button>
                  </div>
              </div>


         </div>

         </form>

      </div>
      </div> <!-- ****container -->
      @endsection
<script>
    $('.carousel').carousel({
        interval: false,
        touch:true

    });
</script>
<script>
    function addCart(v){
        document.getElementById('output').value = v
        document.getElementById('designerId').value = v
        console.log(v);
        return false;
    }
</script>

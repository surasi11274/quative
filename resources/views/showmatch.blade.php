@extends('layouts.app')
<body style="font-family: prompt;">
    
</body>
@section('content')
<div class="container mt_ex ">
         <div class=" mt-5 rounded-ex" style="width: 100%;padding-top: 30px;">
         <form class="form-match" action="/search/create/store2" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}

            <div class="containerbg-white mt-5 p-5">
               <h1 class=" text-center selectfillter  pt-5">ผลการ <span class="_hilight">Matching</span></h1>
      
               <h2 class="selectfillter  pt-5">เลือกนักออกแบบที่ตรงใจกับคุณ</h2>
               <div class="row">

                  <input  type="hidden" class="detaill-select " name="designer_id" plachholder="sadas" id="output">

                  <div class="col-12 col-md-4">
                     <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @foreach ($designers as $count => $designer)
                           <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home-{{ $designer->id }}" onclick="addCart('{{$designer->id}}')" role="tab" aria-controls="v-pills-home" aria-selected="true">
                              <span class="row">
                                 <span class="col-3">
                                       <img src="/{{$designer->profilepic}}" class="rounded-circle" alt="...">
                                 </span>
                                 <span class="col-9">
                                    <p style="color: #000;">{{$designer->name}}</p>
                              <span class="d-flex">
                                 <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                 <small>(4.6)</small>
      
                              </span>
                                 </span>
                              </span>
                           </a>
                           @endforeach

                     
                          
                     </div>
                  </div>
                  <div class="col-12 col-md-8">
                     <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($designers as $count => $designer)

                           <div @if($count == 0) class="tab-pane fade show active"  @else class="tab-pane" @endif  id="v-pills-home-{{$designer->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              <h2 class="selectfillter ">  ผลงานบรรณจุภันฑ์ (<small>{{ $designer->id}}</small>)</h2>
                              <div class="overflow-gallery grid-gallery">
                              <div class="row">
                                 @foreach ($refs as $ref)
                                 <div class="col-7 mt-3">
                                       <img class="rounded"  style=" object-fit: cover;"src="{{ $ref->img}}" />
                                 </div>
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
               <input type="text" id="designerId" name="output">
            <input type="text" id="job_id" name="job_id" value="{{$jobs->id}}">
              
   
            {{-- <a href="{{URL::to('/search/show/delete/'.$jobs->id) }}"> --}}
               
               <input type="button" name="previous" class=" previous _secondary-btn  btn-block btn-lg" value="Previous"/>
            {{-- </a> --}}
                            <input type="submit" name="next" class=" next  _primary-black  btn-block btn-lg  rounded" value="Next"  />
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
@extends('layouts.app')
@section('content')
<div class="container mt-5">
        
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
         <div class=" mt-5" style="width: 100%;padding-top: 30px;">
         <form class="form-match" action="/search/create/store2" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}

            <div class="containerbg-white  p-5">
               <h1 class=" text-center selectfillter  pt-5">ผลการ <span class="_hilight">Matching</span></h1>
      
               <h2 class="selectfillter  pt-5">เลือกนักออกแบบที่ตรงใจกับคุณ</h2>
               <div class="row">

                  <input  type="hidden" class="detaill-select " name="designer_id" plachholder="sadas" id="output">

                  <div class="col-12 col-md-4 ">
                     <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @foreach ($designers as $count => $designer)
                           <a class="nav-link shadow-sm m-1"  id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home-{{ $designer->id }}" onclick="addCart('{{$designer->id}}')" role="tab" aria-controls="v-pills-home" aria-selected="true">
                              
                              <span class="row">
                                 <span class="col-3">
                                       <img src="/{{$designer->profilepic}}" class="rounded-circle" alt="..." style="width: 50px;height:50px;">
                                 </span>
                                 <span class="col-9">
                                    <p>{{$designer->name}}</p>
                                    {{-- <p>{{$designer->surname}}</p> --}}
                                 <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                    <i class="fas fa-star star1"></i>
                                 <small>(4.6)</small>
                                 {{-- <button href="" class="btn _primary-btn" style="height:50px; width:189px; margin:0px auto;">ดูโปรไฟล์</button> --}}
                           
                                 </span>
                              </span>
                           </a>
            
                           @endforeach

                     
                          
                          
                     </div>
                     
                  </div>
                  <div class="col-12 col-md-8 shadow-sm">
                     <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($designers as $count => $designer)

                           <div @if($count == 0) class="tab-pane fade show active"  @else class="tab-pane" @endif  id="v-pills-home-{{$designer->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              <div class="overflow-gallery grid-gallery">
                              <div class="row">
                                 <div class="col-auto">
                                    <img src="/{{$designer->profilepic}}" class="rounded-circle" alt="..." style="width: 50px;height:50px;">
                                 </div>
                                    <div class="col-9">
                                 <h1>{{$designer->name}}</h1>
                                    <h5 style="color: #C4C4C4;">นักออกแบบ</h5>   
                                    </div>             
                                    <div class="col-12">
                                       <div class="form-tags ">
                                          <ul class=" d-flex">
                                       <i class="fas fa-tag icons p-1"></i>
                                       
                                             <li>
                                                <div class="box-tags p-1">
                                                   <small>
                                                      มินิมอล
                                                   </small>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="box-tags p-1">
                                                   <small>
                                                      ทันสมัย
                                                   </small>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="box-tags p-1">
                                                   <small>
                                                      แปลกใหม่
                                                   </small>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                   
                                       
                                    </div>            
                                    <div class="col-12">
                                       <p>{{$designer->description}}</p>
                                       <h2 class="selectfillter ">  ผลงานบรรณจุภันฑ์ (<small>{{ $designer->id}}</small>)</h2>   
                                    </div>        
                                    
                                 @foreach ($refs as $ref)
                                 <div class="col-12 mt-3">
                                    
                                       <img class="rounded"  style=" object-fit: cover;"src="{{ $ref->img}}" />
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
               <div class="mt_ex"></div>
               <div class="row">
                  <div class="col-6">

                  </div>
                  <div class="col-6">
                   <div class="row m-3">
                       <div class="col-6">
                           <input type="button" name="previous" class=" previous _secondary-btn  btn-block rounded" value="ย้อนกลับ"/>
                       </div>
                       <div class="col-6">
                           <input type="submit" name="next" class=" next  _primary-black  btn-block rounded " value="ถัดไป"/>

                       </div>
                   </div>
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
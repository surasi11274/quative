@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="css/style_match.css">
   <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">

   
@endsection
<body style="font-family: prompt;">
    
</body>

@section('content')
<section class="content ">
    <div class="container">
        <div class="text-center mt_ex p-5">
            <div class="row">
                <div class="col">
                    <div class="_circle-progress"> <p>1</p></div>
                    <h5 class="_hilight">ระบุความต้องการ</h5>
                </div>
                <div class="col">
                    <div class="_circle-progress"> <p>1</p></div>
                    <h5>เลือกรูปตัวอย่างงาน</h5>
                </div>
                <div class="col">
                    <div class="_circle-progress"> <p>1</p></div>
                    <h5>เลือกนักออกแบบที่ตรงใจ</h5>
                </div>
                <div class="col">
                    <div class="_circle-progress"> <p>1</p></div>
                    <h5>เลือกขอบเขตงาน</h5>
                </div>
            </div>
            <div class="progress">
                
                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            
        </div>
    </div>
    

            <form class="multi-step-form  rounded-ex" action="/search/create/store1" method="post" enctype="multipart/form-data">
               
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {{--<div class="rec" >--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-3" style="margin-left: 50px; margin-top: 20px;">--}}
                                {{--<image id="profileImage" class="rounded-circle" src="https://picsum.photos/140" />--}}
                            {{--</div>--}}
                            {{--<div class="col-3 align-items-center" style="margin-top: 40px;">--}}
                                {{--<div class="fill">--}}
                                    {{--<h1 class="titlename">{{$users->name}}</h1>--}}
                                    {{--<p>Entrepreneur</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="container">
                        field-one
                        <fieldset class="p-5" style="border: 1px #F00 solid;">                
                            <h2 class="selectfillter"  style="font-weight: 800;">เลือกประเภทของผลิตภัณฑ์ของคุณที่พัฒนาบรรณจุภันฑ์</h2>
                        <div class="row">
                                   <input style="border-width: 2px;" type="hidden" class="detaill-select " name="categories" plachholder="sadas" id="output">
                                   <input  type="hidden"  name="categories_id" plachholder="sadas" id="output2">
                            @foreach ($cats as $cat)
                               
                            <div class="col">
                               <div class="body-below text-center">
                                   <button type="button" class="btn" onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')">
                                       <img src="{{ $cat->catsPic}}"  class="rounded" alt="">
                                   </button>
                                   
                                   <p>{{ $cat->name}}</p>
                               </div>
                            </div>
                            @endforeach

                
                        </div>
                        {{--old version--}}
                       <section class="old select">
                           {{-- <div class="row">--}}
                               {{--<div class="col-9">--}}
                                   {{--<div class="form-group">--}}
                                       {{--<input style="border-width: 2px;" type="text" class="detaill-select " name="categories" plachholder="sadas" id="output">--}}
                                       {{--<input style="display: none;" type="text"  name="categories_id" plachholder="sadas" id="output2">--}}
                                   {{--</div>--}}
                               {{--</div>--}}
                               {{--<div class="col-3 text-right">--}}
                                   {{--<button type="button" class="btn _primary-btn btn-block " data-toggle="modal" data-target=".bd-example-modal-lg">เลือก</button>--}}
                               {{--</div>--}}
                           {{--</div>--}}
                           {{--<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">--}}
                               {{--<div class="modal-dialog modal-xl" role="document" style="    max-width: 1140px;">--}}
                                   {{--<div class="modal-content p-5 mb-5 form-match rounded-ex">--}}

                                       {{--<form>--}}
                                           {{--<div class="tab-content" id="myTabContent">--}}
                                               {{--<button type="button" class="close" style="    font-size: 3.5rem;" data-dismiss="modal" aria-label="Close">--}}
                                                   {{--<span aria-hidden="true">&times;</span>--}}
                                               {{--</button>--}}
                                               {{--<div class="form-group">--}}
                                                   {{--<h1 ><span class="_hilight">เลือกประเภเทการออกแบบ</span></h1>--}}

                                                   {{--<div class="row">--}}
                                                       {{--<div class="col-6 rounded-ex p-5" style="border: #C4C4C4 solid 1px; background: #F9F9F9;">--}}
                                                           {{--<div class="list-group" id="list-tab" role="tablist">--}}
                                                               {{--<h4>แนวทางการออกแบบ</h4>--}}
                                                               {{--<div class="mt-3 ">--}}
                                                                   {{--<div>--}}
                                                                       {{--<ul class="nav nav-tabs card-header-tabs d-block" id="myTab" role="tablist">--}}
                                                                           {{--<li class="nav-item">--}}
                                                                               {{--<a class="btn _primary-drop m-1" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">บรรจุภัณฑ์ประเภท กล่อง</a>--}}
                                                                           {{--</li>--}}
                                                                           {{--<li class="nav-item">--}}
                                                                               {{--<a class="btn _primary-drop m-1" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">บรรจุภัณฑ์ประเภท แก้ว</a>--}}
                                                                           {{--</li>--}}
                                                                           {{--<li class="nav-item">--}}
                                                                               {{--<a class="btn _primary-drop m-1" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">บรรจุภัณฑ์ประเภท ขวด</a>--}}
                                                                           {{--</li>--}}
                                                                           {{--<li class="nav-item">--}}
                                                                               {{--<a class="btn _primary-drop m-1" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false">บรรจุภัณฑ์ประเภท ถุง</a>--}}
                                                                           {{--</li>--}}
                                                                           {{--<li class="nav-item">--}}
                                                                               {{--<a class="btn _primary-drop m-1" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="false">บรรจุภัณฑ์ประเภท กระป๋อง</a>--}}
                                                                           {{--</li>--}}
                                                                       {{--</ul>--}}
                                                                   {{--</div>--}}
                                                               {{--</div>--}}
                                                           {{--</div>--}}

                                                       {{--</div>--}}
                                                       {{--<div class="col-6">--}}
                                                           {{--<div class="tab-content" id="nav-tabContent">--}}
                                                               {{--<div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">--}}
                                                                   {{--<h5>เลือกรายละเอียด</h5>--}}
                                                                   {{--<div class="row">--}}

                                                                       {{--@foreach ($cats as $cat)--}}
                                                                           {{--@if ($cat->kindID == 1)--}}

                                                                               {{--<div class="col-6 p-3">--}}
                                                                                   {{--<button class="card" style="border: 2px solid #904AE8;"  type="button" value="{{$cat->id}}" name="cat" onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')"  data-dismiss="modal">--}}
                                                                                       {{--<img class="card-img-top" style=" object-fit: cover; width: 200; height:200px;" src="{{$cat->catsPic}}">--}}
                                                                                       {{--<div class="card-body">--}}
                                                                                           {{--<h4 class="card-title"> {{$cat->name}}</h4>--}}
                                                                                       {{--<!-- <small class="card-text">{{$cat->size}}</small> -->--}}


                                                                                       {{--</div>--}}
                                                                                   {{--</button>--}}
                                                                               {{--</div>--}}
                                                                           {{--@endif--}}
                                                                       {{--@endforeach--}}


                                                                   {{--</div>--}}
                                                               {{--</div>--}}
                                                               {{--<div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">--}}
                                                                   {{--<h5>เลือกรายละเอียด</h5>--}}
                                                                   {{--<div class="row">--}}
                                                                       {{--@foreach ($cats as $cat)--}}
                                                                           {{--@if ($cat->kindID == 2)--}}
                                                                               {{--<div class="col-6 p-3">--}}
                                                                                   {{--<button class="card" type="button" value="{{$cat->id}}" name="cat" onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')"  data-dismiss="modal">--}}
                                                                                       {{--<img class="card-img-top" style=" object-fit: cover; width: 200; height:200px;" src="{{$cat->catsPic}}">--}}
                                                                                       {{--<div class="card-body">--}}
                                                                                           {{--<h4 class="card-title"> {{$cat->name}}</h4>--}}
                                                                                       {{--<!-- <small class="card-text">{{$cat->size}}</small> -->--}}


                                                                                       {{--</div>--}}
                                                                                   {{--</button>--}}
                                                                               {{--</div>--}}
                                                                           {{--@endif--}}
                                                                       {{--@endforeach--}}
                                                                   {{--</div>--}}
                                                               {{--</div>--}}
                                                               {{--<div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">--}}
                                                                   {{--<h5>เลือกรายละเอียด</h5>--}}
                                                                   {{--<div class="row">--}}

                                                                       {{--@foreach ($cats as $cat)--}}
                                                                           {{--@if ($cat->kindID == 3)--}}

                                                                               {{--<div class="col-6 p-3">--}}
                                                                                   {{--<button class="card" type="button" value="{{$cat->id}}" name="cat" onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')"  data-dismiss="modal">--}}
                                                                                       {{--<img class="card-img-top" style=" object-fit: cover; width: 200; height:200px;" src="{{$cat->catsPic}}">--}}
                                                                                       {{--<div class="card-body">--}}
                                                                                           {{--<h4 class="card-title"> {{$cat->name}}</h4>--}}
                                                                                       {{--<!-- <small class="card-text">{{$cat->size}}</small> -->--}}


                                                                                       {{--</div>--}}
                                                                                   {{--</button>--}}
                                                                               {{--</div>--}}
                                                                           {{--@endif--}}
                                                                       {{--@endforeach--}}


                                                                   {{--</div>--}}
                                                               {{--</div>--}}
                                                               {{--<div class="tab-pane fade p-3" id="four" role="tabpanel" aria-labelledby="four-tab">--}}
                                                                   {{--<h5>เลือกรายละเอียด</h5>--}}
                                                                   {{--<div class="row">--}}
                                                                       {{--@foreach ($cats as $cat)--}}
                                                                           {{--@if ($cat->kindID == 4)--}}

                                                                               {{--<div class="col-6 p-3">--}}
                                                                                   {{--<button class="card" type="button" value="{{$cat->id}}" name="cat" onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')"  data-dismiss="modal">--}}
                                                                                       {{--<img class="card-img-top " style=" object-fit: cover; width: 200; height:200px;" src="{{$cat->catsPic}}">--}}
                                                                                       {{--<div class="card-body">--}}
                                                                                           {{--<h4 class="card-title"> {{$cat->name}}</h4>--}}
                                                                                       {{--<!-- <small class="card-text">{{$cat->size}}</small> -->--}}


                                                                                       {{--</div>--}}
                                                                                   {{--</button>--}}
                                                                               {{--</div>--}}
                                                                           {{--@endif--}}
                                                                       {{--@endforeach--}}


                                                                   {{--</div>--}}
                                                               {{--</div>--}}
                                                               {{--<div class="tab-pane fade p-3" id="five" role="tabpanel" aria-labelledby="five-tab">--}}
                                                                   {{--<h5>เลือกรายละเอียด</h5>--}}
                                                                   {{--<div class="row">--}}

                                                                       {{--@foreach ($cats as $cat)--}}
                                                                           {{--@if ($cat->kindID == 5)--}}

                                                                               {{--<div class="col-6 p-3">--}}
                                                                                   {{--<button class="card" type="button" value="{{$cat->id}}" name="cat" onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')"  data-dismiss="modal">--}}
                                                                                       {{--<img class="card-img-top" style=" object-fit: cover; width: 200; height:200px;" src="{{$cat->catsPic}}">--}}
                                                                                       {{--<div class="card-body">--}}
                                                                                           {{--<h4 class="card-title"> {{$cat->name}}</h4>--}}
                                                                                       {{--<!-- <small class="card-text">{{$cat->size}}</small> -->--}}


                                                                                       {{--</div>--}}
                                                                                   {{--</button>--}}
                                                                               {{--</div>--}}
                                                                           {{--@endif--}}
                                                                       {{--@endforeach--}}


                                                                   {{--</div>--}}
                                                               {{--</div>--}}
                                                           {{--</div>--}}

                                                       {{--</div>--}}
                                                   {{--</div>--}}
                                               {{--</div>--}}
                                           {{--</div>--}}
                                       {{--</form>--}}
                                   {{--</div>--}}
                               {{--</div>--}}
                           {{-- </div> --}}
                       </section>
                        <h2 class="selectfillter pt-5"  style="font-weight: 800;">แนบรูปภาพผลิตภัณฑ์เดิมของคุณ</h2>
                        <div class="row">
                            <div class="col">
                                <div class="input-picture">
                                    <input type="file" id="file-input"  name="productPic"  multiple />
                                    <div id="thumb-output"></div>
                                    <i class="fas fa-plus p-icons"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h2 class="selectfillter pt-5"  style="font-weight: 800;">URL<small>(ที่เกี่ยวข้องกับผลิตภัณฑ์)</small></h2>
                            <input type="text" class="form-control" name="url" placeholder="เช่น เว็บไซต์, เฟสบุ๊ค เพื่อให้นักออกแบบทำงานได้ง่ายขึ้น ">
                        </div>
                        <div class="form-group">
                            <h2 class="selectfillter  pt-5">สไตล์งานที่ต้องการ</h2>



                            <div class="container text-center">
                                <div class="row justify-content-center">

                                    @foreach ($tags as $tag)
                                        <div class="form-check">
                                            <ul class="ks-cboxtags">
                                                <li>
                                                    <input type="checkbox"  value="{{$tag->id}}" name="tags[]">
                                                    <label for="checkboxOne">{{$tag->tagName}}</label>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <h2 class="selectfillter  pt-5">ระบุรายละเอียดสำคัญ ( ปัญหา + ผลกระทบ + เป้าหมายทางธุรกิจ )</h2>
                        <textarea class="form-control" name="requirement" placeholder="ระบุรายละเอียดสำคัญ เช่น สินค้าไม่น่าดึงดูด, สินค้าทำยอดไม่ไ่ด้" aria-label="With textarea"></textarea>
                        <div class="d-flex mt-5">
                            {{-- <button href="javascript:void(0)" class="btn _secondary-btn btn-lg btn-block m-1 ">ยกเลิก</button>
                            <input type="button" name="next" class="btn _primary-black btn-lg btn-block m-1" value="Next"/> --}}
                        </div>
                        <input type="button" name="next" class=" next  _primary-black  btn-block btn-lg  rounded" value="Next"  />
                        </fieldset>
                        field-two
                        <fieldset class="p-5" style="border: 1px #F00 solid;">
                            <div class="container bg-white mt-5 p-5">
                                <h2 class="selectfillter  pt-5">รูปภาพงานใกล้เคียงกับงานที่ต้องการ *ถ้ามี</h2>
                            <div class="col">
                                <div class="input-picture">
                    
                                    <input type="file" id="file-input2" name="refpicbyUser" multiple />
                                    {{-- <input type="button" onclick="removeAllImage()" value="Remove All Image" clas="remove">  --}}
                                                                        <div id="thumb-output2"></div>
                                    <i class="fas fa-plus p-icons"></i>
                                </div>
                            </div>
                            <h2 class="selectfillter  pt-5">เลือกผลิตภัณฑ์ที่มีความใกล้เคียงกับแบบที่คุณต้องการ</h2>
                            <div class="col-12 col-sm-12 p-3 mb-5 bg-white rounded ">
                                <div class="waterfall ">
                                    <div class="container">
                                        <div class="row  ">
                                            @foreach ($refs as $ref)
                                                <div class="col-12 col-sm-4 ">
                                                    <div class="form-check item rounded p-3 p-3 ">
                                                        <label class="_area">
                    
                                                            <input  type="checkbox"  id="myCheckbox1" value="{{$ref->id}}" name="reference[]">
                                                            <span class="checkmark"></span>
                                                        </label>
                    
                                                        <!-- <label class="single-checkbox" for="myCheckbox1"> -->
                                                        <img class="rounded" style=" object-fit: cover; width: 320px; height:320px;"  style="display:block;" width="" src="{{$ref->img}}" />
                    
                    
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                    
                                    </div>
                    
                                </div>
                            </div>
                            </div>
                            <input type="button" name="previous" class=" previous _secondary-btn  btn-block btn-lg" value="Previous"/>
                            <input type="button" name="next" class=" next  _primary-black  btn-block btn-lg  rounded" value="Next"  />
                        </fieldset>
                        field-three
                        <fieldset class="p-5" style="border: 1px #F00 solid;">
                            <div class="container bg-white mt-5 p-5">
                                <h1 class=" text-center selectfillter  pt-5">ผลการ <span class="_hilight">Matching</span></h1>
                        
                                <h2 class="selectfillter  pt-5">เลือกนักออกแบบที่ตรงใจกับคุณ</h2>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                               <span class="row">
                                                   <span class="col-3">
                                                        <img src="https://picsum.photos/50" class="rounded-circle" alt="...">
                                                   </span>
                                                   <span class="col-9">
                                                       <p style="color: #000;">ปลายฟ้า
                                                    เป็นตาธรรม</p>
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
                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                                <span class="row">
                                                   <span class="col-3">
                                                        <img src="https://picsum.photos/50" class="rounded-circle" alt="...">
                                                   </span>
                                                   <span class="col-9">
                                                       <p style="color: #000;">การดา ราทอง</p>
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
                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                                    <span class="row">
                                                   <span class="col-3">
                                                        <img src="https://picsum.photos/50" class="rounded-circle" alt="...">
                                                   </span>
                                                   <span class="col-9">
                                                       <p style="color: #000;">ภาวณา เมตจิต</p>
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
                                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                                      <span class="row">
                                                   <span class="col-3">
                                                        <img src="https://picsum.photos/50" class="rounded-circle" alt="...">
                                                   </span>
                                                   <span class="col-9">
                                                       <p style="color: #000;">แสงสา อูทอง</p>
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
                                            <a class="nav-link" id="v-pills-designers-6-tab" data-toggle="pill" href="#v-pills-designer-6" role="tab" aria-controls="v-pills-designers" aria-selected="false">
                                                 <span class="row">
                                                   <span class="col-3">
                                                        <img src="https://picsum.photos/50" class="rounded-circle" alt="...">
                                                   </span>
                                                   <span class="col-9">
                                                       <p style="color: #000;">ปิ่นเกล้า อิ่มนา</p>
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
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <h2 class="selectfillter ">  ผลงานบรรณจุภันฑ์ (<small>8</small>)</h2>
                                                <div class="overflow-gallery grid-gallery">
                                                <div class="row">
                                                    <div class="col-7 mt-3">
                                                        <img class="rounded"  style=" object-fit: cover;"src="photo/@product-8.png" />
                                                    </div>
                                                    <div class="col-5 mt-3">
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
                                                    </div>
                        
                                                </div>
                                                </div>
                        
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <h2 class="selectfillter  ">  ผลงานบรรณจุภันฑ์ (<small>8</small>)</h2>
                                                <div class="overflow-gallery grid-gallery">
                                                    <div class="row">
                                                        <div class="col-7 mt-3">
                                                            <img class="rounded"  style=" object-fit: cover;"src="photo/@product-8.png" />
                                                        </div>
                                                        <div class="col-5 mt-3">
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
                                                        </div>
                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                <h2 class="selectfillter  pt-5">  ผลงานบรรณจุภันฑ์ (<small>8</small>)</h2>
                                                <div class="overflow-gallery grid-gallery">
                                                    <div class="row">
                                                        <div class="col-7 mt-3">
                                                            <img class="rounded"  style=" object-fit: cover;"src="photo/@product-8.png" />
                                                        </div>
                                                        <div class="col-5 mt-3">
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
                                                        </div>
                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                <h2 class="selectfillter  pt-5">  ผลงานบรรณจุภันฑ์ (<small>8</small>)</h2>
                                                <div class="overflow-gallery grid-gallery">
                                                    <div class="row">
                                                        <div class="col-7 mt-3">
                                                            <img class="rounded"  style=" object-fit: cover;"src="photo/@product-8.png" />
                                                        </div>
                                                        <div class="col-5 mt-3">
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
                                                        </div>
                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-designer-6" role="tabpanel" aria-labelledby="v-pills-designers-6-tab">
                                                <h2 class="selectfillter  pt-5">  ผลงานบรรณจุภันฑ์ (<small>8</small>)</h2>
                                                <div class="overflow-gallery grid-gallery">
                                                    <div class="row">
                                                        <div class="col-7 mt-3">
                                                            <img class="rounded"  style=" object-fit: cover;"src="photo/@product-8.png" />
                                                        </div>
                                                        <div class="col-5 mt-3">
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
                                                        </div>
                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                {{-- <div class="d-flex mt-5">
                                    <button href="#" class="btn _secondary-btn btn-lg btn-block m-1 ">ยกเลิก</button>
                                    <button type="submit" href="#"  class="btn _primary-black btn-lg btn-block m-1">จ้างเลย</button>
                                </div> --}}
                                <input type="button" name="previous" class=" previous _secondary-btn  btn-block btn-lg" value="Previous"/>
                            <input type="button" name="next" class=" next  _primary-black  btn-block btn-lg  rounded" value="Next"  />
                        </fieldset>
                        field-four
                        <fieldset class="p-5" style="border: 1px #F00 solid;">
                        
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <h2 class="selectfillter  pt-5">ขอบเขตที่ต้องการงาน</h2>
                                        <small>
                                            *ระบบจะค้นหาจากราคาที่ใกล้มากที่สุดจากกลุ่มนักออกแบบ*
                                        </small>
                                        <select name="pricerate"  class=" detaill-select form-control mt-5 mb-5">
                                            <option class="dropdown-item" value="2900">งานออกแบบฉลากติดสินค้าหน้าเดียว
                                                <span style="text-color: #ff3957;">ราคา ฿2,900</span>
                                            </option>
                                            <option class="dropdown-item" value="4500">ออกแบบกล่องแพคเกจ
                                                <span style="text-color: #ff3957;">ราคา ฿4,500</span>
                                            </option>
                                            <option class="dropdown-item" value="7900">ออกแบบฉลากติดสินค้า พร้อม กล่องแพคเกจ
                                                <span style="text-color: #ff3957;">ราคา ฿7,900</span>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                              <div class="row">
                                  <div class="col-12 col-md-8">
                                      <h2 class="selectfillter  pt-5">วันที่ต้องการงาน</h2>
                                              {{--<input type="date" id="basicDate"  name="finishdate" placeholder="MM/DD/YY" data-input>--}}
                                      <div class="row">
                                          <div class="col-4">
                                              <div class="select-date">
                                                  <ul class="box-tag d-flex">
                                                      <li class="m-5">
                                                          <input type="radio" id="customRadioInline1" name="finishdate" class="custom-control-input">
                                                          <label class="custom-control-label" for="customRadioInline1">ธรรมดา</label>
                                                          <h5>15 <small>วัน</small></h5>
                                                      </li>
                                                      <li class="m-5">
                                                          <input type="radio" id="customRadioInline2" name="finishdate" class="custom-control-input">
                                                          <label class="custom-control-label" for="customRadioInline2">ด่วน</label>
                                                          <h5>7 <small>วัน (+฿5000)</small></h5>
                                                      </li>
                                                      <li class="m-5">
                                                          <input type="radio" id="customRadioInline3" name="finishdate" class="custom-control-input">
                                                          <label class="custom-control-label" for="customRadioInline3">ด่วนมาก</label>
                                                          <h5>5 <small>วัน (+฿1,000)</small></h5>
                                                      </li>
         
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      </div>
                                  <div class="col-12 col-md-4">
                                      <div class="total-price p-3">
                                          <h5>สรุปราคา</h5>
                                          <table class="table">
                                              <thead>
                                              <tr>
                                                  <th scope="col">ขอบเขตงาน</th>
                                                  <th scope="col">ราคา</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <tr>
                                                  <th scope="row">01</th>
                                                  <td>฿2,900</td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">วันที่ต้องการงาน</th>
                                                  <td>+ ฿0</td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">ราคาทั้งหมด</th>
                                                  <td style=" text-decoration: underline;">฿2,900</td>
                                              </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                     {{-- <div class="d-flex mt-5">
                                         <button href="#" class="btn _secondary-btn btn-lg btn-block m-1 ">ยกเลิก</button>
                                         <button href="#"  class="btn _primary-black btn-lg btn-block m-1">ถัดไป</button>
                                     </div> --}}
                                  </div>
                                  </div>
                                  
                                 
         
         
                                 @if ($errors->any())
                                     <div class="alert alert-danger">
                                         <ul>
                                             @foreach ($errors->all() as $error)
                                                 <li>{{ $error }}</li>
                                             @endforeach
                                         </ul>
                                     </div>
                                 @endif
                                 <input type="button" name="previous" class=" previous _secondary-btn  btn-block btn-lg" value="Previous"/>
                                  <button type="submit" name="submit" class="submit _primary-black" value="Submit"> Submit</button>
                        </fieldset>
                    </div>
</form>

    

</section>

@endsection


<script>
    function addCart(v){
        document.getElementById('output').value = v
        console.log(v);
        return false;
    }
</script>
<script>
    function addID(v){
        document.getElementById('output2').value = v
        console.log(v);
        return false;
    }
</script>
<script>
    function addRef([v]){
        document.getElementById('output3').value = v
        console.log(v);
        return false;
    }
</script>
<script>
    var limit = 3;
    $('input.single-checkbox').on('change', function(evt) {
    if($(this).siblings(':checked').length >= limit) {
        this.checked = false;
    }
    });
</script>
<script src="{{asset('js/flatpickr.js')}}"></script>
<script src="js/previewmultiple.js"></script>


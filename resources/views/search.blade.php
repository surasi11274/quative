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
    

            <form class="multi-step-form  rounded-ex" action="/search/create/store1" method="post" enctype="multipart/form-data">
               
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="container">
                        <fieldset class="p-5">                
                            <h2 class="selectfillter"  style="font-weight: 800;">เลือกประเภทของผลิตภัณฑ์ของคุณที่พัฒนาบรรณจุภันฑ์</h2>
                        <div class="row">
                                   <input style="border-width: 2px;" type="hidden" class="detaill-select " name="categories" plachholder="sadas" id="output">
                                   <input  type="hidden"  name="categories_id" plachholder="sadas" id="output2">
                            @foreach ($cats as $cat)
                               
                            <div class="col">
                               <div class="body-below text-center">
                                <label class="fillter">
                                    <input type="checkbox" checked="checked"  onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')">
                                    <img src="{{ $cat->catsPic}}" alt="">
                                    <span class="checkmark-pic">
                                     
                                    </span>
                                  </label>
                              {{-- <div class="active-color">
                                <input type="radio" onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')">
                                <img src="{{ $cat->catsPic}}" alt="Avatar" class="image">
                                <div class="overlay">
                                  <span class="icon correct"></span>
                                </div>
                              </div> --}}

                                {{-- <ul class="purple-active">
                                    <li>
                                        <input type="checkbox" onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')">
                                        <img src="{{ $cat->catsPic}}"  class="rounded" alt="">
                            
                                    </li>
                                </ul> --}}
                                
                        
                                   {{-- <button type="button" class="btn purple-active" onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')">
                                    <img src="{{ $cat->catsPic}}"  class="rounded" alt="">
                                   </button> --}}
                                   
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
                                <div  id="thumb-output" style="display:flex; width:180px;height:180px;">
                                
                                </div>
                                 <div class="upload-btn-wrapper-">
                                        <button class="_btn-upload-"><i class="fas fa-plus"></i></button>
                                        <input type="file" id="file-input"  name="productPic"  multiple />
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
                        {{-- field-two --}}
                        <fieldset>
                            <div class="container bg-white p-5">
                                <h2 class="selectfillter">รูปภาพงานใกล้เคียงกับงานที่ต้องการ *ถ้ามี</h2>
                                <div class="row">
                                    <div class="col">
                                        <div  id="thumb-output2" style="display:flex; width:180px;height:180px;">
                                        
                                        </div>
                                         <div class="upload-btn-wrapper-">
                                                <button class="_btn-upload-"><i class="fas fa-plus"></i></button>
                                                <input type="file" id="file-input2" name="refpicbyUser" multiple />
                                         </div>
                                     </div>
                                </div>
                            {{-- <div class="col">
                                <div class="input-picture">
                    
                                    <input type="file" id="file-input2" name="refpicbyUser" multiple />
                                    <input type="button" onclick="removeAllImage()" value="Remove All Image" clas="remove"> 
                                                                        <div id="thumb-output2"></div>
                                    <i class="fas fa-plus p-icons"></i>
                                </div>
                            </div> --}}
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
                            <input type="submit" name="next" class=" next  _primary-black  btn-block btn-lg  rounded" value="Next"  />
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


@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="css/style_match.css">
   <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">

   
@endsection
<body style="font-family: prompt;">
    
</body>

@section('content')
<section class="content ">
    <div class="text-center mt_ex p-5">
        <ul id="progressbar">
            <li class="_active_pro text-center">ระบุความต้องการ</li>
            <li class="text-center">เลือกรูปตัวอย่างงาน</li>
            <li class="text-center">เลือกนักออกแบบที่ตรงใจ</li>
        </ul>
    </div>

            <form class="rounded" action="/search/create/store1" method="post" enctype="multipart/form-data">
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

                    <div class="container bg-white rounded  p-5">
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

                            {{-- <div class="col">
                                <div class="body-below text-center">
                                    <a href="#">
                                        <img src="photo/@bottle.png"  class="rounded" alt="">
                                    </a>
                                    <p>กล่อง</p>
                                </div>

                            </div>
                            <div class="col">
                                <div class="body-below text-center">
                                    <a href="#">
                                        <img src="photo/@glass.png"  class="rounded" alt="">
                                    </a>
                                    <p>กล่อง</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="body-below text-center">
                                    <a href="#">
                                        <img src="photo/@bag.png"  class="rounded" alt="">
                                    </a>
                                    <p>กล่อง</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="body-below text-center">
                                    <a href="#">
                                        <img src="photo/@cans.png"  class="rounded" alt="">
                                    </a>
                                    <p>กล่อง</p>
                                </div>
                            </div> --}}
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
{{-- <input type="button" onclick="removeAllImage()" value="Remove All Image" clas="remove">  --}}
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

                        {{--<div class="row  pt-5">--}}
                            {{--<div class="col-6 ">--}}
                                {{--<h2 class="selectfillter ">อีเมล์</h2>--}}
                                {{--<input type="text" class="form-control" name="email" placeholder="ex. abc@hotmail.com" aria-label="Username" aria-describedby="basic-addon1">--}}
                                {{--<p>--}}
                                    {{--กรอกอีเมล์ที่ต้องการแจ้งเตือน--}}
                                {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="col-6 ">--}}
                                {{--<h2 class="selectfillter">เบอร์โทรศัพท์</h2>--}}
                                {{--<input type="text" class="form-control" name="phone" placeholder="ex. 029067726" aria-label="Username" aria-describedby="basic-addon1">--}}
                                {{--<p>--}}
                                    {{--กรอกเบอร์โทรศัพท์เพื่อเราแจ้งข่าวสารล่วงหน้า--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <h2 class="selectfillter  pt-5">ระบุรายละเอียดสำคัญ ( ปัญหา + ผลกระทบ + เป้าหมายทางธุรกิจ )</h2>
                        <textarea class="form-control" name="requirement" placeholder="ระบุรายละเอียดสำคัญ เช่น สินค้าไม่น่าดึงดูด, สินค้าทำยอดไม่ไ่ด้" aria-label="With textarea"></textarea>
                       <div class="row">
                           <div class="col-12 col-md-6">
                               <h2 class="selectfillter  pt-5">ขอบเขตที่ต้องการงาน</h2>
                               <small>
                                   *ระบบจะค้นหาจากราคาที่ใกล้มากที่สุดจากกลุ่มนักออกแบบ*
                               </small>
                               <!-- <input style="border-width: 2px;" type="number" class="detaill-select mt-5 mb-5" name="FirstName" plachholder="บรรจุภัณฑ์ประเภทกล่อง"> -->
                               {{--<div class="dropdown">--}}
                               {{--<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                               {{--Select--}}
                               {{--</button>--}}
                               {{--<div class="dropdown-menu" aria-labelledby="dropdownMenu2">--}}
                               {{--<button class="dropdown-item" type="button">งานออกแบบฉลากติดสินค้าหน้าเดียว  ราคา ฿2,900 ได้ </button>--}}
                               {{--<button class="dropdown-item" type="button">Another action</button>--}}
                               {{--<button class="dropdown-item" type="button">Something else here</button>--}}
                               {{--</div>--}}
                               {{--</div>--}}
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
                            <div class="d-flex mt-5">
                                <button href="#" class="btn _secondary-btn btn-lg btn-block m-1 ">ยกเลิก</button>
                                <button href="#"  class="btn _primary-black btn-lg btn-block m-1">ถัดไป</button>
                            </div>
                         </div>
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

                        {{--<button type="submit" class="btn btn-block " style="background-color:#904ae8; color:white;margin-top: 20px;"  >--}}
                            {{--บันทึกข้อมูล--}}
                        {{--</button>--}}




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
        <div class="d-flex mt-5">
            <button href="#" class="btn _secondary-btn btn-lg btn-block m-1 ">ย้อนกลับ</button>
            <button type="submit" href="#"  class="btn _primary-black btn-lg btn-block m-1">ถัดไป</button>
        </div>
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


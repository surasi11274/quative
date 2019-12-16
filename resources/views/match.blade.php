@extends('layouts.app')

@section('content')
    <section class="content">

        <div class="row">
            <!--<div class="alert alert-success col-md-3 offset-md-8 alert-dissmissable position-absolute fade show" style="z-index: 1; transition: 0.6s;" role="alert">-->
            <!--<button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>-->
            <!--กรอกข้อมูลเรียบร้อย-->
            <!--</div>-->
        </div>
        <div class="container">
            <div class="text-center p-5">
                <h1><span class="_hilight">กรอกข้อมูลตามที่กำหนด</span></h1>
                <p>
                    กรอกข้อมูลให้ครบถ้วนเพื่อที่เราจะได้หานักออกแบบที่<br>
                    ใช่ที่สุดสำหรับคุณ
                </p>
            </div>

            <div class="col-12 col-sm-12  p-3 mb-5 bg-white rounded">
                <div class="form-match">
                    <div class="rec">
                        <div class="row">
                            <div class="col-2 p-5">
                                <image id="profileImage" class="rounded-circle" src="https://picsum.photos/140" />
                                <input id="imageUpload" type="file"
                                       name="profile_photo" placeholder="Photo" required="" capture>
                            </div>
                            <div class="col-10 p-5">
                                <div class="fill">
                                    <h1 class="titlename">Plaifah Pentatham</h1>
                                    <p>Entrepreneur</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="container p-5">
                        <h2 class="selectfillter pt-5">เลือกประเภทผลิตภัณฑ์ที่ต้องการจะออกแบบ</h2>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="detaill-select " name="FirstName" plachholder="บรรจุภัณฑ์ประเภทกล่อง" id="output">
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn _primary-btn " data-toggle="modal" data-target=".bd-example-modal-lg">เลือก</button>
                            </div>
                        </div>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">

                                <div class="modal-content p-5 mb-5 form-match rounded-ex">

                                    <form>
                                        <div class="tab-content" id="myTabContent">
                                            <button type="button" class="close" style="    font-size: 3.5rem;" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="form-group">
                                                <h1 ><span class="_hilight">เลือกประเภเทการออกแบบ</span></h1>

                                                <div class="row">
                                                    <div class="col-6 rounded-ex p-5" style="border: #C4C4C4 solid 1px; background: #F9F9F9;">
                                                        <h4>แนวทางการออกแบบ</h4>
                                                        <div class="mt-3 ">
                                                            <!--<div class="card-header tab-card-header ">-->
                                                            <div>
                                                                <ul class="nav nav-tabs card-header-tabs d-block" id="myTab" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="btn _primary-drop m-1" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">บรรจุภัณฑ์ประเภท กล่อง</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="btn _primary-drop m-1" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">บรรจุภัณฑ์ประเภท แก้ว</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="btn _primary-drop m-1" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">บรรจุภัณฑ์ประเภท ขวด</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="btn _primary-drop m-1" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false">บรรจุภัณฑ์ประเภท ถุง</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="btn _primary-drop m-1" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="false">บรรจุภัณฑ์ประเภท กระป๋อง</a>
                                                                    </li>
                                                                </ul>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h4>แนวทางการออกแบบ</h4>
                                                        <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                                                            <h5>เลือกรายละเอียด</h5>
                                                            <div class="row">
                                                                <div class="col-6 p-3">
                                                                    <div class="card" >
                                                                        <img class="card-img-top" src="https://millersupplyincorporated.com/wp-content/uploads/2018/05/kraftbox.jpg">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title"> กล่องพัสดุมาตรฐาน</h4>
                                                                            <small class="card-text">0 * 0 inch</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 p-3">
                                                                    <div class="card">
                                                                        <img class="card-img-top" src="https://millersupplyincorporated.com/wp-content/uploads/2018/05/kraftbox.jpg">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title"> กล่องพัสดุมาตรฐาน</h4>
                                                                            <small class="card-text">0 * 0 inch</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 p-3">
                                                                    <div class="card">
                                                                        <img class="card-img-top" src="https://millersupplyincorporated.com/wp-content/uploads/2018/05/kraftbox.jpg">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title"> กล่องพัสดุมาตรฐาน</h4>
                                                                            <small class="card-text">0 * 0 inch</small>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-6 p-3">
                                                                    <div class="card">
                                                                        <img class="card-img-top" src="https://millersupplyincorporated.com/wp-content/uploads/2018/05/kraftbox.jpg">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title"> กล่องพัสดุมาตรฐาน</h4>
                                                                            <small class="card-text">0 * 0 inch</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                                                            <h5 class="card-title">Tab Card Two</h5>
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                                        </div>
                                                        <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                                                            <h5 class="card-title">Tab Card Three</h5>
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                                        </div>
                                                        <div class="tab-pane fade p-3" id="four" role="tabpanel" aria-labelledby="four-tab">
                                                            <h5 class="card-title">Tab Card four</h5>
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                                        </div>
                                                        <div class="tab-pane fade p-3" id="five" role="tabpanel" aria-labelledby="five-tab">
                                                            <h5 class="card-title">Tab Card five</h5>
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                            <a href="#" class="btn btn-primary">Go somewhere</a>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <h2 class="selectfillter  pt-5">สไตล์งานที่ต้องการ</h2>

                        <div class="container text-center">
                            <ul class="ks-cboxtags">
                                <li><input type="checkbox" id="checkboxOne" value="minimal"><label for="checkboxOne">มินิมอล</label></li>
                                <li><input type="checkbox" id="checkboxTwo" value="Cotton Candy" checked><label for="checkboxTwo"> ทันสมัย</label></li>
                                <li><input type="checkbox" id="checkboxThree" value="Rarity" checked><label for="checkboxThree">วินเทจ</label></li>
                                <li><input type="checkbox" id="checkboxFour" value="Moondancer"><label for="checkboxFour">แฟนตาซี</label></li>
                                <li><input type="checkbox" id="checkboxFive" value="Surprise"><label for="checkboxFive">หนักแน่น</label></li>
                                <li><input type="checkbox" id="checkboxSix" value="Twilight Sparkle" checked><label for="checkboxSix">แปลกใหม่</label></li>
                                <li><input type="checkbox" id="checkboxSeven" value="Fluttershy"><label for="checkboxSeven">ดอกไม้</label></li>

                            </ul>
                        </div>
                        <h2 class="selectfillter  pt-5">วันที่ต้องการ</h2>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="basicDate"  placeholder="MM/DD/YY" data-input>
                            </div>
                        </div>
                        <div class="row  pt-5">
                            <div class="col-6 ">
                                <h2 class="selectfillter ">อีเมล์</h2>
                                <input type="text" class="form-control" placeholder="ex. abc@hotmail.com" aria-label="Username" aria-describedby="basic-addon1">
                                <p>
                                    กรอกอีเมล์ที่ต้องการแจ้งเตือน

                                </p>
                            </div>
                            <div class="col-6 ">
                                <h2 class="selectfillter">เบอร์โทรศัพท์</h2>
                                <input type="text" class="form-control" placeholder="ex. 029067726" aria-label="Username" aria-describedby="basic-addon1">
                                <p>
                                    กรอกเบอร์โทรศัพท์เพื่อเราแจ้งข่าวสารล่วงหน้า
                                </p>
                            </div>
                        </div>
                        <h2 class="selectfillter  pt-5">สิ่งที่ต้องการจะบอกเป็นพิเศษ</h2>
                        <textarea class="form-control" placeholder="ex. need less is more" aria-label="With textarea"></textarea>
                        <h2 class="selectfillter  pt-5">งบประมาณที่ต้องการจ้างงานออกแบบในครั้งนี้</h2>
                        <p>
                            *ระบบจะค้นหาจากราคาที่ใกล้มากที่สุดจากกลุ่มนักออกแบบ*
                        </p>
                        <input type="number" class="detaill-select mt-5 mb-5" name="FirstName" plachholder="บรรจุภัณฑ์ประเภทกล่อง">
                        <a class="btn _primary-btn btn-block" href="select.html">ถัดไป</a>
                    </div>


                </div>
            </div>
        </div>
    </section>
    @endsection
<script src="{{asset('js/datepicker.js')}}"></script>
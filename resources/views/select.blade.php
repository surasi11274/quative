@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="css/_select.css">
@endsection
@section('content')
    <section class="content">
        <div class="container modal-lg">
            <h1 class="text-center _hilight p-5 ">
                เลือกผลิตภัณฑ์ที่มีความใกล้เคียง<br>
                กับแบบที่คุณต้องการ
            </h1>
            <div class="col-12 col-sm-12 p-3 mb-5 bg-white rounded ">
                <div class="waterfall ">
                    <div class="container">
                        <div class="row  ">
                            <div class="col-12 col-sm-4 ">
                                <div class="item rounded p-3 p-3 ">

                                    <button><img src="https://picsum.photos/360" class="rounded" alt=""></button>
                                </div>
                                <div class="item rounded p-3 p-3">
                                    <button><img src="https://picsum.photos/360" class="rounded" alt=""></button>
                                </div>
                                <div class="item rounded p-3 p-3">
                                    <button><img src="https://picsum.photos/360" class="rounded" alt=""></button>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="item rounded p-3">
                                    <button><img src="https://picsum.photos/360" class="rounded" alt=""></button>
                                </div>
                                <div class="item rounded p-3">
                                    <button><img src="https://picsum.photos/360" class="rounded" alt=""></button>
                                </div>
                                <div class="item rounded p-3">
                                    <button><img src="https://picsum.photos/360" class="rounded" alt=""></button>
                                </div>
                            </div>
                            <div class="col-md-4  col-sm-12">
                                <div class="item rounded p-3">
                                    <button><img src="https://picsum.photos/360" class="rounded" alt=""></button>
                                </div>
                                <div class="item rounded p-3">
                                    <button><img src="https://picsum.photos/360" class="rounded" alt=""></button>
                                </div>
                                <div class="item rounded p-3">
                                    <button><img src="https://picsum.photos/360" class="rounded" alt=""></button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row p-5">
                <div class="col-6 ">
                    <a class="btn btn-lg btn-block"  style="background-color: #ff3975ff; color:white;"href="match.html">ย้อนกลับ</a>
                </div>
                <div class="col-6">
                    <button id="myDiv"  type="button" class="btn btn-lg btn-block" style="background-color: #904ae8
; color:white;" data-toggle="modal" data-target="#exampleModalCenter">
                        <a href="/showmatch" style="color:white;" >บันทึกข้อมูล </a>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                                    <button type="button " class="close sr-only" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="load">
                                        <hr/><hr/><hr/><hr/>
                                    </div>
                                    <p class="text-center">
                                        เริ่มค้นหานักออกแบบที่มีความใกล้เคียงความต้องการของคุณ <br>...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
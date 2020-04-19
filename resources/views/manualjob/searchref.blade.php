@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="../css/style_match.css">
   {{-- <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
   <link rel="stylesheet" href="css/dropzone.css"> --}}

   
@endsection

@section('content')

<section class="content ">
    <div class="container d-none d-md-block">
        
        <div class="text-center p-5">
            <div id="wizard-progress" >
                <ol class="step-indicator">
                    <li class="complete">
                        <div class="step">1</div>
                        <div class="caption hidden-xs hidden-sm">ระบุความต้องการ</div>
                    </li>
                    <li class="complete">
                        <div class="step">2</div>
                        <div class="caption hidden-xs hidden-sm">เลือกรูปตัวอย่างงาน</div>
                    </li>
                    
                    <li class="active">
                        <div class="step">3</div>
                        <div class="caption hidden-xs hidden-sm">เลือกขอบเขตงาน</div>
                    </li>
                </ol>
            </div>

        </div>
    </div>
    
            <form class="container card p-3 p-md-5" action="/startjob/createRef/store" method="post" enctype="multipart/form-data">
               
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{-- mobile  --}}
               
                {{-- end mobile  --}}
                    <div class="container  ">
                      
                            <div class="container bg-white  p-3 p-md-5" style="padding-bottom: 140px !important;">
                                <h4 class="font-weight-bold d-none d-md-block">รูปภาพงานใกล้เคียงกับงานที่ต้องการ *ถ้ามี</h4>                              
                                <h6 class="font-weight-bold pt-2 d-md-none">รูปภาพงานใกล้เคียงกับงานที่ต้องการ</h6>
                               
                                <div class="row">
                                    {{-- <div class="col">
                                        <div  id="thumb-output2" style="display:flex; width:180px;height:180px;">
                                        
                                        </div>
                                         <div class="upload-btn-wrapper-">
                                                <button class="_btn-upload-"><i class="fas fa-plus"></i></button>
                                                <input type="file" id="file-input2" name="refpicbyUser" multiple />
                                         </div>
                                     </div> --}}

                            <div class="col">
                                 <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                    <label><a href="javascript:void(0)" class="custom-file-container__image-clear" hidden title="Clear Image">&times;</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="refpicbyUser" accept="*" multiple aria-label="Choose File">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview">
                                        <div class="col-3">

                                        </div>
                                    </div>
                                </div>
                                {{-- <div  id="thumb-output" style="display:flex; width:180px;height:180px;"></div> --}}

                               
                             </div>
                                </div>
                            
                            <h4 class="font-weight-bold pt-md-5   d-none d-md-block">เลือกผลิตภัณฑ์ที่มีความใกล้เคียงกับแบบที่คุณต้องการ</h2>
                            <h6 class="font-weight-bold pt-2 d-md-none">รูปภาพงานใกล้เคียงกับงานที่ต้องการ</h6>
                            <div class="mb-5 bg-white rounded ">
                                <div class="waterfall ">
                                    <div class="container">
                                        <div class="row ">
                                            @foreach ($refs as $ref)
                                                <div class="col-4 col-md-4 p-1 pt-md-2 pb-md-2 grid-col">
                                                    <div class="form-check-1 item rounded ">
                                                        <label class="_area" style="margin-bottom: 0rem; !important;">
                                                            <input  type="checkbox"  id="myCheckbox1" value="{{$ref->id}}" name="reference[]">
                                                            <span class="checkmark"></span>
                                                        </label>
                    
                                                        <!-- <label class="single-checkbox" for="myCheckbox1"> -->
                                                            
                                                                <img class="rounded object-fit-sm" src="{{$ref->img}}" alt="Flowers">
                                                              
                                                              {{-- <img class="rounded" style=" object-fit: cover; width: 320px; height:320px;"  style="display:block;" width="" src="{{$ref->img}}" /> --}}
                    
                    
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                    
                                    </div>
                    
                                </div>
                            </div>
                            <div class="row pt-md-5">
                                <div class="col d-none d-md-block"></div>
                                <div class="col">
                                    <button type="button" class="btn _secondary-btn  btn-block rounded btn-lg d-none d-md-block" data-toggle="modal" data-target="#exampleModal">
                                        ย้อนกลับ
                                        </button>
                                        <button type="button" class="btn _secondary-btn  btn-block rounded btn-lg d-md-none " data-toggle="modal" data-target="#exampleModal">
                                            ย้อนกลับ
                                        </button>
                                     </div>
                                <div class="col">
                                    <button type="submit" class="btn _primary-black  btn-block rounded btn-lg d-none d-md-block">ถัดไป</button>
                                    <button type="submit" class="btn _primary-black  btn-block rounded btn-lg d-md-none ">ถัดไป</button>
                                </div>
                            </div>
                            
                            <input style="border-width: 2px;" type="hidden" class="detaill-select" name="categories" plachholder="sadas" id="output">
                            <input  type="hidden"  name="categories_id" plachholder="sadas" id="output2">
                            <input  type="text" hidden id="job_id" name="job_id" value="{{$jobs->id}}">

                         
                      
                        
                    </div>
</form>
<form action="/startjob/delete/{{$jobs->token}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">ยืนยันการทำรายการ</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    คุณต้องการยืนยันที่จะทำรายการหรือไม่?
    
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
    <button type="submit" class="btn btn-primary" style="background-color:black;">ยืนยัน</button>
    </div>
</div>
</div>
</div>

</form>

    

</section>
<script src="{{asset('js/file-upload-with-preview.js')}}"></script>
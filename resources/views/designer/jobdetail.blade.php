@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="../css/_showjob.css">
@endsection
@section('content')
@foreach ($jobs as $job)

<div class="container">
    <div class="_black-bg mt_ex p-5">
        <div class="row">
            <div class="col-12 col-md-6 ">
            <h3  class="content-bg mb-5" >ข้อมูลการจ้างงาน <span>no. W0{{$job->id}}</span></h3>
                    <div class="row">
                        <div class="col-3">
                                <img class="rounded-circle " src="https://picsum.photos/120" alt="">
                        </div>
                        <div class="col-9">
                            
                            @php
                            $user = \App\User::find($job->user_id)->name;

                        @endphp
                      
                                <p class="content-bg">{{$user}}</p>
                                <button class="btn _primary-bg-dark">คุยกับผู้ประกอบการ</button>
                        </div>
                    </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="text-right">
                    
                        
                         
                        <h3 for=""class="content-bg " >แพ็คเกจ <span>15</span> วัน</h3><br>
                        <label for=""class="content-bg" ><h5>วันที่เริ่มงาน : {{date('F d,Y',strtotime($job->created_at))}}</h5></label> <br>
                        <label for=""class="content-bg" ><h5>วันที่ต้องการงาน : {{date('F d,Y',strtotime($job->finishdate))}}</h5>  </label><br>
                       
                            <div class="row">
                                {{-- @if ($job->jobstatus_id == '1')
                                <button hidden type="button" class="btn _primary-btn mr-5" onclick="addCart('2')" data-toggle="modal" data-target="#exampleModal">
                                    รับงาน
                                </button>
                                @else ($job->jobstatus_id == '2') 
                                <button type="button" class="btn disabled btn-secondary mr-5" onclick="addCart('2')" >
                                    รับงาน
                                </button>
                                @endif --}}
                               
                    <button hidden type="button" class="btn _primary-btn" data-toggle="modal" data-target=".bd-example-modal-lg">อัพโหลดไฟล์</button>
                    <!-- Large modal -->
                    <form action="/jobdetail/file/store" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content p-5">

                                    <div class="modal-header " style="text-align:center;">
                                    <h1 class="modal-title "  id="myLargeModalLabel">อัพโหลดไฟล์งาน</h1>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- <h2 class="selectfillter pt-5 text-left"  style="font-weight: 800;">แนบรูปภาพผลิตภัณฑ์เดิมของคุณ</h2> --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <br>
                                                <h5 class="text-left"> อัพโหลดไฟล์งานของคุณ:</h5>

                                                <div  id="thumb-output" class="pt-2 pb-2" style="display:flex; width:180px;height:180px;">
                                                
                                                </div>

                                                 <div class="upload-btn-wrapper-">
                                                        <button class="_btn-upload- " style="width: 670px;"><i class="fas fa-plus"></i></button>
                                                        <input type="file" id="file-input"  name="fileimgname[]"  multiple />
                                                 </div>

                                             </div>
                                             <div class="col-12 col-md-6">
                                                <h5 class="text-left"> อัพโหลดไฟล์งาน Ai ของคุณ:</h5>
                                                <div class="upload-btn-wrapper-work">
                                                    <button class="btn-work _primary-black btn-lg btn-block">อัพโหลดไฟล์</button>
                                                    <input type="file" name="fileartworkname[]" id="file" multiple  onchange="javascript:updateList()" />
        
                                                  </div>
                                             </div>
                                             <div class="col-12 col-md-6">
                                                <small id="fileList" class="text-left _hilight"></small>
                                             </div>
                                            
                                             
                                        </div>

                                        <div class="form-group">
                                            <h5 class="selectfillter text-left pt-5"  style="font-weight: 800;">URL :<small> (ที่เกี่ยวข้องกับผลิตภัณฑ์)</small></h5>
                                            <input type="text" class="form-control" name="url" placeholder="เช่น เว็บไซต์, เฟสบุ๊ค เพื่อให้นักออกแบบทำงานได้ง่ายขึ้น ">
                                        </div>
                                    </div>
                                     <input hidden type="text" id="job_id" name="job_id" value="{{$job->id}}">
                                    <input hidden type="text" id="designer_id" name="designer_id" value="{{$job->designer_id}}">
                                    <input hidden type="text" id="user_id" name="user_id" value="{{$job->user_id}}">
                                    <div class="modal-footer">
                                        <button type="button" class="btn _secondary-btn" data-dismiss="modal">ยกเลิก</button>
                                        <button type="submit" class="btn _primary-black">ยืนยันรับงาน</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                

                </div>
            </div>
        </div>
        
       
       

    </div>
    
    <div class="shadow-sm bg-whte mt-3">
        <div class="row">
            <div class="container">
        
                @if ($job->jobstatus_id == 1)
                <div class="text-center  p-5 bg-white">
                    <div id="wizard-progress">
                        <ol class="step-indicator">
                            <li class="complete">
                                <div class="step">1</div>
                                <div class="caption hidden-xs hidden-sm"> 
                                    <h5>เริ่มจ้างงาน</h5> <br>
                                    <p style="color:#C4C4C4;">นักออกแบบรับงานแล้ว</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">2</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ชำระเงิน</h5> <br>
                                    <p>ตรวจสอบการชำระเงิน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">3</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ดำเนินการออกแบบ</h5> <br>
                                    <p>กำลังออกแบบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">4</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ส่งมอบงาน</h5> <br>
                                    <p>ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">5</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>เสร็จสิ้นงาน</h5> <br>
                                    <p>ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div>
                @elseif ($job->jobstatus_id == 2)
                <div class="text-center  p-5 bg-white">
                    <div id="wizard-progress">
                        <ol class="step-indicator">
                            <li class="complete">
                                <div class="step">1</div>
                                <div class="caption hidden-xs hidden-sm"> 
                                    <h5>เริ่มจ้างงาน</h5> <br>
                                    <p >นักออกแบบรับงานแล้ว</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">2</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ชำระเงิน</h5> <br>
                                    <p style="color:#C4C4C4;">ตรวจสอบการชำระเงิน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">3</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ดำเนินการออกแบบ</h5> <br>
                                    <p>กำลังออกแบบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">4</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ส่งมอบงาน</h5> <br>
                                    <p>ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">5</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>เสร็จสิ้นงาน</h5> <br>
                                    <p>ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div>
                @elseif($job->jobstatus_id == '3')
                <div class="text-center  p-5 bg-white">
                    <div id="wizard-progress">
                        <ol class="step-indicator">
                            <li class="complete">
                                <div class="step">1</div>
                                <div class="caption hidden-xs hidden-sm"> 
                                    <h5>เริ่มจ้างงาน</h5> <br>
                                    <p>นักออกแบบรับงานแล้ว</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">2</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ชำระเงิน</h5> <br>
                                    <p >ตรวจสอบการชำระเงิน</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">3</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ดำเนินการออกแบบ</h5> <br>
                                    <p>กำลังออกแบบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">4</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ส่งมอบงาน</h5> <br>
                                    <p>ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">5</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>เสร็จสิ้นงาน</h5> <br>
                                    <p>ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div>
                @elseif($job->jobstatus_id == '4')
                <div class="text-center  p-5 bg-white">
                    <div id="wizard-progress">
                        <ol class="step-indicator">
                            <li class="complete">
                                <div class="step">1</div>
                                <div class="caption hidden-xs hidden-sm"> 
                                    <h5>เริ่มจ้างงาน</h5> <br>
                                    <p>นักออกแบบรับงานแล้ว</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">2</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ชำระเงิน</h5> <br>
                                    <p style="color:#C4C4C4;">ตรวจสอบการชำระเงิน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">3</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ดำเนินการออกแบบ</h5> <br>
                                    <p>กำลังออกแบบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">4</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ส่งมอบงาน</h5> <br>
                                    <p>ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">5</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>เสร็จสิ้นงาน</h5> <br>
                                    <p>ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div>
                @elseif($job->jobstatus_id == '5')
                <div class="text-center  p-5 bg-white">
                    <div id="wizard-progress">
                        <ol class="step-indicator">
                            <li class="complete">
                                <div class="step">1</div>
                                <div class="caption hidden-xs hidden-sm"> 
                                    <h5>เริ่มจ้างงาน</h5> <br>
                                    <p>นักออกแบบรับงานแล้ว</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">2</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ชำระเงิน</h5> <br>
                                    <p>ตรวจสอบการชำระเงิน</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">3</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ดำเนินการออกแบบ</h5> <br>
                                    <p>กำลังออกแบบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">4</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ส่งมอบงาน</h5> <br>
                                    <p>ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">5</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>เสร็จสิ้นงาน</h5> <br>
                                    <p>ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div>
                {{-- @elseif($job->jobstatus_id == '6')
                <div class="text-center  p-5 bg-white">
                    <div id="wizard-progress">
                        <ol class="step-indicator">
                            <li class="complete">
                                <div class="step">1</div>
                                <div class="caption hidden-xs hidden-sm"> 
                                    <h5>เริ่มจ้างงาน</h5> <br>
                                    <p>นักออกแบบรับงานแล้ว</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">2</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ชำระเงิน</h5> <br>
                                    <p>ตรวจสอบการชำระเงิน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">3</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ดำเนินการออกแบบ</h5> <br>
                                    <p>กำลังออกแบบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">4</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ส่งมอบงาน</h5> <br>
                                    <p>ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">5</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>เสร็จสิ้นงาน</h5> <br>
                                    <p>ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div> --}}
                @elseif($job->jobstatus_id == '7')
                <div class="text-center  p-5 bg-white">
                    <div id="wizard-progress">
                        <ol class="step-indicator">
                            <li class="complete">
                                <div class="step">1</div>
                                <div class="caption hidden-xs hidden-sm"> 
                                    <h5>เริ่มจ้างงาน</h5> <br>
                                    <p>นักออกแบบรับงานแล้ว</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">2</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ชำระเงิน</h5> <br>
                                    <p>ตรวจสอบการชำระเงิน</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">3</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ดำเนินการออกแบบ</h5> <br>
                                    <p>กำลังออกแบบงาน</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">4</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ส่งมอบงาน</h5> <br>
                                    <p  style="color:#C4C4C4;">ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">5</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5  style="color:#C4C4C4;">เสร็จสิ้นงาน</h5> <br>
                                    <p  style="color:#C4C4C4;">ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div>
                @elseif($job->jobstatus_id == '8')
                <div class="text-center  p-5 bg-white">
                    <div id="wizard-progress">
                        <ol class="step-indicator">
                            <li class="complete">
                                <div class="step">1</div>
                                <div class="caption hidden-xs hidden-sm"> 
                                    <h5>เริ่มจ้างงาน</h5> <br>
                                    <p>นักออกแบบรับงานแล้ว</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">2</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ชำระเงิน</h5> <br>
                                    <p>ตรวจสอบการชำระเงิน</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">3</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ดำเนินการออกแบบ</h5> <br>
                                    <p>กำลังออกแบบงาน</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">4</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ส่งมอบงาน</h5> <br>
                                    <p>ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">5</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5  style="color:#C4C4C4;">เสร็จสิ้นงาน</h5> <br>
                                    <p  style="color:#C4C4C4;">ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div>
                @elseif($job->jobstatus_id == '9')
                <div class="text-center  p-5 bg-white">
                    <div id="wizard-progress">
                        <ol class="step-indicator">
                            <li class="complete">
                                <div class="step">1</div>
                                <div class="caption hidden-xs hidden-sm"> 
                                    <h5>เริ่มจ้างงาน</h5> <br>
                                    <p>นักออกแบบรับงานแล้ว</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">2</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ชำระเงิน</h5> <br>
                                    <p>ตรวจสอบการชำระเงิน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">3</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ดำเนินการออกแบบ</h5> <br>
                                    <p>กำลังออกแบบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">4</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ส่งมอบงาน</h5> <br>
                                    <p>ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">5</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>เสร็จสิ้นงาน</h5> <br>
                                    <p  style="color:#C4C4C4;">ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div>
                @elseif($job->jobstatus_id == '10')
                <div class="text-center  p-5 bg-white">
                    <div id="wizard-progress">
                        <ol class="step-indicator">
                            <li class="complete">
                                <div class="step">1</div>
                                <div class="caption hidden-xs hidden-sm"> 
                                    <h5>เริ่มจ้างงาน</h5> <br>
                                    <p>นักออกแบบรับงานแล้ว</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">2</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ชำระเงิน</h5> <br>
                                    <p>ตรวจสอบการชำระเงิน</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">3</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ดำเนินการออกแบบ</h5> <br>
                                    <p>กำลังออกแบบงาน</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">4</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>ส่งมอบงาน</h5> <br>
                                    <p>ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="step">5</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5>เสร็จสิ้นงาน</h5> <br>
                                    <p>ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div>
                
                @endif
            </div>
            <div class="container-fluid">
                <form action="" class="multi-step-status">
                    {{-- 1 --}}
                    <fieldset>
                        <div class="process-job shadow-sm p-5">
                           <div class="d-flex mt-5">
                            @php
                            $jobstatusid = \App\Jobstatus::find($job->jobstatus_id)->statusName;
                             @endphp
                            {{-- @if ($jobs->jobstatus_id == 1) --}}

                            <h4>สถานะปัจจุบัน : </h4><h4 class="_hilight">&nbsp;&nbsp;{{$jobstatusid}}</h4>
                           </div>
                           <div class="float-right d-flex">
                            @if ($job->jobstatus_id == 1)
                                <button type="button" class="btn _primary-btn m-1" onclick="addCart('2')" data-toggle="modal" data-target="#exampleModal">รับงาน</button>
                                <button type="button"class="btn _secondary-btn m-1" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                            @elseif ($job->jobstatus_id == 4)
                                <button type="button" class="btn _primary-btn m-1" onclick="addCart('3')" data-toggle="modal" data-target="#exampleModal">รับงาน</button>
                                <button type="button"class="btn _secondary-btn m-1" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                            @elseif ($job->jobstatus_id == 3)
                                <button type="button" class="btn _primary-btn m-1" data-toggle="modal" data-target=".bd-example-modal-lg">อัพโหลดไฟล์</button>
                                <button type="button"class="btn _secondary-btn m-1" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                                
                            @endif
                           
                           </div>
                           
                        </div>
                        {{-- <input type="button" name="next" class=" next  _primary-btn " value="แจ้งชำระเงิน"  />
                        <input type="button" name="previous" class=" previous _secondary-btn " value="ยกเลิกงาน"/> --}}
                    </fieldset>
                    
                    
                </form>
                <div class="container-fluid bg-white">
                    <div class="row">
                        <div class="col-12 col-md-6 p-5">
                            <h4 class="font-weight-bold">ข้อมูลผลิตภัณฑ์ของคุณ</h4>
                           <hr>
                           <h5 class="font-weight-bold">บรรจุภัณฑ์ประเภท</h5>
                        <h5 class="mt-3">{{ $job->categories}}</h5>
                           <h5 class="font-weight-bold mt-3">รูปภาพผลิตภัณฑ์เดิมของคุณ</p>
                           <div class="row mt-3">
                               <div class="col-4">
                                <img class="rounded" src="/{{$job->productPic}}" alt="">
                               </div>
                               <div class="col-4">
                                    <img class="rounded" src="/photo/@product-blue.png" alt="">
                               </div>
                               <div class="col-4">
                                    <img class="rounded" src="/photo/@product-blue.png" alt="">
                               </div>
                           </div>
                           <label for="" class=" mt-3">URL : <small>{{$job->url}}</small></label>
                           <h4 class="font-weight-bold">รูปภาพตัวอย่างงาน</h3>
                           <hr>
                           <h5 class="mt-3 font-weight-bold">รูปภาพงานใกล้เคียงกับงาน</h5>
                           <div class="row mt-3">
                                <div class="col-4">
                                 <img class="rounded" src="/photo/@product-8.png" alt="">
                                </div>
                                <div class="col-4">
                                     <img class="rounded" src="/photo/@product-8.png" alt="">
                                </div>
                                <div class="col-4">
                                     <img class="rounded" src="/photo/@product-8.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 p-5">
                            <h4 class="font-weight-bold">ข้อมูลงานที่ต้องการ</h4>
                            <hr>
                            <h5 class="font-weight-bold">รายละเอียด</h5>
                            <h5 class="mt-3">{{ $job->requirement}}</h5>
                                    <h5 class="mt-3 font-weight-bold">ลักษณะหรือสไตล์งานที่ต้องการ</h5>
                                   
                                    {{-- {{ $job->tags}} --}}
                                    @foreach($job->tags as $tagn)
                
                                    @php
                                         $tagname = \App\Tags::find($tagn)->tagName;
                                     @endphp
                                        <div class="btn box-tagse border" >{{$tagname}}</div>
                
                                    @endforeach
                                    
                                    <h4 class="mt-5 font-weight-bold">ขอบเขตการจ้างงาน</h4>
                                    <hr>
                                    <div class="col-12 mt-3">
                                        <h5 class="font-weight-bold"> ขอบเขตการจ้างงาน</h5>
                                    <p>01 - งานออกแบบฉลากติดสินค้าหน้าเดียว ({{9000}})</p>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <h5 class="font-weight-bold">วันที่ต้องการงาน</h5>
                                        <p>{{date('F d,Y',strtotime($job->finishdate))}} ({{2900}})</p>
                                    </div>
                                    <div class="text-right">
                                        {{-- <button type="button"  class="btn _secondary-btn" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                                        <button type="button"  class="btn _primary-black" onclick="addCart('8')" data-toggle="modal" data-target="#exampleModal">เสร็จสิ้นงาน</button> --}}
                
                
                                    {{-- <form action="/jobdetail/jobstatus/store" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                        <button type="button"  class="btn _secondary-btn" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      คุณต้องการยืนยันที่จะรับงานนี้หรือไม่?
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                      <button type="submit" class="btn btn-primary">ยืนยันยกเลิกงาน</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            <input type="text" id="output" name="jobstatus_id">
                                            <input type="text" id="job_id" name="job_id" value="{{$job->id}}">
                                    </form> --}}
                
                
                
                                            
                                    {{-- <form action="/jobdetail/jobstatus/store" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                            <button type="button"  class="btn _primary-black" onclick="addCart('9')" data-toggle="modal" data-target="#exampleModal">เสร็จสิ้นงาน</button>
                
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      คุณต้องการยืนยันที่จะรับงานนี้หรือไม่?
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                      <button type="submit" class="btn btn-primary">ยืนยันยกเลิกงาน</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              
                                            <input type="text" id="output" name="jobstatus_id">
                                            <input type="text" id="job_id" name="job_id" value="{{$job->id}}">
                                    </form> --}}
                
                                    </div>
                                    
                        </div>
                
                    </div>
                </div>
            </div>

           
            {{--  --}}

{{-- --------------------------Modal --------------------------------------}}
            <form action="/jobdetail/jobstatus/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

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
                <input type="hidden" id="output" name="jobstatus_id">
                <input type="hidden" id="job_id" name="job_id" value="{{$job->id}}">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary" style="background-color:black;">ยืนยัน</button>
                </div>
            </div>
            </div>
            </div>

            </form>
        </div>
    </div>
</div>
@endforeach


@endsection
<script>
    function addCart(v){
        document.getElementById('output').value = v
        document.getElementById('output1').value = v
        document.getElementById('outputCancel').value = v


        document.getElementById('jobstatus_id').value = v
        console.log(v);
        return false;
    }

   
</script>
<script>
updateList = function() {
  var input = document.getElementById('file');
  var output = document.getElementById('fileList');

  output.innerHTML = '<ul>';
  for (var i = 0; i < input.files.length; ++i) {
    output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
  }
  output.innerHTML += '</ul>';
}

</script>

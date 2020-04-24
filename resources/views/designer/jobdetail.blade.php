@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="../css/_showjob.css">
@endsection
@section('content')
@foreach ($jobs as $job)

<div class="container">
    <div class="_black-bg mt-5 p-3 p-md-5">
        <div class="row">
            <div class="col-12 col-md-6 ">
            <h3  class="content-bg mb-5 d-none d-md-block " >ข้อมูลการจ้างงาน W{{$job->id}}</h3>
            <h5  class="content-bg mb-3 d-md-none font-weight-bold" >ข้อมูลการจ้างงาน W{{$job->id}}</h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-md-none">
                                <h6 for=""class="content-bg " >แพ็คเกจ {{number_format(round(strtotime($job->finishdate) - strtotime($job->created_at)) / (60 * 60 * 24))}} วัน</h6>
                                <label for=""class="content-bg mt-md-5" ><small>วันที่เริ่มงาน : {{date('F d,Y',strtotime($job->created_at))}}</small></label>
                                <label for=""class="content-bg" ><small>วันที่ต้องการงาน : {{date('F d,Y',strtotime($job->finishdate))}}</small>  </label>
                            </div>
                        </div>
                        @php
                            $user = \App\User::find($job->user_id);
                            $profile = $user->profile();
                        @endphp
                      
                        <div class="col-3 col-md-3 mb-3 mt-3">
                            <div>
                                @if ($profile && $profile->profilepic !== NULL)

                                <img class="rounded-circle obj-img-showjob" src="/{{ $profile->profilepic }}" alt="">

                             @else
                             <img class="rounded-circle obj-img-showjob"  src="{{ $user->avatar }}" alt="">

                             @endif

                            </div>
                        </div>
                        <div class="col-9 col-md-9 mb-3 mt-3">
                            
                          
                      
                                <p class="content-bg mb-3">{{$user->name}}</p>
                                <a style="text-decoration:none;"  href="{{route('job.Messages',$job->token)}}">

                                <button class="btn _primary-bg-dark btn-lg d-none d-md-block"><i class=" far fa-comments pr-2"></i>คุยกับผู้ประกอบการ</button>
                                </a>
                        </div>
                        <div class="col-12 d-md-none mt-3 mb-5">
                            <a  style="text-decoration:none;"  href="{{route('job.Messages',$job->token)}}">
                                <button class="btn _primary-bg-dark btn-lg btn-block "><i class=" far fa-comments pr-2"></i>คุยกับผู้ประกอบการ</button>
                            </a>
                        </div>
                    </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="text-right">
                    
                        
                    <div class="d-none d-md-block">
                        <h3 for=""class="content-bg " >แพ็คเกจ {{number_format(round(strtotime($job->finishdate) - strtotime($job->created_at)) / (60 * 60 * 24))}} วัน</h3><br>
                        <label for=""class="content-bg mt-5" ><h5>วันที่เริ่มงาน : {{date('F d,Y',strtotime($job->created_at))}}</h5></label> <br>
                        <label for=""class="content-bg" ><h5>วันที่ต้องการงาน : {{date('F d,Y',strtotime($job->finishdate))}}</h5>  </label><br>
                    </div>
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
                                <div class="modal-content p-2 p-md-5">

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
                                                    <div class="row">
                                                        <h5 class="text-left font-weight-bold ">อัพโหลดภาพตัวอย่างงาน (1 ภาพ)</h5>
                                                    </div>                                                    
                                                    <div class="row">
                                                        <small class="text-left text-danger">*เพื่อที่ภาพนี้จะเป็นตัวอย่างงานให้ลูกค้า และภาพนี้จะถูกนำไปแสดงในหน้าผลงาน </small>
                                                        
                                               
                                                        <div class="col-12 text-left">
                                                            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                                                <label><a href="javascript:void(0)" class="custom-file-container__image-clear" hidden title="Clear Image">&times;</a></label>
                                                                <label class="custom-file-container__custom-file" >
                                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" name="fileimgname" accept="*" multiple aria-label="Choose File">
                                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                </label>
                                                                <div class="custom-file-container__image-preview">
                                                                    <div class="col-3">
                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>    
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h5 class="text-left font-weight-bold ">อัพโหลดไฟล์งาน</h5>
                                                                <small class="text-left text-danger">*สามารถอัพโหลดได้หลายไฟล์</small>
                                                                </div> 
                                                                    
                                                            </div>     
                                                            <div class="upload-btn-wrapper-work">
                                                                <button class="btn-lg font-weight-bold _primary-black " >อัพโหลดไฟล์ +</button>
                                                                <input type="file" name="fileartworkname[]" id="file" multiple  onchange="javascript:updateList()" />
                                                            </div>
                                                    <div class="col-12 ">
                                                       
                                                            <small id="fileList" class="text-left _hilight">

                                                            </small>
                                                        
                                                    </div>
    
                                                       
                                                         
                                            </div>
                                           
               
                                            
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <h5 class="selectfillter text-left pt-5"  style="font-weight: 800;">URL :<small> </small></h5>
    
                                                </div>
                                                <div class="row">
                                                    <small class="text-left text-warning">หากไฟล์ใหญ่เกินไปแนะนำให้อัพโหลดขึ้นบน cloud แล้วนำลิงค์มาวาง</small>
    
                                                </div>
                                                <div class="row mt-4">
                                                    <input type="text" class="form-control" name="filelinks" placeholder="ลิงค์จาก cloud หรือเว็บฝากไฟล์ถ้ามี">
    
                                                </div>
                                            </div>
                                        </div>

                                       
                                    </div>
                                    {{-- <input type="text" id="output" name="jobstatus_id"> --}}
                                    <div class="modal-footer">
                                        <div class="row mt-5 ">
                                            <div class="col">
                                                <button type="button" class="btn _secondary-btn btn-lg btn-block" data-dismiss="modal">ยกเลิก</button>
                                            </div>
                                            <div class="col">
                                                <button type="submit" class="btn _primary-black btn-lg btn-block">ยืนยัน</button>

                                            </div>
                                       
                                    </div>
                                    </div>
                                     <input hidden type="text" id="job_id" name="job_id" value="{{$job->id}}">
                                    <input hidden type="text" id="designer_id" name="designer_id" value="{{$job->designer_id}}">
                                    <input hidden type="text" id="user_id" name="user_id" value="{{$job->user_id}}">
                                  
                                       
                                     
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                

                </div>
            </div>
        </div>
        </div>
        
       
       

    </div>
    
    <div class="shadow-sm bg-whte mt-3">
        <div class="row">
            <div class="container d-none d-md-block">
        
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
                @elseif($job->jobstatus_id == '6')
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
                                    <h5 style="color:#C4C4C4;">ส่งมอบงาน</h5> <br>
                                    <p style="color:#C4C4C4;">ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="active">
                                <div class="step">5</div>
                                <div class="caption hidden-xs hidden-sm">
                                    <h5 style="color:#C4C4C4;">เสร็จสิ้นงาน</h5> <br>
                                    <p style="color:#C4C4C4;">ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div>
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
                                    <p >ตรวจสอบงาน</p>
                                </div>
                            </li>
                            <li class="active">
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
                                    <h5  >เสร็จสิ้นงาน</h5> <br>
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
                                    <p >นักออกแบบรับงานแล้ว</p>
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
                        <div class="process-job shadow-sm p-3 p-md-5">
                           <div class="form-row mt-5 ">
                               <div class="col-12 col-md-7">
                                @php
                                $jobstatusid = \App\Jobstatus::find($job->jobstatus_id)->statusName;
                                 @endphp
                                
                                    <h4 class="text-center text-md-left">สถานะการจ้างงาน : <label class="_hilight">&nbsp;&nbsp;{{$jobstatusid}}</label></h4>
                        
                                <div class="row">       
                                    <div class="col-2"></div>  
                                    <div class="col-10 " style="padding-left:45px;">
                                        @if ($job->jobstatus_id == 6)
                                        <p class="text-md-left text-danger"><i class="fas fa-edit"></i> {{$job->editorcomment}}</p>
    
                                        @endif
                                    </div>                             
                           
                                  
                                </div>
                               </div>
                               <div class="col-12 col-md-5">
                                <div class="float-right d-md-flex col-12">
                                    @if ($job->jobstatus_id == 1)
                                        <button type="button" class="btn _primary-btn m-1 btn-lg btn-block" onclick="addCart('2')" data-toggle="modal" data-target="#exampleModal">รับงาน</button>
                                        <button type="button"class="btn _secondary-btn m-1 btn-lg btn-block" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                                    @elseif ($job->jobstatus_id == 4)
                                        <button type="button" class="btn _primary-btn m-1 btn-lg btn-block" onclick="addCart('3')" data-toggle="modal" data-target="#exampleModal">รับงาน</button>
                                        <button type="button"class="btn _secondary-btn m-1 btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                                    @elseif ($job->jobstatus_id == 3)
                                        <button type="button" class="btn _primary-btn m-1 btn-lg btn-block" onclick="addCart('7')" data-toggle="modal" data-target=".bd-example-modal-lg">อัพโหลดไฟล์</button>
                                        {{-- <button type="button"class="btn _secondary-btn m-1" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button> --}}
                                    @elseif ($job->jobstatus_id == 6)
                                    <button type="button" class="btn _primary-btn m-1 btn-lg" onclick="addCart('7')" data-toggle="modal" data-target=".bd-example-modal-lg">อัพโหลดไฟล์</button>

                                    @endif
                                   
                                   </div>
                               </div>
                            
                           </div>
                           
                           
                        </div>
                        {{-- <input type="button" name="next" class=" next  _primary-btn " value="แจ้งชำระเงิน"  />
                        <input type="button" name="previous" class=" previous _secondary-btn " value="ยกเลิกงาน"/> --}}
                    </fieldset>
                    
                    
                </form>
                <div class="container-fluid bg-white">
                    <div class="row">
                        <div class="col-12 col-md-6 p-3 p-md-5">
                            <h4 class="font-weight-bold">ข้อมูลผลิตภัณฑ์</h4>
                           <hr>
                           <h5 class="font-weight-bold">บรรจุภัณฑ์ประเภท</h5>
                        <h5 >{{ $job->categories}}</h5>
                           <h5 class="font-weight-bold mt-3">รูปภาพผลิตภัณฑ์เดิม</p>
                           <div class="row mt-3">
                            <div class="col-6 col-md-4 " >
                                @if ($job->productPic !== NULL)

                                   <a class="image-popup-vertical-fit" href="/{{$job->productPic}}">
                                        <img class="rounded" style="width:100%; height:100px; object-fit:cover;" src="/{{$job->productPic}}" alt="">
                                    </a>
                                @else
                                    <p class="text-secondary" style="opacity:0.5;">ไม่มีรูปภาพ</p>

                                @endif

                               </div>
                               {{-- <div class="col-6 col-md-4 mt-3">
                                <img class="rounded" src="/{{$job->productPic}}" alt="">
                               </div>
                               <div class="col-6 col-md-4 mt-3">
                                <img class="rounded" src="/{{$job->productPic}}" alt="">
                               </div> --}}
                               
                               
                           </div>
                           <h5 class=" mt-3 over-wrah5 font-weight-bold">URL : <a href="{{$job->url}}" target="_blank"><small>{{$job->url}}</small></a></p>
                      
                           <h4 class="font-weight-bold mt-5">รูปภาพตัวอย่างงาน</h3>
                           <hr>
                           <h5 class="mt-3 font-weight-bold">รูปภาพงานใกล้เคียงกับงาน</h5>
                           <div class="row ">
                            @if ($job->refpicbyUser !== NULL)

                            <div class="col-6 col-md-4 mt-3">

                                <a class="image-popup-vertical-fit" href="/{{$job->refpicbyUser}}">

                             <img class="rounded" style="width:100%; height:100px; object-fit:cover;" src="/{{$job->refpicbyUser}}" alt="">
                                </a>
                            </div>

                                @elseif($job->refpicbyUser == NULL && $job->reference == NULL)
                                <div class="col-6 col-md-4 mt-3">

                                <p class="text-secondary" style="opacity:0.5;">ไม่มีรูปภาพ</p>


                            </div>
                            @endif

                                @php
                                $refs = \App\References::find($job->reference);
                            @endphp
                                @foreach ($refs as $ref)
                                <div class="col-6 col-md-4 mt-3">
                                   
                                    
                                    <a class="image-popup-vertical-fit" href="{{$ref->img}}" target="_blank">

                                 <img class="rounded " style="width:100%; height:100px; object-fit:cover;"  src="{{$ref->img}}" alt="">
                                    </a>
                              
                                </div>
                                @endforeach
                                
                                {{-- <div class="col-6 col-md-4 mt-3">
                                    <img class="rounded" src="/{{$job->refpicbyUser}}" alt="">
                                   </div>
                                   <div class="col-6 col-md-4 mt-3">
                                    <img class="rounded" src="/{{$job->refpicbyUser}}" alt="">
                                   </div> --}}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 p-3 p-md-5">
                            <h4 class="font-weight-bold">ข้อมูลงานที่ต้องการ</h4>
                            <hr>
                            <h5 class="font-weight-bold">รายละเอียด</h5>
                            <h5 class="over-wrap">{{ $job->requirement}}</h5>
                                    <h5 class="mt-3 font-weight-bold">ลักษณะหรือสไตล์งานที่ต้องการ</h5>
                                   
                                    {{-- {{ $job->tags}} --}}
                                    @foreach($job->tags as $tagn)
                
                                    @php
                                         $tagname = \App\Tags::find($tagn)->tagName;
                                     @endphp
                                        <div class="btn box-tagse border" >{{$tagname}}</div>
                
                                    @endforeach
                                    
                                    <h4 class="font-weight-bold mt-5">ขอบเขตการจ้างงาน</h4>
                                    <hr>
                                    <div class="row">
                                    <div class="col-12 mt-3">
                                            <h5 class="font-weight-bold"> ขอบเขตการจ้างงาน</h5>
                                            <p>
                                                @if ($job->package !== NULL)
                                            {{$job->package}}
                                        @else 
                                            -
                                        @endif
                                                ({{number_format($job->pricerate)}})</p>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-12 mt-3">
                                            <h5 class="font-weight-bold">วันที่ต้องการงาน</h5>
                                            <p>{{date('F d,Y',strtotime($job->finishdate))}}</p>
                                        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

<script>
    // Get the modal
    $(document).ready(function() {

        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true
            }
            
        });

        $('.image-popup-fit-width').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            image: {
                verticalFit: false
            }
        });

        $('.image-popup-no-margins').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300 // don't foget to change the duration also in CSS
            }
        });

    });
</script>
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
    output.innerHTML += '<li class="nav-link over-wrap"><i class="fas fa-file-import icon mr-5 _gray"></i>' + input.files.item(i).name + '</li>';
  }
  output.innerHTML += '</ul>';
}

</script>
<script src="{{asset('js/file-upload-with-preview.js')}}"></script>
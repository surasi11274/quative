@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="../css/_showjob.css">
@endsection
@section('content')
<div class="container">
    <div class="_black-bg mt-5 p-3 p-md-5">
        <div class="row">
            <div class="col-12 col-md-6 ">
            <h3 class="content-bg mb-5 d-none d-md-block" >ข้อมูลการจ้างงาน no. W{{$jobs->id}}</h3>
            <h5 class="content-bg mb-3 d-md-none font-weight-bold" >ข้อมูลการจ้างงาน no. W{{$jobs->id}}</h5>
                    <div class="row">
                        
                        <div class="col-12 ">
                            <div class="d-md-none">
                                <h6 for=""class="content-bg  font-weight-bold" >แพ็คเกจ {{number_format(round(strtotime($jobs->finishdate) - strtotime($jobs->created_at)) / (60 * 60 * 24))}} วัน</h6>
                                <label for=""class="content-bg mt-md-5" ><small>วันที่เริ่มงาน : {{date('F d,Y',strtotime($jobs->created_at))}} </small></label>
                                <label for=""class="content-bg " ><small>วันที่ต้องการงาน : {{date('F d,Y',strtotime($jobs->finishdate))}} </small>  </label>
                            </div>
                        </div>
                        <div class="col-3 col-md-3 mb-3 mt-3" >
                            @php
                            $designerpic = \App\Designer::find($jobs->designer_id)->profilepic;

                            @endphp
                            
                                <img class="rounded-circle obj-img-showjob" src="/{{$designerpic}}" alt="">
                        </div>
                        <div class="col-9 col-md-9 mb-3 mt-3">
                            

                            @php
                            $designer = \App\Designer::find($jobs->designer_id);
                            

                            @endphp
                            
                                <p class="content-bg mb-3">{{$designer->name}}</p> 
                                
                                <a style="text-decoration:none;"  href="{{route('job.Messages',$jobs->token)}}">
                                    <button class="btn _primary-bg-dark btn-lg d-none d-md-block"><i class=" far fa-comments pr-2"></i>คุยกับนักออกแบบ</button>
                                </a>
                        </div>
                        <div class="col-12 d-md-none mt-3 mb-5">
                            <a style="text-decoration:none;"  href="{{route('job.Messages',$jobs->token)}}">
                                <button class="btn _primary-bg-dark btn-lg btn-block mt-5"><i class=" far fa-comments pr-2"></i>คุยกับนักออกแบบ</button>
                            </a>
                        </div>
                    </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="text-right">
                    {{-- @foreach($jobs->jobstatus_id as $statusid) --}}

                    
                                        {{-- @if ($jobs->jobstatus_id = 1) --}}
                                        {{-- <h1 style="color:yellow;">{{$jobstatusid}}</h1> --}}

                                                        {{-- <div class="btn _primary-btn">{{$tagname}}</div> --}}

                                                    {{-- @endforeach --}}
                    {{-- @foreach($jobs->tags as $tagn)

                    @php
                                    $tagname = \App\Tags::find($tagn)->tagName;
                                @endphp
                             <div class="btn _primary-btn">{{$tagname}}</div>
                            
                                                    @endforeach --}}

                       <div class="d-none d-md-block">
                        <h3 for=""class="content-bg " >แพ็คเกจ {{number_format(round(strtotime($jobs->finishdate) - strtotime($jobs->created_at)) / (60 * 60 * 24))}} วัน</h3><br>
                        <label for=""class="content-bg mt-5" ><h5>วันที่เริ่มงาน : {{date('F d,Y',strtotime($jobs->created_at))}} </h5></label> <br>
                        <label for=""class="content-bg" ><h5>วันที่ต้องการงาน : {{date('F d,Y',strtotime($jobs->finishdate))}} </h5>  </label><br>
                       </div>
                        @if ($jobs->payment_id ==! NULL)
                        {{-- <a href="{{ route('job.payment', $jobs->token) }}"> --}}
                            <button hidden class="btn disabled _primary-btn">โอนเงิน</button>
                        {{-- </a> --}}
                        @else ($job->jobstatus_id == '2') 
                                {{-- <button type="button" class="btn disabled btn-secondary mr-5" onclick="addCart('2')" >
                                    รับงาน
                                </button> --}}
                                <a href="{{ route('job.payment', $jobs->token) }}">
                                    <button hidden class="btn _primary-btn">โอนเงิน</button>
                                </a>
                        @endif
                        {{-- <a href="{{ route('job.payment', $jobs->token) }}">
                            <button class="btn _primary-btn">โอนเงิน</button>
                        </a> --}}
                    {{-- <button hidden class="btn _primary-btn">โหลดไฟล์</button> --}}
                </div>
            </div>
            
        </div>
            {{-- @php
                //  $json = $jobs->file;

                // $convert = json_decode($json);
                // $convert = json_decode($json, true);
            @endphp --}}

            {{-- @foreach($convert as $files) --}} 
            

                {{-- @endif  --}}

                {{-- @foreach ($jobs->file['0'] as $files)
                <h1>{{$files}}</h1> 
             @endforeach --}}
        
       
       

    </div>
    {{-- <p>{{$jobs->id}}</p>

    <p>{{$jobs->jobstatus_id}}</p> --}}

    
    <div class="shadow-sm bg-white mt-3 ">
        <div class="row">
            <div class="container d-none d-md-block ">
                @if ($jobs->jobstatus_id == 1)
                <div class="text-center  p-5">
                    <div id="wizard-progress">
                        <ol class="step-indicator">
                            <li class="complete">
                                <div class="step">1</div>
                                <div class="caption hidden-xs hidden-sm"> 
                                    <h5>เริ่มจ้างงาน</h5> <br>
                                    <p class="complete">นักออกแบบรับงานแล้ว</p>
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
                @elseif ($jobs->jobstatus_id == 2)
                <div class="text-center  p-5">
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
                                    <p class="complete">ตรวจสอบการชำระเงิน</p>
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
                @elseif($jobs->jobstatus_id == '3')
                <div class="text-center  p-5">
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
                @elseif($jobs->jobstatus_id == '4')
                <div class="text-center  p-5">
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
                @elseif($jobs->jobstatus_id == '5')
                <div class="text-center  p-5">
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
                @elseif($jobs->jobstatus_id == '6')
                <div class="text-center  p-5">
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
                @elseif($jobs->jobstatus_id == '7')
                <div class="text-center  p-5">
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
                @elseif($jobs->jobstatus_id == '8')
                <div class="text-center  p-5">
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
                                    <h5  class="_hilight">เสร็จสิ้นงาน</h5> <br>
                                    <p  style="color:#C4C4C4;">ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div>
                @elseif($jobs->jobstatus_id == '9')
                <div class="text-center  p-5">
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
                @elseif($jobs->jobstatus_id == '10')
                <div class="text-center  p-5">
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
                {{-- <form action="" class="multi-step-status"> --}}
                    {{-- 1 --}}
                    {{-- @if ($jobs->jobstatus_id == '1')  --}}
                     <div class="process-job shadow-sm p-3 p-md-5">
                          
                           <div class="form-row mt-5">
                                <div class="col-12 col-md-8">
                                    @php
                                        $jobstatusid = \App\Jobstatus::find($jobs->jobstatus_id)->statusUserName;
                                    @endphp

                                    <h4 class="text-center text-md-left">สถานะปัจจุบัน : <label class="_hilight">&nbsp;&nbsp;{{$jobstatusid}}</label></h4>
                               </div>
                               <div class="col-12 col-md-3">
                                <div class="float-right d-md-flex col-12 mr-md-5">
                                    @if ($jobs->jobstatus_id == 1)
                                        <button type="button" class="btn disabled _btn-dis m-1 btn-lg btn-block" >แจ้งชำระเงิน</button>
                                        <button type="button"class="btn _secondary-btn m-1 btn-lg btn-block" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                                    @elseif ($jobs->jobstatus_id == 2)
                                        <a href="{{ route('job.showpayment', $jobs->token) }}" style="text-decoration:none;">
                                            <button type="button" class="btn _primary-btn mr-1 btn-lg btn-block" >แจ้งชำระเงิน</button>
                                        </a>
                                        <button type="button" class="btn _secondary-btn ml-1 btn-lg btn-block" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                                    @elseif ($jobs->jobstatus_id == 7)
                          

                                               
                        
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <button type="button" class="btn _primary-black m-1 btn-lg btn-block w-auto" style="height:50px;" onclick="addCart('6')" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-undo-alt"></i></button>

                                                                </div>
                                                                <div class="col-9">
                                                                    <button type="button" class="btn _primary-btn m-1 btn-lg btn-block w-auto" style="height:50px;" onclick="addCart('8')" data-toggle="modal" data-target="#exampleModal">รับมอบงานสำเร็จ</button>

                                                                </div>
                                                            </div>    
                                                           
                                                             
                                       
                                        {{-- <button class="btn _secondary-btn m-1">ดาวน์โหลดไฟล์</button> --}}
                                    @elseif ($jobs->jobstatus_id == 8)
                                    <button type="button" class="btn _primary-btn m-1 btn-lg btn-block" onclick="addCart2('9')" data-toggle="modal" data-target=".bd-example-modal-lg">เสร็จสิ้นงาน</button>
        
                                    @endif
        
        
                                    
                                   
                                   </div>
                               </div>

                                

                                


                               


                               </div>
                               
                           
                               <div class="row mt-3 mr-5 " >
                                   <div class="col"></div>
                                   <div class="col" style="text-align:right; ">
                                    @if ($jobs->jobstatus_id == 7)

                                    
                                    

                                    @foreach ($jobfile as $jobf)
                                        @php
                                            $filename = \App\Jobfiles::find($jobf)->fileimgname;
                                            $fileartname = \App\Jobfiles::find($jobf)->fileartworkname;
                                        @endphp 
                                
                                    {{-- <img src="/{{$filename}}" class="d-block w-100" height="100px" alt="..."> --}}
                                           
                                                @if ($filename != NULL)
                                                    <a href="/{{$filename}}" class="btn _secondary-btn w-auto ml-1 mt-3" style="height:50px;"  download="/{{$filename}}">
                                                        <i class="fas fa-download " style="color:black; "></i><p>ไฟล์รูปภาพ</p>
    
                                                    </a>
    
                                                @endif
                                            
                                                @if ($fileartname != NULL)

                                                    <a href="/{{$fileartname}}" class="btn _secondary-btn w-auto ml-1 mt-3" style="height:50px;" download="/{{$fileartname}}">
                                                        <i class="fas fa-download " style="color:black;"></i><p>ไฟล์งาน</p>
                                                    </a>

                                                 @endif


                                        
                                    
                                    

                                @endforeach
                                @if ($jobs->filelinks !== NULL)
                                <p class="mt-5 font-weight-bold">ลิงค์สำหรับดาวน์โหลดไฟล์เพิ่มเติม</p>
                                    <a href="{{$jobs->filelinks}}">
                                        <p style="color:#523EE8;">{{$jobs->filelinks}}</p>
                                    </a>
                                    @endif
                               @endif
                                   </div>
                                
                            </div>
                           
                           
                        </div>
                    {{-- @endif --}}
                        {{-- <input type="button" name="next" class=" next  _primary-btn " value="แจ้งชำระเงิน"  />
                        <input type="button" name="previous" class=" previous _secondary-btn " value="ยกเลิกงาน"/> --}}
                    {{-- 2 --}}
                                           {{-- <div class="process-job shadow-sm p-5">
                            <h3>เลือกสถานะของการจ้างงาน <i class="fas fa-angle-right"></i></h3>
                           <div class="d-flex">
                            <h5>สถานะปัจจุบัน : </h5><h3 class="_hilight">&nbsp;&nbsp;ชำระเงิน</h3>
                           </div>
                           <div class="float-right">
                           
                           </div>
                        
                        </div> --}}
                        {{-- <input type="button" name="next" class=" next  _primary-btn " value="แจ้งชำระเงิน"  />
                            <input type="button" name="previous" class=" previous _secondary-btn " value="ยกเลิกงาน"/> --}}
                        
                    {{-- 3 --}}
                                            {{-- <div class="process-job shadow-sm p-5">
                            <h3>เลือกสถานะของการจ้างงาน <i class="fas fa-angle-right"></i></h3>
                           <div class="d-flex">
                            <h5>สถานะปัจจุบัน : </h5><h3 class="_hilight">&nbsp;&nbsp;ดำเนินการออกแบบ</h3>
                           </div>
                           <div class="float-right">
                            <button class=" btn _secondary-btn">อัพโหลดไฟล์</button>
                            <button class="btn _primary-btn">รับมอบงานสำเร็จ</button>
                           
                           </div>
                        
                        </div> --}}
                        {{-- <input type="input" name="previous" class=" previous _secondary-btn  " value="อัพโหลดไฟล์"/>
                        <input type="button" name="next" class=" next  _primary-btn " value="รับมอบงานสำเร็จ"  /> --}}
                    {{-- 4 --}}
                                            {{-- <div class="process-job shadow-sm p-5">
                            <h3>เลือกสถานะของการจ้างงาน <i class="fas fa-angle-right"></i></h3>
                           <div class="d-flex">
                            <h5>สถานะปัจจุบัน : </h5><h3 class="_hilight">&nbsp;&nbsp;ส่งมอบงาน</h3>
                           </div>
                           <div class="float-right">
                            <button class="btn _secondary-btn">ดาวน์โหลดไฟล์</button>
                            <button type="button" class="btn _primary-btn" onclick="addCart('8')" data-toggle="modal" data-target="#exampleModal">รับมอบงานสำเร็จ</button>
                           </div>
                        
                        </div> --}}
                        {{-- <input type="input" name="previous" class=" previous _secondary-btn  " value="ดาวน์โหลดไฟล์"/>
                        <input type="button" name="next" class=" next  _primary-btn " value="รับมอบงานสำเร็จ"  /> --}}
                    {{-- 5 --}}
                                            {{-- <div class="process-job shadow-sm p-5">
                            <h3>เลือกสถานะของการจ้างงาน <i class="fas fa-angle-right"></i></h3>
                           <div class="d-flex">
                            <h5>สถานะปัจจุบัน : </h5><h3 class="_hilight">&nbsp;&nbsp;เสร็จสิ้นงาน</h3>
                           </div>
                           <div class="float-right">
                           </div>
                        
                        </div> --}}
                       
                        {{-- <input type="submit" name="next" class=" next  _primary-btn" value="เสร็จสิ้นงาน"  /> --}}
                {{-- </form> --}}
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 p-3 p-md-5"> 
                            <h4 class="font-weight-bold ">ข้อมูลผลิตภัณฑ์ของคุณ</h4>
                            
                           <hr>
                           <h5 class="font-weight-bold">บรรจุภัณฑ์ประเภท</h5>
                            <p >{{ $jobs->categories}}</p>
                           <h5 class="mt-3 font-weight-bold">รูปภาพผลิตภัณฑ์เดิมของคุณ</h5>
                           <div class="row">
                               <div class="col-6 col-md-4 " >
                                @if ($jobs->productPic !== NULL)

                                   <a class="image-popup-vertical-fit" href="/{{$jobs->productPic}}">
                                        <img class="rounded" style="width:100%; height:100px; object-fit:cover;" src="/{{$jobs->productPic}}" alt="">
                                    </a>
                                @else
                                    <p class="text-secondary" style="opacity:0.5;">ไม่มีรูปภาพ</p>

                                @endif

                               </div>
                               {{-- <div class="col-6 col-md-4 mt-3">
                                <img class="rounded" src="/{{$jobs->productPic}}" alt="">
                               </div>
                               <div class="col-6 col-md-4 mt-3">
                                <img class="rounded" src="/{{$jobs->productPic}}" alt="">
                               </div> --}}
                           </div>
                           <h5 class=" mt-3 over-wrah5 font-weight-bold">URL : <a href="{{$jobs->url}}" target="_blank"><small>{{$jobs->url}}</small></a></p>
                            <h4 class="mt-5 font-weight-bold">รูปภาพตัวอย่างงาน</h4>
                           <hr>
                           <h5 class="mt-3 font-weight-bold">รูปภาพงานใกล้เคียงกับงาน</h5>
                           <div class="row ">
                            @if ($jobs->refpicbyUser !== NULL)

                                <div class="col-6 col-md-4 mt-3">

                                    <a class="image-popup-vertical-fit" href="/{{$jobs->refpicbyUser}}">

                                 <img class="rounded" style="width:100%; height:100px; object-fit:cover;" src="/{{$jobs->refpicbyUser}}" alt="">
                                    </a>
                                    @elseif($jobs->refpicbyUser == NULL && $jobs->reference == NULL)
                                    <p class="text-secondary" style="opacity:0.5;">ไม่มีรูปภาพ</p>


                                </div>
                                @endif

                                @php
                                    $refs = \App\References::find($jobs->reference);
                                @endphp
                              @if ($jobs->reference !== NULL)
                                  
                                @foreach ($refs as $ref)
                                <div class="col-6 col-md-4 mt-3">
                                
                                
                                        
                                        <a class="image-popup-vertical-fit" href="{{$ref->img}}">

                                    <img class="rounded" style="width:100%; height:100px; object-fit:cover;" src="{{$ref->img}}" alt="">
                                        </a>
                                    
                                </div>
                                @endforeach
                                
                               @endif

                                
                                {{-- <div class="col-6 col-md-4 mt-3">
                                    <img class="rounded" src="/{{$jobs->refpicbyUser}}" alt="">
                                </div>
                                <div class="col-6 col-md-4 mt-3">
                                    <img class="rounded" src="/{{$jobs->refpicbyUser}}" alt="">
                                </div> --}}
                            </div>
                            

                                {{-- <div class="col-6 col-md-4 mt-3">
                                    <img class="rounded" src="/{{$jobs->refpicbyUser}}" alt="">
                                </div>
                                <div class="col-6 col-md-4 mt-3">
                                    <img class="rounded" src="/{{$jobs->refpicbyUser}}" alt="">
                                </div> --}}
                            
                        </div>
                        <div class="col-12 col-md-6 p-3 p-md-5">
                            <h4 class="font-weight-bold">ข้อมูลงานที่ต้องการ</h4>
                            <hr>
                          
                            <h5 class="font-weight-bold">รายละเอียด</h5>
                         
                            <p class="mt-2 over-wrap">{{ $jobs->requirement}}</p>
                          
                        
                        
                         
                                    <h5 class="font-weight-bold mt-3">ลักษณะหรือสไตล์งานที่ต้องการ</h5>
                                    @foreach($jobs->tags as $tagn)
            
                                    @php
                                                    $tagname = \App\Tags::find($tagn)->tagName;
                                    @endphp
                                                                        <div class="btn box-tagse border">{{$tagname}}</div>
            
                                    @endforeach
                                    <h4 class="font-weight-bold mt-5">ขอบเขตการจ้างงาน</h4>
                                    {{-- <hr> --}}
                                    <div class="row">
                                    <div class="col-12 mt-3">
                                            <h5 class="font-weight-bold"> ขอบเขตการจ้างงาน</h5>
                                            <p>
                                                @if ($jobs->package !== NULL)
                                            {{$jobs->package}}
                                        @else 
                                            -
                                        @endif
                                                ({{number_format($jobs->pricerate)}})</p>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-12 mt-3">
                                            <h5 class="font-weight-bold">วันที่ต้องการงาน</h5>
                                            <p>{{date('F d,Y',strtotime($jobs->finishdate))}}</p>
                                        </div>
                                </div>

                                    <div class="text-right">
                                        {{-- <button type="button"  class="btn _secondary-btn" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                                            <button type="button"  class="btn _primary-black" onclick="addCart('9')" data-toggle="modal" data-target=".bd-example-modal-lg">
                                              เสร็จสิ้นงาน
                                            </button> --}}
                                    </div>
                                    
                        </div>
                        {{--  --}}
                        @if ($jobs->jobstatus_id == 7)
                        <form action="/showjob/store" method="post" enctype="multipart/form-data">
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
                                <div >
                                    <small class="text-danger" for="">*ความคิดเห็น หรือ เหตุผลที่ส่งงานกลับไปแก้ไข</small class="text-warning">
                                    <textarea class="form-control mt-3" name="editorcomment" id="" cols="30" rows="4" placeholder="ความคิดเห็นของคุณจะช่วยพัฒนางานของนักออกแบบให้ดีมากขึ้นในครั้งต่อไป" ></textarea>
                                </div>

                            <input type="hidden" id="output" name="jobstatus_id">
                            <input type="hidden" id="job_id" name="job_id" value="{{$jobs->id}}">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary" style="background-color:black;">ยืนยันการทำรายการ</button>
            
                            </div>
                        </div>
                        </div>
                        </div>
            
                        </form>
                        @else 
                        <form action="/showjob/store" method="post" enctype="multipart/form-data">
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
                            <input type="hidden" id="job_id" name="job_id" value="{{$jobs->id}}">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary" style="background-color:black;">ยืนยันการทำรายการ</button>
            
                            </div>
                        </div>
                        </div>
                        </div>
            
                        </form>
                        @endif
                        
                        
                        <form action="/showjob/store2" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
            
                                    {{-- <div class="modal-header " >
                                        <div class="row">
            
                                        </div>
                                        <h4 class="modal-title text-center"  id="myLargeModalLabel">คุณต้องการเสร็จสิ้นงานใช่ไหม?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div> --}}
                                    <div class="modal-body text-center">
                                        <div class="container">
                                            
                                            {{-- <hr> --}}
                                            <h1 class="modal-title  _hilight mt-5 mb-5">ช่วยนักออกแบบสร้าง Profile</h1>
                                            <span>นักออกแบบสามารถนำผลงานของคุณไปแสดงในโปรไฟล์เพื่อ
                                             ช่วยสร้าง Portfolio บนเว็บไซต์เราได้หรือไม่</span>
                 
                                             <div class="row  ">
                                                 <div class="col-3"></div>
                                                 <div class="col-6 mt-5 mb-5">
                                                     <input class="form-check-input" type="radio" value="1" id="defaultCheck1" name="canshow">
                                                     <label class="form-check-label _hilight" for="defaultCheck1">
                                                         อนุญาตให้นักออกแบบนำงานคุณไปแสดงในโปรไฟล์
                                                     </label>
                                                     <input class="form-check-input" type="radio" value="0" id="defaultCheck2" name="canshow">
                                                     <label class="form-check-label _hilight text-left" for="defaultCheck2" style="margin-right: 50px;">
                                                        ไม่อนุญาตให้นักออกแบบนำงานคุณไปแสดง
                                                     </label>
                                                 </div>
                                                 <div class="col-3"></div>
                 
                                                 
                                             </div>
                                             <hr>
                                            <div class="mt-5 mb-5">
                                                <button type="button" class="btn btn-secondary"  data-dismiss="modal">ยกเลิก</button>
                                                <a href="{{ route('job.review', $jobs->token) }}">
                        
                                                    <button type="submit" class="btn btn-primary" style="background-color:black;">ยืนยันการเสร็จสิ้นงาน</button>
                                                </a>
                                            </div>
                                             
                     
                                        </div>
                                        
                                        
            
                                        <input type="hidden" id="output2" name="jobstatus_id" >
                                        <input type="hidden" id="job_id" name="job_id" value="{{$jobs->id}}">
                                        
                                    </div>
                                     
                                    {{-- <div class="modal-footer text-center">
                                        
                                        </div> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                    </div> 
                </div>
            </div>
            
           
    </div>
</div>

    
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
        // document.getElementById('output1').value = v
        // document.getElementById('outputCancel').value = v


        document.getElementById('jobstatus_id').value = v
        console.log(v);
        return false;
    }
    function addCart2(v){
        document.getElementById('output2').value = v
        // document.getElementById('output1').value = v
        // document.getElementById('outputCancel').value = v


        document.getElementById('jobstatus_id').value = v
        console.log(v);
        return false;
    }

 
</script>
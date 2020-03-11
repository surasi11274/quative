@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="../css/_showjob.css">
@endsection
@section('content')
<div class="container">
    <div class="_black-bg mt_ex p-5">
        <div class="row">
            <div class="col-12 col-md-6 ">
            <h3 class="content-bg mb-5" >ข้อมูลการจ้างงาน <span>no. W0{{$jobs->id}}</span></h3>
                    <div class="row">
                        <div class="col-3">
                            @php
                            $designerpic = \App\Designer::find($jobs->designer_id)->profilepic;

                            @endphp
                                <img class="rounded-circle " src="/{{$designerpic}}" alt="">
                        </div>
                        <div class="col-9">
                            

                            @php
                            $designer = \App\Designer::find($jobs->designer_id);
                            

                            @endphp
                                <h5 class="content-bg">{{$designer->name}} &nbsp;{{$designer->surname}}</h5> 
                                <button class="btn _primary-bg-dark btn-lg">คุยกับนักออกแบบ</button>
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

                        <h3 for=""class="content-bg " >แพ็คเกจ <span>15</span> วัน</h3><br>
                        <label for=""class="content-bg mt-4" ><h5>วันที่เริ่มงาน : {{date('F d,Y',strtotime($jobs->created_at))}} </h5></label> <br>
                        <label for=""class="content-bg " ><h5>วันที่ต้องการงาน : {{date('F d,Y',strtotime($jobs->finishdate))}} </h5>  </label><br>
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
                    <button hidden class="btn _primary-btn">โหลดไฟล์</button>
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

    
    <div class="shadow-sm bg-white mt-3">
        <div class="row">
            <div class="container">
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
                {{-- @elseif($jobs->jobstatus_id == '6')
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
                                    <p>ให้คะแนนและรีวิว</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                
                </div> --}}
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
                                    <h5  style="color:#C4C4C4;">เสร็จสิ้นงาน</h5> <br>
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
                     <div class="process-job shadow-sm p-5">
                          
                           <div class="form-row mt-5">
                               <div class="col-md-9">
                                @php
                                $jobstatusid = \App\Jobstatus::find($jobs->jobstatus_id)->statusUserName;
                                 @endphp
                                <h4><span class=" icon pl-md-2 pr-md-2 user-friend"></span>สถานะปัจจุบัน : <label class="_hilight">&nbsp;&nbsp;{{$jobstatusid}}</label></h4>
                               </div>
                               <div class="col-md-3">
                                <div class="float-right d-flex">
                                    @if ($jobs->jobstatus_id == 1)
                                        <button type="button" class="btn disabled _btn-dis m-1 btn-lg" data-toggle="modal" data-target="#exampleModal">แจ้งชำระเงิน</button>
                                        <button type="button"class="btn _secondary-btn m-1 btn-lg" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                                    @elseif ($jobs->jobstatus_id == 2)
                                        <a href="{{ route('job.showpayment', $jobs->token) }}" style="text-decoration:none;">
                                            <button type="button" class="btn _primary-btn m-1 btn-lg" >แจ้งชำระเงิน</button>
                                        </a>
                                        <button type="button"class="btn _secondary-btn m-1 btn-lg" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                                    @elseif ($jobs->jobstatus_id == 7)
                          
                                                                            
                                        @foreach ($jobfile as $jobf)
                                            @php
                                                $filename = \App\Jobfiles::find($jobf)->fileimgname;
                                                $fileartname = \App\Jobfiles::find($jobf)->fileartworkname;
                                            @endphp 
                                        
                                            {{-- <img src="/{{$filename}}" class="d-block w-100" height="100px" alt="..."> --}}
                                                    @if ($filename != NULL)
                                                    
                                                    <a href="/{{$filename}}" download="/{{$filename}}">
                                                    
                                                    </a>
                                                @endif
                                         |
                                                    @if ($fileartname != NULL)
                                                    
                                                    <a href="/{{$fileartname}}" download="/{{$fileartname}}">
                                                        have a artwork file
                                                    </a>
                                                @endif
                                                
                                            
                                            
        
                                        @endforeach
                    
        
                                        {{-- <button class="btn _secondary-btn m-1">ดาวน์โหลดไฟล์</button> --}}
                                        <button type="button" class="btn _primary-btn m-1 btn-lg" onclick="addCart('8')" data-toggle="modal" data-target="#exampleModal">รับมอบงานสำเร็จ</button>
                                    @elseif ($jobs->jobstatus_id == 8)
                                    <button type="button" class="btn _primary-btn m-1 btn-lg" onclick="addCart2('9')" data-toggle="modal" data-target=".bd-example-modal-lg">เสร็จสิ้นงาน</button>
        
                                    @endif
        
        
                                    
                                   
                                   </div>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6 p-5"> 
                            <h4 class="font-weight-bold">ข้อมูลผลิตภัณฑ์ของคุณ</h4>
                           <hr>
                           <h5 class="font-weight-bold">บรรจุภัณฑ์ประเภท</h5>
                            <p class="mt-3">{{ $jobs->categories}}</p>
                           <h5 class="mt-3 font-weight-bold">รูปภาพผลิตภัณฑ์เดิมของคุณ</h5>
                           <div class="row mt-3">
                               <div class="col-4">
                                <img class="rounded" src="/{{$jobs->productPic}}" alt="">
                               </div>
                               <div class="col-4">
                                    <img class="rounded" src="/photo/@product-blue.png" alt="">
                               </div>
                               <div class="col-4">
                                    <img class="rounded" src="/photo/@product-blue.png" alt="">
                               </div>
                           </div>
                           <label for="" class=" mt-3">URL : <a href="{{$jobs->url}}" target="_blank">{{$jobs->url}}</a></label>
                           <h4 class="mt-5 font-weight-bold">รูปภาพตัวอย่างงาน</h4>
                           <hr>
                           <h4 class="mt-2 font-weight-bold">รูปภาพงานใกล้เคียงกับงาน</h4>
                           <div class="row mt-3 ">
                                <div class="col-4">
                                 <img class="rounded" src="/{{$jobs->refpicbyUser}}" alt="">
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
                            <p class="mt-2">{{ $jobs->requirement}}</p>
                                    <h5 class="font-weight-bold mt-3">ลักษณะหรือสไตล์งานที่ต้องการ</h5>
                                    <hr>
                                    @foreach($jobs->tags as $tagn)
            
                                    @php
                                                    $tagname = \App\Tags::find($tagn)->tagName;
                                    @endphp
                                                                        <div class="btn box-tagse border">{{$tagname}}</div>
            
                                    @endforeach
                                    <hr>
                                    <h4 class="font-weight-bold mt-5">ขอบเขตการจ้างงาน</h4>
                                    <hr>
                                    <div class="col-12 mt-3">
                                        <h5 class="font-weight-bold"> ขอบเขตการจ้างงาน</h5>
                                        <p>01 - งานออกแบบฉลากติดสินค้าหน้าเดียว</p>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <h5 class="font-weight-bold">วันที่ต้องการงาน</h5>
                                        <p>{{date('F d,Y',strtotime($jobs->finishdate))}}</p>
                                    </div>
                                  
                                    <div class="text-right">
                                        {{-- <button type="button"  class="btn _secondary-btn" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                                            <button type="button"  class="btn _primary-black" onclick="addCart('9')" data-toggle="modal" data-target=".bd-example-modal-lg">
                                              เสร็จสิ้นงาน
                                            </button> --}}
                                    </div>
                                    
                        </div>
                        {{--  --}}
            
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
                                            <h2 class="modal-title text-center mt-5 mb-5"  id="myLargeModalLabel">คุณต้องการเสร็จสิ้นงานใช่ไหม?</h2>
                                            <hr>
                                            <h5>ช่วยนักออกแบบสร้าง Profile</h5>
                                            <span>นักออกแบบสามารถนำผลงานของคุณไปแสดงในโปรไฟล์เพื่อ
                                             ช่วยสร้าง Portfolio บนเว็บไซต์เราได้หรือไม่</span>
                 
                                             <div class="row  ">
                                                 <div class="col-3"></div>
                                                 <div class="col-6 mt-5 mb-5">
                                                     <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="canshow">
                                                     <label class="form-check-label" for="defaultCheck1">
                                                         อนุญาตให้นักออกแบบนำงานคุณไปแสดงในโปรไฟล์
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
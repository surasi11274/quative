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
                            $designer = \App\Designer::find($jobs->designer_id)->name;

                        @endphp
                                <p class="content-bg">{{$designer}}</p> 
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
                        <label for=""class="content-bg" >วันที่เริ่มงาน :<span> {{ $jobs->updated_at}} </span></label> <br>
                        <label for=""class="content-bg" >วันที่ต้องการงาน :<span> 01 มกราคม 2563 </span>  </label><br>
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

    <hr>
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
                                <div class="complete">1</div>
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
                            <h3>เลือกสถานะของการจ้างงาน <i class="fas fa-angle-right"></i></h3>
                           <div class="d-flex">
                            {{-- @foreach () --}}
                            @php
                            $jobstatusid = \App\Jobstatus::find($jobs->jobstatus_id)->statusName;
                             @endphp
                            {{-- @if ($jobs->jobstatus_id == 1) --}}

                            <h4>สถานะปัจจุบัน : </h4><h4 class="_hilight">&nbsp;&nbsp;{{$jobstatusid}}</h4>
                            {{-- @endforeach --}}

                            {{-- @elseif ($jobs->jobstatus_id == 2)
                            <h5>สถานะปัจจุบัน : </h5><h5 class="_hilight">&nbsp;&nbsp;นักออกแบบรับงานแล้ว</h5>
                            @elseif ($jobs->jobstatus_id == 3)
                            <h5>สถานะปัจจุบัน : </h5><h3 class="_hilight">&nbsp;&nbsp;เริ่มจ้างงาน</h3>
                            @elseif ($jobs->jobstatus_id == 4)
                            <h5>สถานะปัจจุบัน : </h5><h3 class="_hilight">&nbsp;&nbsp;เริ่มจ้างงาน</h3>
                            @endif --}}
                           </div>
                           <div class="float-right d-flex">
                            @if ($jobs->jobstatus_id == 1)
                                <button type="button" class="btn disabled _primary-btn" onclick="addCart('2')" data-toggle="modal" data-target="#exampleModal">แจ้งชำระเงิน</button>
                                <button type="button"class="btn _secondary-btn" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                            @elseif ($jobs->jobstatus_id == 2)
                                <a href="{{ route('job.payment', $jobs->token) }}" style="text-decoration:none;">
                                    <button type="button" class="btn _primary-btn" >แจ้งชำระเงิน</button>
                                </a>
                                <button type="button"class="btn _secondary-btn" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                            @elseif ($jobs->jobstatus_id == 7)
                                <button class="btn _secondary-btn">ดาวน์โหลดไฟล์</button>
                                <button type="button" class="btn _primary-btn" onclick="addCart('8')" data-toggle="modal" data-target="#exampleModal">รับมอบงานสำเร็จ</button>
                            @elseif ($jobs->jobstatus_id == 8)
                            <button type="button" class="btn _primary-btn" onclick="addCart2('9')" data-toggle="modal" data-target=".bd-example-modal-lg">เสร็จสิ้นงาน</button>

                            @endif


                            
                           
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
            </div>
            <div class="col-12 col-md-6 p-5">
            <div class="col">
                {{-- @foreach ($jobs->file['3']  as $item)

                    @php
                    
                    // $json = $jobs->file;

                    // $convert = json_decode($json, true);

                    $jobsfileimg = \App\Jobfiles::find($item)->fileimgname;
                    

                    // endforeach;
                    
                    $jobsfileartwork = \App\Jobfiles::find($item)->fileartworkname;
                    

                    @endphp
                    
                                
                            <div class="row">
                                <p  >{{$jobsfileimg}}</p>
                                <p  >{{$jobsfileartwork}}</p>

                            <a href="{{route('downloadfile',$jobsfileartwork)}}" ">
                                    <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download">download</i></button>
                                </a>

                            </div>

                                
                                

                            
                @endforeach --}}
                </div>
                <div class="col">
                    {{-- <p style="color:yellow;">{{$jobsfileartwork}}</p> --}}

                </div>
                </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <h5><i class="fas fa-boxes input-icons icon "></i>ข้อมูลผลิตภัณฑ์ของคุณ</h5>
               <hr>
               <p>บรรจุภัณฑ์ประเภท</p>
            <small>{{ $jobs->categories}}</small>
               <p>รูปภาพผลิตภัณฑ์เดิมของคุณ</p>
               <div class="row">
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
               <h5>รูปภาพตัวอย่างงาน</h5>
               <hr>
               <h5>รูปภาพงานใกล้เคียงกับงาน</h5>
               <div class="row ">
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
                <h5>ข้อมูลงานที่ต้องการ</h5>
                <hr>
                <label for="">รายละเอียด</label>
                <p>{{ $jobs->requirement}}</p>
                        <h5>ลักษณะหรือสไตล์งานที่ต้องการ</h5>
                        <hr>
                        @foreach($jobs->tags as $tagn)

                        @php
                                        $tagname = \App\Tags::find($tagn)->tagName;
                                    @endphp
                                                            <div class="btn _primary-btn" style="background-color:black !important; ">{{$tagname}}</div>

                                                        @endforeach
                        <hr>
                        <h5 class="mt-5">ขอบเขตการจ้างงาน</h5>
                        <hr>
                        <p>01 - งานออกแบบฉลากติดสินค้าหน้าเดียว</p>
                        <h5>วันที่ต้องการงาน</h5>
                        <p>15 วัน (ธรรมดา)</p>
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                คุณต้องการยืนยันที่จะรับงานนี้หรือไม่?
                <input type="text" id="output" name="jobstatus_id">
                <input type="text" id="job_id" name="job_id" value="{{$jobs->id}}">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary">ยืนยันการทำรายการ</button>

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

                        <div class="modal-header " style="text-align:center;">
                        <h4 class="modal-title "  id="myLargeModalLabel">อัพโหลดไฟล์งาน</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            
                            <input type="text" id="output2" name="jobstatus_id" >
                            <input type="text" id="job_id" name="job_id" value="{{$jobs->id}}">
                            
                        </div>
                         
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <a href="{{ route('job.review', $jobs->token) }}">

                            <button type="submit" class="btn btn-primary" >ยืนยันการเสร็จสิ้นงาน</button>
                        </a>

                            </div>
                    </div>
                </div>
            </div>
        </form>

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
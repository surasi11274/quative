@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="../css/_showjob.css">
@endsection
@section('content')
<div class="container">
    <div class="_black-bg mt_ex p-5">
        <div class="row">
            <div class="col-12 col-md-6 ">
            <p  class="content-bg mb-5" >ข้อมูลการจ้างงาน <span>no. W0{{$jobs->id}}</span></p>
                    <div class="row">
                        <div class="col-3">
                                <img class="rounded-circle " src="https://picsum.photos/120" alt="">
                        </div>
                        <div class="col-9">
                            

                      
                                <p class="content-bg">{{$jobs->designer_id}}</p>
                                <button class="btn _primary-bg-dark">คุยกับนักออกแบบ</button>
                        </div>
                    </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="text-right">
                    {{-- @foreach($jobs->jobstatus_id as $statusid) --}}

                    @php
                                    $jobstatusid = \App\Jobstatus::find($jobs->jobstatus_id)->statusName;
                                @endphp
                                        @if ($jobs->jobstatus_id = 1)
                                        <h1 style="color:yellow;">{{$jobstatusid}}</h1>

                                        @endif                {{-- <div class="btn _primary-btn">{{$tagname}}</div> --}}

                                                    {{-- @endforeach --}}
                    {{-- @foreach($jobs->tags as $tagn)

                    @php
                                    $tagname = \App\Tags::find($tagn)->tagName;
                                @endphp
                             <div class="btn _primary-btn">{{$tagname}}</div>
                            
                                                    @endforeach --}}

                        <label for=""class="content-bg " >แพ็คเกจ <span>15</span> วัน</label><br>
                        <label for=""class="content-bg" >วันที่เริ่มงาน :<span> {{ $jobs->updated_at}} </span></label> <br>
                        <label for=""class="content-bg" >วันที่ต้องการงาน :<span> 01 มกราคม 2563 </span>  </label><br>
                        @if ($jobs->payment_id ==! NULL)
                        {{-- <a href="{{ route('job.payment', $jobs->token) }}"> --}}
                            <button class="btn disabled _primary-btn">โอนเงิน</button>
                        {{-- </a> --}}
                        @else ($job->jobstatus_id == '2') 
                                {{-- <button type="button" class="btn disabled btn-secondary mr-5" onclick="addCart('2')" >
                                    รับงาน
                                </button> --}}
                                <a href="{{ route('job.payment', $jobs->token) }}">
                                    <button class="btn _primary-btn">โอนเงิน</button>
                                </a>
                        @endif
                        {{-- <a href="{{ route('job.payment', $jobs->token) }}">
                            <button class="btn _primary-btn">โอนเงิน</button>
                        </a> --}}
                    <button class="btn _primary-btn">โหลดไฟล์</button>
                </div>
            </div>
            
        </div>
        <div class="row" style="background-color:green; height:1000px;"> 
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
        
       
       

    </div>
    <hr>
    <div class="card bg-whte p-5 mt-3">
        <div class="row">
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
                    <img class="rounded" src="photo/@product-blue.png" alt="">
                   </div>
                   <div class="col-4">
                        <img class="rounded" src="photo/@product-blue.png" alt="">
                   </div>
                   <div class="col-4">
                        <img class="rounded" src="photo/@product-blue.png" alt="">
                   </div>
               </div>
               <label for="" class=" mt-3">URL : <small>{{$jobs->url}}</small></label>
               <h5>รูปภาพตัวอย่างงาน</h5>
               <hr>
               <h5>รูปภาพงานใกล้เคียงกับงาน</h5>
               <div class="row">
                    <div class="col-4">
                     <img class="rounded" src="photo/@product-8.png" alt="">
                    </div>
                    <div class="col-4">
                         <img class="rounded" src="photo/@product-8.png" alt="">
                    </div>
                    <div class="col-4">
                         <img class="rounded" src="photo/@product-8.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
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
                                                            <div class="btn _primary-btn">{{$tagname}}</div>

                                                        @endforeach
                        <hr>
                        <h5 class="mt-5">ขอบเขตการจ้างงาน</h5>
                        <hr>
                        <p>01 - งานออกแบบฉลากติดสินค้าหน้าเดียว</p>
                        <h5>วันที่ต้องการงาน</h5>
                        <p>15 วัน (ธรรมดา)</p>
                        <div class="text-right">
                            <button type="button"  class="btn _secondary-btn" onclick="addCart('0')" data-toggle="modal" data-target="#exampleModal">ยกเลิกงาน</button>
                                <button type="button"  class="btn _primary-black" onclick="addCart('9')" data-toggle="modal" data-target="#exampleModal">
                                  เสร็จสิ้นงาน
                                </button>
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
                <a href="{{ route('job.review', $jobs->token) }}">
                    <button type="submit" class="btn btn-primary">ยืนยันรับงาน</button>
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

 
</script>
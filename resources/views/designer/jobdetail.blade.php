@extends('layouts.app')

@section('content')
@foreach ($jobs as $job)

<div class="container">
    <div class="_black-bg mt_ex p-5">

        <div class="row">
            <div class="col-12 col-md-6 ">

                    
            <p  class="content-bg mb-5" >ข้อมูลการจ้างงาน <span>no. W0{{$job->id}}</span></p>

                    <div class="row">
                        <div class="col-3">
                                <img class="rounded-circle " src="https://picsum.photos/120" alt="">
                        </div>
                        <div class="col-9">
                            

                      
                                <p class="content-bg">{{$job->designer_id}}</p>
                                <button class="btn _primary-bg-dark">คุยกับนักออกแบบ</button>
                        </div>
                    </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="text-right">
                        <label for=""class="content-bg " >แพ็คเกจ <span>15</span> วัน</label><br>
                        <label for=""class="content-bg" >วันที่เริ่มงาน :<span> {{ $job->updated_at}} </span></label> <br>
                        <label for=""class="content-bg" >วันที่ต้องการงาน :<span> 01 มกราคม 2563 </span>  </label><br>
                        <button class="btn _primary-btn">โอนเงิน</button>
                    <button class="btn _primary-btn">โหลดไฟล์</button>
                </div>
            </div>
        </div>
        
       
       

    </div>
    <hr>
    <div class="card bg-whte p-5 mt-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <h5><i class="fas fa-boxes input-icons icon "></i>ข้อมูลผลิตภัณฑ์ของคุณ</h5>
               <hr>
               <p>บรรจุภัณฑ์ประเภท</p>
            <small>{{ $job->categories}}</small>
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
               <label for="" class=" mt-3">URL : <small>{{$job->url}}</small></label>
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
                <p>{{ $job->requirement}}</p>
                        <h5>ลักษณะหรือสไตล์งานที่ต้องการ</h5>
                        <hr>
                        {{-- {{ $job->tags}} --}}
                        @foreach($job->tags as $tagn)

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
                                <button class="btn _secondary-btn">ยกเลิกงาน</button>
                                <button class="btn _primary-black">เสร็จสิ้นงาน</button>
                        </div>
                        
            </div>

            {{--  --}}


        </div>
    </div>
</div>
@endforeach


@endsection
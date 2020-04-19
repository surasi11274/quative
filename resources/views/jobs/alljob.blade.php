@extends('layouts.app')

@section('content')

<div class="container " >
  <div class="row ml-1 mb-3">
    <h3 class="mt-5">การจ้างงาน</h3>
  </div>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  
   

     <table class="table table-hover table-borderless table-striped">

        <thead class="">
          <tr class="text-center">

            <th scope="col">รหัสการจ้าง</th>
            <th scope="col">ราคาแพ็คเกจ</th>
            {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
            <th scope="col">วันที่ต้องการงาน</th>
            <th scope="col">สถานะการทำงาน</th>
            <th scope="col">สถานะการชำระเงิน</th>
            <th scope="col">Action</th>

           
          </tr>
        </thead>

        <tbody class="table-light">
            
         @foreach ($jobs as $job)
         @if ($job->jobstatus_id !== NULL ) 

        
          
           {{-- <button class="btn "> --}}
           <tr  class="text-center">

            <td class="pt-4 pb-4"><a href="#">
              <p class="_hilight font-weight-bold">W{{$job->id}}</p>
            
           </td>
            <td class="pt-4 pb-4">{{number_format($job->pricerate)}}</td>
            {{-- <td class="pt-4 pb-4">{{$job->finishdate}}</td> --}}
            <td class="pt-4 pb-4">{{date('F d,Y',strtotime($job->finishdate))}}</td>
            {{-- @foreach ($job->jobstatus_id as $item) --}}
            @php
            $jobstatusid = \App\Jobstatus::find($job->jobstatus_id)->statusUserName;
             @endphp
            <td class="pt-4 pb-4 _hilight">{{$jobstatusid}}</td>
            {{-- @endforeach --}}
            <td class="pt-4 pb-4"><span class="text-warning">●  </span>
             @if ($job->payment_id ==! NULL)
             ชำระเงินแล้ว
             @else
             ยังไม่ได้ชำระเงิน

           @endif</td>
           <td>
            <a href="{{ route('job.show', $job->token) }}">
              <button type="button" class="btn _primary-btn">ตรวจสอบ</button>
             </a>
           </td>
          </tr>
         {{-- </button> --}}
          {{-- <tr >
           <td class="pt-4 pb-4"><a href="#"><button type="button" class="btn _primary-btn">No. W0003</button></a></td>
           <td class="pt-4 pb-4">15 วัน</td>
           <td class="pt-4 pb-4">25 / 12 / 2562</td>
           <td class="pt-4 pb-4">01 / 01 / 2563</td>
           <td class="pt-4 pb-4 _hilight">●   เสร็จสิ้นงาน</td>
           <td class="pt-4 pb-4"><span class="text-success">●  </span>ชำระเงินแล้ว</td>
         </tr>
         <tr >
           <td class="pt-4 pb-4"><a href="#"><button type="button" class="btn _primary-btn">No. W0003</button></a></td>
           <td class="pt-4 pb-4">15 วัน</td>
           <td class="pt-4 pb-4">25 / 12 / 2562</td>
           <td class="pt-4 pb-4">01 / 01 / 2563</td>
           <td class="pt-4 pb-4 _hilight">●   ตรวจสอบ การชำระเงิน</td>
           <td class="pt-4 pb-4"><span class="text-warning">●  </span>ตรวจสอบ</td>
         </tr> --}}
         @endif

         @endforeach


        
        </tbody>

      </table>

</div> <!-- endnav -->

{{-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
 <table class="table table-hover">

   <thead class="">
     <tr>

       <th scope="col">รหัสการจ้าง</th>
       <th scope="col">แพ็คเกจ</th>
       <th scope="col">วันที่เริ่มงาน</th>
       <th scope="col">วันที่ต้องการงาน</th>
       <th scope="col">สถานะการทำงาน</th>
       <th scope="col">สถานะการชำระเงิน</th>
      
     </tr>
   </thead>

   <tbody class="table-light">

     <tr >
       <td class="pt-4 pb-4"><a href="#"><button type="button" class="btn _primary-btn">No. W0003</button></a></td>
       <td class="pt-4 pb-4">15 วัน</td>
       <td class="pt-4 pb-4">25 / 12 / 2562</td>
       <td class="pt-4 pb-4">01 / 01 / 2563</td>
       <td class="pt-4 pb-4"  style="color:#c4c4c4;">●   ยกเลิกงาน</td>
       <td class="pt-4 pb-4" ><span class="text-warning">●  </span>ยังไม่ได้ชำระเงิน</td>
     </tr>
     <tr >
      <td class="pt-4 pb-4"><a href="#"><button type="button" class="btn _primary-btn">No. W0003</button></a></td>
      <td class="pt-4 pb-4" >15 วัน</td>
      <td class="pt-4 pb-4">25 / 12 / 2562</td>
      <td class="pt-4 pb-4">01 / 01 / 2563</td>
      <td class="pt-4 pb-4 _hilight">●   เสร็จสิ้นงาน</td>
      <td class="pt-4 pb-4"><span class="text-success">●  </span>ชำระเงินแล้ว</td>
    </tr>
    <tr >
      <td class="pt-4 pb-4"><a href="#"><button type="button" class="btn _primary-btn">No. W0003</button></a></td>
      <td class="pt-4 pb-4">15 วัน</td>
      <td class="pt-4 pb-4">25 / 12 / 2562</td>
      <td class="pt-4 pb-4">01 / 01 / 2563</td>
      <td class="pt-4 pb-4 _hilight">●   เสร็จสิ้นงาน</td>
      <td class="pt-4 pb-4"><span class="text-success">●  </span>ชำระเงินแล้ว</td>
    </tr>
     

   
   </tbody>

 </table>

 </div> --}}
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
      ...
     </div>


</div>

</div>

@endsection

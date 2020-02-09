@extends('layouts.app')

@section('content')
<div class="container " style="margin-top:150px; margin-bottom:150px;height:200px;">
  <div class="row ml-1 mb-3">
    <h3>การจ้างงาน</h3>
  </div>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  
   

     <table class="table table-hover table-bordered">

        <thead class="thead-dark">
          <tr>

            <th scope="col">รหัสการจ้าง</th>
            <th scope="col">แพ็คเกจ</th>
            {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
            <th scope="col">วันที่ต้องการงาน</th>
            <th scope="col">สถานะการทำงาน</th>
            <th scope="col">สถานะการชำระเงิน</th>
           
          </tr>
        </thead>

        <tbody class="table-light">
           
         @foreach ($jobs as $job)
          
        
          
           {{-- <button class="btn "> --}}
           <tr >

            <td class="pt-4 pb-4"><a href="#">
             <a href="{{ route('job.show', $job->token) }}">
              <button type="button" class="btn _primary-btn">No. W{{$job->id}}</button>
             </a>
           </td>
            <td class="pt-4 pb-4">{{$job->price}}</td>
            {{-- <td class="pt-4 pb-4">{{$job->finishdate}}</td> --}}
            <td class="pt-4 pb-4">{{$job->finishdate}}</td>
            {{-- @foreach ($job->jobstatus_id as $item) --}}
            @php
            $jobstatusid = \App\Jobstatus::find($job->jobstatus_id)->statusName;
             @endphp
            <td class="pt-4 pb-4 _hilight">{{$jobstatusid}}</td>
            {{-- @endforeach --}}
            <td class="pt-4 pb-4"><span class="text-warning"●  </span>
             @if ($job->payment_id ==! NULL)
             ชำระเงินแล้ว
             @else
             ยังไม่ได้ชำระเงิน

           @endif</td>
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
          
         @endforeach


        
        </tbody>

      </table>

</div> <!-- endnav -->

{{-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
 <table class="table table-hover">

   <thead class="thead-dark">
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

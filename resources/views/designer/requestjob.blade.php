@extends('layouts.app')

@section('content')
<div class="container " style="margin-bottom:20px;height:200px;">
    
</div>
<div class="container">
  {{-- <nav> --}}
  {{-- <div class="card text-center" style="background-color: black;">
    <div class="card-body m-auto">
      <div class="row">
        <div class="col-12 col-md-12"> --}}
          {{-- <div class="nav" id="nav-tab" role="tablist">
       
            <a class="nav-item nav-link active text-white pl-2 pr-2" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" 
        aria-selected="true">กิจกรรมการจ้างงาน</a>
     
            <a class="nav-item nav-link text-white pl-2 pr-2" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">ประวัติการจ้างงาน</a>
            <div class="dropdown pl-2 pr-2">
              <button class="btn btn-lg btn-secondary dropdown-toggle bg-white" style="color:black !important;" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ล่าสุด
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                <button class="dropdown-item" type="button">ล่าสุด</button>
                <button class="dropdown-item" type="button">เรียงตามรหัสการจ้าง</button>
                <button class="dropdown-item" type="button">เรียงตามวันที่</button>
              </div>
            </div>
            <div class="dropdown pl-2 pr-2">
              <button class="btn btn-lg btn-secondary dropdown-toggle bg-white" style="color:black !important;" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                สถานะการทำงาน
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                <button class="dropdown-item" type="button">เริ่มจ้างงาน</button>
                <button class="dropdown-item" type="button">ชำระเงิน</button>
                <button class="dropdown-item" type="button">ดำเนินการออกแบบ</button>
                <button class="dropdown-item" type="button">ส่งมอบงาน</button>
                <button class="dropdown-item" type="button">เสร็จสิ้นงาน</button>
              </div>
            </div>
            <div class="dropdown pl-2 pr-2">
              <button class="btn btn-lg btn-secondary dropdown-toggle bg-white" style="color:black !important;" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                สถานะการชำระเงิน
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu5">
                <button class="dropdown-item" type="button">ชำระเงินแล้ว</button>
                <button class="dropdown-item" type="button">ยังไม่ได้ชำระเงิน</button>
                <button class="dropdown-item" type="button">ตรวจสอบการชำระเงิน</button>
              </div>
            </div>


            
          </div> --}}
        {{-- </div>
      </div>
   </div> --}}

   {{-- </nav> --}}
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
              <a href="{{ route('designer.jobdetail', $job->id) }}">
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

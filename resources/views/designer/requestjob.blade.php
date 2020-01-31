@extends('layouts.app')

@section('content')
<div class="container " style="margin-top:150px;height:200px;">
    <table class="table">
        <thead class="thead-dark">
            <p>{{$designer->id}}</p>
          <tr>
            <th scope="col">ข้อมูลการจ้างงาน</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                
          <tr>
            <th scope="row">{{$job->id}}</th>
            <td>{{$job->user_id}}</td>
            <td>
              {{$job->jobstatus_id}}
            {{-- @php
                                    $jobstatusid = \App\Jobstatus::find($job->jobstatus_id)->statusName;
            @endphp --}}
                                        {{-- @if ($jobs->jobstatus_id = 1) --}}
                                       
                                    {{-- <h1 style="color:yellow;">{{$jobstatusid}}</h1>

                                        @endif  --}}
            </td>                   
            <td>
                <a href="{{ route('designer.jobdetail', $job->id) }}"><button class="btn btn-primary">ดูข้อมูลงาน</button></a>
                <button class="btn btn-danger">X</button>
            </td>

          </tr>
          @endforeach

        </tbody>
      </table>
</div>
<div class="container">
  <nav>
  <div class="card text-center" style="background-color: black;">
    <div class="card-body m-auto">
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="nav" id="nav-tab" role="tablist">
       
            <a class="nav-item nav-link active text-white pl-2 pr-2" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" 
        aria-selected="true">กิจกรรมการจ้างงาน</a>
     
            <a class="nav-item nav-link text-white pl-2 pr-2" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">ประวัติการจ้างงาน</a>
            {{-- 1  --}}
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
            {{-- 2  --}}
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
            {{-- 3  --}}
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


            
          </div>
        </div>
      </div>
   </div>

   </nav>
   <div class="tab-content" id="nav-tabContent">
     <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
   
    

      <table class="table">

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
             
             <td><a href="#"><button type="button" class="btn _primary-btn">No. W0003</button></a></td>
             <td>15 วัน</td>
             <td>25 / 12 / 2562</td>
             <td>01 / 01 / 2563</td>
             <td class=" _hilight">●   เรื่มจ้างงาน</td>
             <td><span class="text-warning">●  </span>ยังไม่ได้ชำระเงิน</td>
           </tr>
           

         
         </tbody>

       </table>

</div> <!-- endnav -->

 <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
     <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>


</div>

     
   </div>

@endsection

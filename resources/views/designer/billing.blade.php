@extends('layouts.app')
@section('assets')
    
@endsection
@section('content')
<section class="billing">
    <div class="container bg-white mt-5 shadow-sm pb-5">
      <div class="text-center text-md-left">
        <h5 class=" font-weight-bold pt-5 "> ภาพรวมรายรับของฉัน</h5>
        <hr>
        <div class="row mt-5">
            <div class="col-12 col-md-4">
                <p>เตรียมการโอนเงิน</p>
                <small class="_gray">รวม</small>
            <h4 class="font-weight-bold _hilight">฿{{6000}}</h4>
            </div>
            <div class="col-12 col-md-4">
                <p>รับเงินแล้วทั้งหมด</p>
                <small class="_gray">รวม</small>
            <h4 class="font-weight-bold _hilight">฿{{1000}}</h4>
            </div>
            <div class="col-12 col-md-auto">

            </div>
        </div>
      </div>
            
        
    </div>
    <div class="container bg-white mt-5 shadow-sm pb-5">
        <div class="text-center text-md-left">
            <h5 class=" font-weight-bold pt-5 "> รายละเอียดรายรับของฉัน</h5>
            <p>อัตราค่าธรรมเนียมการใช้ Quative 5% สำหรับการจ้างงานในแต่ละครั้ง </p>
            <small class="_hilight">
                หมายเหตุ: โดยคิดจากยอดการจ้างสุทธิในแต่ละการจ้างของราคาก่อนที่จะทำการโอนยอดเงินทั้งหมดเข้าไปที่นักออกแบบ
            </small>
            <ul class="nav nav-tabs p-3" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active _hilight" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">เตรียมการโอนเงิน</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">รับเงินแล้ว</a>
                </li>
                
              </ul>
              <div class="tab-content" id="myTabContent">
                  {{-- 1  --}}
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                  
                              <th scope="col">รหัสการจ้าง</th>
                              <th scope="col">วันที่</th>
                              {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                              <th scope="col">เวลา</th>
                              <th scope="col">ยอดเงินที่ได้รับ</th>
                              <th scope="col">สถานะการชำระเงิน</th>
                             
                            </tr>
                          </thead>
                          <tbody class="table-light">
                            <tr >
                                <td class="pt-4 pb-4">
                                    <a href="#">
                                        <button type="button" class="btn _primary-btn">No. 123</button>
                                        {{-- <button type="button" class="btn _primary-btn">No. W{{$job->id}}</button> --}}
                                    </a>
                                    
                                </td>
                                <td class="pt-4 pb-4">25 / 12 / 2562</td>
                                {{-- <td class="pt-4 pb-4">{{$job->price}}</td> --}}
                                <td class="pt-4 pb-4">15:20</td>
                                <td class="pt-4 pb-4 _hilight">5,000</td>
                                <td class="pt-4 pb-4">
                                    <span class="text-warning">● ยังไม่ได้ชำระเงิน</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-4 pb-4">
                                    <a href="#">
                                        <button type="button" class="btn _primary-btn">No. 124</button>
                                        {{-- <button type="button" class="btn _primary-btn">No. W{{$job->id}}</button> --}}
                                    </a>
                                    
                                </td>
                                <td class="pt-4 pb-4">25 / 12 / 2562</td>
                                {{-- <td class="pt-4 pb-4">{{$job->price}}</td> --}}
                                <td class="pt-4 pb-4">15:20</td>
                                <td class="pt-4 pb-4 _hilight">5,000</td>
                                <td class="pt-4 pb-4">
                                    <span class="text-success">● ยังไม่ได้ชำระเงิน</span>
                                </td>  
                            </tr>
                          </tbody>
                    </table>
                </div>
                {{-- 2  --}}
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                  
                              <th scope="col">รหัสการจ้าง</th>
                              <th scope="col">นักออกแบบ</th>
                              {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                              <th scope="col">เวลา</th>
                              <th scope="col">ยอดเงินที่ได้รับ</th>
                              <th scope="col">สถานะการชำระเงิน</th>
                             
                            </tr>
                          </thead>
                          <tbody class="table-light">
                            <tr >
                                <td class="pt-4 pb-4">
                                    <a href="#">
                                        <button type="button" class="btn _primary-btn">No. 123</button>
                                        {{-- <button type="button" class="btn _primary-btn">No. W{{$job->id}}</button> --}}
                                    </a>
                                    
                                </td>
                                <td class="pt-4 pb-4">นาคกรอง  สายบัว</td>
                                {{-- <td class="pt-4 pb-4">{{$job->price}}</td> --}}
                                <td class="pt-4 pb-4">15:20</td>
                                <td class="pt-4 pb-4 _hilight">5,000</td>
                                <td class="pt-4 pb-4">
                                    <span class="text-success">● ระบบโอนเงินให้นักออกแบบแล้ว</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-4 pb-4">
                                    <a href="#">
                                        <button type="button" class="btn _primary-btn">No. 124</button>
                                        {{-- <button type="button" class="btn _primary-btn">No. W{{$job->id}}</button> --}}
                                    </a>
                                    
                                </td>
                                <td class="pt-4 pb-4">นาคกรอง  สายบัว</td>
                                {{-- <td class="pt-4 pb-4">{{$job->price}}</td> --}}
                                <td class="pt-4 pb-4">15:20</td>
                                <td class="pt-4 pb-4 _hilight">5,000</td>
                                <td class="pt-4 pb-4">
                                    <span class="text-success">● ระบบโอนเงินให้นักออกแบบแล้ว</span>
                                </td>  
                            </tr>
                          </tbody>
                    </table>
                </div>
                
              </div>
           
        </div>
    </div>
   
</section>
    
@endsection
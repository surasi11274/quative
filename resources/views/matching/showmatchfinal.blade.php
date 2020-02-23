@extends('layouts.app')
@section('assets')
<link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
@endsection
@section('content')
<div class="container " >
    <div class="container mt-5">
        
        <div class="text-center pt-5 p-5">
            <div id="wizard-progress">
                <ol class="step-indicator">
                    <li class="complete">
                        <div class="step">1</div>
                        <div class="caption hidden-xs hidden-sm">ระบุความต้องการ</div>
                    </li>
                    <li class="complete">
                        <div class="step">2</div>
                        <div class="caption hidden-xs hidden-sm">เลือกรูปตัวอย่างงาน</div>
                    </li>
                    <li class="complete">
                        <div class="step">3</div>
                        <div class="caption hidden-xs hidden-sm">เลือกนักออกแบบที่ตรงใจ</div>
                    </li>
                    <li class="complete">
                        <div class="step">4</div>
                        <div class="caption hidden-xs hidden-sm">เลือกขอบเขตงาน</div>
                    </li>
                </ol>
            </div>
        
        </div>
    </div>
    <div style="width: 100%;padding-top: 10px;">
        <form class="form-match"  id="cakeform" action="/search/create/store3" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
                         <div class="p-5" >
                        
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <h2 class="selectfillter">ขอบเขตที่ต้องการงาน</h2>
                                        <small>
                                            *ระบบจะค้นหาจากราคาที่ใกล้มากที่สุดจากกลุ่มนักออกแบบ*
                                        </small>
                                        <select name="pricerate" id="filling" class=" detaill-select form-control mt-3 mb-5" onclick="calculate0(value)">
                                            <option class="dropdown-item" value="2900" >งานออกแบบฉลากติดสินค้าหน้าเดียว
                                                <span style="text-color: #ff3957;">ราคา ฿2,900</span>
                                            </option>
                                            <option class="dropdown-item" value="4500" >ออกแบบกล่องแพคเกจ
                                                <span style="text-color: #ff3957;">ราคา ฿4,500</span>
                                            </option>
                                            <option class="dropdown-item" value="7900" o>ออกแบบฉลากติดสินค้า พร้อม กล่องแพคเกจ
                                                <span style="text-color: #ff3957;">ราคา ฿7,900</span>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                              <div class="row">
                                  <div class="col-12 col-md-8">
                                      <h2 class="selectfillter  pt-3">วันที่ต้องการงาน</h2>
                                              {{--<input type="date" id="basicDate"  name="finishdate" placeholder="MM/DD/YY" data-input>--}}
                                      <div class="row">
                                          <div class="col-12">
                                              <div class="select-date">
                                                <div class="middle text-left">
                                                    <label>
                                                    <input type="radio" name="finishdate" value="Normal" checked  onclick="calculate1('0')"/>
                                                    <div class="front-end box">
                                                      <span>ธรรมดา <br>
                                                    <p>  15 วัน</p>
                                                    </span>
                                                     
                                                    </div>
                                                  </label>
                                                  
                                                    <label>
                                                    <input type="radio" name="finishdate" value="Quick"  onclick="calculate1('500')"/>
                                                    <div class="back-end box">
                                                        <span>ด่วน <br>
                                                            <p>7 วัน (+฿500)</p>
                                                          </span>
                                                    </div>
                                                  </label>
                                                  <label>
                                                    <input type="radio" name="finishdate" value="VeryQuick"  onclick="calculate1('1000')"/>
                                                    <div class="front-end box">
                                                        <span>ด่วนมาก <br>
                                                           <p>5 วัน (+฿1,000)</p> 
                                                          </span>
                                                    </div>
                                                  </label>
                                                  
                                        
                                                  </div>
                                                  {{-- <ul class="box-tag d-flex">
                                        
                                                      <li class="m-5">
                                                        <label class="_area-2">
                                                          <input type="radio" checked="checked" id="customRadioInline1" name="finishdate" class="custom-control-input">
                                                         <p>ธรรมดา</p>
                                                          <h5>15 <small>วัน</small></h5>
                                                          <span class="checkmark-price"></span>
                                                        </label>
                                                      </li>
                                                      <li class="m-5">
                                                          <input type="radio" id="customRadioInline2" name="finishdate" class="custom-control-input">
                                                          <label class="custom-control-label" for="customRadioInline2">ด่วน</label>
                                                          <h5>7 <small>วัน (+฿5000)</small></h5>
                                                      </li>
                                                      <li class="m-5">
                                                          <input type="radio" id="customRadioInline3" name="finishdate" class="custom-control-input">
                                                          <label class="custom-control-label" for="customRadioInline3">ด่วนมาก</label>
                                                          <h5>5 <small>วัน (+฿1,000)</small></h5>
                                                      </li>
         
                                                  </ul> --}}
                                              </div>
                                              
                                          </div>
                                          
                                      </div>
                                      <div class=" form-group  mt-5">
                                        <h5>หรือต้องการระบุวันเป็นพิเศษ *ถ้ามี</h5>
                                        <div class="col-4 input-icons">
                                            {{-- <input type="text" id="anotherSelector" name="birthdate" placeholder="Please select Date Time" data-input> --}}
                                            {{-- <input class="form-control anotherSelector" type="date"  name="birthdate"  placeholder="MM/DD/YY" data-input> --}}
                                            <input type="date" id="basicDate" name="birthdate"  placeholder="MM/DD/YY" data-input>
                                            {{-- <span class="icon calendar"></span> --}}
                                        </div>
                                    </div>
                                      </div>
                                  <div class="col-12 col-md-4">
                                      <div class="total-price p-3">
                                          <h5>สรุปราคา</h5>
                                          <table class="table">
                                              <thead>
                                              <tr>
                                                  <th scope="col">ขอบเขตงาน</th>
                                                  <td scope="col">ราคา</td>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <tr>
                                                  <th scope="row">01</th>
                                                  <td>฿</td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">วันที่ต้องการงาน</th>
                                                  <td >+ ฿
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">ราคาทั้งหมด</th>
                                                  <td style=" text-decoration: underline;" id="totalPrice">     
                                                      
                                                  </td>
                                              </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                     {{-- <div class="d-flex mt-5">
                                         <button href="#" class="btn _secondary-btn btn-lg btn-block m-1 ">ยกเลิก</button>
                                         <button href="#"  class="btn _primary-black btn-lg btn-block m-1">ถัดไป</button>
                                     </div> --}}
                                  </div>
                                  </div>
                                  
                                 
                                  <input hidden type="text" id="job_id" name="jobstatus_id" value="1">
                                  <input hidden type="text" id="job_id" name="job_id" value="{{$jobs->id}}">

         
                                 @if ($errors->any())
                                     <div class="alert alert-danger">
                                         <ul>
                                             @foreach ($errors->all() as $error)
                                                 <li>{{ $error }}</li>
                                             @endforeach
                                         </ul>
                                     </div>
                                 @endif
                                 <div class="mt_ex"></div>
                                 <div class="row">
                                    <div class="col-6">
     
                                    </div>
                                    <div class="col-6">
                                     <div class="row m-3">
                                         <div class="col-6">
                                             <input type="button" name="previous" class=" previous _secondary-btn  btn-block rounded" value="ย้อนกลับ"/>
                                         </div>
                                         <div class="col-6">
                                             <input type="submit" name="submit" class="submit  _primary-black  btn-block rounded " value="เสร็จสิ้น"/>
     
                                         </div>
                                     </div>
                                    </div>
                                </div>
                                 {{-- <input type="button" name="previous" class="previous _secondary-btn  btn-block btn-lg mt-5" value="ย้อนกลับ"/>
                                  <button type="submit" name="submit" class="submit _primary-black  btn-block btn-lg  rounded" value="Submit"> เสร็จสิ้น</button> --}}

                                    </div>
                    </form>
                </div>
            </div>

 @endsection
 <script>
    function addCart(v){
        document.getElementById('output').value = v
        document.getElementById('designerId').value = v
        console.log(v);
        return false;
    }
    function calculate0(v){
        document.getElementById('outputCal0').value = v
        // document.getElementById('designerId').value = v
        console.log(v);
        return false;
    }
    function calculate1(v){
        document.getElementById('outputCal1').value = v
        // document.getElementById('designerId').value = v
        console.log(v);
        return false;
    }
    function toTal(v){
        document.getElementById('outputCal2').value = calculate0(v) + calculate1(v);
        // document.getElementById('designerId').value = v
        console.log(v);
        return false;
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('js/flatpickr.js')}}"></script>
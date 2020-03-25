@extends('layouts.app')
@section('assets')
<link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
@endsection
@section('content')
<div class="container " >
    <div class="container mt-5 d-none d-md-block">

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
                         <div class="p-3 p-md-5" >

                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-5">
                                        <h2 class="selectfillter">ขอบเขตที่ต้องการงาน</h2>

                                        <small>
                                            *ระบบจะค้นหาจากราคาที่ใกล้มากที่สุดจากกลุ่มนักออกแบบ*
                                        </small>
                                        
                                        <select name="package_price" id="value1" class="detaill-select form-control mt-3 mb-5 " onchange="calculateAmount(this.value)">
                                            <option class="dropdown-item"  >กรุณาเลือก package
                                            </option>
                                            <option class="dropdown-item" value="{{$courses->course_rate['0']}}" >งานออกแบบฉลากติดสินค้าหน้าเดียว
                                                <span style="text-color: #ff3957;">ราคา ฿{{$courses->course_rate['0']}}</span>
                                            </option>
                                            <option class="dropdown-item" value="{{$courses->course_rate['1']}}" >ออกแบบกล่องแพคเกจ
                                                <span style="text-color: #ff3957;">ราคา ฿{{$courses->course_rate['1']}}</span>
                                            </option>
                                            <option class="dropdown-item" value="{{$courses->course_rate['2']}}" o>ออกแบบฉลากติดสินค้า พร้อม กล่องแพคเกจ
                                                <span style="text-color: #ff3957;">ราคา ฿{{$courses->course_rate['2']}}</span>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                              <div class="row">
                                  <div class="col-12 col-md-12 col-lg-8">
                                      <h2 class="selectfillter  pt-3">วันที่ต้องการงาน</h2>
                                              {{--<input type="date" id="basicDate"  name="finishdate" placeholder="MM/DD/YY" data-input>--}}
                                      <div class="row">
                                          <div class="col-12 mb-5">
                                              <div class="select-date">
                                                <div class="middle text-left">
                                                    <label>
                                                    <input id="value2" type="radio" name="dateextra_price" onclick="addCart('{{$courses->course_duration['0']}}')" onchange="calculateAmount2(this.value)"  value="0" checked  />
                                                    <div class="front-end box ">
                                                      <span class="font-weight-bold">ธรรมดา<br>
                                                     <p>  {{$courses->course_duration['0']}} วัน</p>
                                                    </span>

                                                    </div>
                                                  </label>

                                                    <label>
                                                    <input id="value2" type="radio" name="dateextra_price" onclick="addCart('{{$courses->course_duration['1']}}')"  onchange="calculateAmount2(this.value)" value="{{$courses->course_duration_rate['1']}}"  />
                                                    <div class="back-end box">
                                                        <span class="font-weight-bold">ด่วน <br>
                                                            <p>{{$courses->course_duration['1']}} วัน (+฿{{$courses->course_duration_rate['1']}})</p>
                                                          </span>
                                                    </div>
                                                  </label>
                                                  <label>
                                                    <input id="value2" type="radio" name="dateextra_price" onclick="addCart('{{$courses->course_duration['2']}}')" onchange="calculateAmount2(this.value)" value="{{$courses->course_duration_rate['2']}}"  />
                                                    <div class="front-end box">
                                                        <span class="font-weight-bold">ด่วนมาก <br>
                                                           <p>{{$courses->course_duration['2']}} วัน (+฿{{$courses->course_duration_rate['2']}})</p>
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
                                      {{-- <div class=" form-group  mt-5">
                                        <h5>หรือต้องการระบุวันเป็นพิเศษ *ถ้ามี</h5>
                                        <div class="col-4 input-icons">
                                            <input type="date" id="basicDate" name="birthdate"  placeholder="MM/DD/YY" data-input>
                                        </div>
                                    </div> --}}
                                      </div>
                                  <div class="col-12 col-md-12 col-lg-4 mb-5">
                                      <div class="total-price p-3">
                                          <h5 class="font-weight-bold">สรุปราคา</h5>
                                          <table class="table">
                                              <thead>
                                              <tr>
                                                  <th scope="col" class="font-weight-bold">รายการ</th>
                                                  <td scope="col" class="font-weight-bold">ราคา</td>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <tr>
                                                  <th scope="row">
                                                      <p>แพ็คเกจ</p>
                                                  </th>
                                                    <td>
                                                        <div class="form-group">
                                                            <input style="width:100px;"  id="package" class="form-control " name="package" type="text"   />

                                                        </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">
                                                      <p>วันที่ต้องการงาน</p>
                                                  </th>
                                                  <td >
                                                      <div class="form-group">
                                                        <input style="width:100px;"  id="date" class="form-control " name="date"  type="text"   />

                                                      </div>
                                                  </td>
                                              </tr>
                                              {{-- <tr>
                                                  <th scope="row">ราคาทั้งหมด</th>
                                                  <td style=" text-decoration: underline;" >
                                                    <div class="form-group">

                                                        <input style="width:100px;" id="sum" type="text"  readonly>


                                                    </div>
                                                  </td>
                                              </tr> --}}
                                              </tbody>
                                          </table>
                                      </div>

                                     {{-- <div class="d-flex mt-5">
                                         <button href="#" class="btn _secondary-btn btn-lg btn-block m-1 ">ยกเลิก</button>
                                         <button href="#"  class="btn _primary-black btn-lg btn-block m-1">ถัดไป</button>
                                     </div> --}}
                                  </div>
                                  </div>

                                  <input hidden type="text" id="output" name="finishdate" >

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
                                
                                 <div class="row mb-5 pt-md-5">
                                    <div class="col d-none d-md-block"></div>
                                    <div class="col">
                                        <a href="/searchref" class="btn _secondary-btn  btn-block rounded btn-lg d-none d-md-block">ย้อนกลับ</a>
                                        <a href="/searchref" class="btn _secondary-btn  btn-block rounded btn-lg d-md-none ">ย้อนกลับ</a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn _primary-black  btn-block rounded btn-lg d-none d-md-block">ถัดไป</button>
                                        <button type="submit" class="btn _primary-black  btn-block rounded btn-lg d-md-none ">ถัดไป</button>
                                    </div>
                                </div>
                  
                                 {{-- <input type="button" name="previous" class="previous _secondary-btn  btn-block btn-lg mt-5" value="ย้อนกลับ"/>
                                  <button type="submit" name="submit" class="submit _primary-black  btn-block btn-lg  rounded" value="Submit"> เสร็จสิ้น</button> --}}

                                    </div>
                    </form>
                </div>
            </div>

 @endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <script>
    function addCart(v){
        document.getElementById('output').value = v
        document.getElementById('designerId').value = v
        console.log(v);
        return false;
    }
</script>
<script>
    function calculateAmount(val) {
        var tot_price = val ;
        /*display the result*/
        var divobj = document.getElementById('package');

        divobj.value  = tot_price;
    }
    function calculateAmount2(val) {
        var tot_date = val ;
        /*display the result*/
        var divobj2 = document.getElementById('date');

        divobj2.value = tot_date;
    }

</script>
<script>
    // we used jQuery 'keyup' to trigger the computation as the user type
    $(function (){
            $('#package, #date').keyup(function(){
               var value1 = parseFloat($('#package').val()) || 0;
               var value2 = parseFloat($('#date').val()) || 0;

            //    var sum = value1 + value2;
               $('#sum').val(value1 + value2);
            });
         });

</script>
<script src="{{asset('js/flatpickr.js')}}"></script>

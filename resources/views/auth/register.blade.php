@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="css/_login.css">
@endsection
@section('content')
<div class="area-bg">
    <ul class="circles">
        <li><img src="photo/plus.svg" alt=""></li>
        <li><img class="animated infinite jello" src="photo/paper-bag.svg" alt=""></li>
        <li><img src="photo/circle-copy.svg" alt=""></li>
        <li><img src="photo/box.svg" alt=""></li>
        <li><img src="photo/border.svg" alt=""></li>
        <li><img src="photo/plus.svg" alt=""></li>
        <li><img class="animated infinite jello" src="photo/paper-bag.svg" alt=""></li>
        <li><img src="photo/circle-copy.svg" alt=""></li>
        <li><img src="photo/box.svg" alt=""></li>
        <li><img src="photo/border.svg" alt=""></li>
</ul>
</div>
<div class="container ">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8 col-md-offset-2"> -->
            <!-- <div class="panel panel-default"> -->
                <div class="col-12">
                    
                <div class="card " style="width: 100% ;margin-top: 100px;">
                    <center>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <div class="panel-heading" style=" margin-top: 20px;margin-bottom: 20px; font-family: chonburi;">
                                    <h1>สมัครสมาชิก</h1>
                                    </div>
            
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
            
                                    {{-- <input type="hidden" name="avatar" value="https://s3-ap-southeast-1.amazonaws.com/img-in-th/14480b52252f0ac721edf82486f0f8f9.png"> --}}
                                    <div class="form-group">
                                        <label for="role" class="col-md-4 col-form-label text-md-center"><h5>คุณคือ?</h5></label>
            
                                                    {{--<div class="radio">--}}
                                                            {{--<input type="radio" name="role" value="0" checked> ผู้ประกอบการ--}}
                                                    {{--</div>--}}
                                                    {{--<div class="radio">--}}
                                                            {{--<input type="radio" name="role" value="1"> นักออกแบบ--}}
                                                    {{--</div>--}}
                                                <section class="radio">
                                                    <input type="radio" id="1-option" name="role" value="0" checked="checked">
                                                    <label for="1-option" >ผู้ประกอบการ</label>
                                                    <div class="check"></div>
                                                </section>
                                                <section class="radio">
                                                    <input type="radio" id="f-option" name="role" value="1" >
                                                    <label for="f-option">นักออกแบบ</label>
                                                    <div class="check"></div>
                                                </section>
                                                    {{--<label class="radio-inline"><input class="col-6" type="radio" name="role" value="0" checked>ผู้ประกอบการ</label>--}}
                                                    {{--<label class="radio-inline"><input class="col-6" type="radio" name="role" value="1">นักออกแบบ</label>--}}
            
            
                                               
                                              
            
                                                @if ($errors->has('role'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('role') }}</strong>
                                                    </span>
                                                @endif
                                    </div>
            
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <!-- <label for="name" class="col-md-4 control-label">Username</label> -->
            
                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control" placeholder="ชื่อผู้ใช้"name="name" value="{{ old('name') }}" required autofocus>
            
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->
            
                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control"placeholder="อีเมลล์" name="email" value="{{ old('email') }}" required>
            
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <!-- <label for="password" class="col-md-4 control-label">Password</label> -->
            
                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control" placeholder="รหัสผ่าน"name="password" required>
            
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <!-- <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label> -->
            
                                        <div class="col-md-8">
                                            <input id="password-confirm" type="password" placeholder="ยืนยันรหัสผ่าน" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
            
                                    <div class="form-group" style="margin-bottom: 50px;">
                                        <div class="col-md-8 col-md-offset-4">
                                            
                                            <center>
                                                <div class="mt-3 mb-5 text-right">
                                                 
                                                 <button  type="button" class="btn btn-dark mt-1" style="width:  150px; height: 50px; background: #000000;" data-toggle="modal" data-target=".bd-example-modal-lg">ถัดไป</button>
                                                </div>
                                               </center>
                                        </div>
                                    </div>

                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                     
                            
        
                                                <div class="modal-body text-center mb-md-5 md-3">
                                                    <div class="container">
                                                            <div class="text-center pt-5 mb-md-5">
                                                                <h3 class="font-weight-bold">เงื่อนไขและข้อตกลงการใช้บริการ </h3>
                                                                <h4 class="_gray">มีผลบังคับใช้ 13 มิถุนายน 2562</h4>
                                                            </div>
                                                            <div class="container pl-md-5 pr-md-5">
                                                                <div class="container">
                                                                    <div class="overflow-term">
                                                                        <h4 class="font-weight-bold text-left ">1. ทั่วไป</h4>
                                                                        <p class="text-left mb-3">
                                                                            ข้อตกลงการใช้งานจะเป็นข้อตกลงการใช้งานของท่านกับเว็บไซต์ Quative ซึ่งกำหนดสิทธิ์ หน้าที่ความรับผิดชอบที่แต่ละฝ่ายมีระหว่างกันเกี่ยวกับการให้บริการและการใช้บริการทั้ง
                                                        หมดบนเว็บไซต์การสร้างบัญชีผู้ใช้งานหรือเมื่อท่านเริ่มใช้งานเว็บไซต์ด้วยการกดยอมรับข้อตกลงการใช้งานของบริษัทจะถือว่าท่านยอมรับที่จะปฏิบัติตามและอยู่ภายใต้ข้อตกลงการใช้งาน รวมถึงยอมรับนโยบายความเป็นส่วนตัวที่บริษัทกำหนดท่านจะไม่สามารถใช้บริการ
                                                        เว็บไซต์ของบริษัทได้หากท่านไม่เห็นด้วยกับข้อตกลงหรือนโยบายความเป็นส่วนตัวดังกล่าว และท่านในฐานะผู้ใช้งานจะไม่ทำการใดๆอันเป็นสิ่งผิดกฎหมายหรือขัดต่อความสงบเรียบร้อย
                                                        หรือศีลธรรมอันดีของประชาชนผ่านเว็บไซต์โดยเด็ดขาด รวมถึงจะไม่ทำการใดๆ อันขัดต่อข้อตกลงการใช้งาน และยอมรับการใช้ดุลพินิจของบริษัทให้ถือเป็นข้อยุติ
                                                                        </p>
                                                                        <h4 class="font-weight-bold text-left">2. การใช้บริการของเว็บไซต์</h4>
                                                                        <p class="text-left mb-3">
                                                                            การที่ผู้ใช้บริการของเว็บไซต์หรือบริการของ  Quative  ค้นหา พูดคุย ติดต่อสื่อสารกับผู้ใช้หรือผู้นักออกแบบ สมัครสมาชิก กดเมนูคำสั่งใด ๆ หรือการกดเข้าสู่หน้าถัดไปบนเว็บไซต์ Quative ถือการลงลายมือชื่อทางอิเล็กทรอนิกส์ของผู้ใช้งาน ซึ่งเป็นการแสดงเจตนาของผู้ใช้งานที่เข้าใจอย่างละเอียดและตกลงที่จะปฏิบัติตามข้อกำหนด เงื่อนไขทั้งหมดที่ระบุในข้อตกลงนี้ และระเบียบต่าง ๆ ที่มีตามนโยบายของ Quative ทุกประการ โดยการแสดงเจตนาดังกล่าวนี้ก่อให้เกิดความผูกพันตามกฎหมายมีผลสมบูรณ์และเพิกถอนมิได้ ผู้ใช้งานยืนยันว่าข้อมูลต่างๆ ที่ผู้ใช้งานใช้ในการสมัครเป็นสมาชิก เป็นข้อมูลที่ถูกต้องแท้จริงของผู้ใช้งานเอง หากบริษัทพบว่าข้อมูลไม่ถูกต้องไม่ว่าในระหว่างการสมัคร หรือหลังจากที่การสมัครเสร็จสิ้นแล้ว บริษัทมีสิทธิ์ระงับการใช้งานบัญชีใช้งาน ยกเลิก ดำเนินการเรียกร้องค่าเสียหายที่เกิดขึ้นจากผู้ใช้งานได้ บริษัทจะเก็บค่าธรรมเนียมซึ่งเป็นค่าดำเนินการและค่าบริหารระบบต่างๆ ของเว็บไซต์ ที่เกี่ยวกับการให้บริการในอัตราตามที่บริษัทฯ กำหนดและจะประกาศบนเว็บไซต์ รวมถึงจะมีการเปลี่ยนแปลงต่อไปในอนาคตโดยไม่จำเป็นต้องแจ้งให้ทราบล่วงหน้า โดยค่าธรรมเนียมดังกล่าวจะถูกหักออกจากรายได้ของผู้ใช้งานโดยอัตโนมัติ
                                                                        </p>
                                                                        <h4 class="font-weight-bold text-left">3. ข้อสงวนสิทธิ์ของเว็บไซต์</h4>
                                                                        <p class="text-left mb-3">
                                                                            การกำหนดให้การชำระค่างานต้องทำรายการผ่านเว็บไซต์นั้น เป็นไปเพื่อผลประโยชน์และความปลอดภัยของผู้ใช้งานเอง เนื่องจากทำให้นักออกแบบเกิดความมั่นใจว่านักออกแบบจะได้รับผลตอบแทนจากการทำงาน และผู้ว่าจ้างก็ยังมีโอกาสได้รับเงินคืนหากนักออกแบบไม่ทำงานตามเงื่อนไขที่ตกลงกันไว้ แต่อย่างไรก็ตาม เงินที่ผู้ใช้งานชำระผ่านบริษัทนั้น ไม่ใช่เงินรายรับของบริษัท เพียงแต่ว่านักออกแบบได้ให้คำยินยอมแก่บริษัทให้หักค่าธรรมเนียมซึ่งเป็นค่าดำเนินการและค่าบริหารระบบต่างๆ ของเว็บไซต์ที่เกี่ยวข้องกับการให้บริการ ออกไปจากเงินจำนวนดังกล่าวได้เท่านั้น บริษัทจึงไม่ได้เป็นทั้งตัวการหรือตัวแทนอันเกี่ยวข้องกับการรับจ้างทำงานของฟรีแลนซ์แต่อย่างใด
                                                                        </p>
                                                                        <h4 class="font-weight-bold text-left">4. การระงับข้อพิพาทระหว่างผู้ว่าจ้างและนักออกแบบ</h4>
                                                                        <p class="text-left mb-3">
                                                                            บริษัทมีสิทธิ์เด็ดขาดแต่เพียงผู้เดียวในการใช้ดุลพินิจระงับการใช้งานบัญชีชั่วคราวหรือถาวร ยกเลิกบัญชี ลบการประกาศงานดังกล่าว หรืองานอื่นๆ ยกเลิกงานที่มีการจ้างงาน และการอื่นใดที่บริษัทเห็นว่าเหมาะสม หากบริษัทพบว่าผู้ใช้งานได้กระทำการละเมิดข้อตกลงใช้งาน หรือมีการกระทำที่ไม่เหมาะสมบนระบบเว็บไซต์ อาทิเช่น การใช้คำพูดที่ไม่เหมาะสม การใช้ถ้อยคำหยาบคาย การส่อเสียดเหยียดหยาม กลั่นแกล้ง หรือดูถูก
                                                                        </p>
                                                                        <h4 class="font-weight-bold text-left">5. นโยบายความเป็นส่วนตัว</h4>
                                                                        <p class="text-left mb-3">
                                                                            บริษัทให้ความสำคัญแก่ความปลอดภัยของข้อมูลของท่าน ท่านสามารถอ่านนโยบายความเป็นส่วนตัว ซึ่งนโยบายความเป็นส่วนตัวนี้ถือเป็นส่วนหนึ่งของข้อตกลงการใช้งานด้วย  เพื่อปกป้องความเป็นส่วนตัวของผู้ใช้ ข้อมูลผู้ใช้ที่ใช้สำหรับการระบุตัวบุคคลของผู้ใช้จะถูกเก็บเป็นความลับ และจะถูกเปิดเผยแก่บุคคลภายนอกเฉพาะในกรณีที่ผู้ขอให้เปิดเผยนั้นมีอำนาจตามกฎหมายที่จะสามารถขอให้บริษัทเปิดเผยข้อมูลได้ หรือได้รับการยินยอมจากผู้ใช้งานซึ่งเป็นเจ้าของข้อมูล บริษัทจะไม่มีการเก็บข้อมูลบัตรเครดิตของผู้ใช้เพื่อป้องกันการโกง หรือการถูกขโมยข้อมูล แต่ผู้ใช้ตกลงอนุญาตให้ผู้ให้บริการการรับชำระเงินที่บริษัทใช้บริการ สามารถเก็บข้อมูลบัตรเครดิตต่างๆ เพื่อใช้ในการชำระเงินบนเว็บไซต์ได้ ซึ่งการใช้ข้อมูลดังกล่าวจะถูกผูกพันภายใต้ข้อตกลงการใช้งานและนโยบายความเป็นส่วนตัวของผู้ให้บริการการรับชำระเงิน บริษัทขอสงวนสิทธิ์ในการเข้าถึงและตรวจสอบข้อมูลส่วนบุคคลของผู้ใช้งาน รวมถึงการสื่อสารระหว่างผู้ใช้งานที่สื่อสารผ่านระบบของเว็บไซต์ได้ แต่บริษัทจะเข้าถึงและตรวจสอบข้อมูลทั้งหมดดังกล่าวซึ่งถือเป็นข้อมูลส่วนบุคคลของผู้ใช้งานเฉพาะเพื่อวัตถุประสงค์ในการระงับข้อพิพาทระหว่างผู้ใช้งาน ตรวจสอบกรณีมีข้อสงสัยเรื่องการทุจริต เรื่องการกระทำผิดข้อตกลงการใช้งาน หรือเพื่อวัตถุประสงค์อื่นตามที่กำหนดในนโยบายความเป็นส่วนตัว
                                                                        </p>
                                                                    </div>
                                                                    
                                                        
                                                        
                                                                   
                                                                    <div class=" pl-md-5 pr-md-5 mt-3">
                                                                        
                                                                        {{-- <input type="checkbox" id="toggle" />
                                                                        <span>some text</span> --}}
                                                                        
                                                                        {{-- <input type="checkbox" name="acceptterm" value="1" class="form-check-input" id="exampleCheck1"  />
                                                                        <label class="form-check-label _hilight" for="exampleCheck1">ยอมรับเงื่อนไขและข้อตกลงการใช้บริการและนโยบายความเป็นส่วนตัว</label> --}}
                                                                        <label class="box-1term form-check-label _hilight" for="exampleCheck1">ยอมรับเงื่อนไขและข้อตกลงการใช้บริการและนโยบายความเป็นส่วนตัว
                                                                            <input type="checkbox" name="acceptterm" value="1" id="exampleCheck1">
                                                                            <span class="checkmarkterm"></span>
                                                                          </label>
                                                                    </div>
                                                                    
                                                                      
                                                                    <div class="row">
                                                                       <div class="col">
                                                    
                                                                       </div>
                                                                       <div class="col">
                                                    
                                                                       </div>
                                                                       <div class="col-12 col-md">
                                                                        <button type="submit" class=" mt-5 btn  _primary-black btn-lg btn-block " href="/">สมัครสมาชิก</button>
                                                                       </div>
                                                                        {{-- <input  href="/" type="submit" name="sendNewSms" class="inputButton btn " id="sendNewSms" value=" Send "  /> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                 
                                                {{-- <div class="modal-footer text-center">
                                                    
                                                    </div> --}}
                                            </div>
                                        </div>
                                    </div>





                                </form>
                            </div>
                            </div>
                            <div class="col-2"></div>

                        </div>
                        
                </center>
            </div>
            </div>
            <div class="col"></div>

        </div>

    </div>
</div>
@endsection

@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="css/_login.css">
@endsection
@section('content')
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
                                                 
                                                 <button  type="submit" class="btn btn-dark mt-1" style="width:  150px; height: 50px; background: #000000;">สมัครสมาชิก</button>
                                                </div>
                                               </center>
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

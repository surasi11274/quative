@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- <div class="col-md-6 col-md-offset-2"> -->
                <div class="col-12 card rounded-ex" style="width: 100% ;margin-top: 100px;">
                   <div class="row">
                       <div class="col-12 col-md-6 mt-5">
                               <center>
                                   <div class="panel-heading" style="color: #904ae8; margin-top: 20px;margin-bottom: 20px; font-family: chonburi;">
                                       <h1>เข้าสู่ระบบ</h1>
                                   </div>

                                   <div class="panel-body">
                                       <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                           {{ csrf_field() }}

                                           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                               <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

                                               <div class="col-md-8 center">
                                                   <input id="email" type="email" class="form-control" name="email" placeholder="อีเมลล์" value="{{ old('email') }}" required autofocus>

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
                                                   <input id="password"placeholder="รหัสผ่าน" type="password" class="form-control" name="password" required>

                                                   @if ($errors->has('password'))
                                                       <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                                   @endif
                                               </div>
                                           </div>

                                       <!-- <div class="form-group">
                                    <div class="col-md-6 ">
                                        <div>
                                            <label style="color: #533b8e;">
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}  s> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div> -->

                                           <div class="form-group">
                                               <div class="col-md-8 col-md-offset-4">
                                                   <button type="submit" class="col-12 btn " style="background-color: #ff3975ff
; color: white;">
                                                       เข้าสู่ระบบ
                                                   </button>


                                               </div>
                                               <a class="btn btn-link" href="{{ route('password.request') }}" style="color:#533b8e

 ;">
                                                   ลืมรหัสผ่าน?
                                               </a>
                                           </div>
                                       </form>
                                   </div>
                           </center>
                       </div>
                       <div class="col-12 col-md-6">
                           <figure class="img-fluid">
                               <img src="photo/preview.png">
                           </figure>
                       </div>
                   </div>
                </div>

            
        <!-- </div> -->
    </div>
</div>
@endsection

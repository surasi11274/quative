@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- <div class="col-md-6 col-md-offset-2"> -->
                <div class="col-12 col-md-8 card " style="width: 100% ;margin-top: 100px;">
                   <div class="row"> 

                       <div class="col-12 mt-5">
                           <div class="row"></div>
                               <center>
                                   <div class="panel-heading" style=" margin-top: 20px;margin-bottom: 20px; font-family: chonburi;">
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
                                           
                                           <div class="container">
                                               
                                            <div class="row">
                                                <div class="col">

                                                </div>
                                                <div class="col-8 text-left">
                                                    <a class="btn btn-link text-left" href="{{ route('password.request') }}" style="color:#ACACAC
    
                                                ;">
                                                                                                  ลืมรหัสผ่าน?
                                                                                              </a>
                                                </div>
                                                <div class="col">
                                                    
                                                </div>
                                                
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
                                                   {{-- <button type="submit" class="col-12 btn " style="background-color: #ff3975ff
; color: white;">
                                                       เข้าสู่ระบบ
                                                   </button> --}}
                                                   <div class="row mt-3 mb-5 text-right">
                                                       <div class="col-12 col-md-6">
                                                        <a href="/register">
                                                            <button  type="button" class="btn btn-outline-dark mt-1  btn-block" style="height: 50px;">สมัครสมาชิก</button>
                                                           </a>
                                                       </div>
                                                       <div class="col-12 col-md-6">
                                                        <button  type="submit" class="btn btn-dark mt-1 btn-block" style=" height: 50px; background: #000000;">เข้าสู่ระบบ</button>
                                                    </div>
                                                   </div>
                                                  
                                               </div>
                                               
                                           </div>
                                       </form>
                                   </div>
                           </center>
                       </div>
                 

                    
                   </div>
                </div>

            
        <!-- </div> -->
    </div>
</div>
@endsection

<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="d-inline-block align-top" width="50" height="50" src="https://sv1.picz.in.th/images/2020/02/01/RyM1Aa.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
            <ul class="nav navbar-nav justify-content-end">
                <!-- Authentication Links -->

            @if (Auth::guest())
                <!-- <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">สมัครสมาชิก</a></li> -->
                    <li class="nav-item"><a class="nav-link" role="button" href="/preview">พรีวิว</a></li>
                    <li class="nav-item"><a class="nav-link" role="button" href="/gallery">ผลงาน</a></li>


                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link btn" style="background-color: #523EE8; color: white !important;" data-toggle="dropdown" role="button" aria-expanded="false">
                            เข้าสู่ระบบ <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu " role="menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    เข้าสู่ระบบ
                                </a>


                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    สมัครสมาชิก
                                </a>
                            </li>


                        </ul>
                    </li>

                @elseif (Auth::user()->role=='1')
                    <li class="nav-item"><a class="nav-link" role="button" href="/preview">พรีวิว</a></li>
                    <li class="nav-item"><a class="nav-link" role="button" href="/gallery">ผลงาน</a></li>
                    <li class="dropdown nav-item mr-2">
                        <a class="nav-link  " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#523EE8;text-align: center; width: 50px; height: 80px;">
                            <span class="icon notification"></span>
                        </a>
                        <div class="dropdown-menu  p-5" style=" box-shadow: 5px 1px 20px 1px rgba(144, 74, 232,.15);" aria-labelledby="navbarDropdownMenuLink">
                            <div class="wrapper-notification">
                                <div class=" overflow-noctification p-2">
                                    <div class="row">

                                        <div class="col-3">
                                            <figure class="  img-fluid">
                                                <div class="active-notification float-right rounded-circle"></div>
                                                <img class="rounded-circle w-100 " src="https://picsum.photos/40">
                                            </figure>
                                        </div>
                                        <div class="col-9">
                                            <label class="font-weight-bold" for="name">ทริปสุดา พรพาน </label><small class="ml-2" style="color:#523EE8;">ส่งข้อความหาถึงคุณ</small>
                                            <br>
                                            <label for="">2</label><small>min ago</small>
                                            <hr>
                                        </div>
                                        <div class="col-3">
                                            <figure class="  img-fluid">
                                                <img class="rounded-circle w-100" src="https://picsum.photos/40">
                                            </figure>
                                        </div>
                                        <div class="col-9">
                                            <label class="font-weight-bold" for="name">ทริปสุดา พรพาน </label><small class="ml-2" style="color:#523EE8;">ส่งข้อความหาถึงคุณ</small>
                                            <br>
                                            <label for="">2</label><small>min ago</small>
                                            <hr>
                                        </div>
                                        <div class="col-3">
                                            <figure class="  img-fluid">
                                                <img class="rounded-circle w-100" src="https://picsum.photos/40">
                                            </figure>
                                        </div>
                                        <div class="col-9">
                                            <label class="font-weight-bold" for="name">ทริปสุดา พรพาน </label><small class="ml-2" style="color:#523EE8;">ส่งข้อความหาถึงคุณ</small>
                                            <br>
                                            <label for="">2</label><small>min ago</small>
                                            <hr>
                                        </div>

                                        <div class="col-3">
                                            <figure class="  img-fluid">
                                                <img class="rounded-circle w-100" src="https://picsum.photos/40">
                                            </figure>
                                        </div>
                                        <div class="col-9">
                                            <label class="font-weight-bold" for="name">ทริปสุดา พรพาน </label><small class="ml-2" style="color:#523EE8;">ส่งข้อความหาถึงคุณ</small>
                                            <br>
                                            <label for="">2</label><small>min ago</small>
                                            <hr>
                                        </div>

                                        <div class="col-3">
                                            <figure class="  img-fluid">
                                                <img class="rounded-circle w-100" src="https://picsum.photos/60">
                                            </figure>
                                        </div>
                                        <div class="col-9">
                                            <label class="font-weight-bold" for="name">ทริปสุดา พรพาน </label><small class="ml-2" style="color:#523EE8;">ส่งข้อความหาถึงคุณ</small>
                                            <br>
                                            <label for="">2</label><small>min ago</small>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown nav-item" >
                        <a  href="#" class="dropdown-toggle nav-link btn" style="color:#523EE8;" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="caret icon profile"></span>
                        </a>
                        {{-- {{ Auth::user()->name }} --}}
                        <!-- <a class="nav-link" role="button" href="/login/designer">Register to Designer</a> -->
                        <ul class="dropdown-menu "   role="menu">
                            <li class="nav-item">
                                <div class="wrapper-profile">
                                  <div class="profile-color d-flex p-2">
                                      <img class="ml-3 rounded-circle" src="https://picsum.photos/50" alt="" style="width:50px;height:50px;">
                                   <h5 class="ml-2">{{ Auth::user()->name }}</h5>
                                  </div>
                                </div>
                               </li>
                               <li class="nav-item">
                                   <a class="ml-2 nav-link" href="#">ข้อความและการจ้างงาน  <s

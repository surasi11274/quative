        <nav class="navbar navbar-expand-lg navbar-light fixed-top ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="d-inline-block align-top" width="50" height="50" src="photo/@logo.png" alt="">
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
                            <li class="nav-item"><a class="nav-link" role="button" href="/vote">ผลงาน</a></li>


                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link btn" style="background-color: #904ae8; color: white;" data-toggle="dropdown" role="button" aria-expanded="false">
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
                            <li class="nav-item"><a class="nav-link" role="button" href="/vote">ผลงาน</a></li>
                            <li class="dropdown nav-item mr-2">
                                <a class="nav-link dropdown-toggle rounded-ex " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#523EE8;text-align: center; width: 50px; height: 80px;">
                                    <span><i class="fas fa-bell"></i><label for=""></label></span>
                                </a>
                                <div class="dropdown-menu rounded-ex p-5" style=" box-shadow: 5px 1px 20px 1px rgba(144, 74, 232,.15);" aria-labelledby="navbarDropdownMenuLink">
                                    <div class=" overflow-noctification">
                                        <div class="row">
                                            <div class="col-3">
                                                <figure class="  img-fluid">
                                                    <img class="rounded-circle w-100" src="https://picsum.photos/60">
                                                </figure>
                                            </div>
                                            <div class="col-9">
                                                <label class="font-weight-bold" for="name">ทริปสุดา พรพาน </label><small style="color:#ACACAC;">ส่งข้อความหาถึงคุณ</small>
                                                <br>
                                                <label for="">2</label><small>min ago</small>
                                            </div>
                                            <hr>
                                            <div class="col-3">
                                                <figure class="  img-fluid">
                                                    <img class="rounded-circle w-100" src="https://picsum.photos/60">
                                                </figure>
                                            </div>
                                            <div class="col-9">
                                                <label class="font-weight-bold" for="name">ทริปสุดา พรพาน </label><small style="color:#ACACAC;">ส่งข้อความหาถึงคุณ</small>
                                                <br>
                                                <label for="">2</label><small>min ago</small>
                                            </div>
                                            <hr>
                                            <div class="col-3">
                                                <figure class="  img-fluid">
                                                    <img class="rounded-circle w-100" src="https://picsum.photos/60">
                                                </figure>
                                            </div>
                                            <div class="col-9">
                                                <label class="font-weight-bold" for="name">ทริปสุดา พรพาน </label><small style="color:#ACACAC;">ส่งข้อความหาถึงคุณ</small>
                                                <br>
                                                <label for="">2</label><small>min ago</small>
                                            </div>
                                            <hr>
                                            <div class="col-3">
                                                <figure class="  img-fluid">
                                                    <img class="rounded-circle w-100" src="https://picsum.photos/60">
                                                </figure>
                                            </div>
                                            <div class="col-9">
                                                <label class="font-weight-bold" for="name">ทริปสุดา พรพาน </label><small style="color:#ACACAC;">ส่งข้อความหาถึงคุณ</small>
                                                <br>
                                                <label for="">2</label><small>min ago</small>
                                            </div>
                                            <hr>
                                            <div class="col-3">
                                                <figure class="  img-fluid">
                                                    <img class="rounded-circle w-100" src="https://picsum.photos/60">
                                                </figure>
                                            </div>
                                            <div class="col-9">
                                                <label class="font-weight-bold" for="name">ทริปสุดา พรพาน </label><small style="color:#ACACAC;">ส่งข้อความหาถึงคุณ</small>
                                                <br>
                                                <label for="">2</label><small>min ago</small>
                                            </div>
                                            <hr>

                                        </div>

                                    </div>
                                    <a class="dropdown-item hidden" href="#">Another action</a>


                                </div>
                            </li>
                            <li class="dropdown nav-item">
                                <a  href="#" class="dropdown-toggle nav-link btn" style="color:white; background-color: #523EE8;" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"><i class="far fa-user-circle"></i></span>
                                </a>
                                <!-- <a class="nav-link" role="button" href="/login/designer">Register to Designer</a> -->


                                <ul class="dropdown-menu "   role="menu">
                                    <li class="nav-item">
                                        <a class="nav-link " role="button" href="/requestjob">การจ้างงาน</a>
                                        <!-- <a class="nav-link" role="button" href="/designer/show/{token}">Designer Information</a> -->




                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " role="button" href="{{route('designer.designer')}}">ข้อมูลนักออกแบบ</a>
                                        <!-- <a class="nav-link" role="button" href="/designer/show/{token}">Designer Information</a> -->




                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            ออกจากระบบ
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>


                                </ul>
                            </li>

                        @else



                            <li class="nav-item"><a class="nav-link" role="button" href="{{ route('search.create') }}">ค้นหานักออกแบบ</a></li>
                            <li class="nav-item"><a class="nav-link" role="button" href="/preview">พรีวิว</a></li>
                            <li class="nav-item"><a class="nav-link" role="button" href="/vote">ผลงาน</a></li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link btn "  style="background-color: #523EE8; color: white;" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu " role="menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            ออกจากระบบ
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif

                    </ul>

                </div>
            </div>
        </nav>
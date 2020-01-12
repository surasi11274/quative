<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Quative') }} | Quative</title>


    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/_home_style.css')}}">
 <link rel="stylesheet" href="{{asset('css/style_match.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/_navbar.css')}}">
    @yield('assets')
    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">--}}
    <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/_select.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://kit.fontawesome.com/099b07344f.js" crossorigin="anonymous"></script>

    <script src="{{asset('js/dropzone.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>





</head>
<header>
    {{--@include('components.header')--}}
    <header>

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
                                <a href="#" class="dropdown-toggle nav-link btn "  style="background-color: #904ae8
; color: white;" data-toggle="dropdown" role="button" aria-expanded="false">
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

    </header>
</header>
<body >
    <div id="app">
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
            <div class="container">
                <div class="navbar-header"> -->

                    <!-- Collapsed Hamburger -->
                    <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> -->

                    <!-- Branding Image -->
                    <!-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Quative') }}
                    </a>
                </div> -->

                <!-- <div class="collapse navbar-collapse" id="app-navbar-collapse"> -->
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="nav navbar-nav">
                        &nbsp;
                    </ul> -->
                

                    <!-- Right Side Of Navbar -->
                    <!-- <ul class="nav navbar-nav navbar-right "> -->
                        <!-- Authentication Links -->
                        <!-- @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                             <li><a  role="button" href="/login/designer">Register to Designer</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
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
        </nav> -->


        @yield('content')
    </div>
    <!-- Footer -->
    {{--<div class="page-footer font-small blue pt-4">--}}
    {{--<img  src="photo/footer.png" alt="" class="img-fluid">--}}
    {{--</div>--}}
    <footer>
        {{--@include('components.footer')--}}
        <footer class="page-footer bg-white font-small blue pt-4">

            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left " >

                <!-- Grid row -->
                <div class="row justify-content-center p-5">

                    <!-- Grid column -->

                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none pb-3">

                    <!-- Grid column -->
                   <div class="col-12 col-md-8">
                       <div class="text-left">

                           <!-- Links -->
                           <!-- <h5 class="text-uppercase"></h5> -->

                           <ul class="list-unstyled mx-auto">
                               <li>
                                   <a><img src="photo/@logo.png" width="50" height="50" alt=""></a>
                               </li>
                               <li>
                                   <a href="#" style="font-family: prompt; font-weight: 400;  color: #523EE8; font-size: 24px;">Quative</a>
                               </li>
                                   <li>
                                       <p style="color: #523EE8;">
                                           เป็นเว็บไซต์ที่จะเข้ามาเพื่อแก้ไขปัญหาสำหรับผู้ใช้เพื่อพัฒนาผลิตภัณฑ์ไทย <br>
                                           โดยนักออกแบบสร้างสรรค์ พัฒนาฝืมือ และช่วยเหลือกลุ่มสินค้า
                                       </p>
                                   </li>



                           </ul>

                       </div>
                   </div>
                    <div class="col-12 col-md-2">
                        <ul class="list-unstyled mx-auto">
                            <li>
                                <h5 class="_hilight">Site Navigation</h5>
                            </li>
                            <li>
                                <a href="#"  style="font-family: prompt; font-weight: 400;  color: #523EE8; font-size: 24px;">ค้นหานักออกแบบ</a>
                            </li>
                                <li>
                                    <a href="#!" style="color: #523EE8;">ผลงานนักออกแบบ</a>
                                </li>
                                <li>
                                    <a href="#!" style="; color: #523EE8;">พรีวิวโลโก้</a>
                                </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-2">
                        <ul class="list-unstyled mx-auto">
                            <li>
                                <h5 class="_hilight">Support</h5>
                            </li>
                            <li>
                                <a href="#" style="font-family: prompt; font-weight: 400;  color: #523EE8; font-size: 24px;">ติดต่อเรา</a>
                            </li>
                            <li>
                                <a href="#!" style="color: #523EE8;">Quative ใช้ยังไง</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->

                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3" style="background-color: #523EE8; color:white;">
                <a href="#" style="color:white;"> quative</a>
                © copyright 2019. All rights reserved.
            </div>
            <!-- Copyright -->

        </footer>
    </footer>
<!-- Footer -->
@yield('myjsfile')

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{asset('js/nav-shrink.js')}}"></script>
    <script src="{{asset('js/activeonclick.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="{{asset('js/progess-step.js')}}"></script>
    <script src="{{asset('js/preprofile.js')}}"></script>
    {{--optionnal utility--}}
    <script src="{{asset('js/inputmxlenght.js')}}"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>--}}
    <script src="{{asset('js/flatpickr.js')}}"></script>
    <script src="{{asset('js/datepicker.js')}}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"  ></script>
    <script>
        AOS.init();
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('components.headLinks')
    </head>
    <header style="margin-top:100px;">
        @include('components.header')
    </header>
</header>

<body >
    <div id="app" >
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
    <footer class="container-fluid page-footer bg-white font-small ">
        @include('components.footer')
       
    </footer>
    <div class="footer-copyright text-center p-3" style="background-color: black; color:white;">
        <a href="#" style="color:white !important;"> quative</a>
        © copyright 2019. All rights reserved.
    </div>
    
<!-- Footer -->
@yield('myjsfile')
  @include('components.footerLinks')
</body>

</html>

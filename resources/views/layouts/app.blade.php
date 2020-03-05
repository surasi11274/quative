<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('components.headLinks')
    </head>
   
<body id="app">
    <header style="    width: 100%;
    height: 100px;">
        @include('components.header')
    </header>
    <div class="container-fluid layout-top-bot" style="
        padding-right: 0px !important;
    padding-left: 0px !important;
    
    ">
        @yield('content')
    </div>
    
</body>
<footer class="container-fluid page-footer bg-white font-small mt_ex " >
    @include('components.footer')
   
</footer>
<div class="footer-copyright text-center p-3" style=" background-color: black; color:white;">
    <a href="#" style="color:white !important;"> quative</a>
    © copyright 2019. All rights reserved.
</div>
    
<!-- Footer -->
@yield('myjsfile')
  @include('components.footerLinks')


</html>

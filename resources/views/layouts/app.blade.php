<!DOCTYPE html>
<html lang="en">
<head>

  {!! Html::script('site/js/jquery.min.js') !!}
  {!! Html::style('site/css/bootstrap.min.css') !!}
  {!! Html::style('site/css/flexslider.css') !!}
  {!! Html::style('site/css/font-awesome.min.css') !!}
  {!! Html::style('site/css/bu.css') !!}
  {!! Html::style('cus/css/select2.min.css') !!}
   {!! Html::style("admin/dist/css/sweetalert.css") !!}

@yield('header')


  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>-->

    <title>
      {!! getSetting() !!}
      |
      @yield('title')
    </title>

    <!-- Fonts -->

    <!-- Styles -->
<!--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
{!! Html::style('site/css/style.css') !!}
   
</head>
<body id="app-layout" style="direction: rtl">

  <div class="header">
    <div class="container"> <a class="navbar-brand pull-right" href="{!! url('/') !!}"><i class="fa fa-paper-plane"></i> ONE</a>
      <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="{!! Request::root() !!}/site/images/nav_icon.png" alt="" /> </a>
        <ul class="nav" id="nav">
            <li class="{!! setActive(['home'],'current') !!}"><a href="{!! url('/home') !!}">الرئيسية</a></li>
            <li class="{!! setActive(['showAllBuildings'],'current') !!}"><a href="{!! url('/showAllBuildings') !!}">العقارات</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    ايجار <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    @foreach(getTypes() as $key=>$value)
                    <li style="width:100%"><a href="{{ url('/search?bu_rent=1&bu_type='.$key) }}">{!! $value !!}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    تمليك <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    @foreach(getTypes() as $key=>$value)
                    <li style="width:100%"><a href="{{ url('/search?bu_rent=0&bu_type='.$key) }}">{!! $value !!}</a></li>
                    @endforeach               
                </ul>
            </li>
             <li><a href="{!! url('/contact') !!}">اتصل بنا</a></li>
          @if (Auth::guest())
              <li><a href="{{ url('/login') }}">تسجيل الدخول</a></li>
              <li><a href="{{ url('/register') }}">اشترك معنا</a></li>
          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>تسجيل الخروج</a></li>
                  </ul>
              </li>
          @endif
          <div class="clear"></div>
        </ul>

      </div>
    </div>
  </div>


    @yield('content')

    <div class="footer">
      <div class="footer_bottom">
        <div class="follow-us"> <a class="fa fa-facebook social-icon" href="#"></a> <a class="fa fa-twitter social-icon" href="#"></a> <a class="fa fa-linkedin social-icon" href="#"></a> <a class="fa fa-google-plus social-icon" href="#"></a> </div>
        <div class="copy">
          <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
        </div>
      </div>
    </div>

    <!-- JavaScripts -->
      {!! Html::script('site/js/bootstrap.min.js') !!}
      {!! Html::script('site/js/jquery.flexslider.js') !!}
      {!! Html::script('site/js/responsive-nav.js') !!}
      {!! Html::script('cus/js/select2.min.js') !!}
      {!! Html::script('admin/dist/js/sweetalert.min.js') !!}
<script>

$('.select2').select2({dir:'rtl'});

</script>
@include('errors.message')
@yield('footer')


    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>

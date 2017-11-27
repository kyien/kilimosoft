<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel='shortcut icon' type='image/x-icon' href='dev1/images/my_favicon_1.png' />
  <title>Welcome::Soft farm</title>
  <link href="dev1/css/metro.css" rel="stylesheet">
  <link href="dev1/css/metro-colors.css" rel="stylesheet">
  <link href="dev1/css/metro-icons.css" rel="stylesheet">
  <link href="dev1/css/metro-responsive.css" rel="stylesheet">
  <link href="dev1/css/metro-schemes.css" rel="stylesheet">
  <link href="dev1/css/docs.css" rel="stylesheet">
  <link href="css/flashy/font-family.css" rel="stylesheet">
  <link href="css/flashy/family_type.css" rel="stylesheet">





</head>

<body>

  <div><header class="app-bar green fixed-top navy" data-role="appbar">
    <a class="app-bar-element">
      <span id="toggle-tiles-dropdown" class="mif-apps mif-2x"></span>
      <div class="app-bar-drop-container" data-role="dropdown" data-toggle-element="#toggle-tiles-dropdown" data-no-close="false" style="width: 324px;">
        <div class="tile-container bg-white">
          <div class="tile-small bg-cyan">
            <div class="tile-content iconic">
              <span class="icon mif-onedrive"></span>
            </div>
          </div>
          <div class="tile-small bg-yellow">
            <div class="tile-content iconic">
              <span class="icon mif-google"></span>
            </div>
          </div>
          <div class="tile-small bg-red">
            <div class="tile-content iconic">
              <span class="icon mif-facebook"></span>
            </div>
          </div>
          <div class="tile-small bg-green">
            <div class="tile-content iconic">
              <span class="icon mif-twitter"></span>
            </div>
          </div>
        </div>
      </div>
    </a>
    <div class="app-bar-divider"></div>
    <div class="app-bar-element place-right">
      <a  href="#" class="dropdown-toggle fg-white"><span class="mif-enter"></span> Login</a>
      <div class="app-bar-drop-container bg-white fg-dark place-right" data-role="dropdown" data-no-close="true">
        <div class="padding20">
          <form method="POST" action="{{ url('/login')}}">
            {{ csrf_field() }}
            <h4 class="text-light">Login to service...</h4>
            <div class="input-control text{{ $errors->has('login') ? ' has-error' : '' }}">
              <span class="mif-user prepend-icon"></span>
              <input type="text"  name="login" value="{{ old('login') }}" placeholder="Phone..">
              @if ($errors->has('login'))
              <span class="informer">
                <strong>{{ $errors->first('login') }}</strong>
              </span>
              @endif
            </div>
            <div class="input-control text{{ $errors->has('password') ? ' has-error' : '' }}">

              <span class="mif-lock prepend-icon"></span>
              <input type="password" placeholder="Password..." name="password">
              @if ($errors->has('password'))
              <span class="informer">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
            <label class="input-control checkbox small-check">
              <input type="checkbox">
              <span class="check"></span>
              <span class="caption">Remember me</span>
            </label>
            <div class="form-actions">
              <button class="button primary" type="submit">Login</button>
              <button class="button">Cancel</button>
            </div>
          </form>
          <a href="{{ url('/password/reset') }}">Forgot password?</a>&nbsp;&nbsp;
          <a href="{{ url('/register') }}">Register</a>
        </div>
      </div>
    </div>
    <div class="container">
      <a href="/" class="app-bar-element branding"><img src="{{asset('dev1/images/kilimologo.png')}}" style="height: 50px; width: 150px;
        display: inline-block; margin-left: 20px;"></a>

      <ul class="app-bar-menu small-dropdown">
        <li data-flexorder="1" data-flexorderorigin="0">
          <a href="#" >Home</a></li>

  <li class="" data-flexorder="2" data-flexorderorigin="1">
    <a href="#" class="dropdown-toggle">Our products</a>
    <ul style="display: none;" class="d-menu" data-role="dropdown" data-no-close="true">
      <li>
        <a href="{{route('farm.group')}}" class="dropdown-toggle">Farmers groups</a>

      </li>
      <li>
        <a href="#" class="dropdown-toggle">Extension sevices</a>

      </li>
      <li class="active-container">
        <a href="#" class="dropdown-toggle">Market </a>
      </li>
      <li>
        <a href="#" class="dropdown-toggle">Inventory</a>

      </li>


</ul>
</li><li class="" data-flexorder="3" data-flexorderorigin="2">
  <a href="#" class="dropdown-toggle">Join</a>
  <ul class="d-menu" data-role="dropdown" data-no-close="true">
    <li><a href="{{ url('/register') }}">Register</a></li>

    <li><a href="{{ url('/login') }}">Login</a></li>
  </ul>
</li><li class="" data-flexorder="4" data-flexorderorigin="3">
  <a href="#" class="dropdown-toggle">About us</a>
  <ul class="d-menu" data-role="dropdown" data-no-close="true">
    <li><a href="http://forum.metroui.org.ua">Forum</a></li>
    <li><a href="https://github.com/olton/Metro-UI-CSS">Github</a></li>
    <li class="divider"></li>
    <li><a href="license.html">License</a></li>
  </ul>
</li>
@if(Auth::user())
<li data-flexorder="4" data-flexorderorigin="3">
  <a href="{{ url('/logout') }}"
      onclick="event.preventDefault();
               document.getElementById('logout-form').submit(); " <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                   {{ csrf_field() }}
               </form>
               >LogOut</a></li>

@endif
</ul>

<span class="app-bar-pull"></span>

<div style="display: none;" class="app-bar-pullbutton automatic"></div><div class="clearfix" style="width: 0;"></div></div>
</div>

<br>
<br>
<br>


 @yield('contents')


 <div>
   <footer class="bg-green">


     <div class="padding20">
       @Wabunifu
     </div>

     <div class="align-center padding20 text-small">
       Copyright 2016 <a href="#">Wabunifu</a>
     </div>

   </footer>
 </div>


 <script src="dev1/js/jquery-2.1.3.min.js"></script>
 <script src="dev1/js/jquery.dataTables.min.js"></script>
 <script src="dev1/js/metro.js"></script>
 <script src="dev1/js/select2.min.js"></script>
 <script src="dev1/js/docs.js"></script>
 <script src="dev1/js/prettify/run_prettify.js"></script>
 <script src="dev1/js/ga.js"></script>

 <script src="js/jquery_2_2_4.js"></script>

@include('flashy::message')

</body>



</html>

<!DOCTYPE html>
<html>
<title>HomeView::kilimoSoft</title>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="{{asset('dev1/images/my_favicon_1.png')}}">
<link rel="stylesheet" href="{{asset('css/w3_home.css')}}">
<link rel="stylesheet" href="{{asset('css/blue-grey.css')}}">

<link rel="stylesheet" href="{{asset('css/font_family=open+sans.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome-4.7.0/css/font-awesome.min.css')}}">

<link href="{{asset('css/flashy/font-family.css')}}" rel="stylesheet">
<link href="{{asset('css/flashy/family_type.css')}}" rel="stylesheet">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="{{'/home'}}" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a></li>
  <!-- <li class="w3-hide-small w3-dropdown-hover">
<a href="#" class="w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>    <div class="w3-dropdown-content w3-white w3-card-4">
      <a href="#">create new</a>
      <a href="#">view users list</a>

    </div>
  </li> -->
  <li class="w3-hide-small w3-dropdown-hover">
    <a href="{{route('user.notify')}}" class="w3-padding-large w3-hover-white" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-red"></span></a>
    <div class="w3-dropdown-content w3-white w3-card-4">

    </div>
  </li>

  <li class="w3-hide-small w3-right">
  </li>
  <li class="w3-hide-small w3-right">
  </li>
  <li class="w3-dropdown-hover w3-hide-small w3-right">
     <a href="#" class="w3-padding-large w3-hover-white" title="My Account">
       <img src="{{Storage::url('users_avatars/'.$user->avatar)}}" class="w3-circle" style="height:25px;width:25px"> {{$user->firstName}}  </a>
     <div class="w3-dropdown-content w3-white w3-card-4">
        <a href="{{route('profile',['username'=> Auth::user()->username])}}">View profile</a>
       <a href="{{route('profile.edit',['id'=> $user->id])}}">Edit profile</a>
       <a href="{{ url('/logout') }}"
           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
     Log Out
       </a>

       <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
           {{ csrf_field() }}
       </form>

     </div>
   </li>
 </ul>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-padding-large" href="#">home</a></li>
    <li><a class="w3-padding-large" href="{{route('profile',['username'=> Auth::user()->username])}}">View Profile</a></li>
    <li><a class="w3-padding-large" href="{{route('profile.edit',['id'=> $user->id])}}">EditProfile</a></li>
    <li><a class="w3-padding-large" href="#">Log Out</a></li>
  </ul>
</div>

<!-- Page Container -->
<div class="w3-container w3-content w3-center" style="max-width:auto;margin-top:80px">


@yield('content')

  <!-- End Page Container -->
  </div>
  <br>
<br/>
  <!-- Footer -->



  <script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>


  <script>
  // Get the modal
  var display = document.getElementById('m02');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == display) {
          modal.style.display = "none";
      }
  }
  </script>


  <script>
  // Accordion
  function myFunction(id) {
      var x = document.getElementById(id);
      if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
          x.previousElementSibling.className += " w3-theme-d1";
      } else {
          x.className = x.className.replace("w3-show", "");
          x.previousElementSibling.className =
          x.previousElementSibling.className.replace(" w3-theme-d1", "");
      }
  }

  // Used to toggle the menu on smaller screens when clicking on the menu button
  function openNav() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
      } else {
          x.className = x.className.replace(" w3-show", "");
      }
  }
  </script>
  <!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{asset('js/jquery_2_2_4.min.js')}}"></script>
<script src="{{asset('js/Ajax.js')}}"></script>
 @include('flashy::message')
 
  </body>

<br><br><br><br><br><br><br><br><br><br><br><br><br>

  <footer class="w3-container w3-theme-d3 w3-padding-16">
    <h5>Footer</h5>
    <br/>
    <p>copyright @ <a href="#" target="_blank">Wabunifu</a></p>

  </footer>

  </html>

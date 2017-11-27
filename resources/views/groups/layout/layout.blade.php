<!DOCTYPE html>
<html>
<head>
<title>KilimoSoft::admin</title>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('css/w3.css')}}">
<link rel="stylesheet" href="{{asset('css/font-family.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
<link href="{{asset('css/flashy/font-family.css')}}" rel="stylesheet">
<link href="{{asset('css/flashy/family_type.css')}}" rel="stylesheet">

<!-- Bootstrap -->
   <!--<link rel="stylesheet" href="{{asset('css/bootstrap_3_3_3_4.min.css')}}">-->
   <!--favicon-->
<link rel="shortcut icon" href="{{asset('dev1/images/my_favicon_1.png')}}">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
 {!! Charts::assets() !!}
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-container w3-top w3-black w3-large w3-padding" style="z-index:7">
  <button class="w3-btn w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>

<ul class="w3-navbar  w3-card-2">
  <li><span class="w3-left-align"><a href="{{'/'}}"><img src="{{Storage::url('group_avatars/'.$group->image)}}"
     style="height: 45px; display: inline-block; margin-left: 25px;"> </a></span></li>

    <li class="w3-left-align"><a href="#"><h4>{{$group->name}}</h4></a></li>
<li class="w3-left-align"><a href="{{'/home'}}"><h4><i class="fa fa-home w3-margin-right"></i></h4></a></li>
 @if(Auth::user()->checkRole('admin',$group->id,$user->id))
<li class="w3-dropdown-hover w3-left">
<a href="#">Group Reports</a>
<div class="w3-dropdown-content w3-white w3-card-4">
  <a href="{{route('group.allusersreport',['group_id'=>$group->id])}}">group users</a>

<a href="{{route('group.allproducereport',['group_id'=>$group->id])}}">group produce</a>
<!-- <a href="#">group tools</a>
<a href="#">inventory history</a>
<a href="#">Buyers report</a>
<a href="#">Sales report</a> -->


</div>

</li>
@endif
<li class="w3-dropdown-hover w3-left">
<a href="#">My Reports</a>
<div class="w3-dropdown-content w3-white w3-card-4">
  <a href="{{route('farmers.reportpergroup',['user_id'=>$user->id,'group_id'=>$group->id])}}">All Produce </a>
  <a href="{{route('form.query',['group_id'=>$group->id])}}">Custom</a>
  <a href="{{route('group.pricesreport',['group_id'=>$group->id])}}">Prices</a>
<!-- <a href="#">Per produce</a> -->


</div>
</li>
<li class="w3-dropdown-hover w3-left-align">
  <a href="#">Inventory</h4></a>
  <div class="w3-dropdown-content w3-white w3-card-4">
    <a href="{{route('group.toolsearchform',['group_id'=>$group->id])}}">View Available</a>
     @if(Auth::user()->checkRole('admin',$group->id,$user->id))
    <a href="{{route('group.toolregister',['group_id'=>$group->id])}}">Add</a>
    <a href="{{route('group.tooledit',['group_id'=>$group->id])}}">Update</a>

    @endif
  </div>


</li>
<li class="w3-left"><a href="{{route('group.post',['group_id'=>$group->id])}}"><h4>Posts</h4></a></li>
<li class="w3-left"><a href="{{route('about.group',['group_id'=>$group->id])}}"><h4><i class="fa fa-info-circle "></i>About Group</h4></a></li>

    <!--<li><span class="w3-display-topright"><a href="#"><i class="fa fa-cog" ></i>Settings</a></span></div></li>-->
<!--  <li class="w3-right"><a href="{{'/'}}"><i class="fa fa-sign-out"></i> Log Out</a></li>-->
  @if(Auth::user()->checkRole('admin',$group->id,$user->id))
 <li class="w3-dropdown-hover w3-right">
    <a href="#"><i class="fa fa-cog" ></i> Settings</a>
    <div class="w3-dropdown-content w3-white w3-card-4">
      <a href="{{route('group.edit',['id'=> $group->id])}}">Edit profile</a>


    </div>
  </li>
@endif
 </ul>
</div>

<br>
<br>
<br>

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidenav"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="{{Storage::url('/users_avatars/'.$user->avatar)}}" class="w3-circle w3-margin-right" style="width:54px">
    </div>
    <div class="w3-col s8">
      <span>Welcome, <strong>{{Auth::user()->firstName}}</strong></span><br>
      <a href="#" class="w3-hover-none w3-hover-text-red w3-show-inline-block"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-hover-none w3-hover-text-green w3-show-inline-block"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-hover-none w3-hover-text-blue w3-show-inline-block"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>

<ul class="w3-ul" style="list-style-type:none">
 <a href="#" class="w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu">
  <i class="fa fa-remove fa-fw"></i>  Close Menu</a>
<!--  <header class="w3-container w3-dark-grey">
  <h5>Menu <a href="#" onclick="w3_close()" class="w3-right w3-xlarge w3-closenav" title="close sidenav">×</a></h5>
</header>-->





@if(Auth::user()->checkRole('admin',$group->id,$user->id))
<a href="{{route('group',['group_id'=> $group->id])}}" class="w3-padding w3-blue">Dashboard</a>


<div class="w3-dropdown-hover">
    <a class="w3-padding" href="javascript:void(0)"><i class="fa fa-users fa-fw"></i>Manage users <i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">

      <a href="{{route('edit_group.users',['group_id'=>$group->id])}}" class="w3-hover-blue">Edit User</a>
        <a href="{{route('changerole',['group_id'=>$group->id])}}" class="w3-hover-blue">Assign Roles</a>

    </div>
  </div>
@endif
  <a href="{{route('post.view',['group_id'=>$group->id])}}" class="w3-padding"><i class="fa fa-plus fa-fw"></i> create Post</a>


    @if(Auth::user()->checkRole('admin',$group->id,$user->id) || Auth::user()->checkRole('collector',$group->id,$user->id))
<div class="w3-dropdown-hover">
<a href="javascript:void(0)" class="w3-padding"><i class="fa fa-shopping-cart fa-fw"></i>Produce &nbsp; </a>
<div class="w3-dropdown-content w3-white w3-card-4">
  <a href="{{route('form.produce',['id'=> $group->id])}}" class="w3-hover-blue">Enter</a>
  <!-- <a href="{{route('produce.chart',['id'=> $group->id])}}" class="w3-hover-blue">view</a> -->
</div>
</div>
@endif
<!-- <a href="#" class="w3-padding"><i class="fa fa-check-square-o fa-fw"></i>  Bidders</a> -->

<!-- <div class="w3-dropdown-hover">
    <a class="w3-padding" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i> GroupNotifications  <i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">
      <a href="{{route('messages.create',['group_id'=> $group->id])}}" class="w3-hover-blue">create</a>

    </div>
  </div> -->

<a href="{{route('group.price',['id'=>$group->id])}}" class="w3-padding"><i class="fa fa-line-chart fa-fw"></i>  Market</a>
  @if(Auth::user()->checkRole('admin',$group->id,$user->id))
<a href="{{route('group.edit',['id'=> $group->id])}}" class="w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a>
@endif
  <br><br>

</nav>
<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
 <a href="javascript:void(0)" class="w3-left w3-btn w3-white" onclick="w3_open()">☰</a>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
 @include('flashy::message')
@yield('content')

  <!-- Footer -->


  <!-- End page content -->
</div>

<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
  <br/>
  <p>copyright @ <a href="#" target="_blank">Wabunifu</a></p>

</footer>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="{{asset('js/boostrap_3_3_4.min.js')}}"></script> -->




<script>
// Get the Sidenav
var mySidenav = document.getElementById("mySidenav");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidenav, and add overlay effect
//function w3_open() {
  /*  if (mySidenav.style.display === 'block') {
        mySidenav.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidenav.style.display = 'block';
        overlayBg.style.display = "block";
    }*/
    function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
//}

// Close the sidenav with the close button
/*function w3_close() {
    mySidenav.style.display = "none";
    overlayBg.style.display = "none";
}*/
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

</script>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{asset('js/jquery_2_1_4.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/produceajax.js')}}"></script>

<script src="{{asset('js/tool_edit.js')}}"></script>
<script src="{{asset('js/datepicker.js')}}"></script>


</body>
</html>

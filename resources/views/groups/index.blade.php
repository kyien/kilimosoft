@extends('groups.layout.layout')

@section('content')

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">

  </header>
  <div class="w3-row">
  <div class="w3-col l2  w3-center w3-container"></div>
  <div class="w3-col l9 ">

  <div class="w3-green w3-center">
   <h2> Welcome to {{$group->name}}'s view</h2>
 </div>
 <br>
 <div class="w3-container w3-center">
<h2>Hi {{$user->username}}!</h2>
</div>
</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div>

@endsection

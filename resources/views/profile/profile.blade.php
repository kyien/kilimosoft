@extends('layouts.profile_layout')

@section('content')


       <div class="w3-row">
  <div class="w3-col l2 w3-green w3-center"></div>
  <div class="w3-col l8 w3-center ">
    <div class="w3-container w3-green w3-center">
      <h2> {{$user->username}} 's profile</h2>
    </div>
<p class="w3-center"><img src="{{Storage::url('/users_avatars/'.$user->avatar)}}" class="w3-circle" style="height:150px;width:150px" alt="Avatar"></p>

<div class="w3-container">
  <table class="w3-table w3-striped">
  <tr>
    <td ><label class="w3-text-grey w3-center"><h5>username :</h5></label></td>
    <td><h5>{{$user->username}}</h5></td>

  </tr>
  <tr>
    <td ><label class="w3-text-grey w3-center"><h5>About Me :</h5></label></td>
    <td><h5>{{$user->profile->about}}</h5></td>
  </tr>
  <tr>
    <td ><label class="w3-text-grey w3-center"><h5>location :</h5></label></td>
    <td><h5>{{$user->location}}</h5></td>
  </tr>
  <tr>
    <td ><label class="w3-text-grey w3-center"><h5>crops :</h5></label></td>
    <td><h5>{{$user->profile->crops}}</h5></td>
  </tr>

  </table>
</div>
@if(Auth::id() == $user->id)
<p><a href="{{route('profile.edit',['id'=> $user->id] )}}"><button class="w3-btn w3-padding w3-teal" style="width:120px">Edit Profile &nbsp; ❯</button></a></p>
@endif
</div>
  </div>
  <div class="w3-col l2 w3-green w3-center"></div>
</div>
</div>

@stop

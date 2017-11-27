@extends('layouts.profile_layout')
@section('content')


<div class="w3-row">
<div class="w3-col l2 w3-green w3-center"></div>
<div class="w3-col l8 w3-center ">
<div class="w3-container w3-green w3-center">
<h2> {{$user->username}} 's notifications</h2>
</div>
<p class="w3-center"><img src="{{Storage::url('/users_avatars/'.$user->avatar)}}" class="w3-circle" style="height:150px;width:150px" alt="Avatar"></p>

<div class="w3-container">

  <ul class="w3-ul w3-card-4">
    @foreach($user->unreadNotifications as $notification)
    <div class="w3-display-container">
  <a href="#"><li class="w3-padding-16">

  <span class="w3-large w3-display-middle"> {{$notification->data['message']}}</span>
  <br><br><br><br>
  <span class="w3-display-bottommiddle">{{$notification->created_at}}</span>

  </li></a>



</div>
<br><br>
    @endforeach

  </ul>

</div>
</div>
</div>
<div class="w3-col l2 w3-green w3-center"></div>
</div>
</div>






@endsection

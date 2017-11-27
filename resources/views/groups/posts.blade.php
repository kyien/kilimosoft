@extends('groups.layout.layout')

@section('content')

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">

  </header>
  <div class="w3-row">
  <div class="w3-col l2  w3-center w3-container"></div>
  <div class="w3-col l9 ">

  <div class="w3-green w3-center">
   <h2> {{$group->name}}'s posts</h2>
 </div>
 <br>
 <div class="w3-container w3-center">
@foreach($group_posts as $post_users)
     @foreach($post_users->users as $user)
             @foreach($user->posts as $post)
<div class="w3-container w3-card-2  w3-round " style="width:70%;height=70%"><br>
  <img src="{{Storage::url('/users_avatars/'.$user->avatar)}}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">

  <h4>{{$user->firstName}}</h4><br>
  <hr class="w3-clear">
<div class="w3-container w3-center ">

  <p>{{$post->title}}</p>
    <img src="{{Storage::url('/post_images/'.$post->image)}}" style="width:60%;height=50%" class="w3-margin-bottom">

    <p>{{$post->body}}</p>

</div>
</div>
<br><br>
          @endforeach
    @endforeach
@endforeach
</div>
</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div>

@endsection

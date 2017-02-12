@extends('layouts.profile_layout')

@section('content')


<div class="w3-row">
<div class="w3-col l2 w3-green w3-center"></div>
<div class="w3-col l8 w3-center ">
<div class="w3-container w3-green w3-center">
<h2> Joined Groups</h2>
</div>
<br>
<div class="w3-container">



  <ul class="w3-ul w3-card-4">
    @foreach($usergroups as $group)
    <div class="w3-display-container">
  <a href="{{route('group',['group_id'=> $group->id])}}"><li class="w3-padding-16">
  <span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-large w3-hover-text-red w3-display-topright">×</span>
  <img src="{{Storage::url('/group_avatars/'.$group->image)}}" class="w3-left w3-circle w3-margin-right" style="width:50px">
  <span class="w3-large w3-display-middle">{{$group->name}}</span><br>
  <span class="w3-display-bottommiddle">{{$group->short_description}}</span>

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









@stop

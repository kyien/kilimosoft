
@extends('layouts.profile_layout')

@section('content')

       <div class="w3-row">
  <div class="w3-col l2 w3-green w3-center"></div>
  <div class="w3-col l8 w3-center ">
    <div class="w3-container w3-green w3-center">
      <h2> Available Groups</h2>
    </div>

<div class="w3-container">
  <table class="w3-table w3-striped">
  <tr>
    <th>Group Icon</th>
    <th>Group Name</th>
    <th>Group location</th>
    <th>Produce</th>
    <th>Action</th>
  </tr>
    @foreach($Notusergroups as $group)
  <tr>
    <td ><img src="{{Storage::url('/group_avatars/'.$group->image)}}" class="w3-circle " style="height:75px;width:75px"></td>
    <td>{{$group->name}}</td>
    <td >{{$group->location}}</td>
    <td >{{$group->short_description}}</td>
    <td >
      <!--<form id="join-form" method="post" action="{{url('/group/request')}}>-->
    <a href="{{route('group.request',['user_id'=>$user->id,'group_id'=>$group->id])}}">
      <button class="w3-btn w3-padding w3-teal join" style="width:120px" >Join &nbsp;<i class="fa-fa-plus"></i></button>
    </a>

    </td>
  </tr>
  <tr>
    @endforeach

  </table>
</div>

</div>
  </div>
  <div class="w3-col l2 w3-green w3-center"></div>
</div>
</div>
@stop

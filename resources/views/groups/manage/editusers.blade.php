@extends('groups.layout.layout')



@section('content')


<div class="w3-row">
<div class="w3-col l1  w3-center"></div>
<div class="w3-col l10 ">

<div class="w3-container w3-green w3-center">
 <h2> Group Users</h2>
</div>

<table class="w3-table w3-striped">
<tr>
  <th>User Avatar</th>
  <th>User Name</th>
  <th>User Location</th>
  <th>Phone</th>
    <th>Email</th>
    <th>Action</th>

</tr>
  @foreach($groupusers as $user)
<tr>
  <td ><img src="{{Storage::url('/users_avatars/'.$user->avatar)}}" class="w3-circle " style="height:75px;width:75px"></td>
  <td>{{$user->firstname}}</td>
  <td >{{$user->location}}</td>
  <td >{{$user->phoneNo}}</td>
    <td >{{$user->email}}</td>
    <td >
    <a href="{{route('deleteuser',['user_id'=>$user->id, 'group_id'=>$group->id])}}">
      <button class="w3-btn w3-padding w3-teal join" style="width:120px" >Delete User </button>
    </a>

    </td>
</tr>

  @endforeach

</table>



</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div>


@endsection

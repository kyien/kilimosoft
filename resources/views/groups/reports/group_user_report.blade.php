@extends('groups.layout.layout')



@section('content')


<div class="w3-row">
<div class="w3-col l1  w3-center"></div>
<div class="w3-col l10 ">


<div class="w3-container w3-green w3-center">
 <h2> {{$group->name}}'s members Report</h2>
</div>

<table class="w3-table w3-striped">
<tr>
    <th>Avatar</th>
  <th>Member FirstName</th>
  <th>Member Lastname</th>
  <th>Member Phone</th>
  <th>Member Email</th>
  <th>Member Location</th>


</tr>
  @foreach($results as $result)
<tr>

  <td><img src="{{Storage::url('/users_avatars/'.$result->avatar)}}" class="w3-circle " style="height:50px;width:50px"></td>
  <td >{{$result->firstName}}</td>
  <td >{{$result->lastName}}</td>
    <td >{{$result->phoneNo}}</td>
    <td >{{$result->email}}</td>
    <td >{{$result->location}}</td>

</tr>

  @endforeach

</table>



</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div><br><br>
<a href="{{route('groupusers.output',['group_id'=>$group->id])}}">
  <button class="w3-btn w3-padding w3-teal join" style="width:140px" >DOWNLOADPDF</button>
</a>

@stop

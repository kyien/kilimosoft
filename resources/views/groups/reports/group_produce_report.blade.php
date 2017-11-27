@extends('groups.layout.layout')



@section('content')


<div class="w3-row">
<div class="w3-col l1  w3-center"></div>
<div class="w3-col l10 ">


<div class="w3-container w3-green w3-center">
 <h2> {{$group->name}}'s Produce Report</h2>
</div>

<table class="w3-table w3-striped">
<tr>
  <th>Member Name</th>
  <th>Produce Name</th>
  <th>Quantity</th>
  <th>Units</th>

  <th>Date</th>

</tr>
  @foreach($results as $result)
<tr>

  <td>{{$result->member_name}}</td>
  <td >{{$result->produce_name}}</td>
  <td >{{$result->quantity}}</td>
  <td >{{$result->units}}</td>
    <td >{{$result->created_at}}</td>

</tr>

  @endforeach

</table>



</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div><br><br>
<a href="{{route('groups.output',['group_id'=>$group->id])}}">
  <button class="w3-btn w3-padding w3-teal join" style="width:140px" >DOWNLOADPDF</button>
</a>

@stop

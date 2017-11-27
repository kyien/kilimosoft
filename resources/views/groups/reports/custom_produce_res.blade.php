@extends('groups.layout.layout')



@section('content')


<div class="w3-row">
<div class="w3-col l1  w3-center"></div>
<div class="w3-col l10 ">

<div class="w3-container w3-green w3-center">

 <h2> {{$user->firstName}}'s Produce Report from {{$from}} to {{$to}}</h2>
</div>

<table class="w3-table w3-striped">
<tr>
  <th>Produce name</th>
  <th>Quantity</th>
  <th>Units</th>
  <th>Date</th>


</tr>
  @foreach($res as $result)
<tr>



  <td >{{$result->produce_name}}</td>
    <td >{{$result->quantity}}</td>
    <td >{{$result->units}}</td>
    <td >{{$result->created_at}}</td>


</tr>

  @endforeach

</table>



</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div>

<br><br>
<a href="{{route('pdf.produce_res',['group_id'=>$group->id,'from'=>$from,'to'=>$to])}}">
  <button class="w3-btn w3-padding w3-teal join" style="width:140px" >VIEWDPDF</button>
</a>





@stop

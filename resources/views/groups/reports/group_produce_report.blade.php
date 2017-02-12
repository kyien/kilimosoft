@extends('groups.layout.layout')



@section('content')


<div class="w3-row">
<div class="w3-col l1  w3-center"></div>
<div class="w3-col l10 ">


<div class="w3-container w3-green w3-center">
 <h2> All Group's Produce Report</h2>
</div>

<table class="w3-table w3-striped">
<tr>
  <th>User ID</th>
  <th>Produce Name</th>
  <th>Group Name</th>

  <th>Total Produce</th>



</tr>
  @foreach($results as $result)
<tr>

  <td>{{$result->id}}</td>
  <td >{{$result->produce_name}}</td>
  <td >{{$result->name}}</td>
    <td >{{$result->croptotals}}</td>

</tr>

  @endforeach

</table>



</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div><br><br>
<a href="#">
  <button class="w3-btn w3-padding w3-teal join" style="width:140px" >DOWNLOADPDF</button>
</a>
&nbsp;
<a href="#">
  <button class="w3-btn w3-padding w3-teal join" style="width:120px" >VIEW PDF</button>
</a>

@stop

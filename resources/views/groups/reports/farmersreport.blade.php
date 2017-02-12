@extends('groups.layout.layout')



@section('content')


<div class="w3-row">
<div class="w3-col l1  w3-center"></div>
<div class="w3-col l10 ">

<div class="w3-container w3-green w3-center">
 <h2> All Farmers Report</h2>
</div>

<table class="w3-table w3-striped">
<tr>
  <th>User ID</th>
  <th>User FullNames</th>
  <th>User PhoneNo</th>
  <th>User Location</th>
    <th>Group Name</th>


</tr>
  @foreach($results as $result)
<tr>

  <td>{{$result->id}}</td>
  <td >{{$result->fullNames}}</td>
  <td >{{$result->PhoneNo}}</td>
    <td >{{$result->location}}</td>
    <td >
    {{
      $result->name
    }}

    </td>
</tr>

  @endforeach

</table>



</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div>

<br><br>
<a href="#">
  <button class="w3-btn w3-padding w3-teal join" style="width:140px" >DOWNLOADPDF</button>
</a>
&nbsp;
<a href="#">
  <button class="w3-btn w3-padding w3-teal join" style="width:120px" >VIEW PDF</button>
</a>




@stop

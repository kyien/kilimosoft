<!DOCTYPE html>
<html>
<head>
<title>pdf : view</title>
<link rel="stylesheet" href="{{asset('css/w3.css')}}">


</head>
<body>



<div class="w3-row">
<div class="w3-col l1  w3-center"></div>
<div class="w3-col l10 ">

<div class="w3-container w3-green w3-center">
 <h3> {{$user->firstName}}'s Produce Report from {{$from}} to {{$to}}</h3>
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

  <td>{{$result->id}}</td>

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
</body>
</html>

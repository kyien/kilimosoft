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

 <h2> {{$group->name}}'s members Report</h2>
</div>

<table class="w3-table w3-striped">
<tr>

  <th>Member FirstName</th>
  <th>Member Lastname</th>
  <th>Member Phone</th>
  <th>Member Email</th>
  <th>Member Location</th>


</tr>
  @foreach($results as $result)
<tr>


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


</body>
</html>

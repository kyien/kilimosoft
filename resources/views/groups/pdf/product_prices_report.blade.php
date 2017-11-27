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

 <h2>  Prices Report</h2>
</div>

<table class="w3-table w3-striped">
<tr>

  <th>Product</th>
  <th>Unit Price</th>



</tr>
  @foreach($results as $result)
<tr>


  <td >{{$result->produce_name}}</td>
  <td >{{$result->unit_price}}</td>


</tr>

  @endforeach

</table>



</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div><br><br>


</body>
</html>

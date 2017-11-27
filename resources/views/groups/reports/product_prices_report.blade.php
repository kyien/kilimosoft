@extends('groups.layout.layout')



@section('content')


<div class="w3-row">
<div class="w3-col l1  w3-center"></div>
<div class="w3-col l10 ">


<div class="w3-container w3-green w3-center">
 <h2> Prices Report</h2>
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
<a href="{{route('pdf.pricesoutput')}}">
  <button class="w3-btn w3-padding w3-teal join" style="width:140px" > VIEW PDF</button>
</a>

@stop

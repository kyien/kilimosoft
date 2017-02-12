@extends('groups.layout.layout')

@section('content')


 <div class="w3-row">

<div class="w3-col l12 w3-center">



  <table class="w3-table w3-striped">
  <tr>
    <th>Unit Price</th>
    <th>Crop</th>

  </tr>
    @foreach($prices as $price)
  <tr>

    <td >{{$price->unit_price}}</td>
    <td >{{$price->crops()->name}}</td>
  
  </tr>

    @endforeach

  </table>


</div>

</div>


@stop

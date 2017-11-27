@extends('groups.layout.layout')

@section('content')

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">

  </header>
  <div class="w3-row">
  <div class="w3-col l1  w3-center"></div>
  <div class="w3-col l10 ">

  <div class="w3-container w3-green w3-center">
   <h2>  About {{$group->name}}</h2>
 </div>
 <br>


<div class="w3-container w3-card-2  w3-round w3-margin"><br>

<p>{{$group->short_description}}</p>
<br><br>
  <p>{{$group->description}}</p>


</div>

</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div>

@endsection

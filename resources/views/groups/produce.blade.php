@extends('groups.layout.layout')

@section('content')


 <div class="w3-row">

<div class="w3-col l3 w3-center"></div>
<div class="w3-col l8 ">
  <div class="w3-container w3-green w3-center">
   <h2> Enter Member's Produce</h2>
 </div><br>

  <form class="w3-container w3-card-4"  action="{{route('record.produce',['id' => $group->id])}}" method="POST" >
          {{ csrf_field()}}
  <br>
  <input type="hidden" name="user_name" value="{{$user->username}}">
    <input type="hidden" name="produce_id" value="{{$grouproduces->id}}">

  <p>
  <label class="w3-text-grey"><h4>Member:</h4>

    <select class="w3-select w3-border" name="member">
        <option value="" disabled selected></option>
      @foreach($groupusers->users as $user)
     <option value="{{$user->id}}">{{$user->username}}</option>

     @endforeach
</select>
  </label>
  </p>
<p>
  <label class="w3-text-grey"> <h4> produce:</h4>
    <select class="w3-select w3-border produce" name="produce" id="produce" >
      <option value="" disabled selected></option>
      @foreach($grouproduces->produces as $produce)
     <option value="{{$produce->id}}">{{$produce->name}}</option>
      @endforeach
  </select>
  </label>
  </p>
  <p>
  <label class="w3-text-grey"><h4>Units:</h4>
  <input class="w3-input w3-border units" name="units" type="text" value="" id="units" >
  </label>
  </p>

  <p>
  <label class="w3-text-grey"><h4>Quantity:</h4>
  <input class="w3-input w3-border" name="quantity" type="text" value="" >
  </label>
  </p>
  <br>

  <p><button type="submit" class="w3-btn w3-padding w3-teal w3-" style="width:120px">Insert &nbsp; ❯</button></p>
<br>
  </form>

</div>
<div class="w3-col l1 w3-center"></div>

</div>


@stop

@extends('groups.layout.layout')

@section('content')


 <div class="w3-row">

<div class="w3-col l3 w3-center"></div>
<div class="w3-col l8 ">
  <div class="w3-container w3-green w3-center">
   <h2> Enter Member's Produce</h2>
 </div><br>

  <form class="w3-container w3-card-4"  action="{{route('record.produce')}}" method="POST" id="produce_form">
          {{ csrf_field()}}
  <br>
<input type="hidden" name="group_id" value="{{$group->id}}">
<input type="hidden" name="group_name" value="{{$group->name}}">

<div class="w3-container{{ $errors->has('member') ? ' has-error' : '' }}" id="member_field">
  <label class="w3-text-grey"><h4>Member:</h4>

    <select class="w3-select w3-border" name="member">
        <option value="" disabled selected></option>
      @foreach($groupusers->users as $user)
     <option value="{{$user->id}}|{{$user->username}}">{{$user->username}}</option>

     @endforeach
</select>
  </label>
  @if ($errors->has('member'))
  <span class="w3-text-red">
    <strong>{{ $errors->first('member') }}</strong>
  </span>

  @endif

</div>
<div class="w3-container{{ $errors->has('produce') ? ' has-error' : '' }}" id="produce_field">
  <label class="w3-text-grey"> <h4> produce:</h4>
    <select class="w3-select w3-border produce" name="produce" id="produce" >
      <option value="" disabled selected></option>
      @foreach($grouproduces->produces as $produce)
     <option value="{{$produce->id}}|{{$produce->name}}">{{$produce->name}}</option>
      @endforeach
  </select>
  </label>
  @if ($errors->has('produce'))
  <span class="w3-text-red">
    <strong>{{ $errors->first('produce') }}</strong>
  </span>

  @endif
</div>

<div class="w3-container{{ $errors->has('units') ? ' has-error' : '' }}" id="units_field">

  <label class="w3-text-grey"><h4>Units:</h4>
  <input class="w3-input w3-border units" name="units" type="text" value="" id="units" >
  </label>
  @if ($errors->has('units'))
  <span class="w3-text-red" id="units_error">
    <strong>{{ $errors->first('units') }}</strong>
  </span>

  @endif
</div>

<div class="w3-container{{ $errors->has('quantity') ? ' has-error' : '' }}" id="quantity_field">
  <label class="w3-text-grey"><h4>Quantity:</h4>
  <input class="w3-input w3-border" name="quantity" type="text" value="" >
  </label>
  @if ($errors->has('quantity'))
  <span class="w3-text-red">
    <strong>{{ $errors->first('quantity') }}</strong>
  </span>

  @endif
</div>
  <br>

  <!-- <p><button id="submit_form" type="submit" class="w3-btn w3-padding w3-teal w3-" style="width:120px">Insert &nbsp; ❯</button></p> -->
<p><input type="submit" class="w3-btn w3-padding w3-teal w3-" value="insert" style="width:120px" id="submit_form"></p>
<br>
  </form>
  <br>
  <div class="w3-container" id="print"></div>
</div>
<div class="w3-col l1 w3-center"></div>

</div>


@stop

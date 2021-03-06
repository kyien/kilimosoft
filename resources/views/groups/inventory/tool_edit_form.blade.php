@extends('groups.layout.layout')

@section('content')


 <div class="w3-row">

<div class="w3-col l3 w3-center"></div>
<div class="w3-col l8 ">
  <div class="w3-container w3-green w3-center">
   <h2> Group Tools Edit</h2>
 </div><br>

  <form class="w3-container w3-card-4"  action="{{route('group.toolupdate')}}" method="POST" id="tools_form">
          {{ csrf_field()}}
  <br>
<input type="hidden" name="group_id" value="{{$group->id}}" id="group_id">

<div class="w3-container{{ $errors->has('tool') ? ' has-error' : '' }}">
  <label class="w3-text-grey"><h4>Tool:</h4>

    <select class="w3-select w3-border" name="update_tool" id="update_tool">
        <option value="" disabled selected></option>
      @foreach($tools as $tool)
     <option value="{{$tool->id}}|{{$group->id}}">{{$tool->tool_name}}</option>

     @endforeach
</select>
  </label>
  @if ($errors->has('update_tool'))
  <span class="w3-text-red">
    <strong>{{ $errors->first('update_tool') }}</strong>
  </span>

  @endif

</div>



<div class="w3-container{{ $errors->has('quantity') ? ' has-error' : '' }}">
  <label class="w3-text-grey"><h4>Quantity:</h4>
  <input class="w3-input w3-border" name="quantity" type="text" value="" id="tool_quantity">
  </label>
  @if ($errors->has('quantity'))
  <span class="w3-text-red">
    <strong>{{ $errors->first('quantity') }}</strong>
  </span>

  @endif
</div>
  <br>

  <p><button type="submit" class="w3-btn w3-padding w3-teal w3-" style="width:120px">Update &nbsp; ❯</button></p>
<br>
  </form>

</div>
<div class="w3-col l1 w3-center"></div>

</div>


@stop

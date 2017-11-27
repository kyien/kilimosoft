@extends('groups.layout.layout')



@section('content')


<div class="w3-row">
<div class="w3-col l1  w3-center"></div>
<div class="w3-col l10 ">

<div class="w3-container w3-green w3-center">
 <h2> Assign role</h2>
</div>

<form class="w3-container w3-card-4"  action="{{route('edit_role')}}" method="POST">
        {{ csrf_field()}}
<br>
<input type="hidden" name="group_id" value="{{$group->id}}">
<input type="hidden" name="group_name" value="{{$group->name}}">

<div class="w3-container{{ $errors->has('member') ? ' has-error' : '' }}">
<label class="w3-text-grey"><h4>Member:</h4>

  <select class="w3-select w3-border" name="member">
      <option value="" disabled selected></option>
    @foreach($groupusers as $user)
   <option value="{{$user->id}}">{{$user->username}}</option>

   @endforeach
</select>
</label>
@if ($errors->has('member'))
<span class="w3-text-red">
  <strong>{{ $errors->first('member') }}</strong>
</span>

@endif

</div>
<div class="w3-container{{ $errors->has('role') ? ' has-error' : '' }}" id="produce_field">
<label class="w3-text-grey"> <h4> Assign Role:</h4>
  <select class="w3-select w3-border produce" name="role" id="role" >
    <option value="" disabled selected></option>

   <option >admin</option>
   <option >collector</option>
  

</select>
</label>
@if ($errors->has('role'))
<span class="w3-text-red">
  <strong>{{ $errors->first('role') }}</strong>
</span>

@endif
</div>


<br>

<!-- <p><button id="submit_form" type="submit" class="w3-btn w3-padding w3-teal w3-" style="width:120px">Insert &nbsp; ❯</button></p> -->
<p><input type="submit" class="w3-btn w3-padding w3-teal w3-" value="Assign" style="width:120px"></p>
<br>
</form>



</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div>


@endsection

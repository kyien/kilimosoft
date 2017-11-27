@extends('groups.layout.layout')



@section('content')


<div class="w3-row">
<div class="w3-col l1  w3-center"></div>
<div class="w3-col l10 ">

<div class="w3-container w3-green w3-center">
 <h2> Create New Message</h2>
</div>

<form class="w3-container w3-card-4"  enctype="multipart/form-data"  action="{{route('create.post')}}" method="POST">
        {{ csrf_field()}}
<br>
<input type="hidden" name="group_id" value="{{$group->id}}">
<input type="hidden" name="user_id" value="{{$user->id}}">
<div class="w3-container{{ $errors->has('member') ? ' has-error' : '' }}">
<label class="w3-text-grey"><h4>Title:</h4>

  <input class="w3-input w3-border" type="text" name="title" >

</label>
@if ($errors->has('title'))
<span class="w3-text-red">
  <strong>{{ $errors->first('title') }}</strong>
</span>

@endif

</div>

<div class="w3-container{{ $errors->has('body') ? ' has-error' : '' }}">
<label class="w3-text-grey"><h4>content:</h4></label>

<textarea class="w3-input w3-border" name="body"  required></textarea>


@if ($errors->has('body'))
<span class="w3-text-red">
  <strong>{{ $errors->first('body') }}</strong>
</span>

@endif

</div>
<div class="w3-container" >
  <label class="w3-text-grey">Add Image :
  <input class="w3-input w3-border" type="file" name="image"   accept="image/*">
  </label>


</div>


<br>

<!-- <p><button id="submit_form" type="submit" class="w3-btn w3-padding w3-teal w3-" style="width:120px">Insert &nbsp; ❯</button></p> -->
<p><input type="submit" class="w3-btn w3-padding w3-teal w3-" value="Post" style="width:120px"></p>
<br>
</form>



</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div>


@endsection

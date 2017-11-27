@extends('layouts.profile_layout')

@section('content')


<div class="w3-row">
<div class="w3-col l2 w3-green w3-center"></div>
<div class="w3-col l8 w3-center ">
<div class="w3-container w3-green w3-center">
<h2> Create Farmers Group</h2>
</div>
<br>
<div class="w3-container">


  <form class="w3-container w3-card-4 " enctype="multipart/form-data" action="{{route('group.store')}}" method="POST">
    {{ csrf_field()}}
  <br>

  <div class="w3-container{{ $errors->has('name') ? ' has-error' : '' }}">
  <label class="w3-text-grey ">Group Name: </label/'+'>
  <input class="w3-input w3-border" type="text" name="name" id="name" required=""/>
  @if ($errors->has('firstName'))
  <span class="w3-text-red">
  <strong>{{ $errors->first('name') }}</strong>
  </span>

  @endif
  </div>
  <br/>
  <div class="w3-container{{ $errors->has('location') ? ' has-error' : '' }}">
  <label class="w3-text-grey">location (County) :
  <select class="w3-select" name="location">
    <option value="" disabled selected></option>
    <option>Nairobi</option>
    <option>Mombasa</option>
    <option>Lamu</option>
    <option>Kilifi</option>
    <option>Kwale</option>
    <option>Tana River</option>
    <option>Taita Taveta</option>
    <option>Garissa</option>
    <option>Mandera</option>
    <option>Wajir</option>
    <option>Marsabit</option>
    <option>Isiolo</option><option>Kitui</option><option>Makueni</option><option>Machakos</option><option>Meru</option>
    <option>Tharaka Nithi</option><option>Embu</option><option>Nyeri</option><option>Nyandarua</option><option>Murang'a</option>
    <option>Kiambu</option><option>Nakuru</option><option>Laikipia</option><option>Samburu</option><option>Kajiado</option>
    <option>Narok</option><option>Bomet</option><option>Kericho</option><option>Baringo</option><option>Uasin Gishu</option>
    <option>Nandi</option><option>Elgeyo Marakwet</option><option>West Pokot</option><option>Turkana</option><option>Trans Nzoia</option>
    <option>Bungoma</option><option>Busia</option><option>Vihiga</option><option>Kakamega</option><option>Kisumu</option><option>Siaya</option>
    <option>Homa Bay</option><option>Kisii</option><option>Nyamira</option><option>Migori</option>
  </select>
  </label>
  @if ($errors->has('location'))
  <span class="w3-text-red">
  <strong>{{ $errors->first('location') }}</strong>
  </span>

  @endif
  </div>
  <br>
  hold <b>ctrl + leftClick </b>to select multiple produce
  <div class="w3-container{{ $errors->has('produce_id') ? ' has-error' : '' }}">
  <label class="w3-label w3-text-grey">Produce:

  <select multiple="multiple" class="w3-select" name="produce_id[]">
       @foreach($produces as $produce)
       <option value="{{$produce->id}}">{{$produce->name}}</option>
       @endforeach
  </select>
  </label>
  @if ($errors->has('produce_id'))
  <span class="w3-text-red">
  <strong>{{ $errors->first('produce_id') }}</strong>
  </span>

  @endif
  </div>
  <br>
  <div class="w3-container{{ $errors->has('short_description') ? ' has-error' : '' }}">
  <label class="w3-label w3-text-grey">Short Description:</label>
  <textarea class="w3-input w3-border" name="short_description" style="resize:none" required></textarea>
  @if ($errors->has('short_description'))
  <span class="w3-text-red">
  <strong>{{ $errors->first('short_description') }}</strong>
  </span>

  @endif
  </div>


  <br>
  <p><button type="submit" class="w3-btn w3-padding w3-green" style="width:120px">Create &nbsp; ❯</button></p>
  </form>

</div>

</div>
</div>
<div class="w3-col l2 w3-green w3-center"></div>
</div>
</div>


@stop

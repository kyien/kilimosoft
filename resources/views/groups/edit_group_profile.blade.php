@extends('groups.layout.layout')

@section('content')

<div class="w3-row">
<div class="w3-col l2  w3-center"></div>
<div class="w3-col l8 ">

<div class="w3-container w3-green w3-center">
 <h2> Edit your Group's Profile</h2>
</div>
<br>
<p class="w3-center"><img src="{{Storage::url('/group_avatars/'.$group->image)}}" class="w3-circle" style="height:150px;width:150px" alt="Avatar"></p>

<form class="w3-container w3-card-4" enctype="multipart/form-data" action="{{route('group.update',['id'=>$group->id])}}" method="POST">
 {{ csrf_field()}}
<br>

<p>
<label class="w3-text-grey">Upload Image :
<input class="w3-input w3-border" type="file" name="image" id="image" value="{{$group->image}}" accept="image/*">
</label>
</p>
<p>
<label class="w3-text-grey">Name :
<input class="w3-input w3-border" name="name" type="text" value="{{$group->name}}" >
</label>
</p>
<p>
<label class="w3-text-grey">location :
<select class="w3-select" name="location">
 <option value="" disabled selected>{{$group->location}}</option>
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
</p>
<p>
<label class="w3-text-grey">Short Description :
<input class="w3-input w3-border" name="short_description"  type="text" value="{{$group->short_description}}">
</label>
</p>
<p>
<label class="w3-text-grey">Description(long):
<textarea class="w3-input w3-border" name="description" style="resize:none" required>{{$group->description}}</textarea>
</label>
</p>
<br>

<p><button type="submit" class="w3-btn w3-padding w3-teal" style="width:120px">Change &nbsp; ❯</button></p>

</form>

</div>
<div class="w3-col l2 w3-red w3-center"></div>
</div>


@endsection

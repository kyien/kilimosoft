@extends('layouts.profile_layout')

@section('content')


<div class="w3-row">
  <!-- Left Column -->
  <div class="w3-col l3">
    <!-- Profile -->
    <div class="w3-card-2 w3-round w3-white">
      <div class="w3-container">
       <h4 class="w3-center">My Profile</h4>
       <p class="w3-center"><img src="{{Storage::url('/users_avatars/'.$user->avatar)}}" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
       <hr>
       <p><a href="{{route('profile.edit')}}"><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Edit profile</a></p>

      </div>
    </div>
    <br>

    <!-- Accordion -->
    <div class="w3-card-2 w3-round">
      <div class="w3-accordion w3-white">
        <button onclick="myFunction('Demo1')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
        <div id="Demo1" class="w3-accordion-content w3-container">
          <p>Some text..</p>
        </div>


        <button onclick="document.getElementById('id01').style.display='block'" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-plus fa-fw w3-margin-right"></i>New Group</button>

        <button onclick="document.getElementById('m02').style.display='block'" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i>Join Group</button>
        <!--start of modal modal box 2 -->
        <div id="m02" class="w3-modal">
        <div class="w3-modal-content w3-card-8">
        <header class="w3-container w3-green">
          <span onclick="document.getElementById('m02').style.display='none'"
          class="w3-closebtn">&times;</span>
          <h2>Join Farm group</h2>
        </header>
        <ul class="w3-ul w3-card-4">

        <li class="w3-padding-16">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-large w3-hover-text-red">×</span>
        <img src="img_avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:50px">
        <span class="w3-large">Mike</span><br>
        <span>Web Designer</span>
        </li>
        <li class="w3-padding-16">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-large w3-hover-text-red">×</span>
        <img src="img_avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:50px">
        <span class="w3-large">Jill</span><br>
        <span>Support</span>
        </li>
        <li class="w3-padding-16">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-large w3-hover-text-red">×</span>
        <img src="img_avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:50px">
        <span class="w3-large">Jane</span><br>
        <span>Accountant</span>
        </li>
        </ul>


        </div>
        </div>



        <!--end of modelbox 2 -->


      </div>
    </div>
    <br>



    <br>


    <!--modal boxes-->
    <div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-8">
    <header class="w3-container w3-green">
      <span onclick="document.getElementById('id01').style.display='none'"
      class="w3-closebtn">&times;</span>
      <h2>Create Farm Group</h2>
    </header>

      <form class="w3-container " enctype="multipart/form-data" action="{{route('group.store')}}" method="POST">
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
<br><br>
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

    <footer class="w3-container w3-green">
      <p>Groups@kilimosoft</p>
    </footer>
  </div>
</div>

<!--end of modal box1 -->

  <!-- End Left Column -->
  </div>

    <div class="w3-col l7">

    <div class="w3-container w3-center">
        <h2> My Groups</h2>
        </div>

    @foreach($groups as $group)


    @endforeach
    </div>

    <div class="w3-col l2">

    </div>
@stop

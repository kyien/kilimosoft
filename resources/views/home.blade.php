
@extends('layouts.profile_layout')

@section('content')
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col l3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="{{Storage::url('/users_avatars/'.$user->avatar)}}" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><a href="{{route('profile.edit',['id'=>$user->id])}}"><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Edit profile</a></p>

        </div>
      </div>
      <br>

      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">
          @if(Auth::user()->hasGroup($user->id))
        <button onclick="myFunction('Demo1')"  class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
         <div id="Demo1" class="w3-accordion-content w3-container">
            <a href="{{route('mygroups',['id'=>$user->id])}}" class="w3-hover-blue">Created Groups</a>
            <a href="{{route('joined.group',['id'=>$user->id])}}" class="w3-hover-blue">Joined Groups</a>
          </div>
          @endif

          <a href="{{route('group.create')}}"><button class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-plus fa-fw w3-margin-right"></i>New Group</button></a>

        <a href="{{route('show.groups',['id'=>$user->id])}}"><button  class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i>Join Group</button></a>
            @if(Auth::user()->hasGroup($user->id))
        <a href="{{route('farmers.reportallgroups',['user_id'=>$user->id])}}"><button  class="w3-btn-block w3-theme-l1 w3-left-align">All groups produce Report</button></a>
        @endif
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


      <footer class="w3-container w3-green">
        <p>Groups@kilimosoft</p>
      </footer>
    </div>
  </div>

  <!--end of modal box1 -->

    <!-- End Left Column -->
    </div>

    <!-- Middle Column -->
    <div class="w3-col l9">



      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="{{Storage::url('/users_avatars/'.$user->avatar)}}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">1 min</span>
        <h4>{{$user->firstName}}</h4><br>
        <hr class="w3-clear">
        <p>Register to our platform and get the best prices and varieties of farm produce from hundreds of cooperatives registered in our platform</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <!-- <img src="/w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom"> -->
            </div>
            <div class="w3-half">
              <!-- <img src="/w3images/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom"> -->
          </div>
        </div>
        <!-- <button type="button" class="w3-btn w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
        <button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> -->
      </div>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="/w3images/avatar5.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">16 min</span>
        <h4>Jane Doe</h4><br>
        <hr class="w3-clear">
        <p>  Join our farmers Platform and enjoy maximum benefit for your produce,Market information and the right crop information.  Join our farmers Platform and enjoy maximum benefit for your produce,Market information and the right crop information</p>
          
      </div>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="{{Storage::url('/users_avatars/1485712459.png')}}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">32 min</span>
        <h4>Angie Jane</h4><br>
        <hr class="w3-clear">
        <p>Have you seen this?</p>
        <img src="{{asset('dev1/images/maize.jpg')}}" style="width:100%" class="w3-margin-bottom">
        <p>  Register to our platform and get the best prices and varieties of farm produce from hundreds of cooperatives registered in our platform.  Register to our platform and get the best prices and varieties of farm produce from hundreds of cooperatives registered in our platform</p>
        <!-- <button type="button" class="w3-btn w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
        <button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> -->
      </div>

    <!-- End Middle Column -->
    </div>

    <!-- Right Column -->
    <!-- <div class="w3-col l2">
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Upcoming Events:</p>
          <img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">
          <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p>
          <p><button class="w3-btn w3-btn-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>

      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-btn w3-green w3-btn-block w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-btn w3-red w3-btn-block w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>

      <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      <br>

      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>

    <!-- End Right Column -->
    </div> -->

  <!-- End Grid -->
  </div>
  @endsection

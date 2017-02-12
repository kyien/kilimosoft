@extends('groups.layout.layout')

@section('content')

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">

    <div class="w3 col-l2 w3-center">
    <a href="{{URL::route('messages')}}">
 <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3> @include('messenger.unread-count')</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Messages</h4>
      </div>
    </div>
  </a></div>
  <div class="w3 col-l0.25 w3-center">
<div class="w3 col-l2 w3-center">
    <a href="{{route('pending.users',['group_id'=>$group->id])}}">
      <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{ $countrequests}}</h3>
          </div>
        <div class="w3-clear"></div>
        <h4>Join Requests</h4>
      </div>
    </div></a>
  </div>
    <div class="w3 col-l0.25 w3-center">
  <div class="w3 col-l2 w3-center">
<a href="#">
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Posts</h4>
      </div>
    </div></a>
</div>
  <div class="w3 col-l0.25 w3-center">
<div class="w3 col-l2 w3-center">
    <a href="{{route('group.users',['group_id'=>$group->id])}}"><div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{$countusers}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div></a>
  </div>
  </div>

  <div class="w3-container w3-section">
    <div class="w3-row-padding" style="margin:0 -16px">

    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>General Stats</h5>
    <p>New Visitors</p>
    <div class="w3-progress-container w3-grey">
      <div id="myBar" class="w3-progressbar w3-green" style="width:25%">
        <div class="w3-center w3-text-white">+25%</div>
      </div>
    </div>

    <p>New Users</p>
    <div class="w3-progress-container w3-grey">
      <div id="myBar" class="w3-progressbar w3-orange" style="width:50%">
        <div class="w3-center w3-text-white">50%</div>
      </div>
    </div>

    <p>Bounce Rate</p>
    <div class="w3-progress-container w3-grey">
      <div id="myBar" class="w3-progressbar w3-red" style="width:75%">
        <div class="w3-center w3-text-white">75%</div>
      </div>
    </div>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Countries</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="w3-btn">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Recent Users</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span>
        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Mike</span><br>
      </li>
      <li class="w3-padding-16">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span>
        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jill</span><br>
      </li>
      <li class="w3-padding-16">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span>
        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Recent Comments</h5>
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>
  </div>
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>
@endsection

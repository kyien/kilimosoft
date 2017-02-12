@extends('layouts.layout')

@section('contents')

<div class="container page-content">





      <div class="grid">




        <div class="row cells3">
              <div class="cell">
              </div>
              <div class="cell padding20 bg-white">
                  <div class="preloader-ring dark-style" data-role="preloader" data-type="ring" data-style="dark" style="margin: auto"><div class="wrap"><div class="circle"></div></div><div class="wrap"><div class="circle"></div></div><div class="wrap"><div class="circle"></div></div><div class="wrap"><div class="circle"></div></div><div class="wrap"><div class="circle"></div></div></div>
              </div>
              <div class="cell ">
              </div>
          </div>

        <div class="row cells12">




                <div class="cell"></div>
                <div class="cell colspan10">

                      <div class="align-center">
                        <div>
                          <div class="preloader-ring" data-role="preloader" data-type="ring"></div>
                        </div>

                          <table class="table">
                                              <thead>
                                              <tr>
                                                  <th class="sortable-column" ><h2 class="align-center">Group Name<h2></th>
                                                  <th class="sortable-column "><h2 class="align-center">Location</h2></th>
                                                  <th class="sortable-column"><h2 class="align-center">Action</h2></th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($groups as $group)

                                              <tr>
                                                  <td>
                                                  {{$group->name}}

                                                  </td>
                                                  <td>{{$group->location}}</td>
                                                  <td>
                                                    <a href="{{route('group.request',['user_id'=>Auth::user()->id,'group_id'=>$group->id])}}"><button class="join button primary">
                                                      Request to join &nbsp;
                                                      <span class="icon mif-plus"></span>
                                                    </button></a>

                                                  </td>
                                              </tr>
                                              @endforeach

                                              </tbody>
                                          </table>







                   </div>

            </div>

  <div class="cell"></div>


</div>

      </div>

</div>



<br><br><br><br>
@endsection

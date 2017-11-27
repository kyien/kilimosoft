@extends('groups.layout.layout')

@section('content')


 <div class="w3-row">

<div class="w3-col l3 w3-center"></div>
<div class="w3-col l8 ">
  <div class="w3-container w3-green w3-center">
   <h2> custom search report</h2>
 </div><br>

  <form class="w3-container w3-card-4"  action="{{route('submit.query')}}" method="POST" id="custom_form_search">
          {{ csrf_field()}}


          <div class="w3-container{{ $errors->has('report_type') ? ' has-error' : '' }}">
            <label class="w3-text-grey"><h4>Report type:</h4>
              <select class="w3-select w3-border" name="report_type" id="report_type">
                  <option value="" disabled selected></option>

               <option value="produce">produce</option>
               <option value="tools">tools</option>



          </select>
            @if ($errors->has('report_type'))
            <span class="w3-text-red">
              <strong>{{ $errors->first('report_type') }}</strong>
            </span>

            @endif
          </div>

  <div class="w3-row">
    <div class="w3-col l6 w3-center">
      <div class="w3-container{{ $errors->has('from_search') ? ' has-error' : '' }}">
        <label class="w3-text-grey"><h4>From:</h4>
        <input class="w3-input w3-border" name="from_search" type="text" value="" id="from_search">
        </label>
        @if ($errors->has('from_search'))
        <span class="w3-text-red">
          <strong>{{ $errors->first('from_search') }}</strong>
        </span>

        @endif
      </div>
    </div>
    <div class="w3-col l6 w3-center">
      <div class="w3-container{{ $errors->has('to_search') ? ' has-error' : '' }}">
        <label class="w3-text-grey"><h4>To:</h4>
        <input class="w3-input w3-border" name="to_search" type="text" value="" id="to_search">
        </label>
        @if ($errors->has('to_search'))
        <span class="w3-text-red">
          <strong>{{ $errors->first('to_search') }}</strong>
        </span>

        @endif
      </div>
    </div>
  </div>
<input type="hidden" name="group_id" value="{{$group->id}}" id="group_id">



  <p><button type="submit" class="w3-btn w3-padding w3-teal w3- w3-right" style="width:120px">Request&nbsp; ❯</button></p>
<br>
<br>
  </form>

</div>
<div class="w3-col l1 w3-center"></div>

</div>


@stop

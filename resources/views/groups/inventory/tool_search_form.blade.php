@extends('groups.layout.layout')

@section('content')


 <div class="w3-row">

<div class="w3-col l1 w3-center"></div>
<div class="w3-col l10 ">
  <div class="w3-container w3-green w3-center">
   <h2>Tools Search</h2>
 </div><br>

  <form class="w3-container w3-card-4" action="{{route('group.toolsearchresultsform')}}"  method="post" id="tools_form">
          {{ csrf_field()}}

<input type="hidden" id="available" name="available" value="">
<div class="w3-container{{ $errors->has('tool_search') ? ' has-error' : '' }}">
  <label class="w3-text-grey"><h4> Search Tool:</h4>

    <select class="w3-select w3-border" name="tool_search" id="tool_search">
        <option value="" disabled selected></option>
      @foreach($tools as $tool)
     <option value="{{$tool->id}}|{{$group->id}}|{{$tool->tool_name}}">{{$tool->tool_name}}</option>

     @endforeach
</select>
  </label>
  @if ($errors->has('tool_search'))
  <span class="w3-text-red">
    <strong>{{ $errors->first('tool_search') }}</strong>
  </span>

  @endif

</div>
<script>
$(document).ready(function() {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $('#tool_search').on('change', function() {
            var data = {
                'id': $(this).val()
            };
            console.log(data);
            $.get('/group/toolsearch/results', data, function(data, textStatus, xhr) {
                /*optional stuff to do after success */
                console.log(data);
                if(data.info==0)
                {
                  $('#searchoutput').append("<h4>Tool Unavailable</h4>").css({'color':'#ff0000'});

                  }
                  else {
                      var content= '<h4 id="availability">Available: '+data.info+'</h4>';
                      content+='<label class="w3-text-grey"><h4>Quantity:</h4><input class="w3-input w3-border" name="req_quantity" type="text" value="" ></label><br>';
                      content+='<a href="#"><button type="submit" class="w3-btn w3-padding w3-teal join" style="width:120px">Make Request </button></a><br><br>';


                     $('#tools_form').append(content);
                     $('#availability').css({'color':'#00ff00'})
                     $('#available').attr('value',data.info);

                 }




            });
        });
    });

</script>

  <br>



<br><br>

</form>
<br><br>
<div class="w3-container{{ $errors->has('tool_search') ? ' has-error' : '' }}">
  @if ($errors->has('req_quantity'))
  <span class="w3-text-red">
    <strong>{{ $errors->first('req_quantity') }}</strong>
  </span>

  @endif
</div>
 <div class="w3-container" id="searchoutput">

</div>
<br><br><br>
<div class="w3-col l1 w3-center"></div>

</div>


@endsection

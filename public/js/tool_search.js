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

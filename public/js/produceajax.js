//jquery ajax to load product units

$(document).ready(function() {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $('#produce').on('change', function() {
            var data = {
                'id': $(this).val()
            };
            console.log(data);
            $.get('/produceinfo', data, function(data, textStatus, xhr) {
                /*optional stuff to do after success */
                console.log(data);
                // $('#units').val(data.info).attr('disabled','true');
                $('#units').val(data.info).prop('readonly',true);
            });
        });

          // console.log('okey!');
        $('#produce_form').submit(function(e){
          // e.preventDefault();
          console.log('okey!');
          var mydata = $(this).serialize();
          console.log(mydata);

          $.ajax({ // create an AJAX call...
            data:  mydata, // get the form data
            type: $(this).attr('method'), // GET or POST
            url: $(this).attr('action'), // the file to call
            success: function(data) { // on success..

                  if(data.success){

                    alert("record inserted successfully!");
  console.log(data.res);
  // var res=JSON.stringify(data.res);
  var res=$.param(data.res);
  console.log(res);
  window.open('/group/produce/produce_receipt?'+res);
                    // var link='<a href="#"><button class="w3-btn w3-padding w3-teal join" style="width:120px">print receipt </button></a><br><br>';
                    // $('#print').append(link);
                  }
                  else {
                      alert("error inserting record");
                  }
                //$('#created').html(response); // update the DIV

            },
            error:function(jqxhr,status,error){
              $('.err').remove();
              var errors = jqxhr.responseJSON;
              $.each(errors, function(field, text){
                var msg = '<span class="w3-text-red err">'+text+'</span';
                $('#'+field+'_field').append(msg);
              });
              console.log(jqxhr);
              console.log(status);
              console.log(error);

            }
            });
            return false;
         });
    });


$(document).ready(function(){
console.log('hello world!');
  $('#join-form').submit(function(e) {
  /*  $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });*/
  e.preventDefault();
    var id= $('.group_id').val();
    var url = '/group/request';
    //var host = window.location.hostname;
   console.log(id);
        $.ajax({
            type: 'post',
            url: url,
           data: {
               //'_token': $('input[name=_token]').val(),
                'user_id': $('.user_id').val(),
                'group_id': $('.group_id').val(),
                'test':001
              },

            success: function(data) {

               console.log(data);
            }
        });
//return false;
    });

});

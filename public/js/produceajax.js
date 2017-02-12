//jquery ajax to load product units
//
// $(document).ready(function(){
//   console.log('hello world!');
// $('#produce').change(function() {
//   var id= $(this).val();
//   console.log(id);
//   $.ajax(
//     {
//     url: '/produceinfo/'+id,
//     type: 'get',
//     dataType:'json',
// //data:{},
//     success: function(data) {
//       if (data.success == true) {
//         $("#units").value=data.info;
//       }
//       else {
//         alert('Cannot find info');
//       }
//
//     }
//
//   });
// });
// });
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
                $('#units').val(data.info);

            });
        });
    });

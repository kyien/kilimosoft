$(document).ready(function() {

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#update_tool').on('change', function() {
    var data = {
        'id': $(this).val(),
        'group_id': $('.group_id').val()
    };
    console.log(data);
    $.get('/toolinfo', data, function(data, textStatus, xhr) {
        /*optional stuff to do after success */
        console.log(data);
        // $('#units').val(data.info).attr('disabled','true');
        $('#tool_quantity').val(data.toolinfo);
    });
});
});

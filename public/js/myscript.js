$(function(){
    //Determine the Current Year.
    var currentYear = (new Date()).getFullYear();
    //Loop and add the Year values to DropDownList.
    for (var i = 2020; i <= currentYear; i++) {
        var option = document.createElement("option");
        option.innerHTML = i;
        option.value = i;
        $('#ddlYears').append(option);
    }


    $('#memberscount').submit(function (e) {
        $('#ye').text($('#ddlYears').val());
        var route = $('#memberscount').data('route');
        var form_data = $(this);
        $.ajax({
            type: 'POST',
            url: route,
            data: form_data.serialize(),
            success: function (Response) {
                $('#tdata').empty();
                for (var i = 0; i <Response.names.length; i++){
                   var row = $('<tr>').append($('<td>').text(Response.names[i]), $('<td>').text(Response.counts[i]));
                    $('#tdata').append(row);
                }
            }
        });
        e.preventDefault();
    });

});

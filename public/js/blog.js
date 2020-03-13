/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    $('#catList').chosen();
    $('#date').datepicker({
        autoclose: true,
        format: 'mm/dd/yyyy',
    }).on('changeDate', function(selected) {
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       
        $.ajax({
            url: "/blog/getBlogDateWise",
            method: 'POST',
            dataType: 'json',
            data: {date: $('#date').val()},
            beforeSend: function() {

            },
            success: function(result) {
                $('#blogTbody').html('');
                $.each(result.data,function(k,v){
                    $('#blogTbody').append('<tr><td>'+v.catName+'</td><td>'+v.title+'</td><td>'+v.description+'</td><td>'+v.created_at+'</td></tr>')
                });
            }

        });
    });
});
function test(date1){
    
}
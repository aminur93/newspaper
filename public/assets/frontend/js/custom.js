$(document).ready(function () {
    
    $("#email_subscribe").on("submit",function (e) {
        e.preventDefault();
        
        var route = $("#action_route").val();
    
        var formData = $("#email_subscribe").serializeArray();
        
        $.ajax({
            url: route,
            type: "post",
            data: formData,
            dataType: "json",
            success: function (data) {
                $("form").trigger("reset");
                
                if(data.flash_message_success) {
                    $('#success_message').html('<div class="alert alert-success">\n' +
                        '<button class="close" data-dismiss="alert">×</button>\n' +
                        '<strong>Success! '+data.flash_message_success+'</strong> ' +
                        '</div>');
                }else {
                    $('#serror_message').html('<div class="alert alert-danger">\n' +
                        '<button class="close" data-dismiss="alert">×</button>\n' +
                        '<strong>Success! '+data.error+'</strong> ' +
                        '</div>');
                }
            }
        });
        
    })
})
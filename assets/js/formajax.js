
	jQuery(document).ready(function($) {
    $('#enquiry').submit(function(e) {
        e.preventDefault();
    /* var formData = {
            fname: $('#fname').val(),
            lname: $('#lname').val(),
            action : 'send_email',
        }; */

       //var token_val = form_ajax.token;
       // console.log(token_val);

        var formData = $('#enquiry').serialize();
        alert(formData);

        $.ajax({
            type: 'POST',
            url: form_ajax.url,
             data: formData + '&action=send_email&token='+form_ajax.token, // Add '&' before 'action'
            dataType: 'json', // Expect JSON response
            success: function(response) {
                //alert("response sent");
                console.log(response);

                $('#myinfo').text(response.data.fname);
                $('#enquiry').trigger("reset");
            },
            error: function(res){
                //alert(res.data);
                console.log(res);
                console.log(res.responseJSON.data);
            }
        });
        
    });
});

	
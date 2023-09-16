let btn = document.getElementById('btn');
let responseContainer = document.getElementById('response-container');
let currPage = 1; // Initialize the current page

btn.addEventListener('click', ajaxfunction);

function ajaxfunction() {
     // Update the bodyParams to include the page parameter
    const bodyParams = {
        action: 'action=send_pagenum', // Update action name
      //  nonce: 'security=' + load_more_obj.security, 
       // page: 'page=' + currPage, // Add the 'page=' prefix
    };

    console.log(bodyParams);
    console.log(bodyParams.action); 

    fetch(load_more_obj.ajax_url, {
        method: "post",
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: bodyParams.action
    })
    .then(res => {
        return res.text();
    })
    .then(response => {
        // Append the new response to the response container
       // responseContainer.innerHTML += response + '<br>';
       // currPage++; // Increment the current page for the next request
      console.log(response);
    })
    .catch(error => {
        console.error(error);
    });
}





    /*
	jQuery(document).ready(function($) {
    $('#btn').click(function() {
        // alert("hello");

        pageNum++;
        //alert(pageNum); 
     var data = {
            currPage: pageNum,
            action : 'send_pagenum',
            security: load_more_obj.security,
        }; 
       
        $.ajax({
            type: 'POST',
            url: load_more_obj.ajax_url,
             data: data,
            dataType: 'html',
            success: function(response) {
                //alert("response sent");
                console.log(response)
                $('.post-container').append(response);

                if (pageNum >= load_more_obj.maxPage) {
                        $('#btn').hide();
                    }

            },
            error: function(res){
                //alert(res.data);
                console.log(res);
                console.log(res.responseJSON.data);
            }
        }); 
        
    });
});
	*/



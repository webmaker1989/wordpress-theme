let btn = document.getElementById('btn');
let responseContainer = document.getElementById('response-container');
let currPage = 2; // Initialize the current page (assuming the first page is already loaded)

btn.addEventListener('click', ajaxfunction);

function ajaxfunction() {
    // Update the bodyParams to include the page parameter
    const bodyParams = new URLSearchParams({
        action: 'send_pagenum', // Update action name
        security: load_more_obj.security,
        page: currPage, // Update the current page
    });

    //console.log(bodyParams.toString());

    fetch(load_more_obj.ajax_url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: bodyParams.toString()
    })
    .then(res => {
        return res.text();
    })
    .then(response => {
        if (response.trim() !== '') {
            // Append the new response to the response container
            responseContainer.innerHTML += response;
            currPage++; // Increment the current page for the next request
            //console.log(load_more_obj.max_page);
        }  
        else if (response.trim() === 'No more posts') {
                // No more posts to load, hide the "Load More" button
                btn.style.display = 'none';
        }
    
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



    var pageNum = 1;
    var maxPage = load_more_obj.max_page;

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
	
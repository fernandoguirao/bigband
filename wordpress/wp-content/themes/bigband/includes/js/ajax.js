jQuery(document).ready(function($) {
    var cadena='';
    $('#ajax-form').submit(function(e){
                 e.preventDefault();
         jQuery.post(MyAjax.url, {nonce : MyAjax.nonce, action : 'buscar_posts' ,cadena : $('#cadena').val() }, function(response) {
                $('#posts_container').hide().html(response).fadeIn();
            });
    });
         
});
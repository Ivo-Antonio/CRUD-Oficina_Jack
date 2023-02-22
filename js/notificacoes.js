$(document).ready(function() {
    
        if ($('.notify').val() != undefined && $('.notify').val() != null) {
            $('.badge').show();

            $(".rel").click(function(){
                $('.badge').hide();
                let dados = $('.notify').val();
                
                let enviar = 'notify='+dados;
                $.ajax({
                    url: './request/gc_see_prop_pre',
                    type: 'GET',
                    data: enviar,
                    success: function(response) {
                        $(".info").html(response);
                        $("#info_modal").modal();
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                })
            })    
        }else{
            $('.badge').hide();
        }
    
})
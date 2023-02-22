 
$(".remove_prop").click(function(e){
    e.preventDefault();
    let value = $(this).attr('id');
    let enviar = 'remover_prop='+value;
    $.ajax({
        url: './request/remover',
        type: 'GET',
        data: enviar,
        success: function(response) {
            $(".info").html(response);
            $("#info_modal").modal();
        },
        cache: false,
        contentType: false,
        processData: false
    }); 
})



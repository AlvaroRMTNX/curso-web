$(document).ready(function () {

    // Inicializar campos
    $(".dropdown-trigger").dropdown({
        hover: true,
        alignment: 'left',
        coverTrigger: false
    });
    $('.materialboxed').materialbox();
    $('.scrollspy').scrollSpy();
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
    $('.parallax').parallax();
    $(".slider").slider({
        indicators: true,
        duration: 800,
        interval: 4000
    });
    $('.carousel').carousel({
        dist:-10,
        pressed:true
    });

    // Validar formulario

    $("#form-contact").submit(function (event) {

        M.toast({
            html: 'Enviando Mensaje ...'
        })
        // Enviando mensaje ajax
        $.ajax({
            type: "POST",
            url: "php/send.php",
            data: "usr-name=" + escape($('#usr-name').val()) + "&usr-email=" + escape($('#usr-email').val()) + "&usr-phone=" + escape($('#usr-phone').val()) + "&usr-msj=" + escape($('#usr-msj').val()),

        }).done(function (response) {
            // console.log(response);
            // console.log('Entro success');
            M.Toast.dismissAll();

            // Enviamos mensaje SUCCESS
            M.toast({
                html: response,
                classes: 'success'
            })

            //Limpiamos Formulario.
            $('#usr-name').val('');
            $('#usr-phone').val('');
            $('#usr-email').val('');
            $('#usr-msj').val('');
        }).fail(function (data) {
            // console.log(data);       
            M.Toast.dismissAll();
            // Enviamos mensaje ERROR
            M.toast({
                html: 'Ups! Intente de nuevo',
                classes: 'error'
            })


            // Set the message text.
            if (data.responseText !== '') {
                console.error(data.status + " " + data.statusText);
                console.info(data.responseText);

            } else {
                M.toast({
                    html: 'Ups! Ocurrió un error y su mensaje no pudo ser enviado.',
                    classes: 'error'
                })

            }
        });

        event.preventDefault();
    });
});


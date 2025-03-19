$(document).ready(function () {
    $(".deleteLivro").click(function () {
        var del_id = $(this).attr('value');
        var url = window.location.href;
        let string = url.replace('#', '')
        let urlSplit = url.split("?"); // cria um array separados por '&'
        url = urlSplit[0] + "ajax.php";
        
        
        $.ajax({
            type: 'POST',
            url: url,
            data: 'id=' + del_id,
            success: function (data) {
                window.location.reload();
            }
        });
    });
    $(".deleteAgendado").click(function () {
        var del_id = $(this).attr('value');
        var url = window.location.href;
        let urlSplit = url.split("?"); // cria um array separados por '&'
        url = urlSplit[0] + "ajax.php";
        
        
        $.ajax({
            type: 'POST',
            url: url,
            data: 'id=' + del_id,
            success: function (data) {
                window.location.reload();
            }
        });
    });

    $('.formLogin').submit(function (event) {
        // Stop the browser from submitting the form.
        //do the validation here

        // Serialize the form data.
        var form = $(this);
        var url = window.location.href + "ajax.php";
        var email = $("#email").val();

        // Submit the form using AJAX.
        $.ajax({
            url: url,
            type: 'post',
            data: {
                'email': $('.formLoginEmail').val(),
                'senha': $('.formLoginSenha').val(),
                'input': "LOGIN",
            },
            dataType: 'json',
            success: function (data) {
                if (data == "Validado") {
                    return true;
                }
                else {
                    event.preventDefault();
                    alert(data);
                }
            },
            error: function (data) {
                //error
                alert("error")
                alert(data)
            }
        });
    });
    $('.formSign').submit(function (event) {
        // Stop the browser from submitting the form.


        //do the validation here

        // Serialize the form data.
        var url = window.location.href + "ajax.php";
        // Submit the form using AJAX.
        $.ajax({
            url: url,
            type: 'post',
            data: {
                'email': $('.formSignEmail').val(),
                'input': "SIGN",
            },
            dataType: 'json',
            success: function (data) {
                if (data == "Validado") {
                    return true;
                }
                else {
                    alert(data);
                    event.preventDefault();
                }
            },
            error: function (data) {
                //error
                alert("error")
            }
        });
    });
});
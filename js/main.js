$(document).ready(function (){
    var root = "http://18.134.74.30/proyectotfg/";
    $(".btnUserLogon").on("click",function (){
        var usuario = $(".txtEmailUserLogin").val().trim(),
            clave = $(".txtPassUserLogin").val().trim();

        $.ajax({
            type: "POST",
            url: root + "php/Accionesusuario/login-user.php",
            data: {
                usuario: usuario,
                clave : clave
            },
            success : function (data) {
                console.log(data);
                if (data == "true") {
                    window.location.href = "http://18.134.74.30/proyectotfg/";
                } else {
                    alert("Las credenciales no coinciden, por favor intentelo de nuevo.");
                }

            }
        });
    });
    $(".btnRegisterUser").on("click",function (){
        //Recojo los campos de cuando un usuario se registra
        var usuario = $(".txtUsernameRegister").val().trim(),
            clave   = $(".txtPassRegister").val().trim(),
            self   = this;

        if(usuario !== "" && clave !== ""){
            //Enviar los datos con Ajax
            $.ajax({
                type: "POST",
                url: root + "php/Accionesusuario/register.php",
                data: {
                    usuario : usuario,
                    clave : clave
                },
                beforeSend: function (){
                    $(self).addClass("loading");
                },
                success: function (data){
                  $(self).removeClass("loading");
                      $(".txtUsernameRegister,.txtUsernameRegister").val("");
                      alert(data);

                },
                error: function (){
                    $(self).removeClass("loading");
                    alert("Error de servidor");
                }
            });
        }else{
            alert("Llene todos los campos vacios");
        }
    });
    $(".btnMarkFavorite").on("click",function (){
        var post_id = $(this).attr("data-idpublicaciones");

        $(this).remove();
        $.ajax({
            type: "POST",
            url: root + "php/Accionesusuario/favorite.php",
            data:{
                post_id : post_id
            },
            success: function (data){
                if(data == "true"){
                    alert("Articulo agregado a favoritos");
                }else{
                    alert("Error...");
                }
            }
        });
    });

    $(".btnDeleteFavorite").on("click",function (){
        var favorite_id = $(this).attr("data-idfavoritos"),self = this;

        $.ajax({
            type: "POST",
            url: root + "php/Accionesusuario/delete_favorite.php",
            data: {
                favorite_id : favorite_id
            },
            success: function (data){
                console.log(data);
                if (data == "true"){
                    $(self).parent().parent().remove();
                    alert("Articulo eliminado de favoritos");
                }else{
                    alert("Error...");
                }
            }
        });
    });
    $("#show").mousedown(function (){
       $('.txtPassUserLogin').removeAttr('type');
       $('#show').addClass('eye slash icon').removeClass('eye icon');
    });
    $('#show').mouseup(function (){
        $('.txtPassUserLogin').attr('type','password');
        $('#show').addClass('eye icon').removeClass('eye slash icon');
});
});
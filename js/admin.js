//Funciones de administradores de JavaScript
$(document).ready(function (){
    var root = "http://18.134.74.30/proyectotfg/";
    try{
        CKEDITOR.replace('txtDescription');
    }catch (e){

    }
    $(".btnAdminLogon").on("click",function (){
        var usuario = $(".txtEmailLogin").val().trim(),
            clave = $(".txtPassLogin").val().trim();

        $.ajax({
            type: "POST",
            url: root + "php/accionesAdmin/login.php",
            data: {
                usuario: usuario,
                clave: clave
            },
            success : function (data) {
                console.log(data);
                if (data == "true") {
                    window.location.href = "http://18.134.74.30/proyectotfg/admin/";
                } else if (data == "false") {
                    alert("Las credenciales no coinciden, por favor intentelo de nuevo.");
                }

            }
        })
    });
    $('.btnSaveCategory').on("click", function () {
        var category = $('.txtNameCategory').val().trim();
        self = this;

        $.ajax({
            type: "POST",
            url: root + "php/accionesAdmin/save_category.php",
            data: {
                category: category
            },
            success: function (data){
              $(self).removeClass("loading");
              if(data > 0){
                  alert("Se guardo Correctamente.");
                  $('.txtNameCategory').val();

                  console.log(data);

                  $('.tblCategories tr:last').after('<tr><td>'+category+'</td></td><td><i class="fa fa-times btnRemoveCategory"  data-categoriaId="'+data+'" title="Eliminar Categoria"></i></td></tr>');
              }else{
                  alert("Hubo un error.");
              }
            },
            error: function (){
                alert("Se ha producido un error");
            }
        });
    });
    $('.tblCategories').on("click",'.btnRemoveCategory',function (){
        var category_id = $(this).attr("data-categoriaId"),
            self = this;

        $.ajax({
            type: "POST",
            url: root + "php/accionesAdmin/delete_category.php",
            data: {
                category_id: category_id
            },
            success: function (data) {
                if(data > 0) {
                    $(self).parent().parent().remove();
                    alert("Se ha eliminado correctamente.");
                }else{
                    alert("Hubo un error.");
                }
            },
            error: function (){
                alert("Se ha producido un error");
            }
        });
    });

    $('.btnSavePost').on("click",function(e)
    { e.preventDefault();
        var description = CKEDITOR.instances.txtDescription.getData(),
            name = $('.txtNamePost').val().trim(),
            category_id = $('.txtCategoryPost').val().trim();

        if(description !== "" && name !== "" && category_id > 0){
            var formData = new FormData($("#new_post_container")[0]);
            formData.append("description", description);
            console.log(formData);
            $.ajax({
                xhr: function (){
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress",function (evt){
                        if(evt.lengthComputable){
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);

                        console.log(percentComplete);
                        }
                    },false);

                    return xhr;
                },
                type: "POST",
                url: root + "php/accionesAdmin/new_post.php",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function(){
                //nada
                },
                success: function(data){
                    $('.txtNamePost,.image_file').val("");
                    CKEDITOR.instances['txtDescription'].setData("");
                 alert("Se subio la publicacion");
                },
                error: function(){
                    alert("Error...");
                }
            });
        }else{
            alert("Llene todos los campos");
        }
    });
    $('.UpdatePost').on("click",function(e)
    { e.preventDefault();
        var description = CKEDITOR.instances.txtDescription.getData(),
            name = $('.txtNamePost').val().trim(),
            category_id = $('.txtCategoryPost').val().trim();

        if(description !== "" && name !== "" && category_id > 0){
            var formData = new FormData($("#new_post_container")[0]);
            formData.append("description", description);
            $.ajax({
                xhr: function (){
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress",function (evt){
                        if(evt.lengthComputable){
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                        }
                    },false);

                    return xhr;
                },
                type: "POST",
                url: root + "php/accionesAdmin/update_post.php",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function(){
                    //nada
                },
                success: function(data){
                    alert("Se actualizo la publicacion");
                },
                error: function(){
                    alert("Error...");
                }
            });
        }else{
            alert("Llene todos los campos");
        }

    });



    $('#gridPublicaciones').on("click",'.btnDeletePost',function (){
        var post_id = $(this).attr("data-publicacionesId"),
            self = this;

        $.ajax({
            type: "POST",
            url: root + "php/accionesAdmin/delete_post.php",
            data: {
                post_id : post_id
            },
            success: function (data) {
                if(data) {
                    console.log(data);
                    $(self).parent().remove();
                    alert("Se ha eliminado correctamente.");
                }else{
                    alert("Hubo un error.");
                }
            },
            error: function (){
                alert("Se ha producido un error");
            }
        });

    });


    $('#gridPublicaciones').on("click",'.btnViewDisable',function (){
        var post_id = $(this).attr("data-publicacionesId"),
            self = this;

        $.ajax({
            type: "POST",
            url: root + "php/accionesAdmin/disable_post.php",
            data: {
                post_id : post_id
            },
            success: function (data) {
                if(data) {
                    alert("Se ha desactivado correctamente.");
                    location.reload();
                }else{
                    alert("Hubo un error.");
                }
            },
            error: function (){
                alert("Se ha producido un error");
            }
        });

    });
    $('#gridPublicaciones').on("click",'.btnViewActive',function (){
        var post_id = $(this).attr("data-publicacionesId"),
            self = this;

        $.ajax({
            type: "POST",
            url: root + "php/accionesAdmin/enable_post.php",
            data: {
                post_id : post_id
            },
            success: function (data) {
                if(data) {
                    alert("Se ha activado correctamente.");
                    location.reload();
                }else{
                    alert("Hubo un error.");
                }
            },
            error: function (){
                alert("Se ha producido un error");
            }
        });

    });


});
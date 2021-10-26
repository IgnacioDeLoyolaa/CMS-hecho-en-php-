<!--<div class="publicaciones_main_img">-->
<!--    <img src="../css/img/--><?php //echo $post[0]["img_publicaciones"].$post[0]["extension"] ;?><!--" style="width: 100%" alt="--><?php //echo $post[0]["nombre"]?><!--">-->
<!--</div>-->
<div style='background-image:url("../css/img/<?php echo $post[0]["img_publicaciones"].$post[0]["extension"] ;?>"); background-repeat: no-repeat; background-size: cover; padding-top: 30px; padding-bottom: 30px;' class="stackable" >
<div class="publicaciones_main_body stackable">
    <h1>
        <?php echo $post[0]["nombre"];?>
        <?php if(isset($_SESSION["user"]) && $check == 0): ?>
            <span class="btnMarkFavorite"  data-idpublicaciones="<?php echo $_GET["id_publicaciones"]?>" title="Marcar como favorito"><i class="star icon" style="font-size: 24px;"></i></span>
        <?php endif;?>
    </h1>

   <p>
       <?php
       $fecha = date('d-m-Y H:i:s',$post[0]["creado"]);
       ?>
    <?php echo $fecha;?> - <?php echo $post[0]["usuario"]; ?>
   </p>
    <p>
        <?php echo $post[0]["texto"]; ?>
    </p>
</div>
</div>
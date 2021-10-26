<div class="ui three column grid stackable" id="gridPublicaciones">
    <?php foreach ($posts as $post): ?>
        <div class="column">
            <a href="../post/<?php echo $post['id_publicaciones'];?>">
            <div class="ui segment">
                <a href="edit-post/<?php echo $post['id_publicaciones'];?>"><i class="edit icon"></i></a>
                <i class="trash icon btnDeletePost" data-publicacionesId="<?php echo $post['id_publicaciones'];?>"></i>
                <?php if($post['activo']){?>

                    <i class="eye slash icon btnViewDisable" data-publicacionesId="<?php echo $post['id_publicaciones'];?>"></i>
                    <img class="ui medium centered image" src="../css/img/<?php echo $post["img_publicaciones"].$post["extension"];?>">

                <?php }  else { ?>
                    <i class="eye icon btnViewActive" data-publicacionesId="<?php echo $post['id_publicaciones'];?>"></i>
                    <img class="ui medium disabled centered image" src="../css/img/<?php echo $post["img_publicaciones"].$post["extension"];?>">

                <?php } ?>
                <hr>
                <h2 class="post_title"><?php echo $post["nombre"]?></h2>
                <p class="post_date"><?php echo date("d-m-Y H:i:s",$post["creado"])?></p>
            </div>
            </a>
        </div>
    <?php endforeach;?>
</div>

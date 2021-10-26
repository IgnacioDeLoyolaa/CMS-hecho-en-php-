<div class="ui  three column grid stackable" style="min-height: 40vh;margin:5vh;">
    <?php foreach ($posts as $post): ?>
        <div class="column">
            <div class="ui segment stackable" style="height: 100%">

                <a href="post/<?php echo $post['id_publicaciones'];?>">
                    <img class="ui centered image" style="height: 45%" src="css/img/<?php echo $post["img_publicaciones"].$post["extension"]; ?>">
                </a>
                <h2 class="post_title"><?php echo $post["nombre"]?></h2>
                <p class="post_date"><?php echo date("d-m-Y H:i:s",$post["creado"])?></p>
            </div>
            </a>
        </div>
    <?php endforeach;?>
</div>

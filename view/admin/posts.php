<form enctype="multipart/form-data" id="new_post_container" class="ui form new_post_container stackable">
<h1>Nueva Publicacion</h1>
    <p><b>Nombre De La Publicacion</b></p>
    <div class="ui input">
        <input type="text" class="txtNamePost" name="txtNamePost" placeholder="Nombre De La Publicacion">
    </div>
<p><b>Categoria</b></p>
<div class="ui input">
    <div class="field">
    <select class="txtCategoryPost" name="txtCategoryPost">
        <option value="0">--SELECCIONAR UNA CATEGORIA--</option>
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id_categorias']?>"> <?php echo $category['categorias'];?></option>
        <?php endforeach;?>
    </select>
    </div>
</div>
    <p><b>Seleccione Una Imagen</b></p>
    <div class="ui input">
            <input type="file" class="image_file" name="image_file">
        </div>
    <p><b>Publicacion</b></p>
    <textarea name="txtDescription" id="txtDescription" cols="30" rows="10"></textarea>

    <button class="ui blue basic button btnSavePost">Subir Publicaciones</button>
    <p class="clearfix"></p>
</form>
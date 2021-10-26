<div id="new_post_container" class="ui form new_post_container">
    <h1>Plataformas</h1>
    <p><b>Nombre De La Plataforma</b></p>
    <div class="ui input">
        <input type="text" class="txtNameCategory"  placeholder="Nombre De La Categoria">
    </div>
        <button class="ui blue basic button  btnSaveCategory">Guardar Categoría</button>
        <p class="clearfix"></p>

        <h3>Plataformas existentes</h3>
        <table class="ui single line table tblCategories">
            <thead>
                <th>Nombre De las plataformas</th>
                <th>Acción</th>
            </thead>
            <tbody>
                <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo $category['categorias']; ?></td>
                        <td><i class="trash icon btnRemoveCategory" aria-hidden="true" title="Eliminar Categoria" data-categoriaId="<?php echo $category['id_categorias'];?>"></i> </td>
                    </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
</div>

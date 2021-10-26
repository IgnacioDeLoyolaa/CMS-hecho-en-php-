
<!--<div class="ui pointing menu" style="margin-bottom: 0;">
    <a class="active item">
        Home
    </a>
    <a class="item">
        Publicaciones
    </a>
    <div class="right menu">
        <a href="http://18.134.74.30/proyectotfg/admin/index.php" class="item">
            Iniciar Sesión
            </a>
        <a href="http://18.134.74.30/proyectotfg/register" class="item">
            Registrar
        </a>
        </div>
    </div>
</div>-->
<?php if(!isset($_SESSION["user"])) :?>
<div class="ui large top fixed hidden stackable menu ">

    <div class="ui container">
        <a href="http://18.134.74.30/proyectotfg/index.php" class="<?php echo $clase_active_home?> item">Home</a>
        <a href="http://18.134.74.30/proyectotfg/posts" class="<?php echo $clase_active_publicaciones?> item">Publicaciones</a>
        <div class="right menu">
            <div class="item">
                <a  href="http://18.134.74.30/proyectotfg/log-in" class="ui button">Iniciar Sesión</a>
            </div>
            <div class="item">
                <a href="http://18.134.74.30/proyectotfg/register" class="ui primary button">Registrar</a>
            </div>
        </div>
    </div>
    <?php endif;?>
<?php if(isset($_SESSION["user"])) :?>
<div class="ui large top fixed hidden stackable menu ">

    <div class="ui container">
        <a href="http://18.134.74.30/proyectotfg/index.php" class="active item">Home</a>
        <a href="http://18.134.74.30/proyectotfg/posts" class="item">Publicaciones</a>
            <a href="http://18.134.74.30/proyectotfg/my-favorites" class="ui button">
                Mis publicaciones favoritas
            </a>
        <div class="right menu">
            <div class="item">
                <a  href="http://18.134.74.30/proyectotfg/php/Accionesusuario/logout.php" class="ui button">Cerrar Sesión</a>
            </div>
        </div>
    </div>
    <?php endif;?>
</div>
</div>


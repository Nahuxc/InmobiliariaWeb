            


<?php  require_once(__DIR__."/../includes/navbar.php") ?>



<section class="dashboard">
    <!-- navbar dashboard -->
    <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>
            <form class="search-box">
                <input type="text" placeholder="Buscar...">
            </form>
        </div>


        <?php if(!isset($_SESSION["administrador"])) :?>
        <div id="box-login" class="box-form">

            <!-- inicio del formulario -->
            <div class="form-init">
                <img src="<?=URL_PATH?>/assets/img/logoDv.png" alt="">
                <h2>Iniciar Sesion</h2>
            </div>
            <!-- formulario  -->
            <form action="<?= URL_PATH ?>/user/initSc" method="POST" class="form-content">
                <label>Usuario:</label>
                <input placeholder="Usuario" name="user" type="text">
                <label>Contraseña:</label>
                <input placeholder="Contraseña" name="password" type="password">
                <input class="btn-submit" name="loginSubmit" value="Iniciar sesión" type="submit">
            </form>


        </div>

        <?php endif?>
        <?php if(isset($_SESSION["administrador"])) :?>
        
        <div class="box-login-alert">
            <div class="login-alert">
                <h2>Ya Iniciaste Sesion</h2>
                <a href="<?=URL_PATH?>/render/">Volver al Inicio</a>
            </div>
        </div>
        <?php endif;?>

</section>


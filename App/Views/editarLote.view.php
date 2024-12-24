<?php  require_once(__DIR__."/../includes/navbar.php") ?>

<section class="dashboard">
    <!-- navbar dashboard -->
    <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>
            <form class="search-box">
                <input type="text" placeholder="Buscar...">
            </form>
        </div>

        <div class="box-form create">

            <!-- inicio del formulario -->
            <div class="form-init">
                <img src="<?=URL_PATH?>/assets/img/logoDv.png" alt="">
                <h2>Editar Publicacion ID: 1</h2>
            </div>
            <!-- formulario  -->
            <form action="<?=URL_PATH?>/render/crearLote" enctype="multipart/form-data" method="POST" class="form-content"> <!-- en el action poner el crear.php -->
                <label>Imagen Principal/ Portada 1:</label>
                <input type="file" name="img_s">
                
                <label>Imagen Detalle 2:</label>
                <input type="file" name="img_r" >
                
                <label>Imagen Detalle 3:</label>
                <input type="file" name="img_x">
                
                <label>Imagen Detalle 4:</label>
                <input type="file" name="img_l">
                
                <label>Titulo:</label>
                <input placeholder="Titulo" require name="title" type="text">
                
                <label>Disponibilidad:</label>
                <input placeholder="Disponible / No Disponible" required name="unable" type="text">
                
                <label>Ubicacion:</label>
                <input required placeholder="Ubicacion" name="location" type="text">
                
                <label>Descripcion: </label>
                <textarea required id="inputMsg" name="description" rows="3" cols="10"></textarea>
                
                <label>Precio:</label>
                <input required placeholder="ej: $50500" name="price" type="number">
                
                <input class="btn-submit" name="submit" value="Crear Publicacion" type="submit">
            </form>
        </div>

</section>
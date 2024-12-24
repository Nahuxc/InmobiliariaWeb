<?php  require_once(__DIR__."/../includes/navbar.php") ?>

<?php


if (isset($_POST["submit"])) {
    /* imagen portada */
    $img_s = $_FILES["img_s"]["tmp_name"];
    $img_s_name = md5(uniqid()) . "_" . basename($_FILES["img_s"]["name"]);
    
    /* imagen 2 */
    $img_r = $_FILES["img_r"]["tmp_name"];
    $img_r_name = md5(uniqid()) . "_" . basename($_FILES["img_r"]["name"]);
    
    /* imagen 3 */
    $img_x = $_FILES["img_x"]["tmp_name"];
    $img_x_name = md5(uniqid()) . "_" . basename($_FILES["img_x"]["name"]);
    
    /* imagen 4 */
    $img_l = $_FILES["img_l"]["tmp_name"];
    $img_l_name = md5(uniqid()) . "_" . basename($_FILES["img_l"]["name"]);

    
    $direct = __DIR__ . "/../../public/assets/img/";


    $path_s = $direct . $img_s_name;
    $path_r = $direct . $img_r_name;
    $path_x = $direct . $img_x_name;
    $path_l = $direct . $img_l_name;


    $allowed_types = ['jpg', 'jpeg', 'png'];
    $errors = [];

    if (in_array(strtolower(pathinfo($img_s_name, PATHINFO_EXTENSION)), $allowed_types)) {
        move_uploaded_file($img_s, $path_s);
    } else {
        $errors[] = "Formato no permitido para la imagen de portada.";
    }

    if (in_array(strtolower(pathinfo($img_r_name, PATHINFO_EXTENSION)), $allowed_types)) {
        move_uploaded_file($img_r, $path_r);
    } else {
        $errors[] = "Formato no permitido para la imagen 2.";
    }

    if (in_array(strtolower(pathinfo($img_x_name, PATHINFO_EXTENSION)), $allowed_types)) {
        move_uploaded_file($img_x, $path_x);
    } else {
        $errors[] = "Formato no permitido para la imagen 3.";
    }

    if (in_array(strtolower(pathinfo($img_l_name, PATHINFO_EXTENSION)), $allowed_types)) {
        move_uploaded_file($img_l, $path_l);
    } else {
        $errors[] = "Formato no permitido para la imagen 4.";
    }


    $title = $_POST["title"];
    $description = $_POST["description"];
    $unable = $_POST["unable"];
    $price = $_POST["price"];
    $location = $_POST["location"];


    $data = [
        "img_s" => "/assets/img/" . $img_s_name,
        "img_r" => "/assets/img/" . $img_r_name,
        "img_x" => "/assets/img/" . $img_x_name,
        "img_l" => "/assets/img/" . $img_l_name,
        "title" => $title,
        "description" => $description,
        "unable" => $unable,
        "price" => $price,
        "location" => $location
    ];

    $db = new Database();
    $cn = $db->getConnection();


    $lotesController = new LotesController($cn); 

    $lotes = $lotesController->crear($data);

    echo "Imagenes guardadas exitosamente y datos almacenados.";
}





?>


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
                <h2>Crear una Publicacion</h2>
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
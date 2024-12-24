<?php  require_once(__DIR__."/../includes/navbar.php")?>

<?php

$db = new Database();
$cn = $db->getConnection();

$lotesController = new LotesController($cn);

$lotes = $lotesController->viewDetail($_GET["id"]);



?>

<!-- box content -->
<section class="dashboard">
        <!-- navbar dashboard -->
        <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>
            <form class="search-box">
                <input type="text" placeholder="Buscar...">
            </form>
        </div>


        <!-- detail cargar datos desde la base de datos para generar cada uno de los details junto con sus 4 imagenes -->
        <div class="box-detail">
            <div class="detail-contentImg">
                <div class="box-detail-contentImg">
                    <!-- imagen principal -->
                    <div class="contentImg">
                        <img class="mainImg" src="<?=URL_PATH?><?= $lotes["img_s"] ?>" alt="">
                    </div>
                    <!-- selector de imagenes -->
                    <div class="thumbnail_container">
                        <img class="thumbnail active" src="<?=URL_PATH?><?= $lotes["img_s"] ?>" alt="">
                        <img class="thumbnail" src="<?=URL_PATH?><?= $lotes["img_r"] ?>" alt="">
                        <img class="thumbnail" src="<?=URL_PATH?><?= $lotes["img_x"] ?>" alt="">
                        <img class="thumbnail" src="<?=URL_PATH?><?= $lotes["img_l"] ?>" alt="">
                    </div>
                </div>
            </div>
            <!-- detalle del producto -->
                <div class="box-detail-texts">
                    <h1 class="text-title">  <?= $lotes["title"] ?> </h1>
                    <p class="text-point">Ubicacion: <?= $lotes["location"] ?></p>
                    <!-- crear span de color si esta o no disponible -->
                    <p class="text-enabled">Disponibilidad: <span><?= $lotes["unable"] ?></span></p>
                    <p class="text-description"><span>Descripcion:</span><?= $lotes["description"] ?> </p>

                    <p class="text-price">$ <?= $lotes["price"] ?></p>
                    <div class="details-btns">
                        <a class="contact-detailBtn" href="<?=URL_PATH?>/render/contacto">Contactar con un Asesor</a>
                        <!-- BOTONES UNICAMENTE CON EL INICIO DE ADMIN -->
                        <?php if(isset($_SESSION["administrador"])) : ?>
                            <a class="edit-detailBtn" href="<?=URL_PATH?>/render/editarLote">Editar</a>


                            <!-- etiqueta de eliminar -->
                            <a class="delete-detailBtn" href="<?=URL_PATH?>/render/eliminarLote?id=<?= $lotes['id'] ?>">Eliminar</a>
                        <?php endif?>
                </div>
            </div>
        </div>

</section>
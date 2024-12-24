<?php require_once(__DIR__."/../includes/navbar.php");?>

<?php

$db = new Database();
$cn = $db->getConnection();

$lotesController = new LotesController($cn);

$lotes = $lotesController->listar();


?>

<section class="dashboard">
    <!-- navbar dashboard -->
    <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>
            <form class="search-box">
                <input type="text" placeholder="Buscar...">
            </form>
        </div>

        <section class="box-content-panel">
                    <div class="box-cards">

                    <?php if(!empty($lotes)):?>
                            <?php foreach($lotes as $lote) :?>

                                <!-- card -->
                                <div class="card-content">
                                    <img src="<?=URL_PATH?><?= $lote["img_s"] ?>" alt="">
                                    <div class="card-content-texts">
                                        <h1><?= $lote["title"] ?> </h1>
                                        <span><i class="fa-solid fa-location-dot"></i> Ubicacion: <?= $lote["location"] ?></span>
                                        <p class="card-content-texts-description"><?=substr($lote["description"], 0, 120)." . . ." ?></p>
                                    </div>
                                    <div class="card-content-btns">
                                        <a href="<?=URL_PATH?>/render/lotesDetail?id=<?=$lote["id"] ?>">Ver Mas Informacion</a>
                                    </div>
                                </div>
                            <?php endforeach;?>

                    
                    <?php endif?>

                    <?php if (count($lotes) == 0): ?>
                            <h2> No Hay Lotes Publicados</h2>
                        <?php endif?>

                        <?php if(isset($_SESSION["administrador"])) : ?>
                            <div class="card-content-insert">
                                <a href="<?=URL_PATH?>/render/crearLote">+</a>
                            </div>
                        <?php endif?>
                    </div>
            </section>

</section>

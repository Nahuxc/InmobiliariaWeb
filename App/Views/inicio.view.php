<?php


$db = new Database();
$cn = $db->getConnection();

$lotesController = new LotesController($cn);

$lotes = $lotesController->listar();



?>



    <?php require_once(__DIR__."/../includes/navbar.php"); ?>
    <!-- box content -->
    <section class="dashboard">
        <!-- navbar dashboard -->
        <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>
            <form class="search-box">
                <input type="text" placeholder="Buscar...">
            </form>
        </div>

        <!-- content -->
        <!-- INICIO DE PRESENTACION -->

        <div class="box-home">
            <div class="box-home-images">
                <img src="<?=URL_PATH?>/assets/img/logoDv.png" alt="">
            </div>
            <div class="box-home-texts">
                <h1>Estamos Para Ayudarte</h1>
                <p>En Inmobiliarios, te ofrecemos una selección exclusiva de lotes de terrenos en ubicaciones estratégicas y de gran potencial. Ya sea que estés buscando invertir, construir tu hogar o simplemente explorar nuevas oportunidades, tenemos la opción perfecta para ti.
                Haz que tu proyecto se haga realidad. ¡Explora nuestras opciones y da el primer paso hacia tu futuro hoy mismo!</p>
            </div>
        </div>

        <section class="home-information">
            <!-- box contents information on what can be obtained -->
            <div class="box-information">
                <div class="box-img-information">
                    <i class="fa-solid fa-sack-dollar" aria-hidden="true"></i>
                </div>
                <div class="box-information-text">
                    <h2>Precios accesible</h2>
                    <p>Los mejores precios del lugar en cuanto a valor de zona otorgado.</p>
                </div>
            </div>
            <!-- box contents information on what can be obtained -->
            <div class="box-information">
                <div class="box-img-information">
                <i class="fa-solid fa-leaf" aria-hidden="true"></i>
                </div>
                <div class="box-information-text">
                    <h2>Entorno natural</h2>
                    <p>Comodo, Grande y de buena calidad para todos nuestros clientes.</p>
                </div>
            </div>
            <!-- box contents information on what can be obtained -->
            <div class="box-information">
                <div class="box-img-information">
                    <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
                </div>
                <div class="box-information-text">
                    <h2>Seguridad las 24 hs</h2>
                    <p>Lugar seguro y resguardado para que no haya peligro dentro de la zona.</p>
                </div>
            </div>
        </section>


        <section class="box-content-panel">
                    <div class="box-cards">
                    <?php if(!empty($lotes)):?>
                        <?php foreach($lotes as $lote) :?>

                        <!-- card -->
                        <div class="card-content">
                            <img src="<?=URL_PATH?><?= $lote["img_s"] ?>" alt="">
                            <div class="card-content-texts">
                                <h1><?= $lote["title"] ?> </h1>
                                <span><i class="fa-solid fa-location-dot"></i> Ubicacion:  <?= $lote["location"] ?></span>
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


                        <!-- solo para el admin -->
                        <?php if(isset($_SESSION["administrador"])) : ?>
                            <div class="card-content-insert">
                                <a href="<?=URL_PATH?>/render/crearLote">+</a>
                            </div>
                        <?php endif?>
                    </div>
            </section>

    </section>
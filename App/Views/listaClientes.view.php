<?php  require_once(__DIR__."/../includes/navbar.php") ?>

<?php

$db = new Database();
$cn = $db->getConnection();

$clients = new ClientController($cn);

$clients = $clients->listar();


?>

<section class="dashboard">
    <!-- navbar dashboard -->
    <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>
            <form class="search-box">
                <input type="text" placeholder="Buscar...">
            </form>
        </div>

    <div class="box-clients">
        <?php if(!empty($clients)):?>
                <?php foreach($clients as $client) :?>
                    <div class="box-clients-data">
                        <span><i class="fa-solid fa-user"></i> Datos de Cliente</span>
                        <h3>Nombre: <?= $client["name"] ?></h3>
                        <hr>
                        <h3>Apellido: <?= $client["surname"] ?></h3>
                        <hr>
                        <p>email: <?= $client["email"] ?></p>
                        <hr>
                        <p>Telefono: <?= $client["phone"] ?></p>
                        <hr>
                        <span>Fecha de registro: <?= $client["date"] ?></span>
                    </div>
                <?php endforeach;?>
        <?php endif?>
    </div>

</section>
<?php  require_once(__DIR__."/../includes/navbar.php") ?>


<?php

/* array de errores */
$errors = array();

if(isset($_POST["submit"])){

    $name = isset($_POST["name"]) ? $_POST["name"] : false;
    $surname = isset($_POST["surname"]) ? $_POST["surname"] : false;
    $email = isset($_POST["email"]) ? $_POST["email"] : false;
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : false;


    

    if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name) ){
        $name_validate = true;
    }else{
        $name_validate = false;
        $errors["name"] = "el nombre no es valido";
    }

    /* verificacion de surname */
    if(!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)){
        $surname_validate = true;
    }else{
        $surname_validate = false;
        $errors["surname"] = "el apellido no es valido";
    }

    /* verificar email */

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validate = true;
    }else{
        $email_validate = false;
        $errors["email"] = "el email no es valido";
    }

    $save_user = false;


    if(count($errors) == 0){

        $save_user = true;

        $data = [
            "name" => $name,
            "surname" => $surname,
            "email" => $email,
            "phone" => $phone
        ];
    
        $db = new Database();
        $cn = $db->getConnection();
    
    
        $clientController = new ClientController($cn);
    
        $client = $clientController->crear($data);


    }


}

?>

<section class="dashboard contact">
    <!-- navbar dashboard -->
    <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>
            <form class="search-box">
                <input type="text" placeholder="Buscar...">
            </form>
        </div>

        <div id="box-login" class="box-form">

            <!-- inicio del formulario -->
            <div class="form-init">
                <img src="<?=URL_PATH?>/assets/img/logoDv.png" alt="">
                <h2>Dejanos tus datos y un asesor se contactará a la brevedad</h2>
            </div>
            <!-- formulario  -->
            <form method="POST" class="form-content">
                <?php if(isset($_POST) && $errors) : ?>
                    <?php foreach($errors as $error):?>
                        <span> <?= $error ?> </span>
                    <?php endforeach?>
                <?php endif?>
                <label>Nombre:</label>
                <input placeholder="Nombre" required id="inputName" name="name" type="text">
                <label>Apellido: </label>
                <input placeholder="Apellido" required id="inputSurname" name="surname" type="text">
                <label>Email: </label>
                <input placeholder="Email" required  id="inputEmail" name="email" type="email">
                <label>Telefono: </label>
                <input type="number" id="inputPhone" required name="phone"  placeholder="Ej: 11 3333-3334">
                <label>Consulta:</label>
                <textarea id="inputMsg" name="description" rows="3" cols="10"></textarea>
                <input id="btnSubmit" class="btn-submit" name="submit" value="Contactar Asesor" type="submit">
            </form>
        </div>

</section>


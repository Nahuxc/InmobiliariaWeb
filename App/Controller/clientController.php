<?php

/* requerir modelo de client */

require_once(__DIR__."/../Models/lote.model.php");

class ClientController{

    private $clientModel;

    /* PASAMOS LA CONEXION POR EL PARAMTRO DE LA CLASE */
    public function __construct(PDO $connection){
        /* insertar modelos */
        $this->clientModel = new Client($connection);
    }

    public function listar(){
        return $clients = $this->clientModel->getAll();
    }

    public function crear($data){
        return $this->clientModel->insert($data);
    }


}


?>

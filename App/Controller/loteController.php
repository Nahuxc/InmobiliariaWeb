<?php

/* requerir modelo de client */
require_once(__DIR__."/../Models/lote.model.php");

class LotesController{

    private $loteModel;

    public function __construct(PDO $connection){
        /* insertar modelos */
        $this->loteModel = new Lote($connection);
    }

    public function crear($data){
        return $this->loteModel->insert($data);
    }

    public function listar(){
        return $this->loteModel->getAll();
    }


    public function viewDetail($id){
        return $this->loteModel->getById($id);
    }

    public function editar($id, $data){
        return $this->loteModel->updateById($id, $data);
    }

    /* metodo de eliminar que viene del model de lotes */
    public function eliminar($id){
        return $this->loteModel->deleteById($id);
    }


}


?>

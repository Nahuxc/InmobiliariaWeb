<?php

require_once(__DIR__."/../Controller/loteController.php");

/* renderizado */

class RenderController extends Controller{

    public function __construct(PDO $connection){
    }

    public function inicio(){
        $this->render("inicio", [], "main");
        
    }
    
    public function lotes(){
        $this->render("lotes", [], "main");
        
    }
    
    public function sobreNosotros(){
        
        $this->render("sobreNosotros", [], "main");
        
    }
    
    public function contacto(){
        $this->render("contacto", [], "main");
        
    }
    
    public function initAdmin(){
        $this->render("initAdmin", [], "main");
    }


    public function crearLote(){
        $this->render("crearLote", [], "main");
    }

    public function editarLote(){
        $this->render("editarLote", [], "main");
    }

    public function listaClientes(){
        $this->render("listaClientes", [], "main");

    }
    
    public function lotesDetail($id = null) {

        $db = new Database();
        $con = $db->getConnection();
    
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
    
        if ($id) {
            $loteModel = new LotesController($con);
            $lote = $loteModel->viewDetail($id);
    
            if ($lote) {
                $this->render("lotesDetail", ['lote' => $lote], "main");
            } else {
                echo "No se encontró el lote con el ID especificado.";
            }
        } else {
            echo "No se proporcionó un ID válido para el lote.";
        }
    }

    public function eliminarLote() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            
            if ($id) {
                $db = new Database();
                $con = $db->getConnection();
                $loteModel = new LotesController($con);
                
                $loteModel->eliminar($id);
    
                $this->inicio();
                exit;
            } else {
                echo "ID inválido.";
            }
        } else {
            echo "No se proporcionó un ID.";
        }
    }

}


?>
<?php


class Lote extends Orm{

    public function __construct(PDO $connection){
        parent::__construct("id", "lotes", $connection);
    }
    
}




?>
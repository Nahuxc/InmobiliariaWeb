<?php


class Client extends Orm{

    public function __construct(PDO $connection){
        parent::__construct("id", "clients", $connection);
    }
    
}




?>
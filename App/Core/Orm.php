<?php

class Orm{
    protected $id;
    protected $table;
    protected $db;

    public function __construct($id, $table, PDO $connect){

        $this->id = $id;
        $this->table = $table;
        $this->db = $connect;

    }

    public function getAll(){
        $stm = $this->db->prepare("SELECT * FROM {$this->table}");

        $stm->execute();
        return $stm->fetchAll();

    }

    public function getById($id){
        $stm = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id; ");

        $stm->bindValue(":id", $id);

        $stm->execute();
        return $stm->fetch();
    }

    public function insert($data){
        $sql = "INSERT INTO {$this->table}(";

        foreach($data as $key => $value){
            $sql .= "{$key},";
        }

        $sql = trim($sql, ",");

        $sql .= ",date) VALUES (";

        foreach($data as  $key => $value){
            $sql .= " :{$key},";
        }

        $sql = trim($sql, ",");
        
        $sql .= ", curdate())";

        

        $stm = $this->db->prepare($sql);

        foreach($data as $key => $value){
            $stm->bindValue(":{$key}", $value );
        }

        $stm->execute();

    }

    public function updateById($id, $data){
        $sql ="UPDATE {$this->table} SET ";

        foreach($data as $key => $value){
            $sql .= "{$key} = :{$key},";
        }
        $sql = trim($sql, ",");

        $sql .= " WHERE id = :id;";
        
        $stm = $this->db->prepare($sql);
        
        $stm->bindValue(":id", $id);

        foreach($data as $key => $value){
            $stm->bindValue(":{$key}", $value );
        }

        $stm->execute();


    }


    /* metodo que se le pasa a los modelos */
    public function deleteById($id){
        $stm = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id;");

        $stm->bindValue(":id", $id);

        $stm->execute();
    }

}


?>
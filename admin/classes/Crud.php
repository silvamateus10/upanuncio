<?php

    require_once 'DB.php';
/*
 * @author Mateus
 */
abstract class Crud extends DB{
   
    protected $table;
    
    abstract public function insert();
    abstract public function update($id);
    
    public function find($id){
        $sql = "SELECT * FROM $this->table WHERE id$this->table = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function findAll(){
        $sql = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id$this->table = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();        
    }
    
    public function deleteAlbum($id){                    
        $sql = "DELETE FROM foto WHERE fkIdAlbum = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);                     
        return $stmt->execute();                
    }
//put your code here
    
}

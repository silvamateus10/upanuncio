<?php

require_once 'Crud.php';

class Senha extends Crud{
    
    protected $table = 'senha';    
    private $senha;
    
    function getSenha() {
        return $this->senha;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    public function insert() {}
        
    public function update($id) {
        $sql = "UPDATE $this->table SET senha = :senha WHERE idSenha = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':senha', $this->senha);   
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
    public function confSenha() {            
        $sql = "SELECT senha FROM $this->table WHERE id$this->table = 2";
        $stmt = DB::prepare($sql);        
        $stmt->execute();
        return $stmt->fetch();
    }
    
}

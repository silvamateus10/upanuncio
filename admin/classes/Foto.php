<?php

require_once 'Crud.php';

class Foto extends Crud {

    protected $table = 'foto';
    private $idFoto;
    private $caminho;
    private $fkIdAlbum;
    private $fkIdAnuncio;

    function getIdFoto() {
        return $this->idFoto;
    }

    function getCaminho() {
        return $this->caminho;
    }

    function setIdFoto($idFoto) {
        $this->idFoto = $idFoto;
    }

    function setCaminho($caminho) {
        $this->caminho = $caminho;
    }

    function getFkIdAlbum() {
        return $this->fkIdAlbum;
    }

    function getFkIdAnuncio() {
        return $this->fkIdAnuncio;
    }

    function setFkIdAlbum($fkIdAlbum) {
        $this->fkIdAlbum = $fkIdAlbum;
    }

    function setFkIdAnuncio($fkIdAnuncio) {
        $this->fkIdAnuncio = $fkIdAnuncio;
    }

    public function insert() {


        $sql = "INSERT INTO $this->table (caminho, fkIdAlbum, fkIdAnuncio) VALUES (:caminho, :fkIdAlbum, :fkIdAnuncio)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':caminho', $this->caminho);
        $stmt->bindParam(':fkIdAlbum', $this->fkIdAlbum);
        $stmt->bindParam(':fkIdAnuncio', $this->fkIdAnuncio);
        return $stmt->execute();
    }

    public function update($id) {
        $sql = "UPDATE $this->table SET caminho = :caminho, fkIdAnuncio = :fkIdAnuncio WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':caminho', $this->caminho);
        $stmt->bindParam(':fkIdAlbum', $this->fkIdAlbum);
        $stmt->bindParam(':fkIdAnuncio', $this->fkIdAnuncio);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function exibirFoto($id) {

        $sql = "SELECT * FROM foto WHERE fkIdAlbum = :fkIdAlbum";
        $mt = DB::prepare($sql);
        $mt->bindParam(':fkIdAlbum', $id, PDO::PARAM_INT);
        $mt->execute();
        return $mt->fetchAll();
    }
    public function getAlbum($id){
        $sql = "SELECT caminho FROM foto WHERE fkIdAnuncio = :id";
        $astmt = DB::prepare($sql);
        $astmt->bindParam(':id', $id, PDO::PARAM_INT);
        $astmt->execute();
        return $astmt->fetchAll();
    }
   public function getCaminhoAll($id){
        $sql = "SELECT caminho FROM foto WHERE fkIdAlbum = :id";
        $cstmt = DB::prepare($sql);
        $cstmt->bindParam(':id', $id, PDO::PARAM_INT);
        $cstmt->execute();
        return $cstmt->fetchAll();
    }
//    public function contarFoto($id){
//        $cont = 0;
//        foreach (getAlbum($id) as $key => $bstmt): 
//            $cont = $cont + 1;
//        endforeach;
//        
//        return $cont;
//    }
}

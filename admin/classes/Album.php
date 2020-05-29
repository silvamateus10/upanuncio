<?php

require_once 'Crud.php';
class Album  extends Crud{
    
    protected $table = 'album';
    private $idAlbum;
    private $nomeAlbum;
    private $fkIdAnuncio;
    
    function getIdAlbum() {
        return $this->idAlbum;
    }

    function getNomeAlbum() {
        return $this->nomeAlbum;
    }

    function getFkIdAnuncio() {
        return $this->fkIdAnuncio;
    }

    function setIdAlbum($idAlbum) {
        $this->idAlbum = $idAlbum;        
        
    }

    function setNomeAlbum($nomeAlbum) {
        $this->nomeAlbum = $nomeAlbum;
    }

    function setFkIdAnuncio($fkIdAnuncio) {
        $this->fkIdAnuncio = $fkIdAnuncio;
    }

        
    public function insert() {
        $sql = "INSERT INTO $this->table (nomeAlbum, fkIdAnuncio) VALUES (:nomeAlbum, :fkIdAnuncio)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nomeAlbum', $this->nomeAlbum);
        $stmt->bindParam(':fkIdAnuncio', $this->fkIdAnuncio);
        return $stmt->execute();

    }

    public function update($id) {
         $sql = "UPDATE $this->table SET nomeAlbum = :nomeAlbum, fkIdAnuncio = :fkIdAnuncio WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nomeAlbum', $this->nomeAlbum);
        $stmt->bindParam(':fkIdAnuncio', $this->fkIdAnuncio);
		$stmt->bindParam(':id', $id);        
        return $stmt->execute();
    }
    
    public function getEstrangeira($id){
        $sql = "SELECT fkIdAnuncio FROM album WHERE idAlbum = :idAlbum";
        $stm = DB::prepare($sql);
        $stm->bindParam(':idAlbum', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }
//         public function getPeAdmAlbum($es, $cid, $zona){       
//        $sql = "SELECT *  FROM album WHERE estado = '".$es."' AND cidade = '".$cid."' AND zona = '".$zona."'";
//        $astmt = DB::prepare($sql);        
//        $astmt->execute();
//        return $astmt->fetchAll();
//    }

}

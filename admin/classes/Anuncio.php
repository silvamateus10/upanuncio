<?php

require_once 'Crud.php';

class Anuncio extends Crud {

    protected $table = 'anuncio';
    private $idAnuncio;
    private $nomeEmpresa;
    private $descricao;
    private $telefone;
    private $celular;
    private $rua;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;
    private $zona;
    private $bannerPrincipal;

    function getIdAnuncio() {
        return $this->idAnuncio;
    }

    function getNomeEmpresa() {
        return $this->nomeEmpresa;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getCelular() {
        return $this->celular;
    }

    function getRua() {
        return $this->rua;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCep() {
        return $this->cep;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getZona() {
        return $this->zona;
    }

    function getBannerPrincipal() {
        return $this->bannerPrincipal;
    }

    function setIdAnuncio($idAnuncio) {
        $this->idAnuncio = $idAnuncio;
    }

    function setNomeEmpresa($nomeEmpresa) {
        $this->nomeEmpresa = $nomeEmpresa;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setZona($zona) {
        $this->zona = $zona;
    }

    function setBannerPrincipal($bannerPrincipal) {
        $this->bannerPrincipal = $bannerPrincipal;
    }

    public function insert() {
        $sql = "INSERT INTO $this->table(nomeEmpresa, descricao, telefone, celular, rua, bairro, cep, cidade, estado, zona, bannerPrincipal) VALUES (:nomeEmpresa, :descricao, :telefone, :celular, :rua, :bairro, :cep, :cidade, :estado, :zona, :bannerPrincipal)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nomeEmpresa', $this->nomeEmpresa);
        $stmt->bindParam(':descricao', $this->descricao);
          $stmt->bindParam(':telefone', $this->telefone);
          $stmt->bindParam(':celular', $this->celular);
          $stmt->bindParam(':rua', $this->rua);
          $stmt->bindParam(':bairro', $this->bairro);
          $stmt->bindParam(':cep', $this->cep);
          $stmt->bindParam(':cidade', $this->cidade);
          $stmt->bindParam(':estado', $this->estado);
          $stmt->bindParam(':zona', $this->zona);
          $stmt->bindParam(':bannerPrincipal', $this->bannerPrincipal);
        return $stmt->execute();
    }

    public function update($id) {
        $sql = "UPDATE $this->table SET nomeEmpresa = :nomeEmpresa, descricao = :descricao, telefone = :telefone, celular = :celular, rua = :rua, bairro = :bairro, cep = :cep, cidade = :cidade, estado = :estado, zona = :zona, bannerPrincipal = :bannerPrincipal  WHERE idAnuncio = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nomeEmpresa', $this->nomeEmpresa);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':celular', $this->celular);
        $stmt->bindParam(':rua', $this->rua);
        $stmt->bindParam(':bairro', $this->bairro);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':zona', $this->zona);
        $stmt->bindParam(':bannerPrincipal', $this->bannerPrincipal);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
      public function getPk($nome){
        $sql = "SELECT idAnuncio FROM anuncio WHERE nomeEmpresa = :nomeEmpresa";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nomeEmpresa', $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
    
        public function getEs(){
        $sql = "SELECT estado FROM anuncio";
        $stmt = DB::prepare($sql);        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getCid(){
        $sql = "SELECT  cidade FROM anuncio";
        $stmt = DB::prepare($sql);        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getRegiao(){
        $sql = "SELECT zona FROM anuncio";
        $stmt = DB::prepare($sql);        
        $stmt->execute();
        return $stmt->fetchAll();
    }
        public function getVerificar($es, $cid, $zona){
      
        $sql = "SELECT bannerPrincipal FROM anuncio WHERE estado = '".$es."' AND cidade = '".$cid."' AND zona = '".$zona."'";
        $vstmt = DB::prepare($sql);        
        $vstmt->execute();
        return $vstmt->fetchAll();
    }
     public function getPesquisa($es, $cid, $zona){       
        $sql = "SELECT idAnuncio, bannerPrincipal, nomeEmpresa  FROM anuncio WHERE estado = '".$es."' AND cidade = '".$cid."' AND zona = '".$zona."'";
        $bstmt = DB::prepare($sql);        
        $bstmt->execute();
        return $bstmt->fetchAll();
    }
    
    public function getAdmPesquisa($es, $cid, $zona){       
        $sql = "SELECT *  FROM anuncio WHERE estado = '".$es."' AND cidade = '".$cid."' AND zona = '".$zona."'";
        $astmt = DB::prepare($sql);        
        $astmt->execute();
        return $astmt->fetchAll();
    }
    
        
    
}

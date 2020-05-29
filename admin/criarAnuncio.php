<?php
include './protect.php';
protect();


require_once 'classes/Anuncio.php';
require_once 'classes/Album.php';


$anuncio = new Anuncio();
$album = new Album();

if (isset($_POST['criar'])) {
    $nomeEmpresa = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $telefone = $_POST['tel'];
    $celular = $_POST['cel'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $zona = $_POST['zona'];

    $img = $_FILES['img']['name'];
    $temp = $_FILES['img'] ['tmp_name'];


    $anuncio->setNomeEmpresa($nomeEmpresa);
    $anuncio->setDescricao($descricao);
    $anuncio->setTelefone($telefone);
    $anuncio->setCelular($celular);
    $anuncio->setRua($rua);
    $anuncio->setBairro($bairro);
    $anuncio->setCep($cep);
    $anuncio->setCidade($cidade);
    $anuncio->setEstado($estado);
    $anuncio->setZona($zona);
    $anuncio->setBannerPrincipal($img);

    move_uploaded_file($temp, PASTA_IMG.$img);



    if ($anuncio->insert()) {
        $stmt = $anuncio->getPk($nomeEmpresa);
        $fkIdAnuncio = $stmt->idAnuncio;

        //Criando Album automaticamente
        $album->setNomeAlbum($nomeEmpresa);
        $album->setFkIdAnuncio($fkIdAnuncio);
            if ($album->insert()){
            echo "<script>alert('Inserido com Sucesso!');</script>";
            header('location:admAnuncios.php');
            }       
    }
}
                        
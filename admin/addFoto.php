<?php
require_once './classes/Anuncio.php';
require_once './classes/Album.php';
require_once './classes/Foto.php';


    $foto = new Foto();
    
    if (isset($_POST['criar'])) {
       
       
      $caminho = $_FILES['caminho']['name'];
       $temp = $_FILES['caminho'] ['tmp_name'];
       
       $fkIdAlbum =  $_POST['idAlbum'];                     
       $fkIdAnuncio = $_POST['idAnuncio'];   
       
       $foto->setCaminho($caminho);
       $foto->setFkIdAlbum($fkIdAlbum);
       $foto->setFkIdAnuncio($fkIdAnuncio);
              
       move_uploaded_file($temp, PASTA_IMG_ALBUM.$caminho);
       if ($foto->insert()) {
        echo "<script>alert('Inserido com Sucesso!');</script>";
        header('location:verAlbum.php?acao=ver&id=' . $fkIdAlbum . '');
       }                       
       
    }
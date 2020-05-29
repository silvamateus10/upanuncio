<?php 

include './protect.php';
protect();

require_once 'classes/Anuncio.php';
require_once 'classes/Album.php';
require_once 'classes/Foto.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">       
        <link rel="stylesheet" href="css/bootstrap.min.css">        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/estilo-adm.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body> 
        
         <div id="banner">
        <img src="_imagens\logo.png" id="logo" />
        <img src="_imagens\capa.jpg" id="centro" />
    </div>

    <nav id="menu">
        <ul type="disc">
          <li><a href="admAnuncios.php">ANUNCIOS</a></li>
            <li><a href="admAlbuns.php">ALBUNS</a></li>
            <li><a href="Suporte.php">SUPORTE</a></li>
            <li><a href="AlterarSenha.php">MUDAR SENHA</a></li>                     
        </ul>
    </nav>
        <div id="corpo">
       <?php
            $album = new Album(); 
            $foto = new Foto();
        ?>                      
        <?php
        foreach ($album->findAll() as $key => $value):
            ?>
            <div class="col-md-4">
                <h3><?php echo $value->nomeAlbum ?></h3>                
                <?php
                echo "<p><a class='btn btn-default' href='verAlbum.php?acao=ver&id=" . $value->idAlbum . "'>Abrir Album</a>&nbsp;&nbsp; "
                . "<a class='btn btn-danger' href='admAlbuns.php?acao=deletar&id=" . $value->idAlbum . "' onClick='return confirm(\"Deseja realmente deletar?\")'>Deletar Album</a> </p>";
                ?>

            </div>                    

        <?php endforeach; ?>
        
        
        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):            
            if (is_numeric($_GET['id'])) {
            $id = (int) $_GET['id'];
             $stmt = $album->find($id);   
             //$cont = $foto->contarFoto($id);             
      
        
            if ($album->deleteAlbum($id) && $album->delete($id)) {
                  foreach ($foto->getCaminhoAll($id) as $key => $cstmt): 
                    unlink(PASTA_IMG.$cstmt->caminho);
                    endforeach;
                echo "<script>alert('Deletado com Sucesso!');</script>";
                 echo "<script language= 'JavaScript'>location.href='admAlbuns.php';</script>";
            }
            
            } else {
            die("Dados Inválidoos");
            }           
        endif;
        ?>
        
        
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
        
        </div>   
    </body>
</html>

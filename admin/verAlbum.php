<?php

include './protect.php';
protect();

require_once './classes/Anuncio.php';
require_once './classes/Album.php';
require_once './classes/Foto.php';
?>
<!DOCTYPE html>
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
            $foto = new Foto();
            $album = new Album();
        
            if(isset($_GET['acao']) && $_GET['acao'] == 'ver'){
             if (is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];  
            $stmt = $album->find($id);
            $stm = $album->getEstrangeira($id);
            } else {
            die("Dados Inválidos");
            }    
      
            
        ?>  
            
           
<?php
               
             foreach ($foto->exibirFoto($id) as $key => $mt): ?>            
                <div class="col-md-4">        
              <p><img src="img/<?php echo $mt->caminho; ?>" width="200" alt="200"/></p>                   
                    <p>                       
                        <?php echo "<a class='btn btn-danger' href='verAlbum.php?acao=deletar&id=" . $mt->idFoto . "' onClick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                    </p>
              
              </div> 
            <?php endforeach; ?>
   
  
            <br/>
    
       <form name="addFoto" action="addFoto.php"  method="POST"  enctype="multipart/form-data">                                
                            <input type="hidden"  name="idAlbum" value="<?php echo $stmt->idAlbum; ?>" size="10"/>
                          <input type="hidden"  name="idAnuncio" value="<?php echo $stm->fkIdAnuncio; ?>" size="10"/>
			   <input type="file" required="required" name="caminho" value="" size="10"/><br/>
                          <input type="submit" name="criar" class="btn btn-success" value="Adicionar"/>
                          
                           
                            
 
           </div>
          
            <?php } ?>
            
            
            
        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
            $idFoto = (int) $_GET['id'];
            $stmt = $foto->find($idFoto);
            unlink(PASTA_IMG.$stmt->caminho);
            if ($foto->delete($idFoto)) {
                 header('location:verAlbum.php?acao=ver&id=' . $stmt->fkIdAlbum . '');
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


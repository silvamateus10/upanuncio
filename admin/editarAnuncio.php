<?php

include './protect.php';
protect();

require_once 'classes/Anuncio.php';
require_once 'classes/Album.php';
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
        <style>
            body {
                padding-top: 25px;
                padding-left: 20px;
            }
        </style>

        <script src="js/tinymce/tinymce.min.js"></script>         
        <script>tinymce.init({selector: 'textarea'});</script>
        <link rel="stylesheet" href="css/main.css">
        	<script language="JavaScript" type="text/javascript" src="js/cidades-estados-1.4-utf8.js"></script>
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>  
                     <script src="js/jquery-3.2.1.min.js"></script>				
          <script src="js/jquery.maskedinput.js"></script>				
          <script src="js/jquery.maskedinput.min.js"></script>
            <!--Inicio da máscara-->
        <script>
            jQuery(function ($) {
                $("#tel").mask("(99) 9999-9999");
                $("#cel").mask("(99) 99999-9999");          
            });
        </script>
        <!--Fim da máscara-->  
        
    </head>
    <body>
        <?php
        $anuncio = new Anuncio();
        if (isset($_GET['acao']) && $_GET['acao'] == 'editar') {
            if (is_numeric($_GET['id'])) {                
            $id = (int) $_GET['id'];
            $stmt = $anuncio->find($id);
            } else {
            die("Dados inválidos");
            }
            ?>


            <form name="criarAnuncio" action=""  method="POST" enctype="multipart/form-data">                                
                Nome da Empresa:&nbsp;&nbsp;<input type="text"  name="nome" value="<?php echo $stmt->nomeEmpresa ?>" size="50"/><br/><br/>           
                Descrição:<br/>
                <textarea name="descricao" rows="4" cols="60">
                    <?php echo $stmt->descricao ?>
                </textarea>								
                <br/><br/>           
                Telefone:&nbsp;&nbsp;<input type="text" id="tel" name="tel" value="<?php echo $stmt->telefone ?>" size="25"/>
                &nbsp;&nbsp;&nbsp;&nbsp;       
                Celular:&nbsp;&nbsp;<input type="text"  id="cel" name="cel" value="<?php echo $stmt->celular ?>" size="25"/><br/><br/>  
                Endereço:&nbsp;&nbsp;<input type="text"  name="end" value="<?php echo $stmt->rua ?>" size="50"/><br/><br/>       
                Bairro:&nbsp;&nbsp;<input type="text"  name="bairro" value="<?php echo $stmt->bairro ?>" size="50"/><br/><br/>       
                CEP:&nbsp;&nbsp;<input type="text"  name="cep" value="<?php echo $stmt->cep ?>" size="25"/>
                &nbsp;&nbsp;&nbsp;&nbsp;                           
                Zona:
                <select name="zona">
                    <option selected><?php echo $stmt->zona?></option>                         
                    <option>Zona Norte</option>                         
                    <option>Zona Sul</option>                                      		 
                    <option>Zona Leste</option>                                      
                    <option>Zona Oeste</option>                                      
                    <option>Centro</option>                                      
                </select>
                <br/><br/>                                          
        
                Estado:&nbsp;&nbsp;<select id="estado" required="required"  name="estado">               
                </select>                
                   &nbsp;&nbsp;&nbsp;&nbsp;     
                Cidade:&nbsp;&nbsp;<select id="cidade" required="required"  name="cidade">                
                </select><br/><br/>                
                <script language="JavaScript" type="text/javascript" charset="utf-8">
                    new dgCidadesEstados({
                    cidade: document.getElementById('cidade'),
                    estado: document.getElementById('estado'), 
                     estadoVal: '<?php echo $stmt->estado; ?>',
                    cidadeVal: '<?php echo $stmt->cidade; ?>'
                    });
                 </script>
                Imagem do Banner Principal:(Será necessário adicionar o Banner Principal novamente por motivos de segurança)&nbsp;&nbsp;<input type="file"  name="img" value="" required="required"/><br/><br/>                       
                <input type="hidden" name="idAnuncio" value="<?php echo $stmt->idAnuncio ?>"/>
                <input type="submit" class="btn btn-success" name="alterar" value="Salvar" />               
            </form>                        

            <?php
            if (isset($_POST['alterar'])) {
                $id = $_POST['idAnuncio'];
                $nomeEmpresa = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $telefone = $_POST['tel'];
                $celular = $_POST['cel'];
                $rua = $_POST['end'];
                $bairro = $_POST['bairro'];
                $cep = $_POST['cep'];
                $cidade = $_POST['cidade'];
                $estado = $_POST['estado'];
                $zona = $_POST['zona'];

                $banner = $_FILES['img']['name'];
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
                $anuncio->setBannerPrincipal($banner);
                move_uploaded_file($temp, PASTA_IMG.$banner);
                
                if ($anuncio->update($id)){
                    echo "<script>alert('Alterado com Sucesso!');</script>";
                    echo "<script language= 'JavaScript'>location.href='admAnuncios.php';</script>";
                    
//                     header('location:admAnuncios.php');
//                     exit;
                }
                
            }
                    
            ?>



        <?php } ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>




    </body>
</html>


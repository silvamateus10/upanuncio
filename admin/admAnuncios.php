<?php
include './protect.php';
protect();

require_once './classes/Anuncio.php';
require_once './classes/Album.php';

$anuncio = new Anuncio();
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
        <link rel="stylesheet" href="css/estilo-adm.css">
        <script language="JavaScript" type="text/javascript" src="js/cidades-estados-1.4-utf8.js"></script>	
        <script src="js/tinymce/tinymce.min.js"></script>         
        <script>tinymce.init({selector: 'textarea'});</script>
        <link rel="stylesheet" href="css/main.css">
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
            <a href="" data-toggle="modal"  data-target="#criarAnuncio" class="btn btn-primary" id="botao-1">Criar Anúncio</a>   




            <!--Inicio do Modal - Criar Anuncio -->
            <div class="modal fade" id="criarAnuncio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>



                        <div class="modal-body">        
                            <form name="criarAnuncio" action="criarAnuncio.php"  method="POST" enctype="multipart/form-data">                                
                                Nome da Empresa:&nbsp;&nbsp;<input type="text"  name="nome" value="" size="50"/><br/><br/>           

                                Descrição:<br/>
                                <textarea name="descricao" rows="4" cols="60">
                                </textarea>								
                                <br/><br/>           
                                Telefone:&nbsp;&nbsp;<input type="text" id="tel" name="tel" value="" size="25"/>
                                &nbsp;&nbsp;&nbsp;&nbsp;       
                                Celular:&nbsp;&nbsp;<input type="text" id="cel" name="cel" value="" size="25"/><br/><br/>  
                                Endereço:&nbsp;&nbsp;<input type="text"  name="rua" value="" size="50"/><br/><br/>       
                                Bairro:&nbsp;&nbsp;<input type="text"  name="bairro" value="" size="50"/><br/><br/>       
                                CEP:&nbsp;&nbsp;<input type="text"  name="cep" value="" size="25"/><br/><br/>                                                        
                                Estado:&nbsp;&nbsp;<select id="estado" required="required" name="estado"></select>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                Cidade:&nbsp;&nbsp;<select id="cidade" required="required" name="cidade"></select><br/><br/>       
                                <script language="JavaScript" type="text/javascript" charset="utf-8">
                                    new dgCidadesEstados({
                                        cidade: document.getElementById('cidade'),
                                        estado: document.getElementById('estado'),
                                        estadoVal: 'SP',
                                        cidadeVal: 'São Paulo'
                                    });
                                </script>
                                Zona:
                                <select name="zona">
                                    <option>Zona Norte</option>                         
                                    <option>Zona Sul</option>                                      		 
                                    <option>Zona Leste</option>                                      
                                    <option>Zona Oeste</option>                                      
                                    <option>Centro</option>                                      
                                </select>
                                <br/><br/>                                                  
                                Imagem do Banner Principal:&nbsp;&nbsp;<input type="file" name="img" value=""  required="required"/><br/><br/>       
                                <br/><br/>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button type="submit" name="criar" class="btn btn-primary">Confirmar</button>
                                </div>
                            </form>                        
                        </div>

                    </div>
                </div>
            </div>

            <br/><br/><br/>
            <!--Fim do Modal - Criar Anuncio -->		    


            <!--INICIO DA ÁREA DE PESQUISA-->
            <div class="filtro-barra">	

                <form name="form_filtro" id="filtro" method="POST">	
                    
                    <select id="estado1" required="required" name="estado1">                                                					
                    </select>			  

                    <select id="cidade1" required="required" name="cidade1">                                                        
                    </select>

                    <script language="JavaScript" type="text/javascript" charset="utf-8">
                        new dgCidadesEstados({
                            cidade: document.getElementById('cidade1'),
                            estado: document.getElementById('estado1'),
                            estadoVal: 'SP',
                            cidadeVal: 'São Paulo'
                        });
                    </script>

                    <select id="zona1" required="required" name="zona1">
                        <option value="" disabled selected hidden>Região...</option>						  
                        <option>Zona Norte</option>                         
                        <option>Zona Sul</option>                                      		 
                        <option>Zona Leste</option>                                      
                        <option>Zona Oeste</option>                                      
                        <option>Centro</option>   

                    </select>

                    <div class="button-enviar" id="buscar">
                        <input type="submit" value="Buscar"  name="btnPesquisar" />
                    </div>     
                </form>             	  
            </div>
            <!--FIM DA ÁREA DE PESQUISA-->    
            
            
            <!--COMEÇO DO CONTEÚDO PESQUISADO-->   
            <?php
            if (isset($_POST['btnPesquisar'])){
                $es1 = $_POST['estado1'];
                $cid1 = $_POST['cidade1'];
                $zona1 = $_POST['zona1'];
                $astmt = $anuncio->getAdmPesquisa($es1, $cid1, $zona1);
                if ($astmt != NULL){
                 ?>	

                    <center>
                        <table id="tabela" border="1">
                            <thead>
                                <tr>
                                    <th>Nome da Empresa</th>
                                    <th>Descrição</th>

                                </tr>
                            </thead>
                            <tbody>   

                                <?php
                                foreach ($anuncio->getAdmPesquisa($es1, $cid1, $zona1) as $key => $value):
                                    ?>    
                                    <tr>
                                        <td><?php echo $value->nomeEmpresa ?></td>
                                        <td><?php echo $value->descricao ?></td>
                                        <td><?php echo "&nbsp;&nbsp;<a class='btn btn-default' href='editarAnuncio.php?acao=editar&id=" . $value->idAnuncio . "'>Editar</a>" ?></td>
                                        <td><?php echo "&nbsp;&nbsp;<a class='btn btn-danger' href='admAnuncios.php?acao=deletar&id=" . $value->idAnuncio . "' onClick='return confirm(\"Deseja realmente deletar?\")'>Deletar Anuncio</a>" ?></td>                    
                                    </tr>
        <?php endforeach; ?>       

                            </tbody>
                        </table>
                    </center>	                                	
            <?php
                }else {
                    echo "Não existe anúncio para essa região";
                }
            }else{
                ?>            
                <center>
                    <table id="tabela" border="1">
                        <thead>
                            <tr>
                                <th>Nome da Empresa</th>
                                <th>Descrição</th>

                            </tr>
                        </thead>
                        <tbody>              
                            <?php
                            foreach ($anuncio->findAll() as $key => $value):
                                ?>    
                                <tr>
                                    <td><?php echo $value->nomeEmpresa ?></td>
                                    <td><?php echo $value->descricao ?></td>
                                    <td><?php echo "&nbsp;&nbsp;<a class='btn btn-default' href='editarAnuncio.php?acao=editar&id=" . $value->idAnuncio . "'>Editar</a>" ?></td>
                                    <td><?php echo "&nbsp;&nbsp;<a class='btn btn-danger' href='admAnuncios.php?acao=deletar&id=" . $value->idAnuncio . "' onClick='return confirm(\"Deseja realmente deletar?\")'>Deletar Anuncio</a>" ?></td>                    
                                </tr>
                            <?php endforeach; ?>       

                        </tbody>
                    </table>
                </center>
                <?php
                }


                if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'){
                if (is_numeric($_GET['id'])) {
                $id = (int) $_GET['id'];
                $stmt = $anuncio->find($id);

                try {
                if ($anuncio->delete($id)) {
                unlink(PASTA_IMG . $stmt->bannerPrincipal);
                echo "<script>alert('Deletado com Sucesso!');</script>";
                echo "<script language= 'JavaScript'>location.href='admAnuncios.php';</script>";

                }
                } catch (Exception $e){
                echo "Para apagar o Anúncio, é necessário que apague o Álbum primeiro";
                }

                } else {
                die("Dados inválidos");
                }


                }
                ?>

        </div> 




        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

    </div>


</body>
</html>

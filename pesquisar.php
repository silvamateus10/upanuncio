<?php require_once './admin/classes/Anuncio.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8"/>
      <title>Up Anúncios</title>
      <link rel="stylesheet" href="_css\estilo-teste.css"/>
      <link rel="stylesheet" href="_css\anunciarCss.css"/>
	  <link rel="stylesheet" href="_css\pesquisarCss.css"/>
          <script language="JavaScript" type="text/javascript" src="js/cidades-estados-1.4-utf8.js"></script>
   </head>
   <body>
      <div id="banner">
         <img src="_imagens\logo.png" id="logo"/>
         <img src="_imagens\capa.jpg" id="centro"/>
      </div>
      <nav id="menu">
         <ul type="disc">
            <li><a href="home.html">HOME</a></li>
            <li><a href="sobre.html">SOBRE</a></li>
            <li><a href="anunciar.php">ANUNCIAR</a></li>
            <li><a href="pesquisar.php">PESQUISAR</a></li>
            <li><a href="contato.html">CONTATO</a></li>
         </ul>
      </nav>
      <div id="interface">

	  <div class="filtro-barra">	
		<!--<div class="button-enviar" id="buscar"><a href="" target="">Buscar</a></div>-->
                <form name="form_filtro" id="filtro" method="POST">
		   
                      <?php
                      $anuncio = new Anuncio();             
                      ?>
			  <select id="estado" required="required" name="estado">
                                                					
			  </select>
			  
			  <select id="cidade" required="required" name="cidade">
                                                        
			  </select>
                    <script language="JavaScript" type="text/javascript" charset="utf-8">
                    new dgCidadesEstados({
                    cidade: document.getElementById('cidade'),
                    estado: document.getElementById('estado'),
                    estadoVal: 'SP',
                    cidadeVal: 'São Paulo'
                    });
                    </script>
			  
                    <select id="zona" required="required" name="zona">
						<option value="" disabled selected hidden>Região...</option>						  
						      <option>Zona Norte</option>                         
                                                        <option>Zona Sul</option>                                      		 
                                                        <option>Zona Leste</option>                                      
                                                        <option>Zona Oeste</option>                                      
                                                        <option>Centro</option>   
                                                			
			  </select>
                      <div class="button-enviar" id="buscar">
                          <input type="submit" value="Buscar"  name="btnBuscar" />
                     </div>     
		  </form> 
            
		  
	  </div>
	  
	  <div class="conteudo-pesquisar">	
              <?php
                    if(isset($_POST['btnBuscar'])){
                        $es = $_POST['estado'];
                        $cid = $_POST['cidade'];
                        $zona = $_POST['zona'];         
                        $vstmt = $anuncio->getVerificar($es, $cid, $zona);
                        if($vstmt != NULL){                          
                            foreach ($anuncio->getPesquisa($es, $cid, $zona) as $key => $bstmt):                                                
                                echo "<a href='anuncio.php?acao=ver&id=".$bstmt->idAnuncio ."'><img src='admin/img/".$bstmt->bannerPrincipal."' width='200' alt=''/></a><br/>".$bstmt->nomeEmpresa ."<br/><br/>";	                                	
                            
                            endforeach;                            
                        }else{
                            echo "Não existe anúncio para essa região";
                        }                                                                    
                    
                        
                        //ELSE do IF btnBuscar
                        }else{
                        
                            foreach ($anuncio->findAll() as $key => $value):                      
                           echo "<a href='anuncio.php?acao=ver&id=".$value->idAnuncio ."'><img src='admin/img/".$value->bannerPrincipal."' width='200' alt=''/></a><br/>".$value->nomeEmpresa ."<br/><br/>";	                                	
                        endforeach; 
                        
                    }
                ?>
              
              
          </div>
	  
	  
	  
	  
	  <div id="footer-geral">
            <div id="footer-1">
               <ul type="disc">
                  <li><a href="sobre.html">Sobre</a></li>
                  <li><a href="anunciar.php">Anunciar</a></li>
                  <li><a href="pesquisar.php">Pesquisar</a></li>
                  <li><a href="contato.html">Contato</a></li>
               </ul>
            </div>
            <div id="footer-2">
               <ul type="disc">
                  <li><a href="">Cupons</a></li>
                  <li><a href="">Seja um Vendedor</a></li>
                  <li><a href="">Parceiros</a></li>
                  <li><a href="http://www.youblisher.com/p/1789619-UP-Anuncios/" target="_blank">Revista Online</a></li>
               </ul>
            </div>
            <div id="footer-3">
               <figure class="foto-legenda">
                  <figcaption>Nos siga nas redes sociais!</figcaption>
                  <a href="https://www.instagram.com/up_anuncios/?hl=pt-br" target="_blank"><img src="_imagens\instagram-icon2.jpg"/></a>
                  <a href="https://www.facebook.com/fpm.upanuncios/" target="_blank"><img src="_imagens\facebook-icon.jpg"/></a>
               </figure>
               <div class="aplicativo">
                  <figcaption>Aplicativo</figcaption>
                  <a href=""><img src="_imagens\googleplay-banner.jpg" id="aplicativo"/></a>
               </div>
            </div>
            <div class="footer-4">
               <figure class="foto-legenda2">
                  <figcaption>Formas de pagamento:</figcaption>
                  <img src="_imagens\boleto-icon.jpg"/>
                  <img src="_imagens\caixa-icon.jpg"/>
               </figure>
            </div>
         </div>
      </div>
   </body>
</html>
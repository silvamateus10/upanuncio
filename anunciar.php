<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8"/>
      <title>Up Anúncios</title>
      <link rel="stylesheet" href="_css\estilo-teste.css"/>
      <link rel="stylesheet" href="_css\anunciarCss.css"/>
	  <link rel="stylesheet" href="_css\pesquisarCss.css"/>
                  <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>     
        <script src="js/jquery-3.2.1.min.js"></script>				
        <script src="js/jquery.maskedinput.js"></script>				
        <script src="js/jquery.maskedinput.min.js"></script>
        
        <script>
            function validarFrm(){                
                cnpj = document.form_contato.cnpj.value;                                 
                    if(validarCNPJ(cnpj)){
                        document.form_contato.submit();
                    }else{
                      alert("CNPJ inválido!");  
                    }    
               
            }    
                
           
            
            
            function validarCNPJ(cnpj) {
                cnpj = cnpj.replace(/[^\d]+/g, '');

                if (cnpj == '')
                    return false;

                if (cnpj.length != 14)
                    return false;

                // Elimina CNPJs invalidos conhecidos
                if (cnpj == "00000000000000" ||
                        cnpj == "11111111111111" ||
                        cnpj == "22222222222222" ||
                        cnpj == "33333333333333" ||
                        cnpj == "44444444444444" ||
                        cnpj == "55555555555555" ||
                        cnpj == "66666666666666" ||
                        cnpj == "77777777777777" ||
                        cnpj == "88888888888888" ||
                        cnpj == "99999999999999")
                    return false;

                // Valida DVs
                tamanho = cnpj.length - 2
                numeros = cnpj.substring(0, tamanho);
                digitos = cnpj.substring(tamanho);
                soma = 0;
                pos = tamanho - 7;
                for (i = tamanho; i >= 1; i--) {
                    soma += numeros.charAt(tamanho - i) * pos--;
                    if (pos < 2)
                        pos = 9;
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(0))
                    return false;

                tamanho = tamanho + 1;
                numeros = cnpj.substring(0, tamanho);
                soma = 0;
                pos = tamanho - 7;
                for (i = tamanho; i >= 1; i--) {
                    soma += numeros.charAt(tamanho - i) * pos--;
                    if (pos < 2)
                        pos = 9;
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(1))
                    return false;

                return true;

            }
                        
        </script>
        
           <script>
            jQuery(function ($) {
                $("#cnpj").mask("99.999.999/9999-99");        
            });
        </script>
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
	  
	<div class="contato-fundo">
		<h1 class="titulo-plano">Deseja anunciar um produto ou serviço conosco?</h1>
	</div>
	

          <form name="form_contato" method="POST" action="enviar.php">
	<div class="form1">
	<p class="nome">
			<label for="nome">Nome:</label><br/>
            <input type="text" id="nome" placeholder="" required="required" name="nome" />
    </p>
	
	<p class="nome-empresa">
			<label for="nome">Nome da empresa:</label><br/>
            <input type="text" id="empresaid" placeholder="" required="required" name="nomeEmpresa" />
    </p>
	
	<p class="cnpj">
			<label for="nome">CNPJ:</label><br/>
            <input type="text" id="cnpj" placeholder="" required="required" name="cnpj" />
    </p>
	
	<p class="tipo-plano">
				<label for="nome">Plano:</label><br/>
    <select id="plano" name="plano">
				<option value=""> </option>
				<option value="trimestral">Trimestral</option>
				<option value="semestral">Semestral</option>
    </select>
    </p>
	
	<p class="email">
			<label for="email">E-mail:</label><br/>
            <input type="text" id="email" placeholder="" required="required" name="email"/>
    </p>
	</div>
	
	<div class="form2">
	<p class="mensagem">
	<label for="mensagem">Mensagem:</label><br/>
	<textarea name="msg" placeholder=""></textarea>
	</p>
	
        <div class="button-enviar"><input type="button" name="btnAnunciar" onclick="validarFrm();" value="Enviar"></div>
	
	
	</div>
	</form>	 
	
	
		 
		 
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
                  <a href="https://www.instagram.com/up_anuncios/?hl=pt-br" target="_blank"><img src="_imagens\instagram-icon2.jpg"\></a>
                  <a href="https://www.facebook.com/fpm.upanuncios/" target="_blank"><img src="_imagens\facebook-icon.jpg"\></a>
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
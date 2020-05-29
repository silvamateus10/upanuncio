<?php
//include './protect.php';
//protect();

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
		<link rel="stylesheet" href="css/suporte.css">
		
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
        <form method="POST">
			<div class="suporte">
				<div class="fundo-suporte">
					<h1 class="titulo-suporte">Contate o nosso suporte</h1>
				</div>
				&nbsp;&nbsp;Nome:<input type="text" name="nome" value="" placeholder=""/><br/><br/>
				&nbsp;&nbsp;E-mail:<input type="text" name="email" value="" placeholder=""/><br/><br/>
				&nbsp;&nbsp;Telefone:<input type="text" name="tel" value="" placeholder=""/><br/><br/>
				&nbsp;&nbsp;Assunto:<input type="text" name="assunto" value="" placeholder=""/><br/><br/>
				&nbsp;&nbsp;Descrição do Problema:<br/><br/>             
				<textarea name="problema" rows="4" cols="50" placeholder=""></textarea>
				<br/><br/>
				<input id="botao-suporte" type="submit" name="enviar" value="Enviar" />
			</div>
        </form>
        <?php
           //COMEÇO Código de enviar por email   
           
           // include ("Mail.php");
           // include ("Mail/mime.php");
            $pegar = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(isset($pegar['enviar'])){                
            $nome =  $pegar['nome'];
            $email = $pegar['email'];
            $telefone = $pegar['tel'];
            $assunto = $pegar['assunto'];
            $mensagem = $pegar['problema'];
            $destino = 'suporte@koalascompany.com.br';
            $conteudo = $mensagem . '   ('. $nome . ')' . ' (' . $telefone . ')';            
            mail($destino, $assunto, $conteudo, $email);   
            echo '<script language=\"javascript\"> alert("Enviado com sucesso");</script>';
            }             
            
            //FIM Código de enviar por email   
            
        ?>
        
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
        </div>
    </body>
</html>

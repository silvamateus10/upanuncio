<?php
include './protect.php';
protect();
require_once './classes/Senha.php';
  $senha = new Senha();
  $stmt = $senha->confSenha();
  $senhaAntiga = $stmt->senha;  
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
		<link rel="stylesheet" href="css/estilo-adm.css">
		<link rel="stylesheet" href="css/alterarSenha.css">
        <style>
   
        </style>
        
        <script>
                 function validarSenha(){
                    senhaA = document.frmSenha.senhaA.value;
                    senhaC = document.frmSenha.senhaC.value; 
                    senhaN = document.frmSenha.senhaN.value; 
                    senhaNC = document.frmSenha.senhaNC.value; 
                    if (senhaA == senhaC){
                        if(senhaN == senhaNC){
                            document.frmSenha.submit();
                        }else{
                            alert("As senhas estão diferentes");
                        }                                                      
                     }else{
                    alert("As senhas antiga está incorreta!");
                }
            }
        </script>
        <link rel="stylesheet" href="css/main.css">
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
        <form method="POST" name="frmSenha">
		
			<div class="alterar-senha">
				<div class="fundo-alterar-senha"><h1 class="titulo-alterar-senha">Altere a sua senha</h1></div>
					<input type="hidden" maxlength="10" name="senhaA" value="<?php echo $senhaAntiga;?>" /> <br/><br/>
					&nbsp;&nbsp;Digite a Senha Antiga:
					<input type="password" maxlength="10" name="senhaC" value="" /> <br/><br/>
					&nbsp;&nbsp;Digite a Nova Senha:<input type="password" maxlength="10" name="senhaN" value="" /> <br/><br/>
					&nbsp;&nbsp;Confirme a Nova Senha:<input type="password" maxlength="10" name="senhaNC" value="" /> <br/><br/>
					<input type="" class="btn btn-default" id="botao" name="alterar" onClick="validarSenha();" value="Alterar" size="5"/> 
			</div>
        </form>
        <?php
        if(isset($_POST['alterar'])){
            $senhaNova = $_POST['senhaN'];
            $senha->setSenha($senhaNova);
            $senha->update(2);
            echo 'Senha Atualizada com Sucesso! <br/> Para alterar novamente é recomendado que atualize a Página';
        }
        ?>
        
        
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
        </div>
    </body>
</html>

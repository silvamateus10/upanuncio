
<?php 
require_once './classes/Senha.php';
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
		
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body> 
    <div id="interface-login">    
        
        <div class="login">
            <form method="POST" class="">
                <p>Digite a Senha:</p> <input type="password" maxlength="10" name="cSenha" value="" /><br/><br/>
                <input type="submit" name="btnValidar" class="btn btn-primary" value="Acessar" /><br/><br/>
                
            </form>            
            <a href="esqueceusenha.php">Esqueci Minha Senha</a>
        </div>
        <?php
        $senha = new Senha();        
        // try(tentar)
        try {
            if (isset($_POST['btnValidar'])) {
                $cSenha = $_POST['cSenha'];
                $stmt = $senha->confSenha();
                $senhaBD = $stmt->senha;
                if ($cSenha == $senhaBD) {
                    session_start();
                    $_SESSION['logado'] = 1;
                    header('location: admAnuncios.php');
                } else {
                    echo 'Senha Incorreta';
                }
            }
        }
        // catch (pega exceção)
        catch (Exception $e) {
            echo ('Erro: ' . $e->getMessage() . '<br/>Por favor, entrar em contato com suporte@koalascompany.com.br e informar o erro.');
        }


        ?>             
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
        
        </div>
	 </body>
</html>

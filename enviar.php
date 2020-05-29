<?php
      $pegar = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(isset($pegar['btnEnviar'])){
            $nome =  $pegar['nome'];
            $rg =  $pegar['rg'];
            $cpf = $pegar['cpf'];
            $assunto = 'Estou interessado em ser um Vendedor';
            $email = $pegar['email'];                       
            $descricao = $pegar['descricao'];            
            $mensagem = $descricao . '     ' . $nome . '   ' . $rg . '   ' . $cpf;
            $destino = 'anunciar@upanunciobr.com.br';            
            mail($destino, $assunto, $mensagem, $email);   
       
           echo "<script type='Javascript'>alert('Enviado com Sucesso!');</script>";
            header('location:sobre.html');
    }
    if(isset($pegar['btnAnunciar'])){        
            $nome =  $pegar['nome'];
            $nomeEmpresa =  $pegar['nomeEmpresa'];
            $cnpj = $pegar['cnpj'];
            $plano = $pegar['plano'];
            $email = $pegar['email'];                       
            $mensagem = $pegar['msg'];
            $assunto = $nome . '  '  . $nomeEmpresa . '  ' . $cnpj;
            $destino = 'anunciar@upanunciobr.com.br';            
            mail($destino, $assunto, $mensagem, $email);   
        echo "<script>alert('Enviado com Sucesso!');</script>";
         header('location:anunciar.php');
    }
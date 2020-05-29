<?php
require_once './classes/Senha.php';
 $senha = new Senha();   
  $stmt = $senha->confSenha();
  $senhaBD = $stmt->senha;
  echo 'Sua senha é = ' . $senhaBD;
//mail('silvamateus246¨@gmail.com', 'Recuperação de senha', $senhaBD, 'silvamateus246¨@gmail.com'); 
 //echo "<script>alert('A sua senha foi enviada por e-mail!');</script>";
//header('location:index.php');
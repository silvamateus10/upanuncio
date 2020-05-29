<?php

if(!function_exists("protect")){
    function protect(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['logado'])|| !is_numeric($_SESSION['logado'])){
            header("Location: index.php");            
        }
    }
}

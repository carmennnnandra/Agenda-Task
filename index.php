<?php
require_once 'functii/sql_functions.php';
session_start();
if(isset($_POST['conectare'])){
    $email = $_POST['email_utilizator'];
    $pass = $_POST['pass'];
    $rezultatConectare = conectare($email, $pass);
    if($rezultatConectare){
        if(isset($_SESSION['eroare_login'])){
            unset($_SESSION['eroare_login']);
        }
        $_SESSION['user'] = $email;
        
    }else{
        $_SESSION['eroare_login'] = 'Conectarea nu s-a efectuat';
    }
}
//    if(isset($_GET['id_utilizator'])){
//        $id_status = $_[GET['id_utilizator']];
//        if(isset($_SESSION['status']['id_status'])){
//            $_SESSION['status'][$id_status]=1;
//        
//        
//    }

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
        <!-- banner -->
        <banner id="banner">
        <img  src="imagini/background.png"/>
        </banner>
        <footer class="footer"> <small>&copy; Copyright 2021 Melniciuc Carmen Andra</small> </footer>
        <?php
        //momentan comentati/decomentati unul din template-uri in functie de sectiunea la care vreti sa lucrati
        if(isset($_SESSION['user'])){
            require_once 'templates/template_conectat.php';
        }else{
             require_once 'templates/template_neconectat.php';
        }
        ?>
    </body>
</html>

<?php

    require_once "../config/rb-rb.php";
    R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');
        
    if(!isset($_SESSION))
        session_start();
    
    $errors = true;

        if(!strlen($_POST['name']) >= 1){
            $errors = false;
        }

        if(!strlen($_POST['surname']) >= 1){
            $errors = false;
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors =  false;
        }

    if ($errors == true) { 
    $result = R::load('users', $_SESSION['user']);

    $result->name = $_POST['name'];
    $result->surname = $_POST['surname'];
    $result->email = $_POST['email'];
    $result->telephone = $_POST['telephone'];
    $result->about = $_POST['about'];

    R::store($result);
    }

?>
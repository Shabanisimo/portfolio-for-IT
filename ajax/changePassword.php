<?php

    require_once "../config/rb-rb.php";
    R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');
        
    if(!isset($_SESSION))
        session_start();

    if (strlen($_POST['password']) >= 8) {   
        $password = md5($_POST['password']);
        $result  = R::load('users', $_SESSION['user']);
        $result->password = $password;
        R::store($result);
    }

?>
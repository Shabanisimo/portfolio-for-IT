<?php

    require_once "../config/rb-rb.php";
    R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');
        
    if(!isset($_SESSION))
        session_start();
        
    $result = R::load('users', $_SESSION['user']);
        
    $result->name = $_POST['name'];
    $result->surname = $_POST['surname'];
    $result->email = $_POST['email'];
    $result->telephone = $_POST['telephone'];
    $result->about = $_POST['about'];

    R::store($result);

?>
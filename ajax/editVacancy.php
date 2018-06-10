<?php

    require_once "../config/rb-rb.php";
    R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');
    
    if (!isset($_SESSION))
        session_start();

    $result = R::load('vacancy', $_POST['id']);
    $result->company_id = $_SESSION['user'];  
    $result->position = $_POST['position'];  
    $result->experience = $_POST['experience'];  
    $result->about = $_POST['about'];  
    $result->duty = $_POST['duty'];  
    $result->demands = $_POST['demands'];  
    $result->conditions = $_POST['conditions'];  
    $result->address = $_POST['address'];  
    $result->min = $_POST['min'];  
    $result->max = $_POST['max'];  
    R::store($result);

?>
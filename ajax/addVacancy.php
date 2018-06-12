<?php
    require_once "../config/rb-rb.php";
    R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');
    
    if (!isset($_SESSION))
        session_start();

    $errors = false;

    if (strlen($_POST['position']) < 1)
        $errors = true;

    if (strlen($_POST['experience']) < 1)
        $errors = true;    

    if (strlen($_POST['about']) < 1)
        $errors = true;

    if (strlen($_POST['duty']) < 1)
        $errors = true;

    if (strlen($_POST['demands']) < 1)
        $errors = true;

    if (strlen($_POST['conditions']) < 1)
        $errors = true;

    if (strlen($_POST['address']) < 1)
        $errors = true;    
    
    if ($errors == false){
        $result = R::dispense("vacancy");
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
    }
?>
<?php
    require_once "../config/rb-rb.php";
    R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');
    
    if (!isset($_SESSION))
        session_start();

    $view = 0;
    $result = R::load('projects', $_POST['projectId']);
    $view = $result->views;  
    $result->views =$view+1;
    R::store($result);

?>
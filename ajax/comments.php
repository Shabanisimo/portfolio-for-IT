<?php

    require_once "../config/rb-rb.php";
    R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');
    
    if(!isset($_SESSION))
        session_start();
    
    $date = date('m/d/Y', time());

    $comment = R::dispense("comments");

    $comment->project_id = $_POST['id'];
    $comment->user_id = $_SESSION['user'];
    $comment->comment = $_POST['comment'];
    $comment->date = $date;
    
    R::store($comment);

?>
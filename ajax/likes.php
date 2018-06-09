<?php
    
    require_once "../config/rb-rb.php";
    R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');

    if (!isset($_SESSION))
        session_start();

    $count=0;

    $projectId = $_POST['projectId'];
    $userId = $_SESSION['user'];

    $result = R::find('likes', 'user_id = ? AND project_id = ?', array($userId, $projectId) );
    foreach($result as $row){
        $count++;
    }
    
    if ($count>=1){
        return false;
    }else{
        $like = R::dispense("likes");
        $like->user_id = $_SESSION['user'];
        $like->project_id = $_POST['projectId'];
        R::store($like);
    }

?>
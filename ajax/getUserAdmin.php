<?php
    
    require_once "../config/rb-rb.php";
    R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');

    if (!isset($_SESSION))
        session_start();

    $count = 0;

    $id = $_POST['id'];

    $result = R::find('admin', 'user_id = ?', array($id));
    foreach($result as $row){
        $count++;
    }
    
    if ($count>=1){
        $l = R::load('admin','user_id = ?',  array($id));
        R::trash($l);
    }else{
        $admin = R::dispense("admin");
        $admin->user_id = $id;
        R::store($admin);
    }

?>
<?php
require_once "../config/rb-rb.php";
R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');

if (!isset($_SESSION))
    session_start();

    $users = R::find('users', 'id = ?', array($_POST['userId']));
    foreach ($users as $item) {
        $l = R::load('users',$item->id);
        R::trash($l);
    }

    $projects = R::find('projects', 'user_id = ?', array($_POST['userId']));
    foreach ($projects as $item){
        $l = R::find('projects', 'id = ?', array($_POST['userId']));
        R::trash($item);
    }

?>
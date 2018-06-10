<?php
require_once "../config/rb-rb.php";
R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');

if (!isset($_SESSION))
    session_start();

    $projects = R::find('projects', 'id = ?', array($_POST['projectId']));
    foreach ($projects as $item) {
        $l = R::load('projects',$item->id);
        R::trash($l);
    }

    $comments = R::find('comments', 'project_id = ?', array($_POST['projectId']));
    foreach ($comments as $item){
        $l = R::find('comments', 'id = ?', array($_POST['projectId']));
        R::trash($item);
    }

?>
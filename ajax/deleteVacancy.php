<?php
require_once "../config/rb-rb.php";
R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');

if (!isset($_SESSION))
    session_start();

    $vacancies = R::find('vacancy', 'id = ?', array($_POST['vacancyId']));
    foreach ($vacancies as $item) {
        $l = R::load('vacancy',$item->id);
        R::trash($l);
    }

?>
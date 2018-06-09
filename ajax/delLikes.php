<?php
/**
 * Created by IntelliJ IDEA.
 * User: User
 * Date: 15.05.2018
 * Time: 23:02
 */

require_once "../config/rb-rb.php";
R::setup('mysql:host=localhost;dbname=portfolio_db', 'root', '');

if (!isset($_SESSION))
    session_start();

$user = R::find('users', 'id = ?', array($_SESSION['user']));
foreach ($user as $u) {
    $like = R::find('likes', 'user_id = ? && project_id = ?', array($u->id,$_POST['projectId']));
    foreach ($like as $item) {
        $l = R::load('likes',$item->id);
        R::trash($l);
    }
    break;
}
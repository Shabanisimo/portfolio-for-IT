<?php
/**
 * Created by IntelliJ IDEA.
 * User: User
 * Date: 15.05.2018
 * Time: 23:02
 */

require_once '../lib/rb.php';
require_once '../classes/connect.class.php';
$conn = new Connect();

if (!isset($_SESSION))
    session_start();

$user = R::find('users', 'id = ?', array($_SESSION['user']));

foreach ($user as $u) {
    $like = R::find('likes', 'users_id = ? && catering_id = ?', array($u->id,$_POST['place']));
    foreach ($like as $item) {
        $l = R::load('likes',$item->id);
        R::trash($l);
    }
    break;
}
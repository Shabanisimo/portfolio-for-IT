<?php

    $l = R::find('likes', 'user_id = ?', array($_SESSION['user']));

    $user_id = R::load('users', $u->id);
    $place = R::load('catering', $_POST['place']);
    $like = R::dispense('likes');
    $user_id->ownLikesList[] = $like;
    $place->ownLikesList[] = $like;
    R::store($user_id);
    R::store($place);
    break;
}

?>
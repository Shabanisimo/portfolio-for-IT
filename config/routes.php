<?php
    return array(
        
        'users/([0-9]+)' => 'user/view/$1/$2',
        'projects/([0-9]+)' => 'project/view/$1/$2',

        'projects/page-([0-9]+)' => 'project/list/$1',

        'registration' => 'user/registration',
        'authorisation' => 'user/login',
        'logout' => 'user/logout',

        'settings' => 'settings/edit',
        'users' => 'user/list',
        'projects' => 'project/list',

        '' => 'project/list',
        
    );
?>
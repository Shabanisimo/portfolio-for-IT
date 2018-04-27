<?php
    return array(
        
        'users/([0-9]+)' => 'user/view/$1/$2',
        'projects/([0-9]+)' => 'project/view/$1/$2',

        'projects/page-([0-9]+)' => 'project/viewPage',

        'registration' => 'user/registration',
        'login' => 'user/login',

        'users' => 'user/list',
        'projects' => 'project/list',
        
        '' => 'project/list',

    );
?>
<?php
    return array(
        
        'users/([0-9]+)' => 'user/view/$1/$2',
        'projects/([0-9]+)' => 'project/view/$1/$2',
        'companies/([0-9]+)' => 'companies/view/$1/$2',

        'projects/page-([0-9]+)' => 'project/list/$1',
        'companies/page-([0-9]+)' => 'company/list/$1/$2',

        'registration' => 'user/registration',
        'authorisation' => 'user/login',
        'logout' => 'user/logout',

        'settings' => 'settings/edit',
        'projects' => 'project/list',

        '' => 'project/list',
        
    );
?>
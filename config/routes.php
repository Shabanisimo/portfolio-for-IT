<?php
    return array(
        
        'users/id([0-9]+)' => 'user/view/$1/$2',
        'projects/([0-9]+)' => 'project/view/$1/$2',
        'companies/id([0-9]+)' => 'company/view/$1/$2',

        'projects/page-([0-9]+)' => 'project/list/$1',
        'vacancies/page-([0-9]+)' => 'vacancy/list/$1',
        'companies/page-([0-9]+)' => 'company/list/$1',

        'registration' => 'user/registration',
        'authorization' => 'user/login',
        'companyRegistration' => 'company/registration',
        'companyAuthorization' => 'company/login',
        'logout' => 'user/logout',

        'settings' => 'settings/edit',
        'projects' => 'project/list',

        'admin/users' => 'adminUser/list',
        'admin/project' => 'adminProject/list',

        '' => 'project/list',
        
    );
?>
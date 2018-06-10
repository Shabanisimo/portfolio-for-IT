<?php
    return array(
        
        'users/id([0-9]+)' => 'user/view/$1/$2',
        'vacancy/([0-9]+)' => 'vacancy/view/$1/$2',
        'projects/([0-9]+)' => 'project/view/$1/$2',

        'editvacancies/([0-9]+)' => 'settings/editVacancy/$1/$2',
        'editproject/([0-9]+)' => 'settings/editProject/$1',

        'projects/page-([0-9]+)' => 'project/list/$1',
        'vacancy/page-([0-9]+)' => 'vacancy/list/$1',
        'company/page-([0-9]+)' => 'company/list/$1',

        'projects/add' => 'project/addProject',
        'vacancy/add' => 'vacancy/addVacancy',
        'bookmarks' => 'user/bookmarks',

        'registration' => 'user/registration',
        'authorization' => 'user/login',
        'companyRegistration' => 'company/registration',
        'logout' => 'user/logout',

        'settings' => 'settings/edit',
        'projects' => 'project/list',
        'vacancy' => 'vacancy/list',

        'admin/users' => 'adminUser/list',
        'admin/project' => 'adminProject/list',

        '' => 'project/list',
        
    );
?>
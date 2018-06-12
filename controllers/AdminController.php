<?php

    class AdminController{

        public function actionIndex(){

            $title = "Панель администратора";
            
            $userList = array();

            $userList = Admin::getList('users');
            $projectList = Admin::getList('projects');

            require_once(ROOT.'/view/admin/admin.php');

            return true;
        }

    }

?>
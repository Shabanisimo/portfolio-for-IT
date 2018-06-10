<?php

    class AdminUserController{

        public function actionList(){
            
            $userList = array();

            $userList = Admin::getList('users');

            require_once(ROOT.'/view/admin/users/usersList.php');

            return true;
        }

    }

?>
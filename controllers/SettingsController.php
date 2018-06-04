<?php

    class SettingsController{
        
        public function actionEdit(){

            $userId = User::checkLogged();

            $user = User::getUserItemById($userId);

            $name = $user['name'];
            $surname = $user['surname'];
            $email = $user['email'];
            $telephone = $user['telephone'];
            $about = $user['about'];

            require_once(ROOT.'/view/settings/settings.php');
            
            return true;
        }
    }


?>
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

            $result = false;

            if(isset($_POST['edit'])){
                $name = $user['name'];
                $surname = $user['surname'];
                $email = $user['email'];
                $telephone = $user['telephone'];
                $about = $user['about'];

                $errors = false;


                if (!User::checkName($name)){
                    $errors = 'Имя должен быть длинее 2 символов';
                }
                if (!User::checkSurname($surname)){
                    $errors = 'Фамилия должен быть длинее 2 символов';
                }
                if (!User::checkEmail($email)){
                    $errors = 'Неправильный Email';
                }

                if ($errors == false){
                    $result = Settings::edit($userId ,$name, $surname, $email, $telephone, $about);
                }
            }

            require_once(ROOT.'/view/settings/settings.php');
            
            return true;
        }
    }


?>
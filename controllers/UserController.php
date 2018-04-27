<?php

    class UserController{

        public function actionRegistration(){
            
            $login = '';
            $password = '';
            $name = '';
            $surname = '';
            $email = '';
            $telephone = '';
            $result = false;

            if (isset($_POST['signup'])){
                $login = $_POST['login'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
                $telephone = $_POST['telephone'];

                $errors = false;

                if (!User::checkLogin($login)){
                    $errors = 'Логин должен быть длинее 4 символов';
                }
                if (!User::checkPassword($password)){
                    $errors = 'Пароль должен быть длинее 4 символов';
                }
                if (!User::checkName($name)){
                    $errors = 'Имя должен быть длинее 2 символов';
                }
                if (!User::checkSurname($surname)){
                    $errors = 'Фамилия должен быть длинее 2 символов';
                }
                if (!User::checkEmail($email)){
                    $errors = 'Неправильный Email';
                }else{
                    if (User::checkEmailExists($email)){
                        $errors = 'Email уже занят';
                    }
                }
                /*if (isset($telephone)){
                    echo '<br>telephone: ok';
                }
                else{ echo '<br>Логин должен быть длинее 4 символов' }*/

                if ($errors == false){
                    $result = User::registration($login, $password, $name, $surname, $email, $telephone);
                }
            }

            require_once(ROOT.'/view/registration/registration.php');

            return true;
        }

        public function actionLogin(){

            $login = '';
            $password = '';

            if (isset($_POST['login'])){

                $login = $_POST['login'];
                $password = $_POST['password'];

                $userId = User::checkUserData($login, $password);

                if ($userId == false){
                    $errors[] = 'Неправильный логин или пароль!';
                }else{
                    User::authorisation($userId);

                    header("Location: /users/".$userId);
                }

            }

            require_once(ROOT.'/view/authorisation/authorisation.php');

            return true;
        }

        public function actionList(){
            $userList = array();
            $userList = User::getUserList();
            echo '<pre>';
            print_r('Suck');
            echo '</pre>';
            return true;
        }

        public function actionView($id){
            $userItem = User::getUserItemById($id);
            $userProjectList = User::getUserProjectsById($id);

            require_once(ROOT.'/view/users/index.php');

            return true;
        }
    }
?>
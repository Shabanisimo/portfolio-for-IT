<?php

    class UserController{

        public function actionRegistration(){
            
            $login = '';
            $companyLogin = '';
            $password = '';
            $companyPassword = '';
            $name = '';
            $surname = '';
            $email = '';
            $telephone = '';
            $website = '';
            $title = '';
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

                if ($errors == false){
                    $result = User::registration($login, $password, $name, $surname, $email, $telephone);
                }

                header("Location: /authorization");
                
            }

            if (isset($_POST['companysignup'])){
                $companyLogin = $_POST['companyLogin'];
                $companyPassword = $_POST['companyPassword'];
                $website = $_POST['website'];
                $telephone = $_POST['telephone'];

                $errors = false;

                if (!User::checkLogin($login)){
                    $errors = 'Логин должен быть длинее 4 символов';
                }
                if (!User::checkPassword($password)){
                    $errors = 'Пароль должен быть длинее 4 символов';
                }
                /*if (isset($telephone)){
                    echo '<br>telephone: ok';
                }
                else{ echo '<br>Логин должен быть длинее 4 символов' }*/

                if ($errors == false){
                    $result = User::companyRegistration($companyLogin, $companyPassword, $title, $website, $telephone);
                }
            }

            require_once(ROOT.'/view/registration/registration.php');

            return true;
        }

        public function actionLogin(){

            $login = '';
            $password = '';

            if (isset($_POST['Login'])){ 
            
                $login = $_POST['login'];
                $password = $_POST['password'];

                $userId = User::checkUserData($login, $password); 

                if ($userId == false){
                    $errors = 'Неправильный логин или пароль!';
                }else{
                    User::authorisation($userId);
                    $errors = '';

                    header("Location: /users/id".$userId);
                }

            }

            require_once(ROOT.'/view/authorization/authorization.php');

            return true;
        }

        public function actionLogout(){
            session_start();
            unset($_SESSION["user"]);
            header("Location: /authorization");
        }

        public function actionList(){
            $userList = array();
            $userList = User::getUserList();
            return true;
        }

        public function actionView($id){
            $userItem = User::getUserItemById($id);
            $userProjectList = User::getUserProjectsById($id);
            $userAccount = User::checkUserAccount($id);
            $type = User::checkUserType($id);
            
            require_once ROOT."/class/upload_files.class.php";

            if (isset($_POST['addProject'])){
                
                $options['User_id'] = $_SESSION['user'];
                $options['Title'] = $_POST['project_name'];
                $options['Language'] = $_POST['project_lang'];
                $options['Description'] = $_POST['description'];
                $options['Date'] = date('m/d/Y', time());
                $options['Link'] = $_POST['proj_link'];
                
                $errors = false;

                if (!isset($options['Title']) || empty($options['Title'])){
                    $errors[] = 'Заполните поля';
                }
                

                if ($errors == false){
                    $id = Project::createProject($options);

                
                    if (!empty($id)){
                      $file =  new Upload();
                      $file->upload_files();
                    };
                }

            }

            if($userItem && $type == 1)
                require_once(ROOT.'/view/users/index.php');
            else if($userItem && $type == 2)
                require_once(ROOT.'/view/companies/index.php');
            else 
                require_once(ROOT.'view/404/404.php');

            return true;
        }

    }
?>
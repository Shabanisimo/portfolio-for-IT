<?php

    class CompanyController{

        public function actionList($page = 1){


            $projectList = array();
            $projectList = Project::getProjectListByPage($page);

            $total = Project::getTotalProjectsInList();

            $pagination = new Pagination($total, $page, Project::SHOW_BY_DEFAULT, 'page-');
            
            require_once(ROOT.'/view/projects/index.php');

            return true;
        }

        public function actionView($id){
            $projectItem = Company::getCompanyItemById($id);

            require_once(ROOT.'/view/companies/view.php');

            return true;
        }

        public function actionRegistration(){
            
            $login = '';
            $password = '';
            $name = '';
            $surname = '';
            $email = '';
            $telephone = '';
            $result = false;

            if (isset($_POST['companySignup'])){
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

            if (isset($_POST['companyLogin'])){

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

            require_once(ROOT.'/view/authorisation/authorisation.php');

            return true;
        }

    }
?>
<?php

    class CompanyController{

        public function actionList(){

            $projectList = array();
            $projectList = Project::getCompanyListByPage();

            $total = Project::getTotalProjectsInList();

            $pagination = new Pagination($total, $page, Project::SHOW_BY_DEFAULT, 'page-');

            $title = 'Список компаний';
            
            require_once(ROOT.'/view/projects/index.php');

            return true;
        }

        public function actionRegistration(){

            $title = 'Регистрация компании';
            
            $login = '';
            $password = '';
            $title = '';
            $website = '';
            $telephone = '';
            $result = false;

            if (isset($_POST['companySignup'])){
                $login = $_POST['login'];
                $password = $_POST['password'];
                $title = $_POST['title'];
                $email = $_POST['email'];
                $telephone = $_POST['telephone'];

                $errors = false;

                if (!User::checkLogin($login)){
                    $errors = 'Логин должен быть длинее 4 символов';
                }
                if (!User::checkPassword($password)){
                    $errors = 'Пароль должен быть длинее 4 символов';
                }
                if (!User::checkName($title)){
                    $errors = 'Имя должен быть длинее 2 символов';
                }
                if (!User::checkEmail($email)){
                    $errors = 'Неправильный Email';
                }else{
                    if (User::checkEmailExists($email)){
                        $errors = 'Email уже занят';
                    }
                }

                if ($errors == false){
                    $result = Company::registration($login, $password, $title, $email, $telephone);
                    header("Location: /authorizatio");
                }
            }

            require_once(ROOT.'/view/registration/companyRegistration.php');

            return true;
        }

    }
?>
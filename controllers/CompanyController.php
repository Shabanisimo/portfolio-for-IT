<?php

    class CompanyController{

        public function actionList($page = 1){

            $projectList = array();
            $projectList = Project::getProjectListByPage($page);

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

                if ($errors == false){
                    $result = Company::registration($login, $password, $title, $email, $telephone);
                    header("Location: /companyAuthorization");
                }
            }

            require_once(ROOT.'/view/registration/companyRegistration.php');

            return true;
        }

    }
?>
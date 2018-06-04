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
            $title = '';
            $website = '';
            $telephone = '';
            $result = false;

            if (isset($_POST['companySignup'])){
                $login = $_POST['login'];
                $password = $_POST['password'];
                $title = $_POST['title'];
                $website = $_POST['website'];
                $telephone = $_POST['telephone'];

                $errors = false;

                if ($errors == false){
                    $result = Company::registration($login, $password, $title, $website, $telephone);
                    header("Location: /companyAuthorization");
                }
            }

            require_once(ROOT.'/view/registration/companyRegistration.php');

            return true;
        }

        public function actionLogin(){

            $login = '';
            $password = '';

            if (isset($_POST['companyLogin'])){

                $login = $_POST['login'];
                $password = $_POST['password'];

                $companyId = Company::checkCompanyData($login, $password);

                if ($companyId == false){
                    $errors = 'Неправильный логин или пароль!';
                }else{
                    Company::authorisation($companyId);
                    $errors = '';

                    header("Location: /company/id".$companyId);
                }

            }

            require_once(ROOT.'/view/authorization/companyAuthorization.php');

            return true;
        }

    }
?>
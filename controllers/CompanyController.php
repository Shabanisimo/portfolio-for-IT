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

    }
?>
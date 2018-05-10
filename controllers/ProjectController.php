<?php

    class ProjectController{

        public function actionList($page = 1){


            $projectList = array();
            $projectList = Project::getProjectListByPage($page);

            $total = Project::getTotalProjectsInList();

            $pagination = new Pagination($total, $page, Project::SHOW_BY_DEFAULT, 'page-');
            
            require_once(ROOT.'/view/projects/index.php');

            return true;
        }

        public function actionView($id){
            $projectItem = Project::getProjectItemById($id);
            $commentList = Project::getCommentsListById($id);

            require_once(ROOT.'/view/projects/view.php');

            return true;
        }

    }
?>
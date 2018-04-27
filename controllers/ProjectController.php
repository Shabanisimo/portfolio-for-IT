<?php

    class ProjectController{

        public function actionList(){
            $projectList = array();
            $projectList = Project::getProjectList();
            
            require_once(ROOT.'/view/projects/index.php');

            return true;
        }

        public function actionView($id){
            $projectItem = Project::getProjectItemById($id);

            require_once(ROOT.'/view/projects/view.php');

            return true;
        }
    }
?>
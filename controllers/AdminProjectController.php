<?php

    class AdminProjectController{

        public function actionList(){
            
            $projectList = array();

            $projectList = Admin::getList('projects');

            require_once(ROOT.'/view/admin/projects/projectsList.php');

            return true;
        }

    }

?>
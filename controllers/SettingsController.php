<?php

    class SettingsController{
        
        public function actionEdit(){

            $userId = User::checkLogged();

            $user = User::getUserItemById($userId);

            $name = $user['name'];
            $surname = $user['surname'];
            $email = $user['email'];
            $telephone = $user['telephone'];
            $about = $user['about'];

            $projectList = User::getUserProjectsById($userId);

            require_once(ROOT.'/view/settings/settings.php');
            
            return true;
        }

        public function actionEditProject($id){

            $projectItem = Project::getProjectItemById($id);

            require_once ROOT."/class/upload_files.class.php";

            if (isset($_POST['editProject'])){

                $options['id'] = $id;
                $options['User_id'] = $_SESSION['user'];
                $options['Title'] = $_POST['project_name'];
                $options['Language'] = $_POST['project_lang'];
                $options['Description'] = $_POST['description'];
                $options['Date'] = date('m/d/Y', time());
                $options['Link'] = $_POST['proj_link'];
                $options['Image'] = $_FILES['image']['name'];

                $errors = false;

                if ($errors == false){
                    $id = Project::updateProject($options);

                
                    if (!empty($id)){
                      $file =  new Upload();
                      $file->upload_files($options['Image']);
                    };
                }

            }

            require_once(ROOT.'/view/settings/editProject.php');

            return true;

        }
    }


?>
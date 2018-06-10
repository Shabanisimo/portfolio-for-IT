<?php

    class ProjectController{

        public function actionList($page = 1){

            $title = 'Проекты';

            $projectList = array();
            $projectList = Project::getProjectListByPage($page);

            $total = Project::getTotalProjectsInList();

            $pagination = new Pagination($total, $page, Project::SHOW_BY_DEFAULT, 'page-');
            
            require_once(ROOT.'/view/projects/index.php');
            
            return true;
        }

        public function actionView($id){
            $projectItem = Project::getProjectItemById($id);

            $commentList = array_reverse(Project::getCommentsListById($id));

            $title = $projectItem['Title'];

            require_once(ROOT.'/view/projects/view.php');
        
            return true;
        }

        public function actionAddProject(){

            $title = 'Добавление проекта';

            require_once ROOT."/class/upload_files.class.php";

            if (isset($_POST['addProject'])){
                
                $options['User_id'] = $_SESSION['user'];
                $options['Title'] = $_POST['project_name'];
                $options['Language'] = $_POST['project_lang'];
                $options['Description'] = $_POST['description'];
                $options['Date'] = date('m/d/Y', time());
                $options['Link'] = $_POST['proj_link'];
                $options['Image'] = $_FILES['image']['name'];
                
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

            require_once(ROOT.'/view/projects/addProject.php');
        
            return true;
        }

    }
?>
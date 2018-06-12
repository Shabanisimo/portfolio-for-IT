<?php

    class SettingsController{

        private $_upload_max_filesize = 1024*10*1024;
        private $_files_directories = "/upload/images/";
        public function __construct($directories = null, $size = null)
        {
            if ($size!=null)
                $this->_upload_max_filesize = $size;
            if ($directories!=null)
                $this->_files_directories = $directories;
    
        }
    
        public function upload_files(){
            if($_FILES["image"]["size"] >$this->_upload_max_filesize)
            {
                echo  ("Размер файла превышает $this->_upload_max_filesize байтов");
            }
            // Проверяем загружен ли файл
            if(isset($_FILES['image']['tmp_name']))
            {
                move_uploaded_file($_FILES["image"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].$this->_files_directories.$_FILES["image"]["name"]);
            } else {
                echo  ("Файл не был загружен");
            }
    
        }
        
        public function actionEdit(){

            $title = 'Настройки';

            $userId = User::checkLogged();

            $user = User::getUserItemById($userId);

            $name = $user['name'];
            $surname = $user['surname'];
            $email = $user['email'];
            $telephone = $user['telephone'];
            $about = $user['about'];

            $projectList = User::getUserProjectsById($userId);
            $vacancyList = Vacancy::getUserVacanciesById($userId);


            if (isset($_POST['editPhoto'])){
                $options['Image'] = $_FILES['image']['name'];
                $file =  new SettingsController();
                $file->upload_files($options['Image']);
                User::changeUserPhoto($options['Image']);
            }

            require_once(ROOT.'/view/settings/settings.php');
            
            return true;
        }

        public function actionEditProject($id){

            $title = 'Редактирование проекта';

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

                if (strlen($options['Title']) < 1 || strlen($options['Language']) < 0 ){
                    $errors[] = 'Заполните поля';
                }

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

        public function actionEditVacancy($id){

            $title = 'Редактирование вакансии';

            $vacancyItem = Vacancy::getVacancyItemById($id);

            require_once(ROOT.'/view/settings/editVacancy.php');

            return true;

        }
    }


?>
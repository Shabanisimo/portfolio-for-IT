<?php

    class Project{

        const SHOW_BY_DEFAULT = 8;

        public static function getProjectItemById($id){
            $id = intval($id);

            if ($id){

                require_once ROOT."/components/db.php";

                $result = R::find("projects", "id = ?", array($id));
                $i = 0;
                foreach ($result as $row){
                    $projectItem['id'] = $row->id;
                    $projectItem['User_id'] = $row->user_id;
                    $projectItem['Title'] = $row->title;
                    $projectItem['Date'] = str_replace("/", ".",$row->date);
                    $projectItem['Language'] = $row->language;
                    $projectItem['Description'] = $row->description;
                    $projectItem['Likes'] = $row->likes;
                    $projectItem['Image'] = $row->image;
                    $projectItem['About'] = $row->description;
                    $projectItem['Link'] = $row->link;
                    $i++;
                }

                $user_id = $projectItem['User_id'];

                $result = R::find("users", "id = ?", array($user_id));

                foreach ($result as $row){
                    $projectItem['User_name'] = $row->name;
                    $projectItem['User_surname'] = $row->surname;
                    $i++;
                }

                return $projectItem;

                R::close();
            }
        }

        public static function getProjectList(){

            $projectList = array();

            require_once ROOT."/components/db.php";

            $result = R::findAll("projects");
            $i = 0;
            if (!empty($result)){
            foreach($result as $row){
                $projectList[$i]['id'] = $row->id;
                $projectList[$i]['Title'] = $row->title;

                $i++;
            }
            return $projectList;
            }else{return false;}

            R::close();
        }

        public static function getProjectListByPage($page = 1){

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $projectList = array();

            require_once ROOT."/components/db.php";

            $result = R::find("projects", "ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT." OFFSET ".$offset);
            $i = 0;
            if (!empty($result)){
            foreach($result as $row){
                $projectList[$i]['id'] = $row->id;
                $projectList[$i]['Title'] = $row->title;
                $projectList[$i]['Date'] = str_replace("/", ".",$row->date);
                $projectList[$i]['Language'] = $row->language;
                $projectList[$i]['Likes'] = $likes= R::count('likes', 'project_id = ?', array($row->id));
                $projectList[$i]['Image'] = $row->image;
                $i++;
            }
            return $projectList;
            }else{return false;}

            R::close();
        }

        public static function getTotalProjectsInList(){
            
            require_once ROOT."/components/db.php";

            $result = R::count("projects");

            return $result;

            R::close();
        }

        public static function getCommentsListById($id){
            $id = intval($id);

            if($id){
                $commentList = array();

                $result = R::find("comments", "project_id = ? ", array($id));

                $i = 0;
                foreach($result as $row){
                    $commentList[$i]['user_id'] = $row->user_id;
                    $commentList[$i]['date'] = $row->date;
                    $commentList[$i]['comment'] = $row->comment;
                    $commentList[$i]['project_id'] = $row->project_id;
                    $i++;
                }

                return $commentList;

            }
        }

        public static function getUserName($user_id){
            $id = intval($user_id);

            if ($id){

                require_once ROOT."/components/db.php";

                $result = R::find("users", "id = ? ", array($id));

                foreach($result as $row){
                    $userName['name'] = $row->name;
                    $userName['surname'] = $row->surname;
                }
                
                return $userName;
            }
        }

        public static function createProject($options){

            require_once ROOT."/components/db.php";

            $date = date('m/d/Y', time());

            $project = R::dispense("projects");

            $project->user_id = $options['User_id'];
            $project->title = $options['Title'];
            $project->language = $options['Language'];
            $project->description = $options['Description'];
            $project->date = $options['Date'];
            $project->link = $options['Link'];

            R::store($project);

            return $project;
        }

        public static function updateProject($options){

            require_once ROOT."/components/db.php";

            $date = date('m/d/Y', time());

            $project = R::load("projects", $options['id']);

            $project->user_id = $options['User_id'];
            $project->title = $options['Title'];
            $project->language = $options['Language'];
            $project->description = $options['Description'];
            $project->date = $options['Date'];
            $project->link = $options['Link'];
            if ($options['Image']){
                $project->image = $options['Image'];
            }
            R::store($project);

            return $project;

        }
    
        public static function checkLike($projectId, $userId){
            require_once ROOT."/components/db.php";

            $count = 0;

            $result = R::find('likes', 'user_id = ? AND project_id = ?', array($userId, $projectId));
            foreach($result as $row){
                $count++;
            }

            if ($count>=1){
                return true;
            }else{
                return false;
            }
        }

        public static function commentsCount($projectId){
            require_once ROOT."/components/db.php";

            $count = R::count('comments', 'project_id = ?', array($projectId));

            return $count;
        }

        public static function likesCount($projectId){
            require_once ROOT."/components/db.php";

            $count = R::count('likes', 'project_id = ?', array($projectId));

            return $count;
        }

        public static function getProjectListFromBookmarks(){

            require_once ROOT."/components/db.php";

            $likes = R::findAll("likes", "user_id = ?", array($_SESSION['user']));

            $projectList = array();
            $i = 0;
            $j = 0;

            foreach($likes as $like){
                $result = R::find("projects", "id = ?", array($like->project_id));
                foreach($result as $row){
                    $projectList[$i]['id'] = $row->id;
                    $projectList[$i]['Title'] = $row->title;
                    $projectList[$i]['Language'] = $row->language;
                    $projectList[$i]['Description'] = $row->description;
                    $projectList[$i]['Image'] = $row->image;
                    $j++;
                }
                $i++;
            }

            return $projectList;

        }
    }

?>
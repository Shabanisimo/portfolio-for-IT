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
                    $projectItem['Date'] = $row->date;
                    $projectItem['Language'] = $row->language;
                    $projectItem['Description'] = $row->description;
                    $projectItem['Likes'] = $row->likes;
                    $projectItem['Image'] = $row->image;
                    $i++;
                }
                $result = R::find("users", $projectItem['User_id']);

                foreach ($result as $row){
                    $projectItem['User_name'] = $row->name;
                    $projectItem['User_surname'] = $row->surname;
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

            $result = R::find("projects", "ORDER BY id ASC LIMIT ".self::SHOW_BY_DEFAULT." OFFSET ".$offset);
            $i = 0;
            if (!empty($result)){
            foreach($result as $row){
                $projectList[$i]['id'] = $row->id;
                $projectList[$i]['Title'] = $row->title;
                $projectList[$i]['Date'] = $row->date;
                $projectList[$i]['Language'] = $row->language;
                $projectList[$i]['Likes'] = $row->likes;
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

        public static function CommentProject($id, $comment_text){

            require_once ROOT."/components/db.php";

            $date = date('m/d/Y', time());

            $comment = R::dispense("comments");

            $comment->project_id = $id;
            $comment->user_id = $_SESSION['user'];
            $comment->comment = $comment_text;
            $comment->date = $date;

            R::store($comment);
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

        }
    }

?>
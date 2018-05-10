<?php

    class Project{

        const SHOW_BY_DEFAULT = 4;

        public static function getProjectItemById($id){
            $id = intval($id);

            if ($id){

                $db = DB::getConection();

                $result = $db->query('SELECT id, User_id, Title, Date, Language, Description '
                        . 'FROM projects '
                       . 'WHERE id='.$id);

                $result->setFetchMode(PDO::FETCH_ASSOC);

                $projectItem = $result->fetch();

                return $projectItem;
            }
        }

        public static function getProjectList(){

            $db = DB::getConection();

            $projectList = array();

            $result = $db->query('SELECT id, User_id, Title, Date, Language, Description, Likes '
                    . 'FROM projects');
            
            $i = 0;
            while($row = $result->fetch()){
                $projectList[$i]['id'] = $row['id'];
                $projectList[$i]['User_id'] = $row['User_id'];
                $projectList[$i]['Title'] = $row['Title'];
                $projectList[$i]['Date'] = $row['Date'];
                $projectList[$i]['Language'] = $row['Language'];
                $projectList[$i]['Description'] = $row['Description'];
                $projectList[$i]['Likes'] = $row['Likes'];
                $i++;
            }

            return $projectList;
        }

        public static function getProjectListByPage($page = 1){

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = DB::getConection();

            $projectList = array();

            $result = $db->query('SELECT id, User_id, Title, Date, Language, Description, Likes '
                    . 'FROM projects '
                    . 'ORDER BY id ASC '
                    . 'LIMIT '.self::SHOW_BY_DEFAULT
                    . ' OFFSET '.$offset);
            
            $i = 0;
            while($row = $result->fetch()){
                $projectList[$i]['id'] = $row['id'];
                $projectList[$i]['User_id'] = $row['User_id'];
                $projectList[$i]['Title'] = $row['Title'];
                $projectList[$i]['Date'] = $row['Date'];
                $projectList[$i]['Language'] = $row['Language'];
                $projectList[$i]['Description'] = $row['Description'];
                $projectList[$i]['Likes'] = $row['Likes'];
                $i++;
            }

            return $projectList;
        }

        public static function getTotalProjectsInList(){

            $db = DB::getConection();

            $result = $db->query('SELECT count(id) AS count from projects');

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();

            return $row['count'];

        }

        public static function getCommentsListById($id){
            $id = intval($id);

            if($id){
                $commentList = array();

                $db = DB::getConection();

                $result = $db->query('SELECT * FROM comments WHERE project_id ='.$id);

                $i = 0;
                while($row = $result->fetch() ){
                    $commentList[$i]['user_id'] = $row['user_id'];
                    $commentList[$i]['date'] = $row['date'];
                    $commentList[$i]['comment'] = $row['comment'];
                    $commentList[$i]['project_id'] = $row['project_id'];
                    $i++;
                }

                return $commentList;

            }
        }
    }

?>
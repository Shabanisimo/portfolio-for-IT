<?php

    class Project{
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
    }

?>
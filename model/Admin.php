<?php

    class Admin{
        public static function getList($tableName){
            
            $projectList = array();
            $userList = array();

            require_once ROOT."/components/db.php";

            $result = R::findAll($tableName);
            $i = 0;

            if (!empty($result)){
                if ($tableName == 'projects'){
                    foreach($result as $row){
                        $projectList[$i]['id'] = $row->id;
                        $projectList[$i]['Title'] = $row->title;
                        $projectList[$i]['Date'] = $row->date;
                        $projectList[$i]['User_id'] = $row->user_id;
                        $i++;
                    }
                    return $projectList;
                }else if ($tableName == 'users'){
                    foreach($result as $row){
                        $userList[$i]['id'] = $row->id;
                        $userList[$i]['Name'] = $row->name;
                        $userList[$i]['Surname'] = $row->surname;
                        $i++;
                    }
                    return $userList;
                }
                }else{ return false; }

            R::close();

        }
    }

?>
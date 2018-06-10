<?php

    class Vacancy{

        const SHOW_BY_DEFAULT = 8;

        public static function getUserVacancyList(){
            $userVacancyList = array();

            require_once ROOT."/components/db.php";

            $result = R::findAll("vacancy");
            $i = 0;
            if (!empty($result)){
            foreach($result as $row){
                $userVacancyList[$i]['id'] = $row->id;
                $userVacancyList[$i]['Company_id'] = $row->company_id;                
                $userVacancyList[$i]['Position'] = $row->position;
                $userVacancyList[$i]['Min'] = $row->min;
                $userVacancyList[$i]['Max'] = $row->max;
                $userVacancyList[$i]['About'] = $row->about;

                $i++;
            }
            return $userVacancyList;
            }else{return false;}

            R::close();
        }

        public static function getVacancyListByPage($page = 1){

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $userVacancyList = array();

            require_once ROOT."/components/db.php";

            $result = R::findAll("vacancy", "ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT." OFFSET ".$offset);

            $i = 0;
            if (!empty($result)){
            foreach($result as $row){
                $userVacancyList[$i]['id'] = $row->id;
                $userVacancyList[$i]['Company_id'] = $row->company_id;                
                $userVacancyList[$i]['Position'] = $row->position;
                $userVacancyList[$i]['Min'] = $row->min;
                $userVacancyList[$i]['Max'] = $row->max;
                $userVacancyList[$i]['About'] = $row->about;

                $i++;
            }
            return $userVacancyList;
            }else{return false;}

            R::close();
        }

        public static function getTotalVacanciesInList(){
            require_once ROOT."/components/db.php";

            $result = R::count("vacancy");

            return $result;

            R::close();
        }

        public static function getVacancyItemById($id){
            $id = intval($id);

            if ($id){

                require_once ROOT."/components/db.php";

                $vacancyItem = array();

                $result = R::find("vacancy", "id = ?", array($id));
                $i = 0;
                foreach ($result as $row){
                    $vacancyItem['id'] = $row->id;
                    $vacancyItem['Company_id'] = $row->company_id;
                    $vacancyItem['Position'] = $row->position;
                    $vacancyItem['Date'] = str_replace("/", ".",$row->date);
                    $vacancyItem['Min'] = $row->min;
                    $vacancyItem['Max'] = $row->max;
                    $vacancyItem['About'] = $row->about;
                    $vacancyItem['Duty'] = $row->duty;
                    $vacancyItem['Experience'] = $row->experience;
                    $vacancyItem['Demands'] = $row->demands;
                    $vacancyItem['Conditions'] = $row->conditions;
                    $vacancyItem['Address'] = $row->address;
                    $i++;
                }

                return $vacancyItem;

                R::close();
            }
        }

        public static function getUserVacanciesById($id){

            $id = intval($id);

            if($id){
                $userVacancyList = array();

                require_once ROOT."/components/db.php";

                $result = R::find("vacancy", "company_id = ?", array($id));
                
                $i=0;

                if(!$userVacancyList){
                    foreach($result as $row){
                        $userVacancyList[$i]['id'] = $row->id;
                        $userVacancyList[$i]['Company_id'] = $row->company_id;                
                        $userVacancyList[$i]['Position'] = $row->position;
                        $userVacancyList[$i]['Min'] = $row->min;
                        $userVacancyList[$i]['Max'] = $row->max;
                        $userVacancyList[$i]['About'] = $row->about;
                        $userVacancyList[$i]['Date'] = $row->date;
                        $i++;
                    }
                    return $userVacancyList;
                }else{ 
                    return false;
                }
            }

        }

    }

?>
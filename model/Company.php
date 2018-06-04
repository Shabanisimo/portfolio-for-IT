<?php

    class Company{

        public static function registration($login, $password, $title, $website, $telephone){

            $password = md5($password);

            require_once ROOT."/components/db.php";
        
            $result = R::dispense('company');
                    
            $result->login = $login;
            $result->password = $password;
            $result->website = $website;
            $result->title = $title;
            $result->telephone = $telephone;

            R::store($result);
                
            return false;
        }

        public static function authorisation($companyId){
            $_SESSION['company'] = $companyId;
        }

        public static function checkCompanyData($login, $password){
            
            require_once ROOT."/components/db.php";
            $password = md5($password);
            $result = R::find('company','login = ? AND password = ?',array($login,$password));

            $i=0;

            $company = array();

            foreach($result as $item){
                $company['id'] = $item->id;
                print_r ($item->id);
            }

            if($result){
                print_r($company['id']);
                return $company['id'];
            }else{return false;}
        }

    }
?>
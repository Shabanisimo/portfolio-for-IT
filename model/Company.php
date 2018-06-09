<?php

    class Company{

        public static function registration($login, $password, $title, $email, $telephone){

                require_once ROOT."/components/db.php";
    
                $new_company = R::dispense("users");
    
                $password = md5($password);
                $type = 2;
    
                $new_company->login = $login;
                $new_company->password = $password;
                $new_company->name = $title;
                $new_company->email = $email;
                $new_company->telephone = $telephone;
                $new_company->type = $type;
    
                R::store($new_company);
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
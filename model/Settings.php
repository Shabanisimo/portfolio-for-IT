<?php

    class Settings{

        public static function edit($userId ,$name, $surname, $email, $telephone, $about){

            require_once ROOT."/components/db.php";

        
            $result = R::load('users',$userId);
                    
            $result->name = $name;
            $result->surname = $surname;
            $result->email = $email;
            $result->telephone = $telephone;
            $result->about = $about;

            R::store($result);
                
            return false;
        }

    }

?>
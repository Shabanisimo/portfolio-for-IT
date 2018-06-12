<?php

    class User{

        public static function registration($login, $password, $name, $surname, $email, $telephone){

            require_once ROOT."/components/db.php";

            $new_user = R::dispense("users");

            $password = md5($password);
            $type = 1;

            $new_user->login = $login;
            $new_user->password = $password;
            $new_user->name = $name;
            $new_user->surname = $surname;
            $new_user->email = $email;
            $new_user->telephone = $telephone;
            $new_user->type = $type;

            R::store($new_user);
        }

        public static function checkLogin($login){
            if(strlen($login) >= 1){
                return true;
            }
            return false;
        }

        public static function checkPassword($password){
            if(strlen($password) >= 8){
                return true;
            }
            return false;
        }

        public static function checkName($name){
            if(strlen($name) >= 1){
                return true;
            }
            return false;
        }

        public static function checkSurname($surname){
            if(strlen($surname) >= 1){
                return true;
            }
            return false;
        }

        public static function checkEmail($email){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                return true;
            }
            return false;
        }

        public static function checkEmailExists($email){

            require_once ROOT."/components/db.php";
            
            $result = R::count("users", "email = ?", array($email));            

            if($result)
                return true;
            return false;

        }

        public static function getUserItemById($id){
            $id = intval($id);

            if ($id){

                require_once ROOT."/components/db.php";

                $result = R::find("users", "id = ?", array($id));
                
                $i=0;

                foreach($result as $row){
                    $userItem['name'] = $row->name;
                    $userItem['surname'] = $row->surname;
                    $userItem['email'] = $row->email;
                    $userItem['telephone'] = $row->telephone;
                    $userItem['about'] = $row->about;
                    $userItem['image'] = $row->image;
                    $userItem['type'] = $row->type;
                }

                return $userItem;
            }
        }

        public static function authorisation($userId){
            $_SESSION['user'] = $userId;
        }

        public static function checkUserData($login, $password){
            
            require_once ROOT."/components/db.php";
            $password = md5($password);
            $result = R::find('users','login = ? AND password = ?',array($login,$password));

            $i=0;

            $user = array();

            foreach($result as $item){
                $user['id'] = $item->id;
                print_r ($item->id);
            }

            if($result){
                print_r($user['id']);
                return $user['id'];
            }else{return false;}
        }

        public static function isGuest(){

            if (isset($_SESSION['user'])){
                return false;
            }

            return true;
        }

        public static function checkLogged(){

            if (isset($_SESSION['user'])){
                return $_SESSION['user'];
            }

            header("Location: /authorisation");
        }

        public static function getUserProjectsById($id){
            $id = intval($id);

            if($id){
                $userProjectList = array();

                require_once ROOT."/components/db.php";

                $result = R::find("projects", "user_id = ?", array($id));
                
                $i=0;

                if(!$userProjectList){
                    foreach($result as $row){
                        $userProjectList[$i]['Title'] = $row->title;
                        $userProjectList[$i]['Id'] = $row->id;
                        $userProjectList[$i]['Language'] = $row->language;
                        $userProjectList[$i]['Image'] = $row->image;
                        $userProjectList[$i]['Likes'] = $likes= R::count('likes', 'project_id = ?', array($row->id));
                        $userProjectList[$i]['Date'] = $row->date;
                        $i++;
                    }
                    return $userProjectList;
                }else{ 
                    return false;
                }
            }
        }

        public static function findUserNameById($id){
            $id = intval($id);

            if($id)
            {

                require_once ROOT."/components/db.php";

                $result = R::findAll("users", "id = ?", array($id));

                $i = 0;
                $user;

                foreach ($result as $row){
                    $user['Name'] = $row->name;
                    $user['Surname'] = $row->surname;
                    $i++;
                }

                $userName = $user['Name'] . $user['Surname'];
                    
                return $userName;
                
            }
        }

        public static function checkUserAccount($id){
            if (!User::isGuest()){
                if ($id == $_SESSION['user']){
                    return true;
                } else{
                    return false;
                }
            }else {
                return false;
            }
        }

        public static function getUserPhoto($id){

            $id = intval($id);

            if($id)
            {

                require_once ROOT."/components/db.php";

                $result = R::find("users", "id = ?", array($id));

                $i = 0;
                $image;

                foreach ($result as $row){
                    $image = $row->image;
                    $i++;
                }
                    
                return $image;
                
            }

        }

        public static function checkUserType($id){
            $id = intval($id);
            if($id)
            {
                require_once ROOT."/components/db.php";
                $result = R::find("users", "id = ?", array($id));
                $i = 0;
                $type;
                foreach ($result as $row){
                    $type = $row->type;
                    $i++;
                }
                return $type;   
            }
        }

        public static function checkUserEmail($id){
            $id = intval($id);
            if($id)
            {
                require_once ROOT."/components/db.php";
                $result = R::find("users", "id = ?", array($id));
                $i = 0;
                $email;
                foreach ($result as $row){
                    $email = $row->email;
                    $i++;
                }
                return $email;   
            }
        }

        public static function checkUserTelephone($id){
            $id = intval($id);
            if($id)
            {
                require_once ROOT."/components/db.php";
                $result = R::find("users", "id = ?", array($id));
                $i = 0;
                $telephone;
                foreach ($result as $row){
                    $telephone = $row->telephone;
                    $i++;
                }
                return $telephone;   
            }
        }

        public static function changeUserPhoto($photo){
            if($photo)
            {
                require_once ROOT."/components/db.php";
                $result = R::load("users", $_SESSION['user']);
                $result->image = $photo;
                R::store($result);   
            }
        }

        public static function isAdmin(){

                require_once ROOT."/components/db.php";
                $result = R::find("admin","user_id = ?", array($_SESSION['user']));
                if($result)
                    return false;
                return true;  
        }




    }

?>
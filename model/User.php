<?php

    class User{

        public static function registration($login, $password, $name, $surname, $email, $telephone){

            $db = DB::getConection();

            $sql = 'INSERT INTO users (login, password, name, surname, email, telephone, type) '
                    . 'VALUES (:login, :password, :name, :surname, :email, :telephone, :type)';

            $password = md5($password);
            $type = 1;

            $result = $db->prepare($sql);
            $result->bindParam(':login', $login, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':surname', $surname, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':telephone', $telephone, PDO::PARAM_STR);
            $result->bindParam(':type', $type, PDO::PARAM_STR);

            return $result->execute();
        }

        public static function checkLogin($login){
            if(strlen($login) >= 4){
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
            if(strlen($name) >= 2){
                return true;
            }
            return false;
        }

        public static function checkSurname($surname){
            if(strlen($surname) >= 2){
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

            $db = DB::getConection();
            
            $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->execute();

            if($result->fetchColumn())
                return true;
            return false;

        }

        public static function checkTelephone($telephone){

            
        }

        public static function getUserItemById($id){
            $id = intval($id);

            if ($id){

                $db = DB::getConection();

                $result = $db->query('SELECT id, name, surname, email, telephone, type, about '
                        . 'FROM users '
                       . 'WHERE id='.$id);

                $userItem = $result->fetch();

                return $userItem;
            }
        }

        public static function authorisation($userId){
            $_SESSION['user'] = $userId;
        }

        public static function checkUserData($login, $password){
            $db = DB::getConection();

            $password = md5($password);

            $sql = 'SELECT * FROM users WHERE login = :login AND password = :password';

            $result = $db->prepare($sql);
            $result->bindParam(':login', $login, PDO::PARAM_INT);
            $result->bindParam(':password', $password, PDO::PARAM_INT);
            $result->execute();

            $user = $result->fetch();
            if($user){
                return $user['id'];
            }
            
            return false;

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

                $db = DB::getConection();

                $result = $db->query('SELECT id, User_id, Title, Date, Language, Description, Likes '
                        . 'FROM projects '
                        . 'WHERE User_id='.$id);

                $i = 0;
                while($row = $result->fetch() ){
                    $userProjectList[$i]['id'] = $row['id'];
                    $userProjectList[$i]['User_id'] = $row['User_id'];
                    $userProjectList[$i]['Title'] = $row['Title'];
                    $userProjectList[$i]['Date'] = $row['Date'];
                    $userProjectList[$i]['Language'] = $row['Language'];
                    $userProjectList[$i]['Description'] = $row['Description'];
                    $userProjectList[$i]['Likes'] = $row['Likes'];
                    $i++;
                }

                return $userProjectList;
            }
        }

        public static function findUserNameById($id){
            $id = intval($id);

            if($id)
            {
                $db = DB::getConection();

                $result = $db->query('SELECT name, surname FROM users WHERE id='.$id);
                $result->setFetchMode(PDO::FETCH_ASSOC);
    
                $user = $result->fetch();
                    
                return $user;
                
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


    }

?>
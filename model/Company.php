<?php

    class Project{

        public static function companyRegistration($login, $password, $title, $website, $telephone){

            $db = DB::getConection();

            $sql = 'INSERT INTO company (Login, Password, Title, Website, Telephone) '
                    . 'VALUES (:login, :password, :title, :website, :telephone)';

            $password = md5($password);

            $result = $db->prepare($sql);
            $result->bindParam(':login', $login, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);
            $result->bindParam(':title', $title, PDO::PARAM_STR);
            $result->bindParam(':website', $website, PDO::PARAM_STR);
            $result->bindParam(':telephone', $telephone, PDO::PARAM_STR);

            return $result->execute();
        }

    }
?>
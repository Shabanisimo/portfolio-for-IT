<?php

    class Settings{

        public static function edit($userId ,$name, $surname, $email, $telephone, $about){
            $db = DB::getConection();

            $sql = 'UPDATE users SET name = :name, surname = :surname, email = :email, telephone = :telephone, about = :about '
                    .'WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $userId, PDO::PARAM_INT);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':telephone', $telephone, PDO::PARAM_STR);
            $result->bindParam(':about', $about, PDO::PARAM_STR);
            $result->execute();
        }

    }

?>
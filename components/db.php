<?php
    class DB{
        public static function getConection(){
            $paramPath = ROOT.'/config/db_params.php';
            $params = include($paramPath);

            $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";
            $db = new PDO($dsn, $params['user'], $params['password']);

            return $db;
        }
    }
?>
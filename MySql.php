<?php
    class MySql{

        private static $pdo = null;

        public static function getConn(){
            if(self::$pdo == null){
                self::$pdo = new PDO('mysql:host=localhost;dbname=marketplace_curso','root','');
                return self::$pdo;
            }else{
                return self::$pdo;
            }
        }
    }

?> 
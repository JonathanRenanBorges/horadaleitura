<?php
class ConnectDB extends PDO{
   
   public static $instance;
   private function __construct() {
       //
   }

   public static function getConexao() {
       if (!isset(self::$instance)) {
        self::$instance = new PDO('mysql:host=localhost;dbname=sql10714828', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
           self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
       }

       return self::$instance;
   }

}
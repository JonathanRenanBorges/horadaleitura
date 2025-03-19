<?php 
namespace app\DAO;
use ConnectDB;
use Exception;
class DAOManager{
    public static $table;
    private function __construct($table) {
        self::$table = $table;
    }

    public static function resetAutoIncrement($table){
        if (!isset(self::$table)) {
            self::$table = $table;
        }
        try{
            $query = "ALTER TABLE $table AUTO_INCREMENT = 0;";
            $sql = ConnectDB::getConexao()->query($query);
            $sql->execute();
        } catch (Exception $e){
            echo ("" . $e . "");
        }
        
    }
}
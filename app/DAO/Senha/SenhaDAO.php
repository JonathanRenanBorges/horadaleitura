<?php
namespace app\DAO;
class SenhaDAO{
    private $algorithm = PASSWORD_BCRYPT;
    private $options = ['cost' => 4];
    
    public function __construct(){

    }

    public function hashPassword($par){
        return password_hash($par,$this->algorithm,$this->options);
    }

    public function unhashPassword($par){
        return password_verify($par,$this->algorithm);
    }

    public function matchPassword($par, $password){
        if(password_verify($par, $password)){
            return true;
        } else{
            return false;
        }
    }
}
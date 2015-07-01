<?php
class datosmysql{
public $usernameDB = 'adminTpQmknN';
public $passwordDB = '77g4ePielXPg';
public $hostDB = '127.5.49.2';
public $nameDB = 'saetis';
/*
    public $usernameDB = 'root';
    public $passwordDB = 'root';
    public $hostDB = 'localhost';
    public $nameDB = 'saetis';
<<<<<<< HEAD
 */
=======

>>>>>>> 5e239d19390696ed2483b18b55b4ad0e96c75124
    function getUs(){
        return $this->usernameDB;
    }
    function getPas(){
        return $this->passwordDB;
    }
    function getHos(){
        return $this->hostDB;
    }
    function getDB(){
        return $this->nameDB;
    }
}

?>

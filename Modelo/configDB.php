<?php
class datosmysql{
public $usernameDB = 'root';
<<<<<<< HEAD
public $passwordDB = 'lisa';
=======
public $passwordDB = 'root';
>>>>>>> 9d2da5c156fd472b6d860dc212e9b66f06ddcb2b
public $hostDB = 'localhost';
public $nameDB = 'saetis';
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




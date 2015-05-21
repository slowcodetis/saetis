<?php
class datosmysql{
public $usernameDB = 'root';
public $passwordDB = 'root';
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




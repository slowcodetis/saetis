<?php
class datosmysql{
/*
public $usernameDB = 'adminTpQmknN';
public $passwordDB = '77g4ePielXPg';
public $hostDB = '127.5.49.2';
public $nameDB = 'saetis';
*/
public $usernameDB = 'root';
public $passwordDB = 'Crhyst23';
public $hostDB = 'localhost';
public $nameDB = 'saetis';
 //*/

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




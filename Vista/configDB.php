<?php
class datosmysql{
public $usernameDB = 'adminJEnKCGS';
public $passwordDB = 'Bw_r44GdcjMn';
public $hostDB = '127.6.250.130';
public $nameDB = 'saetis';
/*
public $usernameDB = 'root';
public $passwordDB = '1q2w3e4r.';
public $hostDB = 'localhost';
public $nameDB = 'saetis';
 */

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




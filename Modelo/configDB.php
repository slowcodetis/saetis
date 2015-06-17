<?php
class datosmysql{
//public $usernameDB = 'u156987063_sa';
//public $passwordDB = '1q2w3e4r.';
//public $hostDB = 'mysql.2freehosting.com';
//public $nameDB = 'u156987063_sa';
/*    
public $usernameDB = 'root';
public $passwordDB = 'Crhyst23';
public $hostDB = 'localhost';
public $nameDB = 'saetis';
*/

public $usernameDB = 'root';
public $passwordDB = 'lisa';
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




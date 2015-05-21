<?php 
require_once 'configDB.php';

 class Conexion extends PDO { 
   public $tipo_de_base = 'mysql';
   public $data_mysql;      
   public function __construct() {
   $this->data_mysql = new datosmysql();
   $host = $this->data_mysql->getHos();
   $nombre_de_base = $this->data_mysql->getDB();
   $usuario = $this->data_mysql->getUs();
   $contrasena = $this->data_mysql->getPas(); 

      //Sobreescribo el método constructor de la clase PDO.
      try{
         parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   } 
 } 
?>

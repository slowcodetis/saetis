<?php 
require_once 'configDB.php';

 class Conexion extends PDO { 
<<<<<<< HEAD
   private $tipo_de_base = 'mysql';
  /* private $host = '192.168.2.5';
   private $nombre_de_base = 'tis_mbittle';
   private $usuario = 'mbittle';
   private $contrasena = '5rtZAGYq'; */
   private $host = 'localhost';
   private $nombre_de_base = 'saetis';
   private $usuario = 'root';
   private $contrasena = 'lisa'; 
   
=======
   public $tipo_de_base = 'mysql';
   public $data_mysql;      
>>>>>>> f76a9a764f3e7111c83fcb95fb44aa5457f15bde
   public function __construct() {
   $this->data_mysql = new datosmysql();
   $host = $this->data_mysql->getHos();
   $nombre_de_base = $this->data_mysql->getDB();
   $usuario = $this->data_mysql->getUs();
   $contrasena = $this->data_mysql->getPas(); 

      //Sobreescribo el método constructor de la clase PDO.
      try{
         parent::__construct($this->tipo_de_base.':host='.$host.';dbname='.$nombre_de_base, $usuario, $contrasena);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   } 
 } 
?>

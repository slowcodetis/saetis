<?php
class conexionBD extends PDO {

	private $dsn = 'mysql:host=localhost;dbname=saetis';
	private $usuario = 'root';
	private $contrasena = 'root';

	public function __construct() {
		try {
				parent:: __construct($this->dsn, $this->usuario, $this->contrasena );
		} catch(PDOException $e) {
				echo 'Se ha producido un error al conectarse con la base de datos. Detalle: '.$e->getMesasge();
				exit;
		}
	}	 
}
?>
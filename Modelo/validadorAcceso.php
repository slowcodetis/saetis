<?php

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

class ControladorAccesoVistasPorUsuario {

    private $servername = "localhost";
    private $username = "root";
    private $password = "root";

	function __construct() {
	}
	
	function listaVistas($nombreArchivo, $usuario) {

		$conn = new PDO("mysql:host=$this->servername;dbname=saetis", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare('SELECT nombreUrl FROM ( SELECT IdUrl FROM (SELECT ROL_R FROM usuario_rol WHERE NOMBRE_U= :NOMBRE_U) AS uno, rol_url WHERE rol_url.IdRol = uno.ROL_R ) AS dos, url WHERE Id = dos.IdUrl AND nombreUrl = :nombreUrl');
        
        $nombreUsuario = $usuario;
        $cadena = $nombreArchivo;
        $stmt->bindParam(':NOMBRE_U', $nombreUsuario, PDO::PARAM_STR);
        $stmt->bindParam(':nombreUrl', $cadena, PDO::PARAM_STR);
        $stmt->execute();
		
        $vistas = array();
        $i = 0;
        
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
           
            $vistas[$i] = $v;
            $i = $i + 1;
        }
        return $vistas;
	}

	function vistaPrincipal($usuario, $vista) {

        $conn = new PDO("mysql:host=$this->servername;dbname=saetis", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare('SELECT nombreUrl FROM ( SELECT IdUrl FROM (SELECT ROL_R FROM usuario_rol WHERE NOMBRE_U= :NOMBRE_U) AS uno, rol_url WHERE rol_url.IdRol = uno.ROL_R ) AS dos, url WHERE Id = dos.IdUrl AND nombreUrl = :url');
        
        $stmt->bindParam(':NOMBRE_U', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':url', $vista, PDO::PARAM_STR);
        $stmt->execute();
		
        $vistas = array();
        $i = 0;
        
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
           
            $vistas[$i] = $v;
            $i = $i + 1;

            echo $vistas[$i];
        }
        return count($vistas);
	}

	function puedeAcceder($nombreArchivo, $usuario) {

        $vistas = array();
        $vistas = $this->listaVistas($nombreArchivo, $usuario);

        if(count($vistas) == 0) {

        	$principalGrupoEmpresa = "inicio_grupo_empresa.php";
	    	$principalAsesor = "inicio_Asesor.php";
	    	$principalAdministrador = "principal.php";
        	
        	$principal = $this->vistaPrincipal($usuario, $principalGrupoEmpresa);
        	
        	if($principal == 0) {
        		$principal = $this->vistaPrincipal($usuario, $principalAsesor);
        		if($principal == 0) {
        			$principal = $this->vistaPrincipal($usuario, $principalAdministrador);
        			if($principal == 0) {
        				echo "<script>alert('No tienes permisos para ver esa pagina')</script>";
                        echo "<script>window.location = '../index.php' </script>";
        			}
        			else {
        				$script = "window.location = '../Vista/".$principalAdministrador.'\'';
        				echo "<script> $script </script>";
        			}
        		}
        		else {
        			$script = "window.location = '../Vista/".$principalAsesor.'\'';
        			echo "<script> $script </script>";
        		}
        	}
        	else {
        		$script = "window.location = '../Vista/".$principalGrupoEmpresa.'\'';
    			echo "<script> $script </script>";
        	}
        }
   	}
}

?>

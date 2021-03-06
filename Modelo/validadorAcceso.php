<?php
require_once 'configDB.php';
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
    public $data_mysql;
    function __construct() {
    }
	
    function listaVistas($nombreArchivo, $usuario) {
    $this->data_mysql = new datosmysql();
    $servername = $this->data_mysql->getHos();
    $username = $this->data_mysql->getUs();
    $password = $this->data_mysql->getPas();
    $dbn = $this->data_mysql->getDB();

	$conn = new PDO("mysql:host=$servername;dbname=$dbn", $username, $password);
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
        $this->data_mysq = new datosmysql();
        $servernam = $this->data_mysq->getHos();
        $usernam = $this->data_mysq->getUs();
        $passwor = $this->data_mysq->getPas();
        $hs = $this->data_mysq->getDB();
        $conn = new PDO("mysql:host=$servernam;dbname=$hs", $usernam, $passwor);
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

        //echo "<script>alert('No tienes permisos para ver esa pagina l $usuario l')</script>";

        $vistas = array();
        $vistas = $this->listaVistas($nombreArchivo, $usuario);

        if(count($vistas) == 0) {

        	$principalGrupoEmpresa = "inicio_grupo_empresa.php";
	    	$principalAsesor = "inicio_asesor.php";
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

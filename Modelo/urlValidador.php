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


//class Validador() {

    //private 
    $servername = "localhost";
    //private 
    $username = "root";
    //private 
    $password = "root";

    try {
        
        //echo 'jajajajaja';

        $conn = new PDO("mysql:host=$servername;dbname=saetis", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare('SELECT nombreUrl FROM ( SELECT IdUrl FROM (SELECT ROL_R FROM usuario_rol WHERE NOMBRE_U= :NOMBRE_U) AS uno, rol_url WHERE rol_url.IdRol = uno.ROL_R ) AS dos, url WHERE Id = dos.IdUrl AND nombreUrl = :nombreUrl');

        $nombreUsuario = 'FreeValue';
        $cadena = "inicio_grupo_empresa.php";
        $stmt->bindParam(':NOMBRE_U', $nombreUsuario, PDO::PARAM_STR);
        $stmt->bindParam(':nombreUrl', $cadena, PDO::PARAM_STR);
        $stmt->execute();

        $vistas = array();
        $i = 0;

        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
           
            $vistas[$i] = $v;
            $i = $i + 1;
            //echo $v;
        }
        
        echo $nombreUsuario;
        echo $cadena;

        if(count($vistas) == 0) {
            //echo 'no deberias ver esto';
            echo "<script>alert('porque!!!!')</script>";
            //header('Location: http://localhost:8888/sistema1/Saetis/index.php');
            //return false;
            //echo 'no deberias ver esto';
        }
        else {
            //return true;
            echo "<script>alert('puedes ingresar!!!!')</script>";
            //echo 'tienes permiso';
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    //return false;
//}
?>

<?php
include_once "configDB.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class conexion{
    public $link;
    public $data_mysql; 
function __construct(){
    
    $this->conectar();
}

function conectar(){   
$this->data_mysql = new datosmysql();
$servidor = $this->data_mysql->getHos();
$userName = $this->data_mysql->getUs();
$password = $this->data_mysql->getPas();
$bdName = $this->data_mysql->getDB();
global $link;
$link =  mysql_connect($servidor, $userName, $password) or die('no se pudo conectar al servidor' . mysql_error());
    mysql_select_db($bdName,$link) or die('no se pudo encontrar la base de datos');
}

function consulta($consulta) {
    global $link;
    $resultado = mysql_query($consulta,$link)  or die('error en la consulta' . mysql_error());
    return $resultado;
}

function consulta_real($consulta) {
    global $link;
    $resultado = mysql_query($consulta,$link);
    return $resultado;   
}

function consulta_publicaciones($consulta) {
    global $link;
    $resultado = mysql_query($consulta,$link);

        if(!$resultado) {
            echo "<script>alert('No se pudo realizar su publicacion')</script>";
        }

    return $resultado;
}

function cerrarConexion() {
    global $link;
    mysql_close($link);
}

	public function consultarTabla($query) {
            $tabla = array();
            $resConsulta = $this->consulta($query);
            $i = 0;
            $j = 0;
            $numColumnas = mysql_numfields($resConsulta);
            while ($fila = mysql_fetch_array($resConsulta)) {
                for ($j = 0 ; $j < $numColumnas ;$j++){
                    $tabla["$i"]["$j"] = $fila["$j"];
                }            
                $i++;
            }
            return $tabla;
        }    
        
        public function consultarArreglo($query){        
            $arreglo = array();
            $resConsulta = $this->consulta($query);
            $i = 0;                
            while ($fila = mysql_fetch_array($resConsulta)) {            
                $arreglo["$i"] = $fila["0"];
                $i++;
            }
            return $arreglo;
        }
       
        public function consultaUnDato($query) {
            $dato = -1;
            $resConsulta = $this->consulta($query);
            while ($fila = mysql_fetch_array($resConsulta)) {            
                $dato = $fila["0"];
                break;
            }             
            return $dato;
        }

}

?>

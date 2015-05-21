<?php
class ValidadorFecha {

	function __construct() {
	}
	
	function validarFecha($fecha) {
            
        $valores = explode("-", $fecha);
        $anio = $valores[0];
        $mes = $valores[1];
        $dia = $valores[2];
        return checkdate($mes, $dia, $anio);
	}

	function validarIntervalosFecha($fechaInicio, $fechaFin) {
        
        $intervaloValido = $this->validarFecha($fechaInicio) && $this->validarFecha($fechaFin);

        if ($intervaloValido) {
            $valores = explode("-", $fechaInicio);
            $anioInicio = intval($valores[0]);
            $mesInicio = intval($valores[1]);
            $diaInicio = intval($valores[2]);
       	
            $valores = explode("-", $fechaFin);
            $anioFin = intval($valores[0]);
            $mesFin = intval($valores[1]);
            $diaFin = intval($valores[2]);

            $intervaloValido = ($anioFin > $anioInicio);

            if(!$intervaloValido) { 
                $intervaloValido = ($anioFin == $anioInicio) && $mesFin > $mesInicio;
                if(!$intervaloValido) { 
                    $intervaloValido = ($anioFin == $anioInicio) && $mesFin == $mesInicio && $diaFin >= $diaInicio;
                }
            }
        }
        return $intervaloValido;
    }

    function validarTiempoFecha($fecha) {
        $hoy = date("Y-m-d");

        $res = $this->validarIntervalosFecha($hoy, $fecha);

            //echo"<script type=\"text/javascript\">alert('$fecha  hoy: $hoy');</script>";

        return $res;
    }
}

?>

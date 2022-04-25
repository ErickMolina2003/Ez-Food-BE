<?php

class FinalizarOrden{


    public static function finalizarOrden($orden){
        // todas las ordenes asignadas
        $archivo = json_decode( file_get_contents('../data/ordenes-asignadas.json') ,true);

        $orden = json_decode($orden, true);

        for($i = 0 ; $i < sizeof($archivo) ; $i++) {
            if($archivo[$i]["id"] == $orden["id"]){
                $archivo[$i] = $orden;
                break;
            }
        }

        $file = fopen('../data/ordenes-asignadas.json', 'w');
        fwrite($file, json_encode($archivo));

    }

    public static function obtenerOrdenesFinalizadas() {
        $ordenesFinalizadas = json_decode(file_get_contents('../data/ordenes-asignadas.json'), true) ;

        $ordenesEstadoFinal = [];

        for($i = 0; $i < sizeof($ordenesFinalizadas); $i++) {
            if($ordenesFinalizadas[$i]["estado"] == "entregada"){
                $ordenesEstadoFinal[] = $ordenesFinalizadas[$i];
            }
        }

        echo json_encode($ordenesEstadoFinal);

    }


}

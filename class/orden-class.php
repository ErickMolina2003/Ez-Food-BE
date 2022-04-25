<?php

class Orden
{

    private $id;
    private $direccionOrigen;
    private $direccionDestino;
    private $SubTotal;
    private $ImpuestoCompra;
    private $ImpuestoVenta;
    private $Impuesto;
    private $Total;
    private $Envio;
    private $Comision;
    private $Propina;
    private $TotalComision;
    private $idProducto;
    private $empresaProducto;
    private $descripcionProducto;
    private $precioProducto;
    private $imagenProducto;

    public static function procesarOrden($orden)
    {
        // AGARRAR TODAS LAS ORDENES    
        $totalOrdenes = json_decode(file_get_contents('../data/ordenes.json'), true);

        // TOMAR LA ORDEN DEL FE
        $orden = json_decode($orden, true);

        $infoOrden = [];

        // AGARRAR LA INFO
        for ($i = 0; $i < sizeof($orden); $i++) {
            if ($i == (sizeof($orden)) - 1) {
                $infoOrden = $orden[$i];
            }
        }

        // GENERAR ID
        $nuevoId = sizeof($totalOrdenes);
        $nuevoId++;
        $infoOrden += array("id" => $nuevoId);

        // AGARRAR LOS PRODUCTOS
        for ($i = 0; $i < sizeof($orden) - 1; $i++) {
            $infoOrden["productos"][$i] = $orden[$i];
        }


        array_push($totalOrdenes, $infoOrden);

        $archivo = fopen('../data/ordenes.json', 'w');
        fwrite($archivo, json_encode($totalOrdenes));
    }

    public static function obtenerOrdenesDisponibles()
    {
        $archivo = json_decode(file_get_contents('../data/ordenes.json'), true);

        $ordenesDisponibles = [];

        for ($i = 0; $i < sizeof($archivo); $i++) {
            // if (!$archivo[$i]["estado"] || $archivo[$i]["estado"] == "disponible") {
            $ordenesDisponibles[$i] = array(
                "id" => $archivo[$i]["id"],
                "direccionOrigen" => $archivo[$i]["direccionOrigen"],
                "direccionDestino" => $archivo[$i]["direccionDestino"],
                "TotalComision" => $archivo[$i]["TotalComision"]
            );
            // }
        }

        echo json_encode($ordenesDisponibles);
    }

    public static function obtenerOrdenPorId($idOrden)
    {
        $archivo = json_decode(file_get_contents('../data/ordenes.json'), true);


        for ($i = 0; $i < sizeof($archivo); $i++) {
            // echo json_encode($archivo[$i]);
            if ($archivo[$i]["id"] == $idOrden) {
                $orden = $archivo[$i];
            }
        }

        echo json_encode($orden);
    }

    public static function TomarOrden($orden)
    {
        echo $orden;
        // Eliminar la orden de ordenes.json

        // $todasOrdenes = json_decode(file_get_contents('../data/ordenes.json'), true);
        // $nuevasOrdenes = [];
        // $ordenRecibida = json_decode($orden, true);

        // for ($i = 0; $i < sizeof($todasOrdenes); $i++) {
        //     if ($todasOrdenes[$i]["id"] != $ordenRecibida["id"]) {
        //         $nuevasOrdenes[] = $todasOrdenes[$i];
        //     }
        // }

        // $archivo = fopen('../data/ordenes.json', 'w');
        // fwrite($archivo, json_encode($nuevasOrdenes));

        // Agregar la orden a ordenes-asignadas.json

        $todasOrdenesAsignadas = json_decode(file_get_contents('../data/ordenes-asignadas.json'), true);
        $ordenAgregar = json_decode($orden, true);
        $ordenAgregar['id'] = sizeof($todasOrdenesAsignadas) + 1;

        $todasOrdenesAsignadas[] = $ordenAgregar;

        $archivo2 = fopen('../data/ordenes-asignadas.json', 'w');
        fwrite($archivo2, json_encode($todasOrdenesAsignadas));


        // Agregar la orden al repartidor correspondiente

        $ordenParam = json_decode($orden, true);
        $ordenParam = $ordenParam["repartidor"];

        $todosRepartidores = json_decode(file_get_contents('../data/repartidores.json'), true);
        $repartidor = [];
        for ($i = 0; $i < sizeof($todosRepartidores); $i++) {
            if ($todosRepartidores[$i]["id"] == $ordenParam) {
                $repartidor = $todosRepartidores[$i];
            }
        };

        $totalOrdenes = json_decode(file_get_contents('../data/ordenes-asignadas.json'), true);
        $nuevoId = sizeof($totalOrdenes);
        $orden = json_decode($orden, true);
        $orden["id"] = $nuevoId;
        
        array_push($repartidor["ordenes"], $orden);

        $nuevosRepartidores[] = $repartidor;

        for ($i = 0; $i < sizeof($todosRepartidores); $i++) {
            if ($todosRepartidores[$i]["id"] != $ordenParam) {
                $nuevosRepartidores[] = $todosRepartidores[$i];
            }
        };
        $archivo3 = fopen('../data/repartidores.json', 'w');
        fwrite($archivo3, json_encode($nuevosRepartidores));
    }

    public static function obtenerOrdenAsignadaPorId($idOrden){

        $archivo = json_decode(file_get_contents('../data/ordenes-asignadas.json'), true);


        for ($i = 0; $i < sizeof($archivo); $i++) {
            // echo json_encode($archivo[$i]);
            if ($archivo[$i]["id"] == $idOrden) {
                $orden = $archivo[$i];
            }
        }

        echo json_encode($orden);

    }
}

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
}

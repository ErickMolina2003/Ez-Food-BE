<?php

class Admin
{

    public static function obtenerAdmins()
    {
        $todosAdmins = file_get_contents('../data/admins.json');

        echo $todosAdmins;
    }

    public static function obtenerEmpresas()
    {
        $todasCategorias = json_decode(file_get_contents('../data/categorias.json'), true);
        $empresas = [];

        for ($i = 0; $i < sizeof($todasCategorias); $i++) {
            for ($j = 0; $j < sizeof($todasCategorias[$i]["empresas"]); $i++) {
                // echo json_encode($todasCategorias[$i]["empresas"]);
                $empresas[] = $todasCategorias[$i]["empresas"];
                if ($i == sizeof($todasCategorias) - 1) {
                    break;
                }
            }
        }
        $todasEmpresas = [];
        for ($i = 0; $i < sizeof($empresas); $i++) {
            for ($j = 0; $j < sizeof($empresas[$i]); $j++) {
                $todasEmpresas[] = $empresas[$i][$j];
            }
        }

        echo json_encode($todasEmpresas);
    }

    public static function obtenerProductos()
    {
        $todasCategorias = json_decode(file_get_contents('../data/categorias.json'), true);
        $empresas = [];

        for ($i = 0; $i < sizeof($todasCategorias); $i++) {
            for ($j = 0; $j < sizeof($todasCategorias[$i]["empresas"]); $i++) {
                // echo json_encode($todasCategorias[$i]["empresas"]);
                $empresas[] = $todasCategorias[$i]["empresas"];
                if ($i == sizeof($todasCategorias) - 1) {
                    break;
                }
            }
        }
        $todasEmpresas = [];
        for ($i = 0; $i < sizeof($empresas); $i++) {
            for ($j = 0; $j < sizeof($empresas[$i]); $j++) {
                $todasEmpresas[] = $empresas[$i][$j];
            }
        }

        $todosProductos = [];
        for ($i = 0; $i < sizeof($todasEmpresas); $i++) {
            for ($j = 0; $j < sizeof($todasEmpresas[$i]["productosEmpresa"]); $j++) {
                if ($j != 0 && $j == sizeof($todasEmpresas[$i]["productosEmpresa"]) - 1) {
                    $i++;
                }
                // echo json_encode($todasEmpresas[$i]["productosEmpresa"]);

                for ($k = 0; $k < sizeof($todasEmpresas[$i]["productosEmpresa"]); $k++) {
                    $todosProductos[] = $todasEmpresas[$i]["productosEmpresa"][$k];
                }


                // $todosProductos[] = $todasEmpresas[$i]["productosEmpresa"];
                // $if()
            }
        }

        echo json_encode($todosProductos);
    }

    public static function ObtenerReartidores()
    {
        $todosRepartidores = file_get_contents('../data/repartidores.json');

        echo $todosRepartidores;
    }

    public static function obtenerOrdenes()
    {
        $todasOrdenesAsignadas = json_decode(file_get_contents('../data/ordenes-asignadas.json'), true);
        $todasOrdenes = json_decode(file_get_contents('../data/ordenes.json'), true);

        $ordenesCompletas = [];
        for ($i = 0; $i < sizeof($todasOrdenesAsignadas); $i++) {
            $ordenesCompletas[] = $todasOrdenesAsignadas[$i];
        }

        for ($i = 0; $i < sizeof($todasOrdenes); $i++) {
            $ordenesCompletas[] = $todasOrdenes[$i];
        }

        echo json_encode($ordenesCompletas);
    }

    public static function crearEmpresa($empresa)
    {
        $categorias = json_decode(file_get_contents('../data/categorias.json'), true);
        $empresa = json_decode($empresa, true);

        $tipoCategoria = $empresa["categoria"];

        for ($i = 0; $i < sizeof($categorias); $i++) {
            if ($categorias[$i]["nombre"] == $tipoCategoria) {
                // echo json_encode($categorias[$i]["empresas"]);

                array_push($categorias[$i]["empresas"], $empresa);
                break;
            }
        }
        $archivo = fopen('../data/categorias.json', 'w');
        fwrite($archivo, json_encode($categorias));
    }

    public static function crearOrden($orden){  

        $categorias = json_decode(file_get_contents('../data/categorias.json'), true);
        $orden = json_decode($orden,true);
        $tipoCategoria = $orden["categoria"];
        $tipoEmpresa = $orden["empresa"];

        // echo json_encode($categorias);
        // echo json_encode($orden);
        // echo json_encode($tipoCategoria);
        // echo json_encode($tipoEmpresa);
        

        for($i=0;$i< sizeof($categorias); $i++){
            if($categorias[$i]["nombre"] == $tipoCategoria){

                for($j=0; $j < sizeof($categorias[$i]["empresas"]); $j++){
                    if($categorias[$i]["empresas"][$j]["nombreEmpresa"] == $tipoEmpresa){
                        array_push($categorias[$i]["empresas"][$j]["productosEmpresa"], $orden);
                        break;
                    }
                    
                }
                
                // echo json_encode($categorias[$i]["nombre"]);
                // echo json_encode($categorias[$i]["empresas"]);
                // echo json_encode($categorias[$i]["empresas"]);
                break;
            }
        }

        echo json_encode($categorias);

        $archivo = fopen('../data/categorias.json', 'w'); 
        fwrite($archivo, json_encode($categorias));

    }

    public static function asignarOrden($orden){
        $ordenes = json_decode(file_get_contents('../data/ordenes-asignadas.json'), true);
        $orden = json_decode($orden,true);

        $ordenes[] = $orden;

        $archivo = fopen('../data/ordenes-asignadas.json', 'w'); 
        fwrite($archivo, json_encode($ordenes));

    }
}

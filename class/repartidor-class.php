<?php

class Repartidor
{
    private $id;
    private $usuario;
    private $contrasena;
    private $ordenes;

    public static function crearUsuario($nuevoUsuario)
    {
        // AGARRAR TODOS LOS USUARIOS
        $todosUsuarios = json_decode(file_get_contents('../data/repartidores.json'));
        // AGARRA LA CANTIDAD DE USUARIOS
        $cantidadTotalUsuarios = sizeof($todosUsuarios);

        // PASA DE STRING A ARREGLO ASOCIATIVO Y DEFINE EL ID
        $dataNuevoUsuario = json_decode($nuevoUsuario, true);
        $idNuevo = $cantidadTotalUsuarios + 1;

        // AGREGA LOS CAMPOS FALTANTES
        $dataNuevoUsuario += array(
            "id" => $idNuevo,
            "ordenes" => []
        );

        // SE AGREGA EL NUEVO USUARIO A TODOS LOS USUARIOS
        array_push($todosUsuarios, $dataNuevoUsuario);



        $archivo = fopen('../data/repartidores.json', 'w');
        fwrite($archivo, json_encode($todosUsuarios));

        // echo $nuevoUsuario;

    }

    public static function obtenerRepartidores()
    {
        // AGARRAR TODOS LOS USUARIOS
        $todosRepartidores = json_decode(file_get_contents('../data/repartidores.json'), true);

        // MODIFICA EL ARREGLO PARA SOLO DEJAR ID, USUARIO, CONTRASENA EN CADA USUARIO
        for ($i = 0; $i < sizeof($todosRepartidores); $i++) {
            $todosRepartidores[$i] = array(
                "id" => $todosRepartidores[$i]["id"],
                "repartidor" => $todosRepartidores[$i]["repartidor"],
                "contrasena" => $todosRepartidores[$i]["contrasena"]
            );
        }

        // MANDA EL JSON MODIFICADO
        echo json_encode($todosRepartidores);
    }

    public static function obtenerRepartidor($idRepartidor)
    {
        $todosRepartidores = json_decode(file_get_contents('../data/repartidores.json'), true);
        $repartidor = [];
        for ($i = 0; $i < sizeof($todosRepartidores); $i++) {
            if ($todosRepartidores[$i]["id"] == $idRepartidor) {
                $repartidor = $todosRepartidores[$i]["ordenes"];
                break;
            }
        }

        echo json_encode($repartidor);
    }
}

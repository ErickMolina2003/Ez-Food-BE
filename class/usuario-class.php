<?php

    Class Usuario {
        private $id;
        private $usuario;
        private $contrasena;
        private $ubicacion;
        private $ordenes;
        private $idOrden;
        private $empresaOrden;
        private $descripcionOrden;
        private $cantidadOrden;
        private $precioOrden;
        private $estadoOrden;
        private $origenOrden;
        private $destinoOrden;

       function __construct(
        $id,
        $usuario,
        $contrasena,
        $ordenes,
       ){
           $this->id = $id;
           $this->usuario = $usuario;
           $this->contrasena = $contrasena;
           $this->ordenes = $ordenes;
        }

        public static function crearUsuario($nuevoUsuario) {
            // AGARRAR TODOS LOS USUARIOS
            $todosUsuarios = json_decode(file_get_contents('../data/usuario.json'));
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
            array_push($todosUsuarios,$dataNuevoUsuario);

            

            $archivo = fopen('../data/usuario.json', 'w');
            fwrite($archivo, json_encode($todosUsuarios));

            // echo $nuevoUsuario;

        }

        public static function obtenerUsuarios() {
            // AGARRAR TODOS LOS USUARIOS
            $todosUsuarios = json_decode(file_get_contents('../data/usuario.json'), true);

            // MODIFICA EL ARREGLO PARA SOLO DEJAR ID, USUARIO, CONTRASENA EN CADA USUARIO
            for($i = 0; $i<sizeof($todosUsuarios); $i++){
                $todosUsuarios[$i] = array(
                    "id" => $todosUsuarios[$i]["id"],
                    "usuario" => $todosUsuarios[$i]["usuario"],
                    "contrasena" => $todosUsuarios[$i]["contrasena"]
                );
            }

            // MANDA EL JSON MODIFICADO
            echo json_encode($todosUsuarios);

        }

        function __toString()
        {
            echo $this->id;
            echo $this->usuario;
            echo $this->contrasena;
            echo $this->ordenes;
        }

    }

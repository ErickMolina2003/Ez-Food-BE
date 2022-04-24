<?php

    Class Carrito{
        private $idCarrito;
        private $productos;
        private $idProducto;
        private $empresaProducto;
        private $descripcionProducto;
        private $precioProducto;
        private $imagenProducto;


        function __construct($idCarrito,
        $productos,
        $idProducto,
        $empresaProducto,
        $descripcionProducto,
        $precioProducto,
        $imagenProducto){
            $this->productos = $productos;
            $this->idProducto = $idProducto;
            $this->empresaProducto = $empresaProducto;
            $this->descripcionProducto = $descripcionProducto;
            $this->precioProducto = $precioProducto;
            $this->imagenProducto = $imagenProducto;
        }
    
        static function agregarProductoAlCarrito($productoAgregar) {
            $carrito = json_decode(file_get_contents('../data/carrito.json'),true);
            
            array_push($carrito["productos"],json_decode($productoAgregar, true));

            $archivo = fopen('../data/carrito.json', 'w');
            fwrite($archivo, json_encode($carrito));

            echo json_encode($carrito);
        }

        static function vaciarProductosCarrito(){
            $carrito = json_decode(file_get_contents('../data/carrito.json'),true);
            $carrito["productos"] = [];

            $archivo = fopen('../data/carrito.json', 'w');
            fwrite($archivo, json_encode($carrito));
        }

        static function obtenerProductos() {
            $carrito = json_decode(file_get_contents('../data/carrito.json'),true);

            echo json_encode($carrito["productos"]);
        }

    }

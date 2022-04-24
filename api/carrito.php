<?php

    header('Content-Type: application/json');
    include_once('../class/carrito-class.php');

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
                $_POST = file_get_contents('php://input');
                Carrito::agregarProductoAlCarrito($_POST);
            break;
        case 'DELETE':
            Carrito::vaciarProductosCarrito();
            break;
        case 'GET':
            Carrito::obtenerProductos(); 
            break;    

    }

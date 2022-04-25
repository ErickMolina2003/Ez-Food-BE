<?php

    header('Content-Type: application/json');
    include_once('../class/admin-class.php');

    switch($_SERVER["REQUEST_METHOD"]){
        case "GET":
                if(isset($_GET["empresas"]) && !isset($_GET["productos"]) && !isset($_GET["repartidores"]) && !isset($_GET["ordenes"])){
                    Admin::obtenerEmpresas();
                }
                if(!isset($_GET["empresas"]) && !isset($_GET["productos"]) && !isset($_GET["repartidores"]) && !isset($_GET["ordenes"])){
                    Admin::obtenerAdmins();
                }
                if(isset($_GET["productos"]) && !isset($_GET["empresas"]) && !isset($_GET["repartidores"]) && !isset($_GET["ordenes"])){
                    Admin::obtenerProductos();
                }
                if(isset($_GET["repartidores"]) && !isset($_GET["empresas"]) && !isset($_GET["productos"]) && !isset($_GET["ordenes"])){
                    Admin::ObtenerReartidores();
                }
                if(isset($_GET["ordenes"]) && !isset($_GET["empresas"]) && !isset($_GET["productos"]) && !isset($_GET["repartidores"])){
                    Admin::obtenerOrdenes();
                }
            break;
    }

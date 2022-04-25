<?php

    header('Content-Type: application/json');
    include_once('../class/admin-class.php');

    switch($_SERVER["REQUEST_METHOD"]){
        case "GET":
                if(isset($_GET["empresas"]) && !isset($_GET["productos"]) && !isset($_GET["repartidores"])){
                    Admin::obtenerEmpresas();
                }
                if(!isset($_GET["empresas"]) && !isset($_GET["productos"]) && !isset($_GET["repartidores"])){
                    Admin::obtenerAdmins();
                }
                if(isset($_GET["productos"]) && !isset($_GET["empresas"]) && !isset($_GET["repartidores"])){
                    Admin::obtenerProductos();
                }
                if(isset($_GET["repartidores"]) && !isset($_GET["empresas"]) && !isset($_GET["productos"])){
                    Admin::ObtenerReartidores();
                }
            break;
    }

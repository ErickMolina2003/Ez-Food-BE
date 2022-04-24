<?php
    header("Content-Type: application/json");
    include_once('../class/categorias-class.php');

    switch($_SERVER["REQUEST_METHOD"]){
        case "POST":
            echo "este es un post";
            break;
        case "GET":
            if(isset($_GET["id"]) && isset($_GET["empresas"]) ) {
                Categorias::obtenerEmpresasDeCategoria($_GET['id']);
            }else {
                Categorias::obtenerCategorias();                
            }

            break;    
    }

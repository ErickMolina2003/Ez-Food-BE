<?php
header("Content-Type: application/json");
include_once('../class/categorias-class.php');

switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        echo "este es un post";
        break;
    case "GET":
        if (isset($_GET["id"]) && isset($_GET["empresas"])) {

            Categorias::obtenerEmpresasDeCategoria($_GET['id'], 0, '');
        } else if (isset($_GET["id"]) && isset($_GET["productos"])) {

            Categorias::obtenerEmpresasDeCategoria($_GET['id'], 1, $_GET['idEmpresa']);
        } else {
            Categorias::obtenerCategorias();
        }


        break;
}

<?php

header('Content-Type: application/json');
include_once('../class/admin-class.php');

switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        $_POST = file_get_contents('php://input');
        Admin::crearOrden($_POST);
        break;
}

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
}

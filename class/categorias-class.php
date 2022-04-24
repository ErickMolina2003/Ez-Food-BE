<?php
class Categorias
{
    private $id;
    private $imagen;
    private $nombre;
    private $empresas;
    private $idEmpresa;
    private $nombreEmpresa;
    private $descripcionEmpresa;
    private $puntuacion;
    private $productosEmpresa;
    private $idProducto;
    private $empresasProducto;
    private $descripcionProducto;
    private $precioProducto;


    function __construct($id, $imagen, $nombre)
    {
        $this->id = $id;
        $this->imagen = $imagen;
        $this->nombre = $nombre;
    }

    public static function obtenerCategorias()
    {
        // AGARRAR TODAS LAS CATEGORIAS
        $todasCategorias = json_decode(file_get_contents('../data/categorias.json'), true);

        // AGARRAR SOLO ID, NOMBRE, IMAGEN
        for ($i = 0; $i < sizeof($todasCategorias); $i++) {
            $todasCategorias[$i] = array(
                "id" => $todasCategorias[$i]["id"],
                "imagen" => $todasCategorias[$i]["imagen"],
                "nombre" => $todasCategorias[$i]["nombre"]
            );
        }

        echo json_encode($todasCategorias);
    }

    public static function obtenerEmpresasDeCategoria($id, $empresasOproductos, $idEmpresa)
    {
        // AGARRAR TODAS LAS CATEGORIAS
        $todasCategorias = json_decode(file_get_contents('../data/categorias.json'), true);

        for ($i = 0; $i < sizeof($todasCategorias); $i++) {
            if ($todasCategorias[$i]['id'] == $id) {
                // CATEGORIA POR EL ID
                $categoriaID = $todasCategorias[$i];
            }
        }



        // OBTENER LAS EMPRESAS DE ESA CATEGORIA
        $categoriaID = $categoriaID["empresas"];

        $empresasDeLaCategoria = $categoriaID;

        // QUITAR LOS PRODUCTOS DE LAS EMPRESA
        for ($i = 0; $i < sizeof($categoriaID); $i++) {
            $categoriaID[$i] = array(
                "idEmpresa" => $categoriaID[$i]["idEmpresa"],
                "nombreEmpresa" => $categoriaID[$i]["nombreEmpresa"],
                "descripcionEmpresa" => $categoriaID[$i]["descripcionEmpresa"],
                "puntuacion" => $categoriaID[$i]["puntuacion"],
                "imagen" => $categoriaID[$i]["imagen"]
            );
        }

        if ($empresasOproductos == 0) {
            echo json_encode($categoriaID);
        }

        if ($empresasOproductos == 1) {
            // OBTENER LA EMPRESA
            for ($i = 0; $i < sizeof($empresasDeLaCategoria); $i++) {

                if ($empresasDeLaCategoria[$i]["idEmpresa"] == $idEmpresa) {
                    $empresa = $empresasDeLaCategoria[$i];
                }
            }


            // OBTENER LOS PRODUCTOS DE ESA EMPRESA
            $productosDeLaEmpresa = $empresa["productosEmpresa"];
            echo json_encode($productosDeLaEmpresa);
        }
    }
}

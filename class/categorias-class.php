<?php
class Categorias{
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

}

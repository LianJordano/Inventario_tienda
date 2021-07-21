<?php 

    require_once("models/productoModel.php");
    require_once("models/categoriaModel.php");
    class mainController{


        public function index(){

            $listarproductos = new ProductoModel();
            $productos = $listarproductos->consultarProductos();
            $destacados = $listarproductos->consultarDestacados();

            $categorias = new CategoriaModel();
            $cats = $categorias->consultarCategorias();
            require_once("views/main/index.php");

        }


    }


?>
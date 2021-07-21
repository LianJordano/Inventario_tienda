<?php

require_once("models/productoModel.php");

    class ReporteController{

        public function index(){

        }

        public function productos(){
            $consultarProductos = new ProductoModel();
            $productos = $consultarProductos->consultarProductos();


            require_once("views/reporte/producto.php");
  
            
        
        }

      

    }

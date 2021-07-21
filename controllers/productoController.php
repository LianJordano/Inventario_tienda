<?php 

    require_once("models/productoModel.php");
    require_once("models/categoriaModel.php");
    require_once("models/empresaModel.php");
    require_once("models/proveedorModel.php");
    class ProductoController{

        public function index()
        {
            $consultarProductos = new ProductoModel();
            $consultarCategorias = new CategoriaModel();
            $consultarEmpresas = new EmpresaModel();
            $consultarProveedores = new ProveedorModel();
            
            $productos = $consultarProductos->consultarProductos();
            $categorias = $consultarCategorias->consultarCategorias();
            $empresas = $consultarEmpresas->consultarEmpresas();
            $proveedores = $consultarProveedores->consultarProveedores();
            require_once("views/producto/index.php");
        }

        public function crearProducto()
        {
            if (isset($_POST)) {
    
               
                $nombre = Utils::validarCamposVacios("pro_nombre");
                $precio = Utils::validarCamposVacios("pro_precio");
                $proveedor = Utils::validarCamposVacios("pro_prov");
                $cantidad = Utils::validarCamposVacios("pro_cant");
                $categoria = Utils::validarCamposVacios("pro_cate");
                $marca = Utils::validarCamposVacios("pro_marca");
                $promocion = Utils::validarCamposVacios("pro_promo");
                $destacado = Utils::validarCamposVacios("pro_destac");
                $foto = Utils::ExisteFoto("pro_foto", "Producto");
    
                if ($nombre != null) {
    
                    $crearproducto = new ProductoModel();
                    $crearproducto->setPro_nombre($nombre);
                    $crearproducto->setPro_precio($precio);
                    $crearproducto->setPro_proveedor_id($proveedor);
                    $crearproducto->setPro_cantidad($cantidad);
                    $crearproducto->setPro_categoria_id($categoria);
                    $crearproducto->setPro_empresa_id($marca);
                    $crearproducto->setPro_promocion($promocion);
                    $crearproducto->setPro_destacado($destacado);
                    $crearproducto->setPro_foto($foto);
                    $crearproducto->setPro_estado("Activo");
                    $crear = $crearproducto->crearProducto();
    
              if ($crear) {
                        Utils::alertaCrear("producto");
                        header("location:index");
                    } else {
                        Utils::alertaCrear("producto", true);
                        header("location:index");
                    } 
                } 
            }
        }


        public function eliminar()
        {
            if (isset($_GET["id"])) {
                $eliminarproducto = new ProductoModel();
                $eliminarproducto->setPro_id($_GET["id"]);
                $img = $eliminarproducto->consultarUnProducto()->fetch();
                if (file_exists("uploads/" . $img["pro_foto"]) && $img["pro_foto"] != "defaultProducto.jpg") {
                    unlink("uploads/" . $img["pro_foto"]);
                } 
                $eliminar = $eliminarproducto->eliminarProducto();
              
                if ($eliminar) {
                    header("location:index");
                }
            }
        }



        public function editar()
        {
            $id = $_GET["id"];
            $editarProducto = new ProductoModel();
            $consultarCategorias = new CategoriaModel();
            $consultarEmpresas = new EmpresaModel();
            $consultarProveedores = new ProveedorModel();

            $editarProducto->setPro_id($id);
            $categorias = $consultarCategorias->consultarCategorias();
            $empresas = $consultarEmpresas->consultarEmpresas();
            $proveedores = $consultarProveedores->consultarProveedores();
            $producto = $editarProducto->consultarunProducto()->fetch();
            require_once("views/producto/editar.php");
        }
    
        public function editarProducto()
        {
            if (isset($_POST)) {

                $nombre = Utils::validarCamposVacios("e_pro_nom");
                $precio = Utils::validarCamposVacios("e_pro_precio");
                $cantidad = $_POST["e_pro_cant"];
                $proveedor = $_POST["e_pro_prov"];
                $categoria = $_POST["e_pro_cate"];
                $marca = Utils::validarCamposVacios("e_pro_marca");
                $promocion = Utils::validarCamposVacios("e_pro_promo");
                $destacado = Utils::validarCamposVacios("e_pro_destac");
                
              
                $id = $_POST["e_pro_id"];
                $fecha = date("dmymhs");
                $nombreFoto = $_FILES["e_pro_foto"]["name"];
                $fotoNombreSet = $fecha . $nombreFoto;
    
                if ($nombreFoto != "") {
                    if ($nombre != null && $id != null) {
                        $imagenAnterior = new ProductoModel();
                        $imagenAnterior->setPro_id($id);
                        $img = $imagenAnterior->consultarUnProducto()->fetch();
                        if (file_exists("uploads/" . $img["pro_foto"]) && $img["pro_foto"] != "defaultProducto.jpg") {
                            unlink("uploads/" . $img["pro_foto"]);
                        }
                        $editarproducto = new ProductoModel();
                        $editarproducto->setPro_nombre($nombre);
                        $editarproducto->setPro_precio($precio);
                        $editarproducto->setPro_proveedor_id($proveedor);
                        $editarproducto->setPro_cantidad($cantidad);
                        $editarproducto->setPro_categoria_id($categoria);
                        $editarproducto->setPro_empresa_id($marca);
                        $editarproducto->setPro_promocion($promocion);
                        $editarproducto->setPro_destacado($destacado);
                        $editarproducto->setPro_id($id);
                        $editarproducto->setPro_foto($fotoNombreSet);
                        $editarproducto->editar();
                       
                        move_uploaded_file($_FILES["e_pro_foto"]["tmp_name"], "uploads/" . $fotoNombreSet);
                        header("location:index");
                    }
                } else {
                 $editarproducto = new ProductoModel();
                    $editarproducto->setPro_nombre($nombre);
                    $editarproducto->setPro_precio($precio);
                    $editarproducto->setPro_proveedor_id($proveedor);
                    $editarproducto->setPro_cantidad($cantidad);
                    $editarproducto->setPro_categoria_id($categoria);
                    $editarproducto->setPro_empresa_id($marca);
                    $editarproducto->setPro_promocion($promocion);
                    $editarproducto->setPro_destacado($destacado);
                    $editarproducto->setPro_id($id);
                    $editarproducto->editarSinImagen();
                    header("location:index"); 
                }
            }
        }










    }


?>
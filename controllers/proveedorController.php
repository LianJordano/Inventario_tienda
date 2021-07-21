<?php 

    require_once("models/proveedorModel.php");
    class ProveedorController extends EmpresaController{

        public function index()
        {
            $consultarEmpresas = new EmpresaModel();
            $empresas = $consultarEmpresas->consultarEmpresas();
            $consultarProveedores = new ProveedorModel();
            $proveedores = $consultarProveedores->consultarProveedores();
            require_once("views/proveedor/index.php");
        }

        public function crearProveedor()
        {
            if (isset($_POST)) {

                $prov_nombre = Utils::validarCamposVacios("prov_nombre");
                $prov_apellidos = Utils::validarCamposVacios("prov_apellidos");
                $prov_correo = Utils::validarCamposVacios("prov_correo");
                $prov_telefono = Utils::validarCamposVacios("prov_telefono");
                $prov_emp_id = Utils::validarCamposVacios("prov_emp_id");
    
                if ($prov_nombre != null) {
    
                    $crearproveedor = new ProveedorModel();
                    $crearproveedor->setProv_nombre($prov_nombre);
                    $crearproveedor->setProv_apellidos($prov_apellidos);
                    $crearproveedor->setProv_correo($prov_correo);
                    $crearproveedor->setProv_telefono($prov_telefono);
                    $crearproveedor->setProv_emp_id($prov_emp_id);
                    $crearproveedor->setProv_estado("Activo");
                    $crear = $crearproveedor->crearProveedor();
    
                    if ($crear) {
                        Utils::alertaCrear("proveedor");
                        header("location:index");
                    } else {
                        Utils::alertaCrear("proveedor", true);
                        header("location:index");
                    }
                }
            }
        }


        public function eliminar()
        {
            if (isset($_GET["id"])) {
                $eliminarproveedor = new ProveedorModel();
                $eliminarproveedor->setProv_id($_GET["id"]);
                $eliminar = $eliminarproveedor->eliminarProveedor();
                if ($eliminar) {
                    header("location:index");
                }
            }
        }

        public function editar()
        {
            $consultarEmpresas = new EmpresaModel();
            $empresas = $consultarEmpresas->consultarEmpresas();
            $id = $_GET["id"];
            $editarProveedor = new ProveedorModel();
            $editarProveedor->setProv_id($id);
            $proveedor = $editarProveedor->consultarUnProveedor()->fetch();
            require_once("views/proveedor/editar.php");
        }
    
        public function editarProveedor()
        {
            if (isset($_POST)) {

                $nombre = Utils::validarCamposVacios("e_prov_nom");
                $apellidos = Utils::validarCamposVacios("e_prov_ape");
                $correo = Utils::validarCamposVacios("e_prov_corr");
                $telefono = Utils::validarCamposVacios("e_prov_tel");
                $empresa = Utils::validarCamposVacios("e_prov_emp_id");
                $id = $_POST["e_prov_id"];
              
                if ($nombre != "") {
                    if ($nombre != null && $id != null) {

                        $editarProveedor = new ProveedorModel();
                        $editarProveedor->setProv_nombre($nombre);
                        $editarProveedor->setProv_apellidos($apellidos);
                        $editarProveedor->setProv_correo($correo);
                        $editarProveedor->setProv_telefono($telefono);
                        $editarProveedor->setProv_emp_id($empresa);
                        $editarProveedor->setProv_estado("Activo");
                        $editarProveedor->setProv_id($id);
                        $editarProveedor->editar();
                     
                        header("location:index");
                    }
                } 
            }
        }










    }


?>
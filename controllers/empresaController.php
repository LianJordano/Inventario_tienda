<?php 

    require_once("models/empresaModel.php");
    class EmpresaController{

        public function index()
        {
            $consultarEmpresas = new EmpresaModel();
            $empresas = $consultarEmpresas->consultarEmpresas();
            require_once("views/empresa/index.php");
        }

        public function crearEmpresa()
        {
            if (isset($_POST)) {
    
                $nombre = Utils::validarCamposVacios("emp_nombre");
                $correo = Utils::validarCamposVacios("emp_correo");
                $telefono = Utils::validarCamposVacios("emp_telefono");
                $logo = Utils::ExisteFoto("emp_logo", "Empresa");
    
                if ($nombre != null) {
    
                    $crearempresa = new EmpresaModel();
                    $crearempresa->setEmp_nombre($nombre);
                    $crearempresa->setEmp_logo($logo);
                    $crearempresa->setEmp_correo($correo);
                    $crearempresa->setEmp_telefono($telefono);
                    $crearempresa->setEmp_estado("Activo");
                    $crear = $crearempresa->crearEmpresa();
    
                    if ($crear) {
                        Utils::alertaCrear("empresa");
                        header("location:index");
                    } else {
                        Utils::alertaCrear("empresa", true);
                        header("location:index");
                    }
                }
            }
        }


        public function eliminar()
        {
            if (isset($_GET["id"])) {
                $eliminarempresa = new EmpresaModel();
                $eliminarempresa->setEmp_id($_GET["id"]);
                $img = $eliminarempresa->consultarUnaEmpresa()->fetch();
                if (file_exists("uploads/" . $img["emp_logo"]) && $img["emp_logo"] != "defaultEmpresa.jpg") {
                    unlink("uploads/" . $img["emp_logo"]);
                }
                $eliminar = $eliminarempresa->eliminarEmpresa();
              
                if ($eliminar) {
                    header("location:index");
                }
            }
        }



        public function editar()
        {
            $id = $_GET["id"];
            $editarEmpresa = new EmpresaModel();
            $editarEmpresa->setEmp_id($id);
            $empresa = $editarEmpresa->consultarUnaEmpresa()->fetch();
            require_once("views/empresa/editar.php");
        }
    
        public function editarEmpresa()
        {
            if (isset($_POST)) {
    
                $nombre = Utils::validarCamposVacios("e_emp_nom");
                $correo = Utils::validarCamposVacios("e_emp_correo");
                $telefono = Utils::validarCamposVacios("e_emp_telefono");
                $id = $_POST["e_emp_id"];
                $fecha = date("dmymhs");
                $nombreFoto = $_FILES["e_emp_logo"]["name"];
                $fotoNombreSet = $fecha . $nombreFoto;
    
                if ($nombreFoto != "") {
                    if ($nombre != null && $id != null) {
                        $imagenAnterior = new EmpresaModel();
                        $imagenAnterior->setEmp_id($id);
                        $img = $imagenAnterior->consultarUnaEmpresa()->fetch();
                        if (file_exists("uploads/" . $img["emp_logo"]) && $img["emp_logo"] != "defaultEmpresa.jpg") {
                            unlink("uploads/" . $img["emp_logo"]);
                        }
                        $editarcategoria = new EmpresaModel();
                        $editarcategoria->setEmp_nombre($nombre);
                        $editarcategoria->setEmp_correo($correo);
                        $editarcategoria->setEmp_telefono($telefono);
                        $editarcategoria->setEmp_id($id);
                        $editarcategoria->setEmp_logo($fotoNombreSet);
                        $editarcategoria->editar();
                        move_uploaded_file($_FILES["e_emp_logo"]["tmp_name"], "uploads/" . $fotoNombreSet);
                        header("location:index");
                    }
                } else {
                    $editarcategoria = new EmpresaModel();
                    $editarcategoria->setEmp_nombre($nombre);
                    $editarcategoria->setEmp_telefono($telefono);
                    $editarcategoria->setEmp_correo($correo);
                    $editarcategoria->setEmp_id($id);
                    $editarcategoria->editarSinImagen();
                    header("location:index");
                }
            }
        }










    }


?>
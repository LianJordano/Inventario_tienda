<?php

require_once("models/categoriaModel.php");

class CategoriaController
{

    public function index()
    {
        $consultarCategorias = new CategoriaModel();
        $categorias = $consultarCategorias->consultarCategorias();
        require_once("views/categoria/index.php");
    }

    public function crear()
    {
        require_once("views/categoria/crear.php");
    }

    public function crearCategoria()
    {
        if (isset($_POST)) {

            $descripcion = Utils::validarCamposVacios("des_cat");
            $foto = Utils::ExisteFoto("des_foto", "Categoria");

            if ($descripcion != null) {

                $crearcategoria = new CategoriaModel();
                $crearcategoria->setCat_descripcion($descripcion);
                $crearcategoria->setCat_imagen($foto);
                $crear = $crearcategoria->crearCategoria();

                if ($crear) {
                    Utils::alertaCrear("categoria");
                    header("location:index");
                } else {
                    Utils::alertaCrear("categoria", true);
                    header("location:index");
                }
            }
        }
    }


    public function eliminar()
    {
        if (isset($_GET["id"])) {
            $eliminarcategoria = new CategoriaModel();
            $eliminarcategoria->setCat_id($_GET["id"]);
            $img = $eliminarcategoria->consultarUnaCategoria()->fetch();
            if (file_exists("uploads/" . $img["cat_imagen"]) && $img["cat_imagen"] != "defaultCategoria.jpg") {
                unlink("uploads/" . $img["cat_imagen"]);
            }
            $eliminar = $eliminarcategoria->eliminarCategoria();
          
            if ($eliminar) {
                header("location:index");
            }
        }
    }

    public function editar()
    {
        $id = $_GET["id"];
        $editarCategoria = new CategoriaModel();
        $editarCategoria->setCat_id($id);
        $categoria = $editarCategoria->consultarUnaCategoria()->fetch();
        require_once("views/categoria/editar.php");
    }

    public function editarCategoria()
    {
        if (isset($_POST)) {

            $descripcion = Utils::validarCamposVacios("e_des_cat");
            $id = $_POST["e_des_id"];
            $fecha = date("dmymhs");
            $nombreFoto = $_FILES["e_des_foto"]["name"];
            $fotoNombreSet = $fecha . $nombreFoto;

            if ($nombreFoto != "") {
                if ($descripcion != null && $id != null) {
                    $imagenAnterior = new CategoriaModel();
                    $imagenAnterior->setCat_id($id);
                    $img = $imagenAnterior->consultarUnaCategoria()->fetch();
                    if (file_exists("uploads/" . $img["cat_imagen"]) && $img["cat_imagen"] != "defaultCategoria.jpg") {
                        unlink("uploads/" . $img["cat_imagen"]);
                    }
                    $editarcategoria = new CategoriaModel();
                    $editarcategoria->setCat_descripcion($descripcion);
                    $editarcategoria->setCat_id($id);
                    $editarcategoria->setCat_imagen($fotoNombreSet);
                    $editarcategoria->editar();
                    move_uploaded_file($_FILES["e_des_foto"]["tmp_name"], "uploads/" . $fotoNombreSet);
                    header("location:index");
                }
            } else {
                $editarcategoria = new CategoriaModel();
                $editarcategoria->setCat_descripcion($descripcion);
                $editarcategoria->setCat_id($id);
                $editarcategoria->editarSinImagen();
                header("location:index");
            }
        }
    }
}

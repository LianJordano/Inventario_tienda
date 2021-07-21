<div class="container">

<h1 class="mt-5 bg-dark text-white p-2"><i class="fas fa-cubes"></i> Categorias</h1>
<a href="#"  class="btn btn-success mt-4 "  data-bs-toggle="modal" data-bs-target="#modalcrearcategoria"><i class="fas fa-plus"></i> Crear categoria</a>
    
    <?php if(isset($_SESSION["categoria"]["exito"])): ?>
        <div class="alert alert-success mt-3" role="alert">
            <?=$_SESSION["categoria"]["exito"] ;?>
        </div>
    <?php elseif(isset($_SESSION["categoria"]["fallo"])): ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?=$_SESSION["categoria"]["fallo"] ;?>
        </div>
    <?php endif; ?>

 
    <div class="table-responsive">
        <table id="data_table" class="table " data-page-length='7'>
            <thead class="thead-dark bg-dark text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categorias as $categoria):?>
                <tr>
                    <td style="width: 10%;"><?=$categoria["cat_id"]?></td>
                    <td style="width: 10%;"><img src="<?=URL?>uploads/<?=$categoria["cat_imagen"]?>" alt=""  style="object-fit: contain;" width="30"></td>
                    <td style="width: 40%;"><?=$categoria["cat_descripcion"]?></td>
                    <td style="width: 40%;">
                        <a href="<?=URL?>categoria/editar&id=<?=$categoria["cat_id"];?>" style="width: 45%;"  class="btn btn-warning"> <i class="far fa-edit mr-5"></i> Editar</a>
                        <a onclick='borrar(<?=$categoria["cat_id"] ?>,"categoria")'  style="width: 45%;" class="btn btn-danger"><i class="far fa-trash-alt mr-5"> </i> Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php 
include("modales.php");
Utils::matarSesion("categoria");
?>


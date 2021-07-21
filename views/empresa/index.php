<div class="container">

<h1 class="mt-5 bg-dark text-white p-2"><i class="far fa-building"></i> Empresas</h1>
<a href="#"  class="btn btn-success mt-4 "  data-bs-toggle="modal" data-bs-target="#modalcrearempresa"><i class="fas fa-plus"></i> Crear empresa</a>
    
    <?php if(isset($_SESSION["empresa"]["exito"])): ?>
        <div class="alert alert-success mt-3" role="alert">
            <?=$_SESSION["empresa"]["exito"] ;?>
        </div>
    <?php elseif(isset($_SESSION["empresa"]["fallo"])): ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?=$_SESSION["empresa"]["fallo"] ;?>
        </div>
    <?php endif; ?>

    <table class="table mt-4" id="data_table" data-page-length='7'>
        <thead class="thead-dark bg-dark text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Logo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($empresas as $empresa):?>
            <tr>
                <td style="width: 10%;"><?=$empresa["emp_id"]?></td>
                <td style="width: 10%;"><img src="<?=URL?>uploads/<?=$empresa["emp_logo"]?>" alt=""  style="object-fit: contain;" width="30"></td>
                <td style="width: 20%;"><?=$empresa["emp_nombre"]?></td>
                <td style="width: 20%;"><?=$empresa["emp_correo"]?></td>
                <td style="width: 20%;"><?=$empresa["emp_telefono"]?></td>
                <td style="width: 20%;">
                    <a href="<?=URL?>empresa/editar&id=<?=$empresa["emp_id"];?>" style="width: 45%;"  class="btn btn-warning"> <i class="far fa-edit mr-5"></i> Editar</a>
                    <a onclick='borrar(<?=$empresa["emp_id"] ?>,"empresa")'  style="width: 45%;" class="btn btn-danger"><i class="far fa-trash-alt mr-5"> </i> Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>

<?php 
include("modales.php");
Utils::matarSesion("empresa");
?>


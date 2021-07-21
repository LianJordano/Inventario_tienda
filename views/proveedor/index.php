<div class="container">

<h1 class="mt-5 bg-dark text-white p-2"><i class="fas fa-user-tie"></i> Proveedores</h1>
<a href="#"  class="btn btn-success mt-4 "  data-bs-toggle="modal" data-bs-target="#modalcrearproveedor"><i class="fas fa-plus"></i> Crear Proveedor</a>
    
    <?php if(isset($_SESSION["proveedor"]["exito"])): ?>
        <div class="alert alert-success mt-3" role="alert">
            <?=$_SESSION["proveedor"]["exito"] ;?>
        </div>
    <?php elseif(isset($_SESSION["proveedor"]["fallo"])): ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?=$_SESSION["proveedor"]["fallo"] ;?>
        </div>
    <?php endif; ?>

    <table class="table mt-4" id="data_table" data-page-length='7'>
        <thead class="thead-dark bg-dark text-white">
            <tr>
                <th style="width: 2%;">#</th>
                <th style="width: 10%;">Nombre</th>
                <th style="width: 10%;">Apellidos</th>
                <th style="width: 10%;">Correo</th>
                <th style="width: 10%;">Telefono</th>
                <th style="width: 10%;">Empresa</th>
                <th style="width: 20%;">Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($proveedores as $proveedor):?>
            <tr>
                <td style="width: 2%;"><?=$proveedor["prov_id"]?></td>
                <td style="width: 10%;"><?=$proveedor["prov_nombre"]?></td>
                <td style="width: 10%;"><?=$proveedor["prov_apellidos"]?></td>
                <td style="width: 10%;"><?=$proveedor["prov_correo"]?></td>
                <td style="width: 10%;"><?=$proveedor["prov_telefono"]?></td>
                <td style="width: 10%;"><?=$proveedor["Empresa"]?></td>
                <td style="width: 20%;">
                    <a href="<?=URL?>proveedor/editar&id=<?=$proveedor["prov_id"];?>" style="width: 49%;"  class="btn btn-warning"> <i class="far fa-edit mr-5"></i> Editar</a>
                    <a onclick='borrar(<?=$proveedor["prov_id"] ?>,"proveedor")'  style="width: 49%;" class="btn btn-danger"><i class="far fa-trash-alt mr-5"> </i> Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php 
include("modales.php");
Utils::matarSesion("proveedor");
?>


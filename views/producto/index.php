<div class="container">

<h1 class="mt-5 bg-dark text-white p-2"><i class="fas fa-truck-loading"></i> Productos</h1>
<a href="#"  class="btn btn-success mt-4 "  data-bs-toggle="modal" data-bs-target="#modalcrearempresa"><i class="fas fa-plus"></i> Crear producto</a>
    
    <?php if(isset($_SESSION["producto"]["exito"])): ?>
        <div class="alert alert-success mt-3" role="alert">
            <?=$_SESSION["producto"]["exito"] ;?>
        </div>
    <?php elseif(isset($_SESSION["producto"]["fallo"])): ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?=$_SESSION["producto"]["fallo"] ;?>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table mt-4" id="data_table" data-page-length='7'>
            <thead class="thead-dark bg-dark text-white">
                <tr>
                    <th style="text-align: center;" scope="col">#</th>
                    <th style="text-align: center;" scope="col">Logo</th>
                    <th style="text-align: center;" scope="col">Nombre</th>
                    <th style="text-align: center;" scope="col">Precio</th>
                    <th style="text-align: center;" scope="col">Cantidad</th>
                    <th style="text-align: center;" scope="col">Promocion</th>
                    <th style="text-align: center;" scope="col">Destacado</th>
                    <th style="text-align: center;" scope="col">Categoria</th>
                    <th style="text-align: center;" scope="col">Proveedor</th>
                    <th style="text-align: center;" scope="col">Marca</th>
                    <th style="text-align: center;" scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productos as $producto):?>
                <tr>
                    <td style="width: 1%; text-align: center;"><?=$producto["pro_id"]?></td>
                    <td style="width: 3%; text-align: center;"><img src="<?=URL?>uploads/<?=$producto["pro_foto"]?>" alt=""  style="object-fit: contain; " width="30"></td>
                    <td style="width: 15%; text-align: center;"><?=$producto["pro_nombre"]?></td>
                    <td style="width: 5%; text-align: center;"><?=$producto["pro_precio"]?></td>
                    <td style="width: 3%; text-align: center;"><?=$producto["pro_cantidad"]?></td>
                    <td style="width: 1%; text-align: center;"><?=$producto["pro_promocion"]?></td>
                    <td style="width: 1%; text-align: center;"><?=$producto["pro_destacado"]?></td>
                    <td style="width: 10%; text-align: center;"><?=$producto["categoria"]?></td>
                    <td style="width: 15%; text-align: center;"><?=$producto["nombre"].' '.$producto["apellidos"]?></td>
                    <td style="width: 10%; text-align: center;"><?=$producto["marca"]?></td>
                    <td style="width: 10%; text-align: center;">
                        <a href="<?=URL?>producto/editar&id=<?=$producto["pro_id"];?>" style="width: 45%;"  class="btn btn-warning"> <i class="far fa-edit mr-5"></i> </a>
                        <a onclick='borrar(<?=$producto["pro_id"] ?>,"producto")'  style="width: 45%;" class="btn btn-danger"><i class="far fa-trash-alt mr-5"> </i> </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php 
include("modales.php");
Utils::matarSesion("producto");
?>


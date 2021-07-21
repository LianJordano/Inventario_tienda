<div class="container">

    <div class="contenedor m-auto" style="width: 700px;">
        <form action="<?= URL ?>producto/editarProducto" method="POST" enctype="multipart/form-data">
            <h3 class="mt-5 bg-dark text-white p-3"><i class="fas fa-truck-loading"></i> Editar Producto</h3>
            <div class="card">
                <img class="card-img-top" src="<?= URL ?>uploads/<?= $producto["pro_foto"]; ?>" alt="" height="100" style="object-fit: contain;">
                <div class="card-body">
                    <input type="hidden" name="e_pro_id" value="<?= $producto["pro_id"]; ?>">

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="e_emp_nom">Nombre</label>
                            <input type="text" class="form-control" name="e_pro_nom" id="e_pro_nom" placeholder="" value="<?= $producto["pro_nombre"]; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="e_emp_correo">Precio</label>
                            <input type="text" class="form-control" name="e_pro_precio" id="e_pro_precio" placeholder="" value="<?= $producto["pro_precio"]; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-8">
                            <label for="">Proveedor</label>
                            <select class="form-control" name="e_pro_prov" id="e_pro_prov">
                                <option value="0">--Seleccione proveedor--</option>
                                <?php foreach ($proveedores as $proveedor) : ?>
                                    <option value="<?= $proveedor["prov_id"] ?>"
                                    
                                    <?php if($proveedor["prov_id"]==$producto["pro_proveedor_id"]): ?>
                                        selected
                                    <?php endif; ?>
                                    
                                    ><?= $proveedor["prov_nombre"] . " " . $proveedor["prov_apellidos"] . " [" . $proveedor["Empresa"] . "]" ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="des_cat">Cantidad</label>
                            <input type="number" class="form-control" name="e_pro_cant" id="e_pro_cant" placeholder="0" value="<?=$producto["pro_cantidad"]?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Categoria</label>
                            <select class="form-control" name="e_pro_cate" id="e_pro_cate">
                                <option value="0">--Seleccione Categoria--</option>
                                <?php foreach ($categorias as $categoria) : ?>
                                    <option value="<?= $categoria["cat_id"] ?>"

                                    <?php if($categoria["cat_id"]==$producto["pro_categoria_id"]): ?>
                                        selected
                                    <?php endif; ?>

                                    ><?= $categoria["cat_descripcion"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Marca</label>
                            <select class="form-control" name="e_pro_marca" id="e_pro_marca">
                                <option value="0">--Seleccione marca--</option>
                                <?php foreach ($empresas as $empresa) : ?>
                                    <option value="<?= $empresa["emp_id"] ?>"
                                    
                                    <?php if($empresa["emp_id"]==$producto["pro_empresa_id"]): ?>
                                        selected
                                    <?php endif; ?>
                                    
                                    ><?= $empresa["emp_nombre"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Promocion</label>
                            <select class="form-control" name="e_pro_promo" id="e_pro_promo">
                                <option <?= $selected = $producto["pro_promocion"] =="0" ? "selected" : "";  ?>  value="0">No</option>
                                <option <?= $selected = $producto["pro_promocion"] =="1" ? "selected" : "";  ?>  value="1">Si</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Destacado</label>
                            <select class="form-control" name="e_pro_destac" id="e_pro_destac">
                            <option <?= $selected = $producto["pro_destacado"] =="0" ? "selected" : "";  ?>  value="0">No</option>
                                <option <?= $selected = $producto["pro_destacado"] =="1" ? "selected" : "";  ?>  value="1">Si</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="e_pro_foto">Foto</label>
                        <input type="file" class="form-control" name="e_pro_foto" id="e_pro_foto">
                    </div>
                </div>
            </div>
            <a href="<?= URL ?>producto/index" style="width:49%" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Volver!</a>
            <button type="submit" style="width:50%" class="btn btn-success">Editar <i class="far fa-edit"></i></button>
        </form>
    </div>
</div>

</div>
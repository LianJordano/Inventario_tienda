<!-- Modal -->
<div class="modal fade" id="modalcrearempresa" tabindex="-1" aria-labelledby="crearempresa" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="crearproducto"><i class="fas fa-truck-loading"></i> Crear producto </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= URL ?>producto/crearproducto" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <img class="card-img-top" src="holder.js/100x180/" alt="">
                        <div class="card-body">


                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="des_cat">Nombre</label>
                                    <input type="text" class="form-control" name="pro_nombre" id="pro_nombre" placeholder="Nombre producto" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for="des_cat">Precio</label>
                                    <input type="text" class="form-control" name="pro_precio" id="pro_precio" placeholder="$ 0" required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-8">
                                    <label for="">Proveedor</label>
                                    <select class="form-control" name="pro_prov" id="pro_prov">
                                        <option value="0">--Seleccione proveedor--</option>
                                        <?php foreach ($proveedores as $proveedor) : ?>
                                            <option value="<?= $proveedor["prov_id"] ?>"><?= $proveedor["prov_nombre"] . " " . $proveedor["prov_apellidos"] . " [" . $proveedor["Empresa"] . "]" ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="des_cat">Cantidad</label>
                                    <input type="number" class="form-control" name="pro_cant" id="pro_cant" placeholder="0" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="">Categoria</label>
                                    <select class="form-control" name="pro_cate" id="pro_cate">
                                        <option value="0">--Seleccione Categoria--</option>
                                        <?php foreach ($categorias as $categoria) : ?>
                                            <option value="<?= $categoria["cat_id"] ?>"><?= $categoria["cat_descripcion"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Marca</label>
                                    <select class="form-control" name="pro_marca" id="pro_marca">
                                        <option value="0">--Seleccione marca--</option>
                                        <?php foreach ($empresas as $empresa) : ?>
                                            <option value="<?= $empresa["emp_id"] ?>"><?= $empresa["emp_nombre"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="">Promocion</label>
                                    <select class="form-control" name="pro_promo" id="pro_promo">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Destacado</label>
                                    <select class="form-control" name="pro_destac" id="pro_destac">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="des_foto">Foto</label>
                                <input type="file" class="form-control" name="pro_foto" id="pro_foto">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Crear!</button>
            </div>
            </form>
        </div>
    </div>
</div>
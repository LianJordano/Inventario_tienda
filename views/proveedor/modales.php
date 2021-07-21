<!-- Modal -->
<div class="modal fade" id="modalcrearproveedor" tabindex="-1" aria-labelledby="crearproveedor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="crearproveedor"><i class="fas fa-user-tie"></i> Crear proveedor </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= URL ?>proveedor/crearproveedor" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <img class="card-img-top" src="holder.js/100x180/" alt="">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="prov_nombre">Nombre</label>
                                <input type="text" class="form-control" name="prov_nombre" id="prov_nombre" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="prov_apellidos">Apellidos</label>
                                <input type="text" class="form-control" name="prov_apellidos" id="prov_apellidos" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="prov_correo">Correo</label>
                                <input type="text" class="form-control" name="prov_correo" id="prov_correo" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="prov_telefono">Telefono</label>
                                <input type="text" class="form-control" name="prov_telefono" id="prov_telefono" placeholder="" required>
                            </div>

                            <div class="form-group">
                                <label for="prov_emp_id">Empresa</label>
                                <select class="form-control" name="prov_emp_id" id="prov_emp_id">
                                    <option value="">Independiente</option>
                                    <?php foreach ($empresas as $empresa): ?>

                                    <option value="<?=$empresa['emp_id']?>"><?=$empresa['emp_nombre']?></option>

                                    <?php endforeach; ?>
                                </select>
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
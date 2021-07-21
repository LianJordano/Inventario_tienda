<!-- Modal -->
<div class="modal fade" id="modalcrearempresa" tabindex="-1" aria-labelledby="crearempresa" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="crearempresa"><i class="far fa-building"></i> Crear empresa </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

        <form action="<?=URL?>empresa/crearempresa" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <img class="card-img-top" src="holder.js/100x180/" alt="">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="des_cat">Nombre</label>
                                <input type="text" class="form-control" name="emp_nombre" id="emp_nombre" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="des_cat">Correo</label>
                                <input type="text" class="form-control" name="emp_correo" id="emp_correo" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="des_cat">Telefono</label>
                                <input type="text" class="form-control" name="emp_telefono" id="emp_telefono" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="des_foto">Logo</label>
                                <input type="file" class="form-control" name="emp_logo" id="emp_logo">
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
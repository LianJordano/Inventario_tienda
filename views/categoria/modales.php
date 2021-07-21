<!-- Modal -->
<div class="modal fade" id="modalcrearcategoria" tabindex="-1" aria-labelledby="crearcategoria" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="crearcategoria"><i class="fas fa-cubes"></i> Crear categoria </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

        <form action="<?=URL?>categoria/crearCategoria" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <img class="card-img-top" src="holder.js/100x180/" alt="">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="des_cat">Descripcion</label>
                                <input type="text" class="form-control" name="des_cat" id="des_cat" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="des_foto">Foto</label>
                                <input type="file" class="form-control" name="des_foto" id="des_foto">
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
<div class="container">

    <div class="contenedor m-auto" style="width: 500px;">
        <form action="<?= URL ?>categoria/editarCategoria" method="POST" enctype="multipart/form-data">
        <h3 class="mt-5 bg-dark text-white p-3"><i class="fas fa-cubes"></i> Editar Categoria</h3>
            <div class="card">
                <img class="card-img-top" src="<?=URL?>uploads/<?=$categoria["cat_imagen"];?>" alt="" height="100" style="object-fit: contain;">
                <div class="card-body">
                    <input type="hidden" name="e_des_id" value="<?=$categoria["cat_id"];?>">
                    <div class="form-group">
                        <label for="des_cat">Descripcion</label>
                        <input type="text" class="form-control" name="e_des_cat" id="e_des_cat" placeholder="" value="<?=$categoria["cat_descripcion"];?>">
                    </div>
                    <div class="form-group">
                        <label for="des_foto">Foto</label>
                        <input type="file" class="form-control" name="e_des_foto" id="e_des_foto">
                    </div>
                </div>
            </div>
            <a  href="<?=URL?>categoria/index" style="width:49%" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Volver!</a >
            <button type="submit" style="width:50%" class="btn btn-success">Editar <i class="far fa-edit"></i></button>
        </form>
    </div>
</div>

</div>
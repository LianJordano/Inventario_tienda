<div class="container">

    <div class="contenedor m-auto" style="width: 500px;">
        <form action="<?= URL ?>empresa/editarEmpresa" method="POST" enctype="multipart/form-data">
        <h3 class="mt-5 bg-dark text-white p-3"><i class="far fa-building"></i> Editar Empresa</h3>
            <div class="card">
                <img class="card-img-top" src="<?=URL?>uploads/<?=$empresa["emp_logo"];?>" alt="" height="100" style="object-fit: contain;">
                <div class="card-body">
                    <input type="hidden" name="e_emp_id" value="<?=$empresa["emp_id"];?>">
                    <div class="form-group">
                        <label for="e_emp_nom">Nombre</label>
                        <input type="text" class="form-control" name="e_emp_nom" id="e_emp_nom" placeholder="" value="<?=$empresa["emp_nombre"];?>">
                    </div>
                    <div class="form-group">
                        <label for="e_emp_correo">Correo</label>
                        <input type="text" class="form-control" name="e_emp_correo" id="e_emp_correo" placeholder="" value="<?=$empresa["emp_correo"];?>">
                    </div>
                    <div class="form-group">
                        <label for="e_emp_telefono">Telefono</label>
                        <input type="text" class="form-control" name="e_emp_telefono" id="e_emp_telefono" placeholder="" value="<?=$empresa["emp_telefono"];?>">
                    </div>
                    <div class="form-group">
                        <label for="e_emp_logo">Logo</label>
                        <input type="file" class="form-control" name="e_emp_logo" id="e_emp_logo">
                    </div>
                </div>
            </div>
            <a  href="<?=URL?>empresa/index" style="width:49%" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Volver!</a >
            <button type="submit" style="width:50%" class="btn btn-success">Editar <i class="far fa-edit"></i></button>
        </form>
    </div>
</div>

</div>
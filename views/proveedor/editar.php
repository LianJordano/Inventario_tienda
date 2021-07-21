<div class="container">

    <div class="contenedor m-auto" style="width: 500px;">
        <form action="<?= URL ?>proveedor/editarProveedor" method="POST" enctype="multipart/form-data">
        <h3 class="mt-5 bg-dark text-white p-3"><i class="fas fa-user-tie"></i> Editar Proveedor</h3>
            <div class="card">
                <div class="card-body">
                    <input type="hidden" name="e_prov_id" value="<?=$proveedor["prov_id"];?>">
                    <div class="form-group">
                        <label for="e_emp_nom">Nombre</label>
                        <input type="text" class="form-control" name="e_prov_nom" id="e_prov_nom" placeholder="" value="<?=$proveedor["prov_nombre"];?>">
                    </div>
                    <div class="form-group">
                        <label for="e_emp_nom">Apellidos</label>
                        <input type="text" class="form-control" name="e_prov_ape" id="e_prov_ape" placeholder="" value="<?=$proveedor["prov_apellidos"];?>">
                    </div>
                    <div class="form-group">
                        <label for="e_emp_correo">Correo</label>
                        <input type="text" class="form-control" name="e_prov_corr" id="e_prov_corr" placeholder="" value="<?=$proveedor["prov_correo"];?>">
                    </div>

                    <div class="form-group">
                        <label for="e_emp_nom">Telefono</label>
                        <input type="text" class="form-control" name="e_prov_tel" id="e_prov_tel" placeholder="" value="<?=$proveedor["prov_telefono"];?>">
                    </div>

                    <div class="form-group">
                                <label for="prov_emp_id">Empresa</label>
                                <select class="form-control" name="e_prov_emp_id" id="e_prov_emp_id">
                                    <option value="">Independiente</option>
                                    <?php foreach ($empresas as $empresa): ?>

                                    <option value="<?=$empresa['emp_id']?>"
                                    <?php if($empresa['emp_id']==$proveedor["prov_emp_id"]): ?>
                                            selected 
                                    <?php endif; ?>
                                    ><?=$empresa['emp_nombre']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
          



                </div>
            </div>
            <a  href="<?=URL?>proveedor/index" style="width:49%" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Volver!</a >
            <button type="submit" style="width:50%" class="btn btn-success">Editar <i class="far fa-edit"></i></button>
        </form>
    </div>
</div>

</div>
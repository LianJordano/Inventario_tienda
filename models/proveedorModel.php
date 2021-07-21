<?php

class ProveedorModel extends DB
{

    private $prov_id;
    private $prov_nombre;
    private $prov_apellidos;
    private $prov_telefono;
    private $prov_correo;
    private $prov_estado;
    private $prov_emp_id;


    public function consultarProveedores()
    {
        $sql = "SELECT P.*,
                CASE
                    WHEN E.emp_nombre IS NULL THEN 'Independiente'
                    ELSE E.emp_nombre  
                    END AS 'Empresa' 
                    FROM proveedores P 
                    LEFT JOIN empresas E ON P.prov_emp_id=E.emp_id
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }

    public function consultarUnProveedor(){
        $sql = "SELECT * FROM proveedores WHERE prov_id=:prov_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':prov_id',$this->getProv_id());
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
}

    public function crearProveedor()
    {
        $sql = "INSERT INTO proveedores (prov_nombre,prov_apellidos,prov_telefono,prov_correo,prov_estado,prov_emp_id) VALUES (:prov_nombre,:prov_apellidos,:prov_telefono,:prov_correo,:prov_estado,:prov_emp_id)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':prov_nombre', $this->getProv_nombre());
        $stmt->bindValue(':prov_apellidos', $this->getProv_apellidos());
        $stmt->bindValue(':prov_telefono', $this->getProv_telefono());
        $stmt->bindValue(':prov_correo', $this->getProv_correo());
        $stmt->bindValue(':prov_estado', $this->getProv_estado());
        $stmt->bindValue(':prov_emp_id', $this->getProv_emp_id());
        $stmt->execute();
        return $stmt;
    }

    
    public function eliminarProveedor(){
        $sql = "DELETE  FROM proveedores WHERE prov_id=:prov_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':prov_id',$this->getProv_id());
        $stmt->execute();
        return $stmt;
}


public function editar(){
            
    $sql = "UPDATE proveedores SET 
                    prov_nombre=:prov_nombre, 
                    prov_apellidos=:prov_apellidos, 
                    prov_telefono=:prov_telefono, 
                    prov_correo=:prov_correo, 
                    prov_estado=:prov_estado, 
                    prov_emp_id=:prov_emp_id 
            WHERE   prov_id=:prov_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':prov_nombre',$this->getProv_nombre(),PDO::PARAM_STR);
    $stmt->bindValue(':prov_apellidos',$this->getProv_apellidos(),PDO::PARAM_STR);
    $stmt->bindValue(':prov_telefono',$this->getProv_telefono(),PDO::PARAM_STR);
    $stmt->bindValue(':prov_correo',$this->getProv_correo(),PDO::PARAM_STR);
    $stmt->bindValue(':prov_estado',$this->getProv_estado(),PDO::PARAM_STR);
    $stmt->bindValue(':prov_emp_id',$this->getProv_emp_id(),PDO::PARAM_STR);
    $stmt->bindValue(':prov_id',$this->getProv_id(),PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;

}


    public function getProv_id()
    {
        return $this->prov_id;
    }

    public function setProv_id($prov_id)
    {
        $this->prov_id = $prov_id;

        return $this;
    }

   
    public function getProv_nombre()
    {
        return $this->prov_nombre;
    }

 
    public function setProv_nombre($prov_nombre)
    {
        $this->prov_nombre = $prov_nombre;

        return $this;
    }

  
    public function getProv_apellidos()
    {
        return $this->prov_apellidos;
    }

    public function setProv_apellidos($prov_apellidos)
    {
        $this->prov_apellidos = $prov_apellidos;

        return $this;
    }

    public function getProv_telefono()
    {
        return $this->prov_telefono;
    }

    public function setProv_telefono($prov_telefono)
    {
        $this->prov_telefono = $prov_telefono;

        return $this;
    }

    public function getProv_correo()
    {
        return $this->prov_correo;
    }

    public function setProv_correo($prov_correo)
    {
        $this->prov_correo = $prov_correo;

        return $this;
    }

    public function getProv_estado()
    {
        return $this->prov_estado;
    }

    public function setProv_estado($prov_estado)
    {
        $this->prov_estado = $prov_estado;

        return $this;
    }

    public function getProv_emp_id()
    {
        return $this->prov_emp_id;
    }

    public function setProv_emp_id($prov_emp_id)
    {
        $this->prov_emp_id = $prov_emp_id;

        return $this;
    }
}

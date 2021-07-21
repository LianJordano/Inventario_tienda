<?php

class EmpresaModel extends DB
{

    private $emp_id;
    private $emp_nombre;
    private $emp_correo;
    private $emp_telefono;
    private $emp_logo;
    private $emp_estado;


    public function consultarEmpresas()
    {
        $sql = "SELECT * FROM empresas";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }

    public function consultarUnaEmpresa(){
        $sql = "SELECT * FROM empresas WHERE emp_id=:emp_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':emp_id',$this->getEmp_id());
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
}

    public function crearEmpresa()
    {
        $sql = "INSERT INTO empresas (emp_nombre,emp_correo,emp_telefono,emp_logo,emp_estado) VALUES (:emp_nombre,:emp_correo,:emp_telefono,:emp_logo,:emp_estado)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':emp_nombre', $this->getEmp_nombre());
        $stmt->bindValue(':emp_correo', $this->getEmp_correo());
        $stmt->bindValue(':emp_telefono', $this->getEmp_telefono());
        $stmt->bindValue(':emp_logo', $this->getEmp_logo());
        $stmt->bindValue(':emp_estado', $this->getEmp_estado());
        $stmt->execute();
        return $stmt;
    }

    
    public function eliminarEmpresa(){
        $sql = "DELETE  FROM empresas WHERE emp_id=:emp_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':emp_id',$this->getEmp_id());
        $stmt->execute();
        return $stmt;
}


public function editar(){
            
    $sql = "UPDATE empresas SET 
                    emp_nombre=:emp_nombre, 
                    emp_correo=:emp_correo, 
                    emp_telefono=:emp_telefono, 
                    emp_logo=:emp_logo 
            WHERE   emp_id=:emp_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':emp_nombre',$this->getEmp_nombre(),PDO::PARAM_STR);
    $stmt->bindValue(':emp_correo',$this->getEmp_correo(),PDO::PARAM_STR);
    $stmt->bindValue(':emp_telefono',$this->getEmp_telefono(),PDO::PARAM_STR);
    $stmt->bindValue(':emp_logo',$this->getEmp_logo(),PDO::PARAM_STR);
    $stmt->bindValue(':emp_id',$this->getEmp_id(),PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;

}

public function editarSinImagen(){
    $sql = "UPDATE empresas SET 
                    emp_nombre=:emp_nombre, 
                    emp_correo=:emp_correo, 
                    emp_telefono=:emp_telefono 
            WHERE   emp_id=:emp_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':emp_nombre',$this->getEmp_nombre(),PDO::PARAM_STR);
    $stmt->bindValue(':emp_correo',$this->getEmp_correo(),PDO::PARAM_STR);
    $stmt->bindValue(':emp_telefono',$this->getEmp_telefono(),PDO::PARAM_STR);
    $stmt->bindValue(':emp_id',$this->getEmp_id(),PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;

}






    public function getEmp_id()
    {
        return $this->emp_id;
    }

    public function setEmp_id($emp_id)
    {
        $this->emp_id = $emp_id;

        return $this;
    }

    public function getEmp_nombre()
    {
        return $this->emp_nombre;
    }

    public function setEmp_nombre($emp_nombre)
    {
        $this->emp_nombre = $emp_nombre;

        return $this;
    }

    public function getEmp_correo()
    {
        return $this->emp_correo;
    }

    public function setEmp_correo($emp_correo)
    {
        $this->emp_correo = $emp_correo;

        return $this;
    }


    public function getEmp_telefono()
    {
        return $this->emp_telefono;
    }


    public function setEmp_telefono($emp_telefono)
    {
        $this->emp_telefono = $emp_telefono;

        return $this;
    }


    public function getEmp_logo()
    {
        return $this->emp_logo;
    }

    public function setEmp_logo($emp_logo)
    {
        $this->emp_logo = $emp_logo;

        return $this;
    }

    public function getEmp_estado()
    {
        return $this->emp_estado;
    }


    public function setEmp_estado($emp_estado)
    {
        $this->emp_estado = $emp_estado;

        return $this;
    }
}

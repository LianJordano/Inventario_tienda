<?php

class ProductoModel extends DB
{

    private $pro_id;
    private $pro_nombre;
    private $pro_precio;
    private $pro_cantidad;
    private $pro_promocion;
    private $pro_destacado;
    private $pro_foto;
    private $pro_categoria_id;
    private $pro_proveedor_id;
    private $pro_empresa_id;
    private $pro_estado;


    public function consultarProductos()
    {
        $sql = " SELECT P.*,C.cat_descripcion AS 'categoria',CASE WHEN E.emp_nombre IS NULL THEN 'Independiente' ELSE  E.emp_nombre END AS 'marca' ,PR.prov_nombre AS 'nombre',PR.prov_apellidos AS 'apellidos' FROM productos P
                        INNER JOIN categorias C ON P.pro_categoria_id=C.cat_id
                        LEFT JOIN empresas E ON P.pro_empresa_id=E.emp_id
                        INNER JOIN proveedores PR ON P.pro_proveedor_id=PR.prov_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }



    public function consultarUnProducto()
    {
        $sql = "SELECT * FROM productos WHERE pro_id=:pro_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':pro_id', $this->getPro_id());
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }

    public function crearProducto()
    {
        $sql = "INSERT INTO productos (pro_nombre,pro_precio,pro_cantidad,pro_promocion,pro_destacado,pro_foto,pro_categoria_id,pro_proveedor_id,pro_empresa_id,pro_estado) VALUES (:pro_nombre,:pro_precio,:pro_cantidad,:pro_promocion,:pro_destacado,:pro_foto,:pro_categoria_id,:pro_proveedor_id,:pro_empresa_id,:pro_estado)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':pro_nombre', $this->getPro_nombre());
        $stmt->bindValue(':pro_precio', $this->getPro_precio());
        $stmt->bindValue(':pro_cantidad', $this->getPro_cantidad());
        $stmt->bindValue(':pro_promocion', $this->getPro_promocion());
        $stmt->bindValue(':pro_destacado', $this->getPro_destacado());
        $stmt->bindValue(':pro_foto', $this->getPro_foto());
        $stmt->bindValue(':pro_categoria_id', $this->getPro_categoria_id());
        $stmt->bindValue(':pro_proveedor_id', $this->getPro_proveedor_id());
        $stmt->bindValue(':pro_empresa_id', $this->getPro_empresa_id());
        $stmt->bindValue(':pro_estado', $this->getPro_estado());
        $stmt->execute();
        return $stmt;
    }


    public function eliminarProducto()
    {
        $sql = "DELETE  FROM productos WHERE pro_id=:pro_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':pro_id', $this->getPro_id());
        $stmt->execute();
        return $stmt;
    }


    public function editar()
    {

        $sql = "UPDATE productos SET 
                    pro_nombre=:pro_nombre, 
                    pro_precio=:pro_precio, 
                    pro_cantidad=:pro_cantidad, 
                    pro_promocion=:pro_promocion, 
                    pro_destacado=:pro_destacado, 
                    pro_foto=:pro_foto, 
                    pro_categoria_id =:pro_categoria_id , 
                    pro_proveedor_id =:pro_proveedor_id , 
                    pro_empresa_id =:pro_empresa_id  
            WHERE   pro_id =:pro_id ";

        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':pro_nombre', $this->getPro_nombre());
        $stmt->bindValue(':pro_precio', $this->getPro_precio());
        $stmt->bindValue(':pro_cantidad', $this->getPro_cantidad());
        $stmt->bindValue(':pro_promocion', $this->getPro_promocion());
        $stmt->bindValue(':pro_destacado', $this->getPro_destacado());
        $stmt->bindValue(':pro_foto', $this->getPro_foto());
        $stmt->bindValue(':pro_categoria_id', $this->getPro_categoria_id());
        $stmt->bindValue(':pro_proveedor_id', $this->getPro_proveedor_id());
        $stmt->bindValue(':pro_empresa_id', $this->getPro_empresa_id());
        $stmt->bindValue(':pro_id', $this->getPro_id());
        $stmt->execute();
        return $stmt;
    }

    public function editarSinImagen()
    {
        $sql = "UPDATE productos SET 
    pro_nombre=:pro_nombre, 
    pro_precio=:pro_precio, 
    pro_cantidad=:pro_cantidad, 
    pro_promocion=:pro_promocion, 
    pro_destacado=:pro_destacado, 
    pro_categoria_id =:pro_categoria_id , 
    pro_proveedor_id =:pro_proveedor_id , 
    pro_empresa_id =:pro_empresa_id  
        WHERE   pro_id =:pro_id ";

        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':pro_nombre', $this->getPro_nombre());
        $stmt->bindValue(':pro_precio', $this->getPro_precio());
        $stmt->bindValue(':pro_cantidad', $this->getPro_cantidad());
        $stmt->bindValue(':pro_promocion', $this->getPro_promocion());
        $stmt->bindValue(':pro_destacado', $this->getPro_destacado());
        $stmt->bindValue(':pro_categoria_id', $this->getPro_categoria_id());
        $stmt->bindValue(':pro_proveedor_id', $this->getPro_proveedor_id());
        $stmt->bindValue(':pro_empresa_id', $this->getPro_empresa_id());
        $stmt->bindValue(':pro_id', $this->getPro_id());
        $stmt->execute();
        return $stmt;
    }


    public function consultarDestacados(){

        $sql = " SELECT P.*,C.cat_descripcion AS 'categoria',CASE WHEN E.emp_nombre IS NULL THEN 'Independiente' ELSE  E.emp_nombre END AS 'marca' ,PR.prov_nombre AS 'nombre',PR.prov_apellidos AS 'apellidos' FROM productos P
        INNER JOIN categorias C ON P.pro_categoria_id=C.cat_id
        LEFT JOIN empresas E ON P.pro_empresa_id=E.emp_id
        INNER JOIN proveedores PR ON P.pro_proveedor_id=PR.prov_id WHERE P.pro_destacado ='1' ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;

    }

    


    /**
     * Get the value of pro_id
     */
    public function getPro_id()
    {
        return $this->pro_id;
    }

    /**
     * Set the value of pro_id
     *
     * @return  self
     */
    public function setPro_id($pro_id)
    {
        $this->pro_id = $pro_id;

        return $this;
    }

    /**
     * Get the value of pro_nombre
     */
    public function getPro_nombre()
    {
        return $this->pro_nombre;
    }

    /**
     * Set the value of pro_nombre
     *
     * @return  self
     */
    public function setPro_nombre($pro_nombre)
    {
        $this->pro_nombre = $pro_nombre;

        return $this;
    }

    /**
     * Get the value of pro_precio
     */
    public function getPro_precio()
    {
        return $this->pro_precio;
    }

    /**
     * Set the value of pro_precio
     *
     * @return  self
     */
    public function setPro_precio($pro_precio)
    {
        $this->pro_precio = $pro_precio;

        return $this;
    }

    /**
     * Get the value of pro_cantidad
     */
    public function getPro_cantidad()
    {
        return $this->pro_cantidad;
    }

    /**
     * Set the value of pro_cantidad
     *
     * @return  self
     */
    public function setPro_cantidad($pro_cantidad)
    {
        $this->pro_cantidad = $pro_cantidad;

        return $this;
    }

    /**
     * Get the value of pro_promocion
     */
    public function getPro_promocion()
    {
        return $this->pro_promocion;
    }

    /**
     * Set the value of pro_promocion
     *
     * @return  self
     */
    public function setPro_promocion($pro_promocion)
    {
        $this->pro_promocion = $pro_promocion;

        return $this;
    }

    /**
     * Get the value of pro_destacado
     */
    public function getPro_destacado()
    {
        return $this->pro_destacado;
    }

    /**
     * Set the value of pro_destacado
     *
     * @return  self
     */
    public function setPro_destacado($pro_destacado)
    {
        $this->pro_destacado = $pro_destacado;

        return $this;
    }

    /**
     * Get the value of pro_foto
     */
    public function getPro_foto()
    {
        return $this->pro_foto;
    }

    /**
     * Set the value of pro_foto
     *
     * @return  self
     */
    public function setPro_foto($pro_foto)
    {
        $this->pro_foto = $pro_foto;

        return $this;
    }

    /**
     * Get the value of pro_categoria_id
     */
    public function getPro_categoria_id()
    {
        return $this->pro_categoria_id;
    }

    /**
     * Set the value of pro_categoria_id
     *
     * @return  self
     */
    public function setPro_categoria_id($pro_categoria_id)
    {
        $this->pro_categoria_id = $pro_categoria_id;

        return $this;
    }

    /**
     * Get the value of pro_proveedor_id
     */
    public function getPro_proveedor_id()
    {
        return $this->pro_proveedor_id;
    }

    /**
     * Set the value of pro_proveedor_id
     *
     * @return  self
     */
    public function setPro_proveedor_id($pro_proveedor_id)
    {
        $this->pro_proveedor_id = $pro_proveedor_id;

        return $this;
    }

    /**
     * Get the value of pro_empresa_id
     */
    public function getPro_empresa_id()
    {
        return $this->pro_empresa_id;
    }

    /**
     * Set the value of pro_empresa_id
     *
     * @return  self
     */
    public function setPro_empresa_id($pro_empresa_id)
    {
        $this->pro_empresa_id = $pro_empresa_id;

        return $this;
    }

    /**
     * Get the value of pro_estado
     */
    public function getPro_estado()
    {
        return $this->pro_estado;
    }

    /**
     * Set the value of pro_estado
     *
     * @return  self
     */
    public function setPro_estado($pro_estado)
    {
        $this->pro_estado = $pro_estado;

        return $this;
    }
}

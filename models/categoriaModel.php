<?php 

    class CategoriaModel extends DB{

        private $cat_id;
        private $cat_descripcion;
        private $cat_imagen;


        public function getCat_id()
        {
                return $this->cat_id;
        }

        public function setCat_id($cat_id)
        {
                $this->cat_id = $cat_id;
                return $this;
        }

        public function getCat_descripcion()
        {
                return $this->cat_descripcion;
        }

        public function setCat_descripcion($cat_descripcion)
        {
                $this->cat_descripcion = $cat_descripcion;
                return $this;
        }

        public function getCat_imagen()
        {
                return $this->cat_imagen;
        }

        public function setCat_imagen($cat_imagen)
        {
                $this->cat_imagen = $cat_imagen;
                return $this;
        }


        public function crearCategoria(){
                $sql = "INSERT INTO categorias (cat_descripcion,cat_imagen) VALUES (:cat_descripcion,:cat_imagen)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':cat_descripcion',$this->getCat_descripcion());
                $stmt->bindValue(':cat_imagen',$this->getCat_imagen());
                $stmt->execute();
                return $stmt;
        }

        public function consultarCategorias(){
                $sql = "SELECT * FROM categorias";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt;
        }

        public function consultarUnaCategoria(){
                $sql = "SELECT * FROM categorias WHERE cat_id=:cat_id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':cat_id',$this->getCat_id());
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt;
        }

        public function eliminarCategoria(){
                $sql = "DELETE  FROM categorias WHERE cat_id=:cat_id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':cat_id',$this->getCat_id());
                $stmt->execute();
                return $stmt;
        }


        public function editar(){
            
                $sql = "UPDATE categorias SET 
                                cat_descripcion=:descripcion, 
                                cat_imagen=:imagen 
                        WHERE   cat_id=:id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':descripcion',$this->getCat_descripcion(),PDO::PARAM_STR);
                $stmt->bindValue(':imagen',$this->getCat_imagen(),PDO::PARAM_STR);
                $stmt->bindValue(':id',$this->getCat_id(),PDO::PARAM_INT);
                $stmt->execute();
                return $stmt;
            
        }

        public function editarSinImagen(){
                $sql = "UPDATE categorias SET 
                                cat_descripcion=:descripcion 
                        WHERE   cat_id=:id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':descripcion',$this->getCat_descripcion(),PDO::PARAM_STR);
                $stmt->bindValue(':id',$this->getCat_id(),PDO::PARAM_INT);
                $stmt->execute();
                return $stmt;
            
        }

 
    }



?>
<?php
    class Productos{
        public $id;
        public $nombre;
        public $categoria;
        public $stock;
        public $precio;

        static public function ObtenerTodos(){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos');
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);

        }

        static public function ObtenerCategorias(){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM categorias');
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }

       static public function RetornarProductoPorCategoria(){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            if($datos['Categoria'] == "0"){
                $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos');
                $consulta->execute();

                return $consulta->fetchAll(PDO::FETCH_OBJ);

            }else{
                $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos where categoria = "'. $datos['Categoria'] .'"');
                $consulta->execute();
        
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }
        }
    }


?>
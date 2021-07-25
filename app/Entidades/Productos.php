<?php
    class Productos{
        public $nombre;
        public $descripcion;
        public $precio;
        public $stock;

        public function ObtenerTodos(){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos');
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);

        }

        public function ObtenerCategorias(){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM categorias');
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }

        public function RetornarProdPorCat(){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $datos = $request->getParsedBody();

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
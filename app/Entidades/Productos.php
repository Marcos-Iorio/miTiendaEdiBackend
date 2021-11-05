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
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

       static public function RetornarProductoPorCategoria($categoria){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $front = $categoria;

            if($front == "0"){
                $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos');
                $consulta->execute();

                return $consulta->fetchAll(PDO::FETCH_OBJ);

            }else{
                $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos where categoria = "'. $front .'"');
                $consulta->execute();
        
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }
        }

        static public function traerInfoProd($idProd){
            $front = $idProd;
            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos WHERE prodID =  "' . $front . '"');
            
            if($consulta->execute()){
                $respuesta = $consulta->fetchAll(PDO::FETCH_OBJ);
            }else{
                $respuesta = [
                    'success' => false, 
                    'message' => "No hay productos con este ID"
                ];
                return $respuesta;
            } 
        }

       static public function BorrarProducto($idProd){

            $front = $idProd;
            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta('DELETE FROM productos WHERE prodID = "' . $front . '"');
            
            if($consulta->execute()){
                $respuesta = [
                    'success' => true, 
                    'message' => "Producto Borrado!"
                ];
                return $respuesta;
            }else{
                $respuesta = [
                    'success' => false, 
                    'message' => "Error al borrar el producto, intentalo de nuevo en unos minutos!"
                ];
                return $respuesta;
            } 
        }

       static public function EditarProducto($producto){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $front = $producto;
            $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos WHERE prodID = '. $front->id .'');
            $consulta->execute();

           $arr = $consulta->fetch(PDO::FETCH_ASSOC);

            if(isset($front->nombre)){
                $nombreProd = $front->nombre;
            }else{
                $nombreProd = $arr['nombre_prod'];
            }

            if(isset($front->stock)){
                $stock = $front->stock;
            }else{
                $stock = $arr['stock'];
            }
            
            if(isset($front->precio)){
                $precio = $front->precio;
            }else{
                $precio = $arr['precio'];
            }
            

            $consulta = $objAccesoDatos->prepararConsulta('UPDATE productos set nombre_prod = ?, stock = ?, precio = ? WHERE prodID = "'. $front->id .'"');
            
            $consulta->bindParam(1, $nombreProd);
            $consulta->bindParam(2, $precio);
            $consulta->bindParam(3, $stock);
    
            if($consulta->execute()){
                $respuesta = [
                    'success' => true,
                     'message' => "Producto modificado con éxito!"
                    ];
            }else{
                $respuesta = [
                    'success' => false,
                     'message' => "Fallo al modificar"
                    ];
            }
    
            return $respuesta;
        }
    }


?>
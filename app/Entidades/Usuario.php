<?php

    class Usuario{
        
        public $nombre;
        public $pass;
        public $mail;

        public function crearUsuario(){
            /* $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO usuarios (nombre, pass, mail) VALUES (?, ?, ?)");
            
            $consulta->bindParam(1, $datos['Nombre']);
            $consulta->bindParam(2, $datos['Contraseña']);
            $consulta->bindParam(3, $datos['Mail']);
    
            if($consulta->execute()){
                $respuesta = "Registrado con exito";
            }else{
                $respuesta = "Fallo en registrar";
            }
            
            $response->$respuesta;
            return $response; */
        }
        static public function retornarUsuarios(){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM usuarios');
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }
    }

?>
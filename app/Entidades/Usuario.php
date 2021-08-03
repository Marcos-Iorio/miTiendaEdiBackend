<?php

    class Usuario{
        
        public $nombre;
        public $pass;
        public $mail;

        public function crearUsuario(){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO usuarios (nombre, mail, pass) VALUES (?, ?, ?)");
            
            $consulta->bindParam(1, $this->$nombre);
            $consulta->bindParam(3, $datos['Mail']);
            $consulta->bindParam(2, $datos['Contraseña']);
    
            if($consulta->execute()){
                $respuesta = "Registrado con exito";
            }else{
                $respuesta = "Fallo en registrar";
            }
            
            $response->$respuesta;
            return $response;
        }
        static public function LoginUsuarios(){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM usuarios');
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }
    }

?>
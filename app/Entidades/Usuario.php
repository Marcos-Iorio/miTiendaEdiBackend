<?php

    class Usuario{
        
        public $nombre;
        public $mail;
        public $pass;

        public function crearUsuario(){
            $postdata = file_get_contents("php://input");
            $request = json_decode($postdata);
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO usuarios (nombre, mail, pass) VALUES (?, ?, ?)");
            
            $consulta->bindParam(1, $request->nombre);
            $consulta->bindParam(2, $request->mail);
            $consulta->bindParam(3, $request->password);
    
            if($consulta->execute()){
                $respuesta = [
                    'success' => true,
                     'message' => "Registrado con exito"
                    ];
            }else{
                $respuesta = [
                    'success' => false,
                     'message' => "Fallo al registrar"
                    ];
            }
    
            return $respuesta;
        }

        static public function LoginUsuarios(){
            $objAccesoDatos = AccesoDatos::obtenerInstancia();

            $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM usuarios');
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }
    }

?>
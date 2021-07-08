<?php

class UsuarioController{

    public function RetornarUsuario($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();

        $usuarios = Usuario::LoginUsuarios();
        
        foreach($usuarios as $users){
             if ($users->nombre == $datos['Nombre'] && $users->pass == $datos['Contraseña']){
                $respuesta = "Sesion iniciada " . $users->nombre . $users->pass;
            }
        }
        if($users->nombre != $datos['Nombre'] && $users->pass != $datos['Contraseña']){
            $respuesta = "Datos incorrectos";
        }
        $response->getBody()->Write(json_encode($respuesta));
            return $response;
        
    }

    public function RegistrarUsuario($request, $response, $args){


        $datos = $request->getParsedBody();

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
        return $response;
        
    }

}


?>
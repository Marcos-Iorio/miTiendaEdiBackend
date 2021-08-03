<?php

class UsuarioController{

    public function RetornarUsuario($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();

        $usuarios = Usuario::LoginUsuarios();

        $respuesta = "Datos incorrectos";
        foreach($usuarios as $users){
             if ($users->nombre == $datos['Nombre'] && $users->pass == $datos['Contraseña']){
                $respuesta = "Sesion iniciada ";
            }
        }
        
        $response->getBody()->Write(json_encode($respuesta));
            return $response;
        
    }

    public function RegistrarUsuario($request, $response, $args){

        $ObjetoProvenienteDelFront =  json_decode($request->getBody());
        //var_dump($ObjetoProvenienteDelFront);

        //recorro los valores del objeto
        $MiUsuario = new Usuario();
        foreach ($ObjetoProvenienteDelFront as $atr => $valueAtr) {
            echo $atr;
            $MiUsuario->{$atr} = $valueAtr;
        }

         $retorno = $MiUsuario->CrearUsuario();

        $response->getBody()->Write(json_encode($ObjetoProvenienteDelFront));

        return $response;

    }

}


?>
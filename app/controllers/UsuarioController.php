<?php

class UsuarioController{

    public function RetornarUsuario($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();
        $consulta = $objAccesoDatos->prepararConsulta('SELECT nombre, pass FROM usuarios where nombre = "' . $datos['Nombre'] . '" and pass = "' . $datos['Contraseña'] . '"');
        $consulta->execute();
        $resultado = $consulta-> fetchAll(PDO::FETCH_OBJ);
        foreach($resultado as $resultados){
            if($resultados->nombre == $datos['Nombre'] && $resultados->pass == $datos['Contraseña']){
                $respuesta = "Sesion iniciada " . $resultados->nombre . $resultados->pass;
            }
            else{
               $respuesta = "Datos incorrectos o inexistentes";
            }
        } 
        
        $response->getBody()->Write(json_encode($respuesta));
        return $response;
    }

    public function RegistrarUsuario($request, $response, $args){
        $valor =  $args['param'];
        $datosUsuario = $request->getParsedBody();
        var_dump($datosUsuario);
        

       $MiUsuario = new Usuario();
        foreach ($datosUsuario as $atr => $valueAtr) {
            echo $datosUsuario;
            $MiUsuario->{$atr} = $valueAtr;
        }
        $retorno =  $MiUsuario->crearUsuario();
   
    $response->getBody()->Write(json_encode($datosUsuario));

    return $response;
        
    }

}


?>
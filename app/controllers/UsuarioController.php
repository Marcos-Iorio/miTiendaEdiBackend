<?php

class UsuarioController{

    public function RetornarUsuario($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();
        $consulta = $objAccesoDatos->prepararConsulta('SELECT nombre, pass FROM usuarios where nombre = "' . $datos['nameL'] . '" and pass = "' . $datos['passL'] . '"');
        $consulta->execute();
        $resultado = $consulta-> fetchAll(PDO::FETCH_OBJ);
        foreach($resultado as $resultados){
            if($resultados->nombre == $datos['nameL'] && $resultados->pass == $datos['passL']){
                $respuesta = "Sesion iniciada " . $resultados->nombre . $resultados->pass;
            }
            else{
               $respuesta = "Datos incorrectos o inexistentes";
            }
        } 
        
        $response->getBody()->Write(json_encode($respuesta));
        return $response;
    }

}


?>
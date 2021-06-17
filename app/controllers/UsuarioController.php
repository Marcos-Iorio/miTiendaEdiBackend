<?php

class UsuarioController{

    public function RetornarUsuario($request, $response, $args){
        
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta('SELECT nombre, pass FROM usuarios where nombre = "' . $args['nameL'] . '" and pass = "' . $args['passL'] . '"');
        $consulta->execute();
        $resultado = $consulta-> fetchAll(PDO::FETCH_OBJ);
        foreach($resultado as $resultados){
            if($resultados->nombre == $args['nameL'] && $resultados->pass == $args['passL']){
                $error = "Sesion iniciada " . $resultados->nombre . $resultados->pass;
            }
            else{
               $error = "Datos incorrectos o inexistentes";
            }
        } 
        
        $response->getBody()->Write(json_encode($error));
        return $response;
    }

}


?>
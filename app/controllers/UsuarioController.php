<?php

class UsuarioController{

    public function RetornarUsuario($request, $response, $args){
        
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta('SELECT nombre, pass FROM usuarios where nombre = "' . $args['nameL'] . '" and pass = "' . $args['passL'] . '"');
        $consulta->execute();
        $resultado = $consulta-> fetchAll(PDO::FETCH_OBJ);

        foreach($resultado as $resultados){
            echo $resultados->nombre;
            echo $resultados->pass;
        }
         return $response;
    }

}


?>
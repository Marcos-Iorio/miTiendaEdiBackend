<?php

class UsuarioController{

    public function RetornarUsuario($request, $response, $args){
        
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta('SELECT nombre, pass FROM usuarios where nombre = "' . $args['nameL'] . '" and pass = "' . $args['passL'] . '"');
        $consulta->execute();
        $resultado = $consulta-> fetchAll(PDO::FETCH_OBJ);

        foreach($resultado as $resultados){
            if($resultados->nombre == $args['nameL'] && $resultados->pass == $args['passL']){
                echo $resultados->nombre;
                echo $resultados->pass;
            }
            else{
                echo "Datos incorrectos o inexistentes";
            }
        } 
  
         return $response;
    }

}


?>
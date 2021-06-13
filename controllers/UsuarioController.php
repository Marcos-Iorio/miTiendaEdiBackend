<?php

class UsuarioController{

    public function RetornarUsuario($request, $response, $args){
        
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT mail, pass FROM usuarios where mail = '" . $mail ."'");
        $consulta->execute();
        $consulta->fetchAll(PDO::FETCH_CLASS);

        if($args['mailL'] == $consulta->mail && $args['passL'] == $consulta->pass ){
            return json_encode($consulta);
        }
         
    }

}


?>
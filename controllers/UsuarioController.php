<?php

class UsuarioController{

    public function RetornarUsuario($request, $response, $args){

        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT mail, pass FROM usuarios where mail = '" . $mail ."'");
        $consulta->execute();
        $consulta->fetchAll(PDO::FETCH_CLASS);

        return json_encode($consulta);
    }

}


?>
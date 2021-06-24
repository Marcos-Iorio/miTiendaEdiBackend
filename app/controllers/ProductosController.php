<?php

class ProductosController{

    public function ObtenerTodo($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();

        $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos');
        $consulta->execute();

        $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);

            $response->getBody()->Write(json_encode($resultado));
            return $response;
    
    }

    public function RetornarProductoPorCategoria($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();

        $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM categorias');
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);

        $response->getBody()->Write(json_encode($resultado));
        return $response;

    }

    public function ObtenerCategoria($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();

        $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos where categoria = "'. $datos['Categoria'] .'"');
        $consulta->execute();

        $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);

            $response->getBody()->Write(json_encode($resultado));
            return $response;
    
    }

}


?>
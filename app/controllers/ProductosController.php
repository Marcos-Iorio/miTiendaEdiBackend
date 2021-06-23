<?php

class ProductosController{

    public function RetornarCategorias($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();

        $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos');
        $consulta->execute();

        $respuesta = $consulta->fetchAll(PDO::FETCH_OBJ);

            $response->getBody()->Write(json_encode($respuesta));
            return $response;
    
    }

    public function RetornarProductoPorCategoria($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();

        $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM productos where categoria = "' . $datos['Categoria'] . '"');
        $consulta->execute();
        $resultado = $consulta-> fetchAll(PDO::FETCH_OBJ);
        foreach($resultado as $resultados){
            $respuesta = $resultados->categoria;
        } 
        
        $response->getBody()->Write(json_encode($respuesta));
        return $response;

    }

}


?>
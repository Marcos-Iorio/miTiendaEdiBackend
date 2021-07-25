<?php

class ProductosController{

    public function ObtenerTodo($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();
        $productos = Productos::ObtenerTodos();
        foreach($productos as $prod){
            $resultado = $prod->prodID . $prod->nombre . $prod->categoria . $prod->stock . $prod->precio;
        }

        $response->getBody()->Write(json_encode($resultado));
            return $response;
    
    }

    public function RetornarProductoPorCategoria($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();
        $categoria = Productos::ObtenerCategoria();
        $resultado = $categorias;

        $response->getBody()->Write(json_encode($resultado));
        return $response;

    }

    public function ObtenerCategoria($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();

        $prodPorCat = Productos::RetornarProductoPorCategoria();
        $resultado = $prodPorCat;

        $response->getBody()->Write(json_encode($resultado));
        return $response;
  
    }

}


?>
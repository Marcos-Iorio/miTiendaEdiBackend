<?php

class ProductosController{

    public function ObtenerTodo($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();
        $productos = Productos::ObtenerTodos();
        foreach($productos as $prod){
            $resultado = $prod->nombre . $prod->categoria . $prod->stock . $prod->precio;
        }

        $response->getBody()->Write(json_encode($resultado));
            return $response;
    
    }

    public function RetornarProductoPorCategoria($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();
        $categoria = Productos::ObtenerCategorias();
        foreach($categoria as $cat){
            $resultado = $cat->nombre_cat;
        }

        $response->getBody()->Write(json_encode($resultado));
        return $response;

    }

    public function ObtenerCategoria($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();

        $prodPorCat = Productos::RetornarProductoPorCategoria();
        foreach($prod as $ppc){
            $resultado = $ppc->nombre . $ppc->categoria . $ppc->stock . $ppc->precio;
        }


        $response->getBody()->Write(json_encode($resultado));
        return $response;
  
    }

}


?>
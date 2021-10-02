<?php

class ProductosController{

    public function ObtenerTodo($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();
        $productos = Productos::ObtenerTodos();
        $resultado = $productos;
        /* foreach($productos as $prod){
            $resultado = $prod;
        }
 */
        $response->getBody()->Write(json_encode($resultado));
            return $response;
    
    }

    public function ObtenerCategoria($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $datos = $request->getParsedBody();
        $categoria = Productos::ObtenerCategorias();
        $resultado = $categoria;
        /* foreach($categoria as $cat){
            $resultado = $cat->nombre_cat;
        } */

        $response->getBody()->Write(json_encode($resultado));
        return $response;

    }

    public function ProdPorCat($request, $response, $args){
        $objAccesoDatos = AccesoDatos::obtenerInstancia();

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $categoria = $request->categoria;

        $prodPorCat = Productos::RetornarProductoPorCategoria($categoria);
        $resultado = $prodPorCat;
        /* foreach($prod as $ppc){
            $resultado = $ppc->nombre . $ppc->categoria . $ppc->stock . $ppc->precio;
        }
        */
        $response->getBody()->Write(json_encode($resultado));
        return $response;
  
    }

    public function borrarProducto($request, $response, $args){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $idProd = $request->prodId;

        $borrarProducto = Productos::BorrarProducto($idProd);
        $resultado = $borrarProducto;
        
        $response->getBody()->Write(json_encode($resultado));
        return $response;

    }

    public function editarProducto($request, $response, $args){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $producto = $request;

        $editarProd = Productos::EditarProducto($producto);
        $resultado = $editarProd;
        
        $response->getBody()->Write(json_encode($resultado));
        return $response;



    }

}


?>
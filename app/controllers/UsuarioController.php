<?php
use \Firebase\JWT\JWT;


class UsuarioController{
    private $key = "secretkey";
    public function RetornarUsuario($request, $response, $args){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $name = $request->nombre;
        $pass = $request->password;
        
        $usuarios = Usuario::LoginUsuarios();

        $respuesta = [
            'success' => false,
            'message' => "Usuario o contraseña inválidos"
            ];
        foreach($usuarios as $users){
            if(isset($users)){
                if ($users->nombre == $name && $users->pass == $pass){
                    $token = [
                        "iss" => "utopian",
                        "iat" => time(),
                        "exp" => time() + 60,
                        "data" => [
                        "user_id" => $users->userID
                        ]
                        ];

                        $jwt = JWT::encode($token, $this->key);
                        
                        $respuesta = [
                             'success' => true, 
                             'message' => "Sesion iniciada",
                             'jwt' => $jwt ];
                }
            }
        }
        
        $response->getBody()->Write(json_encode($respuesta));
        return $response;
        
    }

    public function RegistrarUsuario($request, $response, $args){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        //recorro los valores del objeto
        $MiUsuario = new Usuario();
        foreach ($request as $atr => $valueAtr) {
            $MiUsuario->{$atr} = $valueAtr;
        }

         $retorno = $MiUsuario->crearUsuario();

        $response->getBody()->Write(json_encode($retorno));

        return $response;
    }

}


?>
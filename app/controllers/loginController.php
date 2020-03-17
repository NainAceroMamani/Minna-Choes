<?php

    class LoginController extends Controller{
        public function __construct(){
        }

        /**
         * Vista Principal
         * @return vista
         */
        public function index(){
            View::render('index');
        }

        /**
         * Validar credenciales
         * @return <script>
         */
        public function comparar($request){
            if(!empty($request)):
                $user = new usuarioModel();
                $user->email = $request["email"];
                $data = $user->comparar();

                if($data != false){
                    if(sizeof($data) > 0 ) {
                        if(password_verify ($request["password"], $data["password"] )) {
                            $csrf = "123456789MinnaShoes}[!@..5cd";
                            $opciones = [
                                'cost' => 12,
                            ];
                            $token      =   password_hash($csrf, PASSWORD_BCRYPT, $opciones);
                            session_start();
                            $_SESSION['name']  = $data["name"];
                            $_SESSION['email'] = $data["email"];
                            $_SESSION['tokenUser'] = $token;
                            $_SESSION['instante']   = time();
                            echo "<script>window.location = '".URL."compra';</script>";
                        }
                    }
                }
            endif;
        }
    }

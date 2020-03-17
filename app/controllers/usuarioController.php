<?php

    class UsuarioController extends Controller{
        public function __construct(){
            middleware();
        }
        
        /**
         * Vista Principal
         * @return views
         */
        public function index(){
            $usuario = new usuarioModel();
            $data = $usuario->all();
            View::render('index', $data);
        }

        /**
         * Método para crear Usuarios
         * @return $message
         */
        public function create($request){
            if(!empty($request['email']) && !empty($request['password'])):
                $usuario                =   new UsuarioModel();
                $usuario->name          =   $request['name'];
                $usuario->last_name     =   $request['last_name'];
                $usuario->email         =   $request['email'];
                $opciones = [
                    'cost' => 12,
                ];
                $usuario->password      =   password_hash($request['password'], PASSWORD_BCRYPT, $opciones);
                
                if(!$id = $usuario->add()):
                    $message = "Hubo un error";
                else :
                    $usuario->id = $id;
                    $message = "Se creo el Usuario Correctamente";
                endif;
                echo "<script>window.location = '".URL."usuario?register=".$message."';</script>";
            endif;
        }

        /**
         * Método para cargar datos de un Usuario
         * @return $color->one()
         */
        public function one($id){
            if(!empty($id)):
                $usuario = new UsuarioModel();
                $usuario->id = $id;
                return $usuario->one();
            endif;
        }

        /**
         * Método para actualizar un Usuario
         * @return vista
         */
        public function update($request, $id){
            if(!empty($id) && !empty($request['email'])):
                $usuario                =   new UsuarioModel();
                $usuario->name          =   $request['name'];
                $usuario->last_name     =   $request['last_name'];
                $usuario->email         =   $request['email'];
                $usuario->id            =   $id;
                $message = ($usuario->update())? "Se actualizó el Usuario Correctamente" : "Hubo un error";
                echo "<script>window.location = '".URL."usuario?register=".$message."';</script>";
            endif;
        }
    }

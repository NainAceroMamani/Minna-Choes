<?php

    class ColorController extends Controller{
        public function __construct(){
            middleware();
        }

        /**
         * Método que se carga por defecto para listar los Colores
         * @return vista
         */
        public function index(){
            $color = new colorModel();
            $data = $color->all();
            View::render('index', $data);
        }

        /**
         * Método para crear Colores
         * @return $message
         */
        public function create($request){
            if(!empty($request['name'])):
                $color                =   new colorModel();
                $color->name          =   $request['name'];
                $color->description   =   $request['description'];

                if(!$id = $color->add()):
                    $message = "Hubo un error";
                else :
                    $color->id = $id;
                    $message = "Se creo el Color Correctamente";
                endif;
                echo "<script>window.location = '".URL."color?register=".$message."';</script>";
            endif;
        }

        /**
         * Método para cargar datos de un Color
         * @return $color->one()
         */
        public function one($id){
            if(!empty($id)):
                $color = new colorModel();
                $color->id = $id;
                return $color->one();
            endif;
        }

        /**
         * Método para actualizar un Color
         * @return vista
         */
        public function update($request, $id){
            if(!empty($id) && !empty($request['name'])):
                $color                =   new colorModel();
                $color->name          =   $request['name'];
                $color->description   =   $request['description'];
                $color->id            =   $id;
                $message = ($color->update())? "Se actualizó el Color Correctamente" : "Hubo un error";
                echo "<script>window.location = '".URL."color?register=".$message."';</script>";
            endif;
        }
    }

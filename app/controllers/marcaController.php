<?php

    class MarcaController extends Controller{
        public function __construct(){
            middleware();
        }

        /**
         * Vista Principal
         * @return $message
         */
        public function index(){
            $marca = new marcaModel();
            $data = $marca->all();

            View::render('index', $data);
        }

        /**
         * Método para crear Marcas
         * @return $message
         */
        public function create($request){
            if(!empty($request['name'])):
                $marca                =   new marcaModel();
                $marca->name          =   $request['name'];
                $marca->description   =   $request['description'];

                if(!$id = $marca->add()):
                    $message = "Hubo un error";
                else :
                    $marca->id = $id;
                    $message = "Se creo el Marca Correctamente";
                endif;
                echo "<script>window.location = '".URL."marca?register=".$message."';</script>";
            endif;
        }

        /**
         * Método para cargar datos de un Marca
         * @return $color->one()
         */
        public function one($id){
            if(!empty($id)):
                $color = new marcaModel();
                $color->id = $id;
                return $color->one();
            endif;
        }

        /**
         * Método para actualizar una Marca
         * @return vista
         */
        public function update($request, $id){
            if(!empty($id) && !empty($request['name'])):
                $marca                =   new marcaModel();
                $marca->name          =   $request['name'];
                $marca->description   =   $request['description'];
                $marca->id            =   $id;
                $message = ($marca->update())? "Se actualizó el Marca Correctamente" : "Hubo un error";
                echo "<script>window.location = '".URL."marca?register=".$message."';</script>";
            endif;
        }
    }

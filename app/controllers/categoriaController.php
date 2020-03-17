<?php

    class CategoriaController extends Controller{
        public function __construct(){
            middleware();
        }

        /**
         * Página Principal
         * @return view
         */
        public function index(){
            $categoria = new categoriaModel();
            $data = $categoria->all();

            View::render('index', $data);
        }

        /**
         * Método para crear Categorias
         * @return $message
         */
        public function create($request){
            if(!empty($request['name'])):
                $categoria                =   new categoriaModel();
                $categoria->name          =   $request['name'];
                $categoria->description   =   $request['description'];

                if(!$id = $categoria->add()):
                    $message = "Hubo un error";
                else :
                    $categoria->id = $id;
                    $message = "Se creo la Categoria Correctamente";
                endif;
                echo "<script>window.location = '".URL."categoria?register=".$message."';</script>";
            endif;
        }

        /**
         * Método para cargar datos de una Categorias
         * @return $color->one()
         */
        public function one($id){
            if(!empty($id)):
                $categoria = new categoriaModel();
                $categoria->id = $id;
                return $categoria->one();
            endif;
        }

        /**
         * Método para actualizar una Categorias
         * @return vista
         */
        public function update($request, $id){
            if(!empty($id) && !empty($request['name'])):
                $categoria                =   new categoriaModel();
                $categoria->name          =   $request['name'];
                $categoria->description   =   $request['description'];
                $categoria->id            =   $id;
                $message = ($categoria->update())? "Se actualizó la  Categoria Correctamente" : "Hubo un error";
                echo "<script>window.location = '".URL."categoria?register=".$message."';</script>";
            endif;
        }
    }

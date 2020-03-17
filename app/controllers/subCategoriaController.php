<?php

    class subCategoriaController extends Controller{
        public function __construct(){
            middleware();
        }

        /**
         * Vista Principal
         * @return view
         */
        public function index(){
            $sub_categoria = new subCategoriaModel();
            $data = $sub_categoria->all();

            View::render('index', $data);
        }
        
        /**
         * Método para crear Subcategorias
         * @return $message
         */
        public function create($request){
            if(!empty($request['name']) && !empty($request['id_categoria'])):
                $subcategoria                =   new subcategoriaModel();
                $subcategoria->name          =   $request['name'];
                $subcategoria->description   =   $request['description'];
                $subcategoria->id_categoria  =   $request['id_categoria'];
                if(!$id = $subcategoria->add()):
                    $message = "Hubo un error";
                else :
                    $subcategoria->id = $id;
                    $message = "Se creo la Subcategoria Correctamente";
                endif;
                echo "<script>window.location = '".URL."subcategoria?register=".$message."';</script>";
            endif;
        }

        /**
         * Método para cargar datos de una Categorias
         * @return $color->one()
         */
        public function one($id){
            if(!empty($id)):
                $subcategoria = new subcategoriaModel();
                $subcategoria->id = $id;
                return $subcategoria->one();
            endif;
        }

        /**
         * Método para actualizar una Categorias
         * @return vista
         */
        public function update($request, $id){
            if(!empty($id) && !empty($request['name']) && !empty($request['id_categoria'])):
                $subcategoria                =   new subcategoriaModel();
                $subcategoria->name          =   $request['name'];
                $subcategoria->description   =   $request['description'];
                $subcategoria->id_categoria  =   $request['id_categoria'];
                $subcategoria->id            =   $id;
                $message = ($subcategoria->update())? "Se actualizó la  Subcategoria Correctamente" : "Hubo un error";
                echo "<script>window.location = '".URL."subcategoria?register=".$message."';</script>";
            endif;
        }
    }

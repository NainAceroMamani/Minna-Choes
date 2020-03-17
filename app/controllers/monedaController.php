<?php

    class MonedaController extends Controller{
        public function __construct(){
            middleware();
        }

        /**
         * Vista Principal
         * @return view
         */
        public function index(){
            $moneda = new monedaModel();
            $data = $moneda->all();

            View::render('index', $data);
        }

        /**
         * Método para cargar datos de la Moneda
         * @return $color->one()
         */
        public function one($id){
            if(!empty($id)):
                $moneda = new monedaModel();
                $moneda->id = $id;
                return $moneda->one();
            endif;
        }

        /**
         * Método para actualizar una Moneda
         * @return vista
         */
        public function update($request, $id){
            if(!empty($id) && !empty($request['price'])):
                $moneda                =   new monedaModel();
                $moneda->price          =   $request['price'];
                $moneda->id            =   $id;
                $message = ($moneda->update())? "Se actualizó la  moneda Correctamente" : "Hubo un error";
                echo "<script>window.location = '".URL."moneda?register=".$message."';</script>";
            endif;
        }
    }

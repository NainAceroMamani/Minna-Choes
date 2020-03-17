<?php

    class CompraController extends Controller{
        public function __construct(){
            middleware();
        }

        /**
         * Página Principal
         * @return view
         */
        public function index(){
            $compra = new compraModel();
            $data = $compra->all();

            View::render('index', $data);
        }

        /**
         * Actualizar estado
         * @return <script>
         */
        public function update($id){
            if(!is_null($id)):
                $compra                =   new compraModel();
                $compra->id            =   $id;
                $message = ($compra->update())? "Se actualizó la  compra Correctamente" : "Hubo un error";
                echo "<script>window.location = '".URL."compra?register=".$message."';</script>";
            endif;
        }

        /**
         * Detalle de la compra
         * @return $data
         */
        public function detail_compra($id){
            if(!empty($id)):
                $compra                =   new compraModel();
                $compra->id            =   $id;
                return $compra->detail();
            endif;
        }
    }

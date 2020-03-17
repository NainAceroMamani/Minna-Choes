<?php

    class clienteController extends Controller{
        public function __construct(){
            middleware();
        }

        /**
         * Página Principal
         * @return view
         */
        public function index(){
            $cliente = new clienteModel();
            $data = $cliente->all();

            View::render('index', $data);
        }

        /**
         * Método para cargar datos de un Usuario
         * @return $color->one()
         */
        public function one($ruc){
            if(!empty($ruc)):
                $cliente = new clienteModel();
                $cliente->ruc = $ruc;
                return $cliente->one();
            endif;
        }

    }

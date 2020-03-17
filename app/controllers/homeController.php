<?php

    class homeController extends Controller{
        public function __construct(){
        }

        /**
         * Vista principal
         * @return vista
         */
        public function index(){
            $data =
            [
                'title' => 'Minnsa Shoes',
                'bg'    =>  'blank'
            ];
            View::render('Nuami', $data);
        }

    }

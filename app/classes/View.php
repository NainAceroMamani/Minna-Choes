<?php
    class View {

        public function render($view, $data = []){
            $d = to_object($data);

            if(!is_file(VIEWS.CONTROLLER.DS.$view.'View.php')) die(sprintf('No existe la vista %sView en la carpeta %s'
                                                                , $view, CONTROLLER));
            require_once VIEWS.CONTROLLER.DS.$view.'View.php';
            exit();
        }
    }

<?php

    class Bee {
        private $framework  = 'Nuami';
        private $version    = '1.0.0';
        private $uri        = [];

        public function __construct(){
            $this->init();
        }

        /**
         * ejecutar metodos subsecuentes Nuami
         *
         * @return void
         *
        */
        private function init(){
            $this->init_session();
            $this->init_load_config();
            $this->init_load_function();
            $this->init_autoload();
            $this->init_csrf();
            $this->dispatch();
        }

        /**
         * Iniciar session en el sistema Nuami
         *
         * @return void
         *
        */
        private function init_session(){
            if(session_status() == PHP_SESSION_NONE) session_start();

            return;
        }

        /**
         * Configuración del sistema
         *
         * @return void
         *
        */
        private function init_load_config(){
            $file = 'nm_config.php';
            if(!is_file('app/config/'.$file)) die(sprintf('El archivo %s no se encuentra , es requirido por %s',$file, $this->framework));
            require_once 'app/config/'.$file;

            return;
        }

        /**
         * Funciones del sistema y usuario
         *
         * @return void
         *
        */
        private function init_load_function() {
            $file = 'nm_core_functions.php';
            if(!is_file(FUNCTIONS.$file)) die(sprintf('El archivo %s no se encuentra , es requirido por %s',$file, $this->framework));
            require_once FUNCTIONS.$file;

            $file = 'nm_custom_functions.php';
            if(!is_file(FUNCTIONS.$file)) die(sprintf('El archivo %s no se encuentra , es requirido por %s',$file, $this->framework));
            require_once FUNCTIONS.$file;

            return;
        }

        /**
         * Cargar archivos Nuami
         *
         * @return void
         *
        */
        private function init_autoload() {

            require_once CLASSES.'Autoloader.php';

            Autoloader::init();
            return;
        }

        /**
         *
         * Crear Token
         *
         * @return
         */
        private function init_csrf(){
            $csrf = new Csrf();
        }

        /**
         * Metodo uri
         *
         * @return $this->uri;
         *
        */
        private function filter_url(){
            if(isset($_GET['uri'])){
                $this->uri = $_GET['uri'];
                $this->uri = rtrim($this->uri, '/');
                $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
                $this->uri = explode('/', strtolower($this->uri));

                return $this->uri;
            }
        }

        /**
         * Metodo Controller y parametros
         *
         * @return $this->uri;
         *
        */
        private function dispatch(){
            $this->filter_url();

            if(isset($this->uri[0])){
                $current_controller = $this->uri[0];
                unset($this->uri[0]);
            } else $current_controller = DEFAULT_CONTROLLER;

            $controller = $current_controller.'Controller';
            if(!class_exists($controller)){
                $controller = DEFAULT_ERROR_CONTROLLER.'Controller';
                $current_controller = DEFAULT_ERROR_CONTROLLER;
            }

            if(isset($this->uri[1])){
                $method = str_replace('-','_',$this->uri[1]);
                if(!method_exists($controller, $method)){
                    $controller = DEFAULT_ERROR_CONTROLLER.'Controller';
                    $current_method = DEFAULT_METHOD;
                    $current_controller = DEFAULT_ERROR_CONTROLLER;
                } else $current_method = $method;

                unset($this->uri[1]);
            } else $current_method = DEFAULT_METHOD;

            define('CONTROLLER' , $current_controller);
            define('METHOD'     , $current_method);

            $controller = new $controller; /** Instancias */

            $params = array_values(empty($this->uri)? [] : $this->uri);
            (empty($params))?   call_user_func([$controller, $current_method]):
                                call_user_func_array([$controller, $current_method], $params);

            return;
        }

        /**
         * Iniciar Framework Nuami
         *
         * @return $this->uri;
         *
        */
        public static function fly(){
            $Nuami = new self();
            return;
        }

    }

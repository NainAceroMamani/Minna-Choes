<?php
    class Flasher{

        private $valid_types = ['primary','secondary','success','danger','warning','info','light','dark'];
        private $default = 'primary';
        private $type;
        private $msg;

        /**
         *
         * Notificaciones
         *
         * @param string in array $msg
         * @param string $type
         *
         * @return bolean
         *
         */
        public static function new($msg, $type = null){
            $self = new self();
            if($type === null)  $self->type = $self->default;

            $self->type = in_array($type, $self->valid_types) ? $type : $self->default;

            if(is_array($msg)){
                foreach($msg as $e){
                    $_SESSION[$self->type][] = $e;
                }

                return true;
            }

            $_SESSION[$self->type][] = $msg;

            return true;
        }

        public static function flash(){
            $self = new self();
            $output = '';

            foreach ($self->valid_types as $type) {
                if(isset($_SESSION[$type]) && !empty($_SESSION[$type])) {
                  foreach ($_SESSION[$type] as $m) {
                    $output .= '<div class="alert alert-'.$type.' alert-dismissible show fade" role="alert">';
                    $output .= $m;
                    $output .= '<button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                  </button>';
                    $output .= '</div>';
                  }

                  unset($_SESSION[$type]);
                }
            }
            return $output;
        }
    }

<?php

    class Csrf{
        private $length = 32;
        private $token;
        private $token_expiration;
        private $expiration_time = 60 * 5;

        public function __construct()
        {
            if(!isset($_SESSION['csrf_token'])) {
                $this->generate();
                $_SESSION['csrf_token'] =
                [
                'token'      => $this->token,
                'expiration' => $this->token_expiration
                ];
                return $this;
            }

            $this->token            = $_SESSION['csrf_token']['token'];
            $this->token_expiration = $_SESSION['csrf_token']['expiration'];

            return $this;
        }

        /**
        * Método generate
        *
        * @return void
        */
        private function generate()
        {
            if (function_exists('bin2hex')) {
                $this->token = bin2hex(random_bytes($this->length));
            } elseif (function_exists('mcrypt_create_iv')) {
                $this->token = bin2hex(mcrypt_create_iv($this->length, MCRYPT_DEV_URANDOM));
            } else {
                $this->token = bin2hex(openssl_random_pseudo_bytes($this->length));
            }

            $this->token_expiration = time() + $this->expiration_time;
            return $this;
        }

        /**
        * Validar Token
        *
        * @param string $csrf_token
        * @param boolean $validate_expiration
        * @return void
        */
        public static function validate($csrf_token, $validate_expiration = false)
        {
            $self = new self();

            if($validate_expiration && $self->get_expiration() < time()) {
                return false;
            }

            if($csrf_token !== $self->get_token()) {
                return false;
            }

            return true;
        }

        /**
        * Obtener el token
        *
        * @return void
        */
        public function get_token()
        {
            return $this->token;
        }

        /**
         * Expiración del token
         *
         * @return void
         */
        public function get_expiration()
        {
            return $this->token_expiration;
        }
    }

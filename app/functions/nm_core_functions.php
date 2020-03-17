<?php

    function to_object($array){
        return json_decode(json_encode($array));
    }

    function get_sitename(){
        return 'Nuami Framework';
    }

    function now(){
        return date('Y-m-d H:i:s');
    }

    function middleware(){
        if(isset($_SESSION)) :
            if(isset($_SESSION['name'] ) && isset($_SESSION['email']) && isset($_SESSION['tokenUser']) && isset($_SESSION['instante'])) :
                $csrf = '123456789MinnaShoes}[!@..5cd';
                if(!password_verify ($csrf, $_SESSION["tokenUser"])) :
                    echo "<script>window.location = '".URL."login';</script>";
                endif;
            else :
                echo "<script>window.location = '".URL."login';</script>";
            endif;
        else :
            echo "<script>window.location = '".URL."login';</script>";
        endif;
    }

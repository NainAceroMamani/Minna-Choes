<?php
    if(!$_GET)  header('Location: http://64.225.53.166/?pagina=1');
    if(isset($_GET['pagina'])) :
        $articulos_x_pagina = 9;

    else :
        if(isset($_GET['prod'])) {
            $datos_get = explode('-',$_GET['prod']);
            $num= count($datos_get);
        }
        $pesos = new monedaModel();
        $pesos->id = 1;
        $peso = $pesos->one();
    endif;
	

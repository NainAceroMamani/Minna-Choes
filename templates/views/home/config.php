<?php
    if(!$_GET)  header('Location: http://64.225.53.166/?pagina=1');
    if(isset($_GET['pagina'])) :
        $archivos_incluidos = get_included_files();

	foreach ($archivos_incluidos as $nombre_archivo) {
	    echo "$nombre_archivo\n<br>";
	}
	die();
    else :
        if(isset($_GET['prod'])) {
            $datos_get = explode('-',$_GET['prod']);
            $num= count($datos_get);
        }
        $pesos = new monedaModel();
        $pesos->id = 1;
        $peso = $pesos->one();
    endif;
	

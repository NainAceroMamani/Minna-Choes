<?php
    if(!$_GET)  header('Location: ?pagina=1');
    
    if(isset($_GET['pagina'])) :

        $producto = new productoModel();
        $data =  $producto->detail_productos();

        $articulos_x_pagina = 9;
        $total = sizeof($data);
        $paginas = ceil($total/$articulos_x_pagina);

        if(isset($_GET['action'])) :
            if($_GET['action'] == 4) :
                $inicio = ($_GET['pagina'] -1)*$articulos_x_pagina;
                $datos = $producto->detail_productos_categoria($inicio, $articulos_x_pagina,$_GET['id']);
            else :
                $inicio = ($_GET['pagina'] -1)*$articulos_x_pagina;
                $datos = $producto->detail_productos_paginate($inicio, $articulos_x_pagina);
            endif;
        else: 
            $inicio = ($_GET['pagina'] -1)*$articulos_x_pagina;
            $datos = $producto->detail_productos_paginate($inicio, $articulos_x_pagina);
        endif;
        
        $categoria = new categoriaModel();
        $categorias =  $categoria->all();
        $num = 0;
        if(isset($_GET['prod'])) {
            $datos_get = explode('-',$_GET['prod']);
            $num= count($datos_get);
        }
        $pesos = new monedaModel();
        $pesos->id = 1;
        $peso = $pesos->one();

        $producto_detal = new ProductoModel();
        $productos_detal = $producto_detal->banner_producto();
    else :
        if(isset($_GET['prod'])) {
            $datos_get = explode('-',$_GET['prod']);
            $num= count($datos_get);
        }
        $pesos = new monedaModel();
        $pesos->id = 1;
        $peso = $pesos->one();
    endif;
	

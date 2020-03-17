<?php 
  if(!empty($_GET['action'])):
    $producto = new ProductoController();
    if(!empty($_POST)){
      if($_POST["method"] == "create_producto") :
        $con = 0;
        (!empty($_POST["code"]))? $con++ : $notification = "Ingrese un Código al producto";
        (!empty($_POST["price"]))? $con++ : $notification = "Ingrese un Precio al producto";
        if($con == 2): $producto->create($_POST); endif;
      elseif($_POST["method"] == "create_subcategora") :
        $con = 0;
        (!empty($_POST["id_subcategoria"]))? $con++ : $notification = "Ingrese el la subcategoria del producto";
        (!empty($_GET["id"]))? $con++ : $notification = "Ingrese el la subcategoria del producto";
        if($con == 2): $producto->subcategoria($_POST["id_subcategoria"], $_GET["id"]); endif;
      elseif($_POST["method"] == "create_detalle") :
        $con = 0;
        (!empty($_GET["code"]))? $con++ : $notification = "Error No se puede subir denegación de servicios";
        (!empty($_POST["id_color"]))? $con++ : $notification = "Ingrese un color para el producto";
        (!empty($_POST["stock"]))? $con++ : $notification = "Ingrese el stock para el producto";
        if($con == 3): $producto->detail_product($_POST, $_GET["id"], $_GET["code"]); endif;
      elseif($_POST["method"] == "update_producto" && !is_null($_GET['id'])) :
          $con = 0;
          (!empty($_POST["code"]))? $con++ : $notification = "Error No se puede subir denegación de servicios";
          (!empty($_POST["price"]))? $con++ : $notification = "Ingrese un color para el producto";
          if($con == 2): $producto->update_producto($_POST, $_GET["id"]); endif;
      elseif($_POST["method"] == "update_detalle" && !is_null($_GET['id'])) :
        $con = 0;
        (!empty($_POST["stock"]))? $con++ : $notification = "Ingrese un Stock para el producto";
        (!empty($_POST["id_color"]))? $con++ : $notification = "Ingrese un color para el producto";
        if($con == 2): $producto->update_detalle($_POST, $_GET["id"]); endif;
      endif;
    }
    if($_GET['action'] == 1) if(!empty($_GET['id'])){ $id = $_GET['id']; $data = $producto->detail($id);}
    if($_GET['action'] == 2){  $marcas = new MarcaModel(); $data = $marcas->all(); }
    if($_GET['action'] == 3){  $subcategoria = new SubcategoriaModel(); $data = $subcategoria->all(); }
    if($_GET['action'] == 4){  $color = new ColorModel(); $data = $color->all(); }
    if($_GET['action'] == 5){  $producto = new ProductoController(); $data = $producto->one($_GET['id']); }
    if($_GET['action'] == 6){  
        $producto = new ProductoController(); $data = $producto->one_detalle($_GET['id']); 
        $colores = new ColorModel(); $color = $colores->all();
    }
    if($_GET['action'] == 7){  $producto = new ProductoController(); $producto->delete($_GET['id']); }
    if($_GET['action'] == 8){  $producto = new ProductoController(); $producto->check($_GET['id']); }
    if($_GET['action'] == 9){  $producto = new ProductoController(); $producto->times($_GET['id']); }
  endif;
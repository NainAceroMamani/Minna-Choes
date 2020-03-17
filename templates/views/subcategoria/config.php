<?php 
  if(!empty($_GET['action'])):
    $subcategoria = new SubcategoriaController();
    $categorias = new categoriaModel();
    $categoria = $categorias->all();
    if(!empty($_POST)){
      if($_POST["method"] == "create") :
        (!empty($_POST["name"]))? $subcategoria->create($_POST) : $notification = "Ingrese el nombre de la subcategoria";
      elseif($_POST["method"] == "update") :
        (!empty($_POST["name"]))? $subcategoria->update($_POST,$_GET["id"]) : $notification = "Ingrese el nombre de la subcategoria";
      endif;
    }
    if($_GET['action'] == 2) if(!empty($_GET['id'])) $data = $subcategoria->one($_GET['id']);
  endif;
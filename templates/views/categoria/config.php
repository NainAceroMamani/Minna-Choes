
<?php 
  if(!empty($_GET['action'])):
    $categoria = new CategoriaController();
    if(!empty($_POST)){
      if($_POST["method"] == "create") :
        (!empty($_POST["name"]))? $categoria->create($_POST) : $notification = "Ingrese el nombre de la categoria";
      elseif($_POST["method"] == "update") :
        (!empty($_POST["name"]))? $categoria->update($_POST,$_GET["id"]) : $notification = "Ingrese el nombre de la categoria";
      endif;
    }
    if($_GET['action'] == 2) if(!empty($_GET['id'])) $data = $categoria->one($_GET['id']);
  endif;
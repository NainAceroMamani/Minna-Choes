<?php 
  if(!empty($_GET['action'])):
    $marca = new MarcaController();
    if(!empty($_POST)){
      if($_POST["method"] == "create") :
        (!empty($_POST["name"]))? $marca->create($_POST) : $notification = "Ingrese el nombre de la marca";
      elseif($_POST["method"] == "update") :
        (!empty($_POST["name"]))? $marca->update($_POST,$_GET["id"]) : $notification = "Ingrese el nombre de la marca";
      endif;
    }
    if($_GET['action'] == 2) if(!empty($_GET['id'])) $data = $marca->one($_GET['id']);
  endif;
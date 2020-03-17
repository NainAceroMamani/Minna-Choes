<?php 
  if(!empty($_GET['action'])):
    $color = new ColorController();
    if(!empty($_POST)){
      if($_POST["method"] == "create") :
        (!empty($_POST["name"]))? $color->create($_POST) : $notification = "Ingrese el nombre del color";
      elseif($_POST["method"] == "update") :
        (!empty($_POST["name"]))? $color->update($_POST,$_GET["id"]) : $notification = "Ingrese el nombre del color";
      endif;
    }
    if($_GET['action'] == 2) if(!empty($_GET['id'])) $data = $color->one($_GET['id']);
  endif;
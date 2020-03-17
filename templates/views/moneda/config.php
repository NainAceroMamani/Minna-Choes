<?php 
  if(!empty($_GET['action'])):
    $moneda = new MonedaController();
    if(!empty($_POST)):
      if($_POST["method"] == "update") :
        (!empty($_POST["price"]))? $moneda->update($_POST,$_GET["id"]) : $notification = "Ingrese un precio para la moneda";
      endif;
    endif;
    if($_GET['action'] == 2) if(!empty($_GET['id'])) $data = $moneda->one($_GET['id']);
  endif;
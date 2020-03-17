<?php
  if(!empty($_GET['action'])):
    $usuario = new UsuarioController();
    if(!empty($_POST)){
      if($_POST["method"] == "create") :
        $con = 0;
        (!empty($_POST["name"]))? $con++      : $notification = "Ingrese el nombre para el Usuario";
        (!empty($_POST["email"]))? $con++     : $notification = "Ingrese un Correo para el usuario";
        (!empty($_POST["password"]))? $con++  : $notification = "Ingrese una contraseña para el usuario";
        ($con == 3)? $usuario->create($_POST): $con = 0; 
      elseif($_POST["method"] == "update") :
        $con = 0;
        (!empty($_POST["name"]))? $con++  : $notification = "Ingrese el nombre para el Usuario";
        (!empty($_POST["email"]))? $con++ : $notification = "Ingrese un Correo para el usuario";
        ($con == 2)? $usuario->update($_POST,$_GET["id"]) : $con = 0; 
     endif;
    }
    if($_GET['action'] == 2) if(!empty($_GET['id'])) $data = $usuario->one($_GET['id']);
  endif;
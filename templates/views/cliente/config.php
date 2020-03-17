<?php
  if(!empty($_GET['action'])):
    $cliente = new ClienteController();
    if($_GET['action'] == 2) if(!empty($_GET['ruc'])) $data = $cliente->one($_GET['ruc']);
  endif;

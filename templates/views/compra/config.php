<?php 
  if(!empty($_GET['action'])):
    $compra = new CompraController();
    if($_GET['action'] == 1 && !empty($_GET['id'])) : 
        $compra->update($_GET['id']);
    endif;
    if($_GET['action'] == 2 && !empty($_GET['id'])) : 
      $data = $compra->detail_compra($_GET['id']);
    endif;
  endif;
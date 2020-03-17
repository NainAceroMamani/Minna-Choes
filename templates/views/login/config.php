<?php 
    if(isset($_POST["email"]) && isset($_POST["password"])) : 
        $user = new LoginController();
        $user->comparar($_POST);
    endif;  
    $num = 0;
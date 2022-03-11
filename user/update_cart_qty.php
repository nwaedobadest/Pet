<?php
//since update_cart_quantity would be using session
//Its neccessary you start a session
session_start();
    
    
    include("inc/function.php");
    
    //No need to echo
    //This is because a redirection would be made
    call_user_func('update_cart_quantity');
    //echo update_cart_quantity();
?>

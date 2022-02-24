<?php
    include("inc/function.php");
    if(isset($_GET['delete_cat']))
    {
        echo delete_cat();
    }
    if(isset($_GET['delete_prod']))
    {
        echo delete_prod();
    }
    if(isset($_GET['delete_sub_cat']))
    {
        echo delete_sub_cat();
    }
?>
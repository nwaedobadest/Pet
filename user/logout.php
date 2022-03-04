<?php 
    unset($_SESSION['user_id']);
    unset($_SESSION['user_username']);
    echo "window.open('index.php', '_self');";
?>
<?php 
    session_unset();
    session_destroy();
    echo "window.open('index.php', '_self');";
?>
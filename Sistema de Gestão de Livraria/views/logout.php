<?php
    require 'config.php';
    session_start();
    session_destroy();
    echo "<script>alert('Logout Feito!')</script>";
    echo "<script>window.location = 'index.php'</script>";
?>
<?php
     require 'config.php';
     session_start();
     if(isset($_SESSION['id'])){
         header("location: login.php");
         exit();
     }else{
         header("location: index.php");
         exit();
     }
?>
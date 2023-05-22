<?php
     if($consulta['estado'] != 'Utilizador'){
       session_destroy();
       header("location:login.php");
       exit();
       }
?>
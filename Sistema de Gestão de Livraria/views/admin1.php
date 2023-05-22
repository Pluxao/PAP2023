<?php
     if($consulta['estado'] != 'Admin'){
       session_destroy();
       header("location: ../../login.php");
       exit();
       }
?>
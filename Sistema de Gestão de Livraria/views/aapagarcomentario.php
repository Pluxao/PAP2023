<?php
    require 'config.php';    
    require 'verificar.php';
    require 'admin.php';


    $id_comentario = filter_input(INPUT_GET, 'id_comentario');
    if($id_comentario){
    $sql = $pdo->prepare("DELETE FROM comentarios WHERE id_comentario = :id_comentario");
    $sql->bindValue(':id_comentario', $id_comentario);
    $sql->execute();
    echo"<script>alert('O seu comentário foi apagado')</script>";
   }
   
   echo "<script>window.location = 'blog.php'</script>";
?>
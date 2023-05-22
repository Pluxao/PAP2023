<?php
    require '../../config.php';    
    require '../../verificar.php';
    require '../../admin1.php';

    $id_comentario = filter_input(INPUT_GET, 'id_comentario');
    if($id_comentario){
    $sql = $pdo->prepare("DELETE FROM comentarios WHERE id_comentario = :id_comentario");
    $sql->bindValue(':id_comentario', $id_comentario);
    $sql->execute();
    echo"<script>alert('Comentário eliminado')</script>";
    echo "<script>window.location = 'comentarios.php'</script>";
   }
   
?>
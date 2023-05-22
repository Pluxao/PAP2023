<?php
    require '../../config.php';    
    require '../../verificar.php';
    require '../../admin1.php';

    $id_post = filter_input(INPUT_GET, 'id_post');
    if($id_post){
    $sql = $pdo->prepare("DELETE FROM posts WHERE id_post = :id_post");
    $sql->bindValue(':id_post', $id_post);
    $sql->execute();
    echo"<script>alert('Postagem eliminada com Sucesso')</script>";
    echo "<script>window.location = 'postagens.php'</script>";
   }
   
?>
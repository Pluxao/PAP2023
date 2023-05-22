<?php
    require '../../config.php';    
    require '../../verificar.php';
    require '../../admin1.php';

    $cod = filter_input(INPUT_GET, 'cod');
    if($cod){
    $sql = $pdo->prepare("DELETE FROM livros WHERE cod = :cod");
    $sql->bindValue(':cod', $cod);
    $sql->execute();
    echo"<script>alert('Livro eliminado')</script>";
    echo "<script>window.location = 'livros.php'</script>";
   }
   
?>
<?php
    require 'config.php';    
    require 'verificar.php';
    require 'admin.php';

    $id = filter_input(INPUT_GET, 'id');
    if($id){
    $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    echo"<script>alert('Usuário removido com Sucesso')</script>";
    echo "<script>window.location = 'painel/views/usuarios.php'</script>";
    }else{
        echo"<script>alert('Erro, tente novamente')</script>";
        echo "<script>window.location = 'painel/views/usuarios.php'</script>";
   }
?>
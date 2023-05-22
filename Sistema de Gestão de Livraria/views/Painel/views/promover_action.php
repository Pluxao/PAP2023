<?php
    require '../../config.php';
    require '../../verificar.php';
    require '../../admin1.php';

        $id = filter_input(INPUT_POST, 'id');
        $estado = filter_input(INPUT_POST, 'estado');
        if($id && $estado){
        $sql = $pdo->prepare("UPDATE usuarios SET estado = :estado WHERE id = :id");
        $sql->bindValue(':estado', $estado);
        $sql->bindValue(':id', $id);
        $sql->execute();

        echo "<script>alert('O usuário foi promovido para Administrador!')</script>";
        echo "<script>window.open('./promover.php', '_self')</script>";
        exit();
    }else{
        echo "<script>alert('Desculpe, ocorreu um erro, tente novamente!')</script>";
        echo "<script>window.open('./editarperfil.php', '_self')</script>";
        exit();
    }
?>
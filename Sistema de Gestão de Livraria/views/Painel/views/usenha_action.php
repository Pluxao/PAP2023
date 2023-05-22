<?php
    require '../../config.php';
    require '../../verificar1.php';
   require '../../user1.php';

        $id = filter_input(INPUT_POST, 'id');
        $senha = filter_input(INPUT_POST, 'senha');
        $confsenha = filter_input(INPUT_POST, 'confsenha');

    if($senha && $confsenha) {

        if($senha == $confsenha){
            $sql = $pdo->prepare("UPDATE usuarios SET senha = :senha, confsenha = :confsenha WHERE id = :id");
            $sql->bindValue(':senha', md5($senha));
            $sql->bindValue(':confsenha', md5($confsenha));
            $sql->bindValue(':id', $id);
            $sql->execute();

            echo "<script>alert('A sua senha foi actualizada!')</script>";
            echo "<script>window.open('./umeuperfil.php', '_self')</script>";
            exit();
        }else{
            echo "<script>alert('As senhas colocadas são diferentes, tente novamente!')</script>";
            echo "<script>window.open('../views/umeuperfil.php', '_self')</script>";
        }
    }else{
        echo "<script>alert('Aconteceu algum erro, tente novamente!')</script>";
            echo "<script>window.open('./umeuperfil.php', '_self')</script>";
            exit();
    }
?>
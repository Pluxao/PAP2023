<?php
    require '../../config.php';
    require '../../verificar.php';
    require '../../admin1.php';

        $id = filter_input(INPUT_POST, 'id');
        $user = filter_input(INPUT_POST, 'user');
        $pnome = filter_input(INPUT_POST, 'pnome');
        $unome = filter_input(INPUT_POST, 'unome');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $telefone = filter_input(INPUT_POST, 'telefone');
        $nasc = filter_input(INPUT_POST, 'nasc');
        $genero = filter_input(INPUT_POST, 'genero');
        $estado = filter_input(INPUT_POST, 'estado');


    if($user && $pnome && $unome && $email && $telefone && $nasc && $genero && $estado){
        $sql = $pdo->prepare("SELECT *FROM usuarios WHERE email = :email OR user = :user");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':user', $user);
        $sql->execute();

        if($sql->rowCount() === 1){
        $sql = $pdo->prepare("UPDATE usuarios SET user = :user, pnome = :pnome, unome = :unome, email = :email, telefone = :telefone, nasc = :nasc, genero = :genero, estado = :estado WHERE id = :id");
        $sql->bindValue(':user', $user);
        $sql->bindValue(':pnome', $pnome);
        $sql->bindValue(':unome', $unome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':nasc', $nasc);
        $sql->bindValue(':genero', $genero);
        $sql->bindValue(':estado', $estado);
        $sql->bindValue(':id', $id);
        $sql->execute();

        echo "<script>alert('Os seus dados foram actualizados!')</script>";
        echo "<script>window.open('./usuarios.php', '_self')</script>";
        exit();
    }else{
        echo "<script>alert('Desculpe, ocorreu um erro, tente novamente!')</script>";
        echo "<script>window.open('./usuarios.php', '_self')</script>";
        exit();
    }
}
else{
    echo "<script>alert('Prencha todos os campos!')</script>";
    echo "<script>window.open('./usuarios.php', '_self')</script>";
    exit();
}
?>
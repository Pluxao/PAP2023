<?php

    session_start();
    require 'config.php';

$user = filter_input(INPUT_POST, 'user');
$senha = filter_input(INPUT_POST, 'senha');
if($user && $senha){
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE user = :user AND senha = :senha");    
    $sql->bindValue(":user", $user);
    $sql->bindValue(":senha", md5($senha));
    $sql->execute();

    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if($sql->rowCount() > 0){
        if($row['estado'] == 'Admin'){
            $_SESSION['id'] = $row['id'];
            echo "<script>alert('Logado com sucesso!')</script>";
            echo "<script>window.location = 'home.php'</script>";
        }elseif($row['estado'] == 'Utilizador'){
            $_SESSION['id'] = $row['id'];
            echo "<script>alert('Logado com sucesso!')</script>";
            echo "<script>window.location = './uhome.php'</script>";
        }else{
            echo "Erro";
        }
    }
    else{
        echo "<script>alert('Email ou senha icorreta!')</script>";
        echo "<script>window.location = 'login.php'</script>";
    }
}else{
echo "<script>alert('Prencha todos os campos para fazer login!')</script>";
echo "<script>window.location = 'login.php'</script>";
}



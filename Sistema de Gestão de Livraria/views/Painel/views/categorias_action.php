<?php
require '../../config.php';
require '../../verificar1.php';
require '../../admin1.php';

$nome_categoria = filter_input(INPUT_POST, 'nome_categoria');
$cadastrador_categoria = filter_input(INPUT_POST, 'cadastrador_categoria');

if($nome_categoria && $cadastrador_categoria){
    $sql = $pdo->prepare("SELECT *FROM livros_categorias WHERE nome_categoria = :nome_categoria");
    $sql->bindValue(':nome_categoria', $nome_categoria);
    $sql->execute();    

    if($sql->rowCount() === 0){
        $sql = $pdo->prepare("INSERT INTO livros_categorias (nome_categoria, cadastrador_categoria) VALUES(:nome_categoria, :cadastrador_categoria)");
        $sql->bindValue(':nome_categoria', $nome_categoria);
        $sql->bindValue(':cadastrador_categoria', $cadastrador_categoria);
        $sql->execute();

        echo "<script>alert('Nova categoria adicionada: $nome_categoria')</script>";
        echo "<script>window.open('categorias.php', '_self')</script>";
        exit();
    }
    else{
        echo "<script>alert('Esta categoria já existe, crie outra!')</script>";
        echo "<script>window.open('categorias.php', '_self')</script>";
        exit();
    }
}
else{
    echo "<script>alert('Coloque o nome da categoria!')</script>";
    echo "<script>window.open('categorias.php', '_self')</script>";
    exit();
}
?>
<?php
    require 'config.php';
    require 'verificar.php';
    require 'admin.php';
    
    $cod = filter_input(INPUT_GET, 'cod');
    /* Remover do carrinho */
    if($cod){
        $idProduto = $_GET['cod'];
        unset( $_SESSION['itens'][$idProduto]);
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=acarrinho.php">';
    }else{
        echo"Erro grave";
    }
?>
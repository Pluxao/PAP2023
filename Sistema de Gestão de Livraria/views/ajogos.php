<?php
foreach($_SESSION['dados'] as $produtos){
        extract($produtos);
        $dados .= "Nome do Produto: ".$produtos['nome']."<br>";
        $dados .= "Nº de pedidos: ".$produtos['qtd']."<br>";
        $dados .= "Preço do Produto: ".number_format($produtos['preco_pedido'],2,",",".")."&nbsp;KZ$<br>";
        $dados .= "Valor Total: ".number_format($produtos['total'],2,",",".")."&nbsp;KZ$<br>";
        $dados .= "<hr>";
        unset( $_SESSION['dados']);
    }
    
    
    ?>
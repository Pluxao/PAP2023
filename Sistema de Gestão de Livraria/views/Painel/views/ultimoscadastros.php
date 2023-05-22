<?php
     require '../../config.php';
	$count = [];
    $ultcad = $pdo->query("SELECT *FROM usuarios ORDER BY id DESC LIMIT 3");
	if($ultcad->rowCount() > 0){
        $count = $ultcad->fetchALL(PDO::FETCH_ASSOC);
    }	

    $livroscount = [];
    $cadlivros = $pdo->query("SELECT *FROM livros ORDER BY cod DESC LIMIT 3");
	if($cadlivros->rowCount() > 0){
        $livroscount = $cadlivros->fetchALL(PDO::FETCH_ASSOC);
    }	
?>
<?php
require 'config.php';
require 'verificar.php';
require 'admin.php';

if (!empty($_GET['file'])) {
    $nomeArquivo = basename($_GET['file']);
    $caminhoArquivo = "painel/views/livros_upload/" . $nomeArquivo;
    $titulo_baixado = filter_input(INPUT_GET, 'titulo_baixado');
    $cod_baixado = filter_input(INPUT_GET, 'cod_baixado');
    $disponibilidade_baixado = filter_input(INPUT_GET, 'disponibilidade_baixado');
    $preco_baixado = filter_input(INPUT_GET, 'preco_baixado');
    $estensão = '.pdf';

    if (!empty($nomeArquivo) && file_exists($caminhoArquivo)) {
        $sql = $pdo->prepare("INSERT INTO baixados (iduser, nome_baixado, titulo_baixado, cod_baixado, disponibilidade_baixado,preco_baixado) VALUES (?,?,?,?,?,?)");
        $sql->bindParam(1, $consulta['id']);
        $sql->bindParam(2, $nomeArquivo);
        $sql->bindParam(3, $titulo_baixado);
        $sql->bindParam(4, $cod_baixado);
        $sql->bindParam(5, $disponibilidade_baixado);
        $sql->bindParam(6, $preco_baixado);
        $sql->execute();

        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$titulo_baixado$estensão");
        header("Content-Type: application/pdf");
        header("Content-Transfer-Encoding: binary");
        readfile($caminhoArquivo);
        exit;
    }
}
?>
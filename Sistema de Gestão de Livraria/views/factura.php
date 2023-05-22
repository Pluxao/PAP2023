<?php
require 'config.php';
require 'verificar.php';
require 'admin.php';
require '../vendor/autoload.php';

$iduser = filter_input(INPUT_GET, 'iduser');
$nome_baixado = filter_input(INPUT_GET, 'nome_baixado');
$titulo_baixado = filter_input(INPUT_GET, 'titulo_baixado');
$cod_baixado = filter_input(INPUT_GET, 'cod_baixado');
$disponibilidade_baixado = filter_input(INPUT_GET, 'disponibilidade_baixado');
$preco_baixado = filter_input(INPUT_GET, 'preco_baixado');

$categorias = [];
$cat = $pdo->query("SELECT *FROM livros_categorias");
if ($cat->rowCount() > 0) {
    $categorias = $cat->fetchALL(PDO::FETCH_ASSOC);
}

$cliente = [];
$sql = $pdo->prepare("SELECT *FROM usuarios WHERE id = :iduser");
$sql->bindValue(':iduser', $iduser);
$sql->execute();
if ($sql->rowCount() > 0) {
    $cliente = $sql->fetch(PDO::FETCH_ASSOC);
}
$capa = [];
$sql = $pdo->prepare("SELECT *FROM livros WHERE cod = :cod_baixado");
$sql->bindValue(':cod_baixado', $cod_baixado);
$sql->execute();
if ($sql->rowCount() > 0) {
    $capa = $sql->fetch(PDO::FETCH_ASSOC);
}


use Dompdf\Dompdf;

if ($iduser && $nome_baixado && $titulo_baixado && $cod_baixado && $disponibilidade_baixado && $preco_baixado) {

$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-pt'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<title>Fatura da compra</title>";
$dados .= "<style>
            body {
                font-family: Arial, sans-serif;
                font-size: 14px;
                line-height: 1.5;
                color: #333;
                background-color: #fff;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 30px;
                border: 1px solid #ccc;
            }
            h1, h2 {
                font-weight: bold;
                margin: 0;
                line-height: 1.2;
            }
            h1 {
                font-size: 28px;
                color: #333;
            }
            h2 {
                font-size: 20px;
                color: #666;
            }
            table {
                width: 100%;
                margin-bottom: 20px;
                border-collapse: collapse;
            }
            table th, table td {
                padding: 10px;
                border: 1px solid #ccc;
            }
            table th {
                text-align: left;
                font-weight: bold;
            }
            table td {
                text-align: right;
            }
            .total {
                font-weight: bold;
                font-size: 22px;
                color: #333;
            }
        </style>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<div class='container'>";
$dados .= "<h1 class='text-align: center'><img style='width: 179px' src='img/loongoka-logo1.png'></h1>";
$dados .= "<h1>Fatura da compra</h1>";
$dados .= "<table>
                <tr>
                    <th>Nome do Cliente</th>
                    <td>$cliente[pnome]&nbsp;$cliente[unome]</td>
                </tr>
                <tr>
                    <th>Email do Cliente</th>
                    <td>$cliente[email]</td>
                </tr>
                <tr>
                    <th>Título do Livro:</th>
                    <td>$titulo_baixado</td>
                </tr>
                <tr>
                    <th>Capa do Livro:</th>
                    <td><img style='width: 179px' src='painel/views/capas_upload/$capa[img_livro]'></td>
                </tr>
                <tr>
                    <th>Identificador do Livro</th>
                    <td>$cod_baixado</td>
                </tr>
                <tr>
                    <th>Disponibilidade do Livro:</th>
                    <td>$disponibilidade_baixado</td>
                </tr>
                <tr>
                    <th>Preço do Livro:</th>
                    <td>".number_format($preco_baixado, 2, ',', '.')." AOA</td>
                </tr>
                <tr>
                    <th>Total Pago:</th>
                    <td class='total'>".number_format($preco_baixado, 2, ',', '.') ." AOA</td>
                </tr>
            </table>";
$dados .= "</div>";
$dados .= "<br><br><h1 style='font-size: 12px; text-align:center;'>Muito obrigado pela preferencia, Volte sempre!</h1>";
$dados .= "</body>";
$dados .= "</html>";

}
$dompdf = new Dompdf(['enable_remote' => true]);
$dompdf->loadHtml($dados);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('Fatura.pdf');
        
?>


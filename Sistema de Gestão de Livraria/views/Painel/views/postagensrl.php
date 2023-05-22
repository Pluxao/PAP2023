<?php
require '../../config.php';
require '../../verificar.php';
require '../../admin1.php';
require '../../../vendor/autoload.php';

use Dompdf\Dompdf;

$lista = [];
$sql = $pdo->query("SELECT *FROM usuarios");
if ($sql->rowCount() > 0) {
	$lista = $sql->fetchALL(PDO::FETCH_ASSOC);
}

$categorias = [];
$cat = $pdo->query("SELECT *FROM livros_categorias");
if ($cat->rowCount() > 0) {
	$categorias = $cat->fetchALL(PDO::FETCH_ASSOC);
}

$postagens = $pdo->query("SELECT COUNT(id_post) AS post FROM posts");
$postagens->execute();
$totalposts = $postagens->fetch(PDO::FETCH_ASSOC);

$coment = $pdo->query("SELECT COUNT(id_comentario) AS comentario FROM comentarios");
$coment->execute();
$totalcoment = $coment->fetch(PDO::FETCH_ASSOC);

$listapost = [];
$posts = $pdo->query("SELECT *FROM posts, usuarios WHERE posts.postador = usuarios.id");
if ($posts->rowCount() > 0) {
	$listapost = $posts->fetchALL(PDO::FETCH_ASSOC);
}
$hoje = date('d/m/Y');

$dados = '
<!DOCTYPE html>
<html lang="pt-pt">
<head>
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">
</head>
<body>';
$dados .='				
	<img src="../assets/img/loongoka-logo1.png" style="width:300px; text-align: center;" class="navbar-brand"
	<div class="text-center"><h1 class="text-center">Relatório dos Postes Feitos no Sistema</h1></div>
	<div>
		<h3>Painel >> Postagens >> Relatório</h3>
		<h3>Relatório: Postagens</h3>
		<h3>Data de Emissão: '.$hoje.'</h3>
	</div>
	<div>
		<p class="alert alert-success text-center" style="color: black;">Total de Postes Feitos no Sistema</p>
		<h3 class="text-center text-success">'.$totalposts["post"].'</h3>
	</div>';
$dados .='	
	<div>
		<p class="alert alert-danger text-center" style="color: black;">Total de Comentários Feitos nas Postagens</p>
		<h3 class="text-center text-success">'.$totalcoment["comentario"].'</h3>	
	</div>';
$dados .= '
	<table id="add-row" class="display table table-striped table-hover">
		<tr>
			<th>Título da Postagem</th>
			<th>Postagem</th>
			<th>Nome do Postador</th>
			<th>Data da Postagem</th>
		</tr>';
foreach ($listapost as $postagem) {
$dados .= '
		</tbody>
			<tr>
				<td>' . $postagem['titulo_post'] . '</td>
				<td>' . $postagem['post'] . '</td>
				<td>' . $postagem['pnome'] . '&nbsp;&nbsp;' . $postagem['unome'] . '</td>
				<td>' . date('d/m/Y', strtotime($postagem['data_post'])). '</td>
			</tr>
	';
}
$dados .= '
		</tbody>
		<footer style"text-align:right;">
			<img src="../assets/img/loongoka-logo1.png" style="width:179px;">
		</footer>
	</table>
</body>';

$dompdf = new Dompdf(['enable_remote' => true]);
$dompdf->loadHtml($dados);
$dompdf->setPaper('A4', 'portrait');

$dompdf->render();
$dompdf->stream();

?>
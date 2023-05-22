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
$sql = $pdo->query("SELECT COUNT(id) AS pnome FROM usuarios");
$contar = $sql->fetch(PDO::FETCH_ASSOC);

$dinheiro = $pdo->query("SELECT SUM(preco_baixado) AS total FROM baixados");
$dinheiro->execute();
$dinheirototal = $dinheiro->fetch(PDO::FETCH_ASSOC);

$usuariosmasculinos = $pdo->query("SELECT COUNT(id) AS pnome FROM usuarios WHERE genero LIKE 'Masculino'");
$usuariosmasculinos->execute();
$contarm = $usuariosmasculinos->fetch(PDO::FETCH_ASSOC);

$usuariosfemeninos = $pdo->query("SELECT COUNT(id) AS pnome FROM usuarios WHERE genero LIKE 'Femenino'");
$usuariosfemeninos->execute();
$contarf = $usuariosfemeninos->fetch(PDO::FETCH_ASSOC);
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
$dados .= '				
	<img src="../assets/img/loongoka-logo1.png" style="width:300px; text-align: center;" class="navbar-brand"
	<div class="text-center"><h1 class="text-center">Relatório dos Usuários do Sistema</h1></div>
	<div>
		<h3>Painel >> Usuários >> Relatório</h3>
		<h3>Relatório: Usuários</h3>
		<h3>Data de Emissão: ' . $hoje . '</h3>
	</div>
						
					
	<div class="text-center">
		<div style="whidth:100%; background: #ff9300; color: white; padding: 2%; margin: 2%">
			<p>Total de Usuários no Sistema</p>
			' . $contar["pnome"] . '
		</div>
		<div  style="whidth:100%; background: green; color: white; padding: 2%; margin: 2%">
			<p>Total de Usuários Masculinos</p>
			' . $contarm["pnome"] . '
		</div>
		<div  style="whidth:100%; background:  rgb(255,100,100); color: white; padding: 2%; margin: 2%">
			<p>Total de Usuários Femeninos</p>
			' . $contarf["pnome"] . '
		</div>
	<div>';
$dados .= '
	<table id="add-row" class="display table table-striped table-hover">
		<tr>
		<th>Usuário</th>
		<th>Nome</th>
		<th>Email</th>
		<th>Telefone</th>
		<th>Data de nascimento</th>
		<th>Gênero</th>
		<th>Estado</th>
		</tr>';
foreach ($lista as $usuarios) {
	$dados .= '
		</tbody>
			<tr>
				<td>' . $usuarios['user'] . '</td>
				<td>' . $usuarios['pnome'] . '&nbsp;&nbsp;' . $usuarios['unome'] . '</td>
				<td>' . $usuarios['email'] . '</td>
				<td>' . $usuarios['telefone'] . '</td>
				<td>' . date('d/m/Y', strtotime($usuarios['nasc'])) . '</td>
				<td>' . $usuarios['genero'] . '</td>
				<td>' . $usuarios['estado'] . '</td>
			</tr>
	';
}
$dados .= '
		</tbody>
	</table>
	<footer>
		<img src="../assets/img/loongoka-logo1.png" style="width:179px;">
	</footer>
</body>
';

$dompdf = new Dompdf(['enable_remote' => true]);
$dompdf->loadHtml($dados);
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();
$dompdf->stream();

?>
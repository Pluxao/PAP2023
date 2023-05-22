<?php
require '../../config.php';
require '../../verificar1.php';
require 'ultimoscadastros.php';
require '../../admin1.php';

$lista = [];
$sql = $pdo->query("SELECT *FROM usuarios");
if ($sql->rowCount() > 0) {
	$lista = $sql->fetchALL(PDO::FETCH_ASSOC);
}
$consultar = $pdo->query("SELECT COUNT(pnome) *FROM usuarios");

$id = filter_input(INPUT_POST, 'id');
$pnome = filter_input(INPUT_POST, 'pnome');
$estado = filter_input(INPUT_POST, 'estado');
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

$adm = $pdo->query("SELECT COUNT(id) AS pnome FROM usuarios WHERE estado LIKE 'Admin'");
$adm->execute();
$mda = $adm->fetch(PDO::FETCH_ASSOC);

$normal = $pdo->query("SELECT COUNT(id) AS pnome FROM usuarios WHERE estado LIKE 'Utilizador'");
$normal->execute();
$mdano = $normal->fetch(PDO::FETCH_ASSOC);

$categorias = $pdo->query("SELECT COUNT(id_categoria) AS nome_categoria FROM livros_categorias");
$categorias->execute();
$categoriaTotal = $categorias->fetch(PDO::FETCH_ASSOC);

$livros = $pdo->query("SELECT COUNT(cod) AS livro FROM livros");
$livros->execute();
$totalLivros = $livros->fetch(PDO::FETCH_ASSOC);

$baixados = $pdo->query("SELECT COUNT(identificador) AS nome_baixado FROM baixados");
$baixados->execute();
$totalLivrosbaixados = $baixados->fetch(PDO::FETCH_ASSOC);

$pagos = $pdo->query("SELECT COUNT(identificador) AS titulo_baixado FROM baixados WHERE disponibilidade_baixado LIKE 'Pago'");
$pagos->execute();
$totalpagos = $pagos->fetch(PDO::FETCH_ASSOC);

$gratis = $pdo->query("SELECT COUNT(identificador) AS gratis FROM baixados WHERE disponibilidade_baixado LIKE 'Grátis'");
$gratis->execute();
$totalgratis = $gratis->fetch(PDO::FETCH_ASSOC);

$postagens = $pdo->query("SELECT COUNT(id_post) AS post FROM posts");
$postagens->execute();
$totalposts = $postagens->fetch(PDO::FETCH_ASSOC);

$coment = $pdo->query("SELECT COUNT(id_comentario) AS comentario FROM comentarios");
$coment->execute();
$totalcoment = $coment->fetch(PDO::FETCH_ASSOC);

$categorias_mais_livros = $pdo->prepare("SELECT c.nome_categoria, COUNT(*) AS total_livros 
	FROM livros l 
	JOIN livros_categorias c ON l.cod_categoria = c.id_categoria 
	GROUP BY l.cod_categoria 
	ORDER BY total_livros ;
	");
$categorias_mais_livros->execute();
$cat_mais_livro = $categorias_mais_livros->fetchALL(PDO::FETCH_ASSOC);

$dhoje = $pdo->query("SELECT COUNT(*) AS hoje FROM baixados WHERE DATE(hora_baixado) = CURDATE();");
$dhoje->execute();
$dhojecount = $dhoje->fetch(PDO::FETCH_ASSOC);

$mes = $pdo->query("SELECT COUNT(*) AS mes FROM baixados WHERE YEAR(hora_baixado) = YEAR(CURDATE()) AND MONTH(hora_baixado) = MONTH(CURDATE())");
$mes->execute();
$mescount = $mes->fetch(PDO::FETCH_ASSOC);

$ano = $pdo->query("SELECT COUNT(*) AS ano FROM baixados WHERE YEAR(hora_baixado) = YEAR(CURDATE());");
$ano->execute();
$anoactual = $ano->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/loongoka.png" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: { "families": ["Lato:300,400,700,900"] },
			custom: { "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css'] },
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<style>
		#media {
			opacity: 0;
			transition: opacity 2s ease-in-out;
		}

		#media.visible {
			opacity: 1;
		}
	</style>

</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				<a href="../../home.php" class="logo">
					<img src="../assets/img/loongoka-logo.png" alt="navbar brand" class="navbar-brand"
						style="width: 210px;">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
					data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
								aria-expanded="false">
								<div class="avatar-sm">
									<img src="img_upload/<?php echo $consulta['imagem_perfil'] ?>" alt="..."
										class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img
													src="img_upload/<?php echo $consulta['imagem_perfil'] ?>"
													alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>
													<?php echo $consulta['pnome'] ?>&nbsp;&nbsp;
													<?php echo $consulta['unome']; ?>
												</h4>
												<p class="text-muted">
													<?php echo $consulta['email']; ?>
												</p>
												<a href="meuperfil.php" class="btn btn-xs btn-secondary btn-sm">
													Ver Perfil
												</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="meuperfil.php">Meu Perfil</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="meuperfil.php">Editar Perfil</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../../logout.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="img_upload/<?php echo $consulta['imagem_perfil'] ?>" alt="Foto de perfil"
								class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $consulta['pnome']; ?>&nbsp&nbsp
									<?php echo $consulta['unome']; ?>
									<span class="user-level">
										<?php echo $consulta['estado']; ?>
									</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="meuperfil.php">
											<span class="link-collapse">Meu Perfil</span>
										</a>
									</li>
									<li>
										<a href="meuperfil.php">
											<span class="link-collapse">Editar Perfil</span>
										</a>
									</li>
									<li>
										<a href="../../logout.php">
											<span class="link-collapse">Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li>
										<a href="../views/dashboard.php">
											<span class="sub-item">Dashboard</span>
										</a>
									</li>
									<li>
										<a href="usuarios.php">
											<span class="sub-item">Tabela de Usuários</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Componentes</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-chart-line"></i>
								<p>Actividades</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="postagens.php">
											<span class="sub-item">Postagens</span>
										</a>
									</li>
									<li>
										<a href="comentarios.php">
											<span class="sub-item">Comentários</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-laptop"></i>
								<p>Loongoka</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="../../home.php">
											<span class="sub-item">Início</span>
										</a>
									</li>
									<li>
										<a href="../../atodoslivros.php">
											<span class="sub-item">Livros</span>
										</a>
									</li>
									<li>
										<a href="../../aplataforma.php">
											<span class="sub-item">A plataforma</span>
										</a>
									</li>
									<li>
										<a href="../../atermos.php">
											<span class="sub-item">Termos de Uso</span>
										</a>
									</li>
									<li>
										<a href="../../apoliticas.php">
											<span class="sub-item">Políticas de Privacidade</span>
										</a>
									</li>
									<li>
										<a href="../../blog.php">
											<span class="sub-item">Blog</span>
										</a>
									</li>
									<li>
										<a href="../../jogos.php">
											<span class="sub-item">Passatempos</span>
										</a>
									</li>
									<li>
										<a href="../../acontactos.php">
											<span class="sub-item">Contactos</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-book"></i>
								<p>Livros Loongoka</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="./livros.php">
											<span class="sub-item">Lirvos</span>
										</a>
									</li>
									<li>
										<a href="./categorias.php">
											<span class="sub-item">Categorias</span>
										</a>
									</li>
									<li>
										<a href="baixados.php">
											<span class="sub-item">Livros Baixados</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-anchor"></i>
								<p>Outras Opções</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="../../logout.php">
											<span class="sub-item">Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								</li>
								<h5 class="text-white op-7 mb-2"><i class="flaticon-home">&nbsp;&nbsp;</i><i
										class="flaticon-right-arrow"></i>&nbsp;&nbsp;Dashboard</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Usuários Cadastrados</div>
									<div class="card-category">Distribuição Por Sexo</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Usuários</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Masculinos</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Femeninos</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Total de usuários distribuidos por níveis de acesso</div>
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
											<div>
												<h6 class="fw-bold text-uppercase text-success op-8">Total De usuários
												</h6>
												<h3 class="fw-bold">
													<?php echo $contar['pnome']; ?>
												</h3>
											</div>
										</div>
										<div class="col-md-8">
											<div id="chart-container">
												<canvas id="totalIncomeChart"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Gráfico dos Livros</div>
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
											<div>
												<h6 class="fw-bold text-uppercase alert text-white"
													style="background-color: #2BB930">Total do
													valor das vendas</h6>
												<h3 class="fw-bold text-center">
													<?php echo number_format($dinheirototal['total'], 2, ",", "."); ?>&nbsp;AOA
												</h3>
												<h6 class="fw-bold text-uppercase alert text-white bg-danger">
													Total de livros no Sistema</h6>
												<h3 class="fw-bold text-center">
													<?php echo "$totalLivros[livro]" ?>
												</h3>
											</div>
										</div>
										<div class="col-md-8">
											<div id="chart-container">
												<h6 class="fw-bold text-uppercase text-center">
													Total de livros baixados</h6>
												<h3 class="fw-bold text-center">
													<?php echo "$totalLivrosbaixados[nome_baixado]" ?>
													<canvas id="totalIncomeChart1"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="row py-3">
										<div class="col-md-6 d-flex flex-column justify-content-around">
											<h3>Quantidade de livros distribuidos por categorias</h3>
										</div>
										<div class="col-md-12">
											<div id="chart-container">
												<canvas id="totalIncomeChart3"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Livros baixados por Dia, Mês e Ano</div>
									<div class="row py-3">
										<div class="col-md-12">
											<div id="chart-container">
												<canvas id="totalIncomeChart4"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Blog</div>
									<div class="row py-3">
										<div class="col-md-6">
											<div id="chart-container">
												<h6 class="fw-bold text-uppercase alert text-white bg-danger">
													Total de Postagens Feitas</h6>
												<h3 class="fw-bold text-center text-success">
													<?php echo "$totalposts[post]" ?>
												</h3>
											</div>
										</div>
										<div class="col-md-6">
											<div id="chart-container">
												<h6 class="fw-bold text-uppercase alert text-white bg-danger">
													Total de Comentários</h6>
												<h3 class="fw-bold text-center text-success">
													<?php echo "$totalcoment[comentario]" ?>
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-header">
									<p>Clique no botão para ver a média de Livros baixados neste Ano</p>
									<button onclick="ver_media()" id="om" class="btn-primary">Mostrar</button>
									<div class="card-title" id="media" hidden>
										Foi baixado uma média de <h1>
											<?php $total = $anoactual['ano'];
											$media = $total / 12;
											echo $media ?>
											livro(s) por mês
										</h1>
									</div>
								</div>
								<div id="chart-container">
									<canvas id="downloadsChart5"></canvas>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-header">
									<div class="card-title"><img src="../assets/img/loongoka-logo1.png"
											alt="navbar brand" class="navbar-brand" style="width: 210px;"></div>
									<div class="card-title text-uppercase">sistema de gestão de livraria</div>
								</div>
								<div class="card-body text-center">
									<img src="../assets/img/leitor.png" alt="" style="max-width:100%;">
									<h1>A nossa livraria online</h1>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">
											<h1>Últimos usuários cadastrados</h1>
										</div>
									</div>
								</div>
								<div class="card-body">
									<?php foreach ($count as $ultimos): ?>
										<div class="d-flex">
											<svg style="color: #ff9300" xmlns="http://www.w3.org/2000/svg" width="50"
												height="50" fill="currentColor" class="bi bi-database-check"
												viewBox="0 0 16 16">
												<path
													d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z" />
												<path
													d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z" />
											</svg>
											<div class="flex-1 ml-3 pt-1">
												<h6 class="text-uppercase fw-bold mb-1">
													<?php echo $ultimos['pnome']; ?>&nbsp;&nbsp;
													<?php echo $ultimos['unome']; ?>
												</h6>
												<h2>
													<?php echo $ultimos['estado']; ?>
												</h2>
											</div>
											<div class="float-right pt-1">
												<h4 class="text-muted">Data de Cadastro</h4>
												<small class="text-muted">
													<?php echo $ultimos['datacad']; ?>
												</small>
											</div>
										</div>
										<div class="separator-dashed"></div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">
											<h1>Últimos Livros cadastrados</h1>
										</div>
									</div>
								</div>
								<div class="card-body">
									<?php foreach ($livroscount as $ultimos): ?>
										<div class="d-flex">
											<i style="color: #ff9300; font-size:50px;" class="fa fa-book"></i>
											<div class="flex-1 ml-3 pt-1">
												<h6 class="text-uppercase fw-bold mb-1">
													<?php echo $ultimos['titulo']; ?>
												</h6>
											</div>
											<div class="float-right pt-1">
												<h4 class="text-muted">Data de Cadastro</h4>
												<small class="text-muted">
													<?php echo $ultimos['livro_criado']; ?>
												</small>
											</div>
										</div>
										<div class="separator-dashed"></div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<footer class="footer">
					<div class="container-fluid">
						<nav class="pull-left">
							<ul class="nav">
								<li class="nav-item">
									<a class="nav-link" href="../../home.php">
										Loongoka
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../../apoliticas.php">
										Políticas de Privacidade
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../../atermos.php">
										Termos de Usuários
									</a>
								</li>
							</ul>
						</nav>
						<div class="copyright ml-auto">
							<h1></h1>2022, feito com <i class="fa fa-heart heart text-danger"></i> by <a
								href="https://www.themekita.com">Abel Canas</a> e <a
								href="https://www.themekita.com">Santos Francisco</a>
						</div>
					</div>
				</footer>
			</div>
		</div>
		<!--   Core JS Files   -->
		<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
		<script src="../assets/js/core/popper.min.js"></script>
		<script src="../assets/js/core/bootstrap.min.js"></script>

		<!-- jQuery UI -->
		<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

		<!-- jQuery Scrollbar -->
		<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

		<!-- Chart JS -->
		<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

		<!-- jQuery Sparkline -->
		<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

		<!-- Chart Circle -->
		<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

		<!-- Datatables -->
		<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

		<!-- Bootstrap Notify -->
		<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

		<!-- jQuery Vector Maps -->
		<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
		<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

		<!-- Sweet Alert -->
		<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

		<!-- Atlantis JS -->
		<script src="../assets/js/atlantis.min.js"></script>

		<!-- Atlantis DEMO methods, don't include it in your project! -->
		<script src="../assets/js/index.js"></script>

		<script>
			Circles.create({
				id: 'circles-1',
				radius: 50,
				maxValue: <?php echo "$contar[pnome]"; ?>,
				width: 10,
				value: <?php echo "$contar[pnome]"; ?>,
				text: <?php echo "$contar[pnome]"; ?>,
				colors: ['#f1f1f1', '#FF9E27'],
				duration: 400,
				wrpClass: 'circles-wrp',
				textClass: 'circles-text',
				styleWrapper: true,
				styleText: true
			})
			Circles.create({
				id: 'circles-2',
				radius: 50,
				maxValue: <?php echo "$contar[pnome]"; ?>,
				width: 10,
				value: <?php echo "$contarm[pnome]"; ?>,
				text: <?php echo "$contarm[pnome]"; ?>,
				colors: ['#f1f1f1', '#2BB930'],
				duration: 400,
				wrpClass: 'circles-wrp',
				textClass: 'circles-text',
				styleWrapper: true,
				styleText: true
			})
			Circles.create({
				id: 'circles-3',
				radius: 50,
				maxValue: <?php echo "$contar[pnome]"; ?>,
				width: 10,
				value: <?php echo "$contarf[pnome]"; ?>,
				text: <?php echo "$contarf[pnome]"; ?>,
				colors: ['#f1f1f1', '#F25961'],
				duration: 400,
				wrpClass: 'circles-wrp',
				textClass: 'circles-text',
				styleWrapper: true,
				styleText: true
			})
			var barColor = [
				"skyblue",
				"white",
			];
			var barColors = [
				"#ff9300",
				"rgb(92, 138, 240)",
				"rgb(228, 82, 153)",
				"skyblue",
			];
			var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');
			var mytotalIncomeChart = new Chart(totalIncomeChart, {
				type: 'pie',
				data: {
					labels: ['Administradores', 'Usuários normais'],
					datasets: [{
						label: 'Admin e usuários',
						data: [<?php echo "$mda[pnome]" ?>, <?php echo "$mdano[pnome]" ?>],
						backgroundColor: barColor,
						borderColor: '#ff9300',
					}],
				},
			});

			var totalIncomeChart1 = document.getElementById('totalIncomeChart1').getContext('2d');
			var mytotalIncomeChart1 = new Chart(totalIncomeChart1, {
				type: 'pie',
				data: {
					labels: ['Pagos', 'Grátis'],
					datasets: [{
						label: 'Livros grástis e pagos',
						data: [<?php echo "$totalpagos[titulo_baixado]" ?>, <?php echo "$totalgratis[gratis]" ?>],
						backgroundColor: barColors,
						borderColor: 'white',
					}],
				},
			});

			$('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
				type: 'line',
				height: '70',
				width: '100%',
				lineWidth: '2',
				lineColor: '#ffa534',
				fillColor: 'rgba(255, 165, 52, .14)'
			});

			var barColors1 = [
				"#FF9300",
				"white",
				"skyblue",
			];

			var barColors3 = [
				"#F4A460",
				"#FFDEAD",
				"#FFE4C4",
				"#FF5300",
				"#D2691E",
				"#FF9300",
				"skyblue",
				"green",
				"yellow",
			];

			var lab = [
				<?php foreach ($cat_mais_livro as $maior) {
					echo "'" . $maior['nome_categoria'] . "',";
				}
				?>
			];
			var dados = [
				<?php
				foreach ($cat_mais_livro as $maior) {
					echo "'" . $maior['total_livros'] . "',";
				}
				?>
			];


			var totalIncomeChart3 = document.getElementById('totalIncomeChart3').getContext('2d');
			var mytotalIncomeChart3 = new Chart(totalIncomeChart3, {
				type: 'bar',
				data: {
					labels: lab,
					datasets: [{
						label: 'Gráfico de categorias',
						data: dados,
						backgroundColor: barColors3,
						borderColor: '#ff9300',
					}],
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: <?php echo "$totalLivros[livro]" ?> // Defina aqui o valor máximo para o eixo y

							}
						}]
					}
				}
			});


			var totalIncomeChart4 = document.getElementById('totalIncomeChart4').getContext('2d');
			var mytotalIncomeChart4 = new Chart(totalIncomeChart4, {
				type: 'bar',
				data: {
					labels: ['Hoje', 'Este Mês', 'Este Ano'],
					datasets: [{
						label: 'Livros baixados',
						data: [<?php echo "$dhojecount[hoje]" ?>, <?php echo "$mescount[mes]" ?>, <?php echo "$anoactual[ano]" ?>],
						backgroundColor: barColors,
						borderColor: 'black',
					}],
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: <?php echo "$totalLivrosbaixados[nome_baixado]" ?> // Defina aqui o valor máximo para o eixo y

							}
						}]
					}
				}
			});
		</script>
</body>

</html>

<?php

// Consulta para recuperar as quantidades de livros baixados para todos os meses
$result = $pdo->prepare("SELECT COUNT(*) as count, MONTH(hora_baixado) as month FROM baixados GROUP BY MONTH(hora_baixado)");

// Array para armazenar as quantidades de livros baixados para cada mês
$downloads_per_month = array_fill(0, 12, 0);

$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$downloads_per_month[$row['month'] - 1] = $row['count'];
}

?>



<script>
	var ctx = document.getElementById('downloadsChart5').getContext('2d');
	var downloadsChart5 = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
			datasets: [{
				label: 'Livros baixados por mês',
				data: <?php echo json_encode($downloads_per_month); ?>,
				borderColor: '#ff9300',
				fill: false
			}]
		}, options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						max: <?php echo "$totalLivrosbaixados[nome_baixado]" ?> // Defina aqui o valor máximo para o eixo y

					}
				}]
			}
		}
	});

</script>

<script>

	function ver_media() {
		var mediaDiv = document.getElementById("media");
		var but = document.getElementById("om");
		if (mediaDiv.hasAttribute("hidden")) {
			mediaDiv.removeAttribute("hidden");
			setTimeout(function () {
				mediaDiv.classList.add("visible");
				but.textContent = "Ocultar";

			}, 1); // Adiciona um pequeno atraso para permitir que o browser atualize o DOM antes de adicionar a classe
		} else {
			mediaDiv.classList.remove("visible");
			setTimeout(function () {
				mediaDiv.setAttribute("hidden", true);
				but.textContent = "Mostrar";
			}, 10); // Esconde o elemento depois da transição de 2 segundos
		}
	}
</script>
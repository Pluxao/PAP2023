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

$livro = [];
$cod = filter_input(INPUT_GET, 'cod');
if ($cod) {
	$sql = $pdo->prepare("SELECT *FROM livros, livros_categorias WHERE livros.cod_categoria = livros_categorias.id_categoria AND cod = :cod");
	$sql->bindValue(':cod', $cod);
	$sql->execute();

	if ($sql->rowCount() > 0) {
		$livro = $sql->fetch(PDO::FETCH_ASSOC);
	} else {
		header("location: livros.php");
	}
} else {
	header("location: livros.php");
}

$categorias = [];
$cat = $pdo->query("SELECT *FROM livros_categorias");
if ($cat->rowCount() > 0) {
	$categorias = $cat->fetchALL(PDO::FETCH_ASSOC);
}

if (isset($_POST["submit"])) {
	$titulo = filter_input(INPUT_POST, 'titulo');
	$editora = filter_input(INPUT_POST, 'editora');
	$edicao = filter_input(INPUT_POST, 'edicao');
	$classe = filter_input(INPUT_POST, 'classe');
	$data_lancamento = filter_input(INPUT_POST, 'data_lancamento');
	$cod_categoria = filter_input(INPUT_POST, 'cod_categoria');
	$disponibilidade = filter_input(INPUT_POST, 'disponibilidade');
	$preco = filter_input(INPUT_POST, 'preco');
	$cod = filter_input(INPUT_POST, 'cod');

	$sql = $pdo->prepare("SELECT *FROM livros WHERE titulo = :titulo AND editora = :editora AND edicao = :edicao AND classe = :classe");
	$sql->bindValue(':titulo', $titulo);
	$sql->bindValue(':editora', $editora);
	$sql->bindValue(':edicao', $edicao);
	$sql->bindValue(':classe', $classe);
	$sql->execute();

	if ($sql->rowCount() <= 1) {

		$sql = $pdo->prepare("UPDATE livros SET titulo = :titulo, editora = :editora, edicao = :edicao, classe = :classe, data_lancamento = :data_lancamento, cod_categoria = :cod_categoria, disponibilidade= :disponibilidade, preco = :preco WHERE cod = :cod");
		$sql->bindValue(':titulo', $titulo);
		$sql->bindValue(':editora', $editora);
		$sql->bindValue(':edicao', $edicao);
		$sql->bindValue(':classe', $classe);
		$sql->bindValue(':data_lancamento', $data_lancamento);
		$sql->bindValue(':cod_categoria', $cod_categoria);
		$sql->bindValue(':disponibilidade', $disponibilidade);
		$sql->bindValue(':preco', $preco);
		$sql->bindValue(':cod', $cod);
		$sql->execute();
		echo "<script>alert('O livro foi editado!')</script>";
		echo "<script>window.open('livros.php', '_self')</script>";
		exit();

	} else {
		echo "<script>alert('Este livro já existe!')</script>";
		echo "<script>window.open('livros.php', '_self')</script>";
	}
}

?>

<?php
$id = filter_input(INPUT_POST, 'id');
$pnome = filter_input(INPUT_POST, 'pnome');
$estado = filter_input(INPUT_POST, 'estado');
$sql = $pdo->query("SELECT COUNT(id) AS pnome FROM usuarios");
$contar = $sql->fetch(PDO::FETCH_ASSOC);

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
?>
<!DOCTYPE html>
<html lang="pt-pt">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Editar dados do usuário</title>
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
	<link rel="stylesheet" href="../../css/cad.css">
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
													<?php echo $consulta['pnome'] ?>&nbsp&nbsp
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
								<h2 class="text-white pb-2 fw-bold">Meu Perfil</h2>
								</li>
								<h5 class="text-white op-7 mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="30"
										height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
										<path
											d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
									</svg></i>&nbsp;&nbsp;
									<?php echo $consulta['pnome']; ?>&nbsp;&nbsp;
									<?php echo $consulta['unome']; ?>
								</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="row py-3">
									<section class="cadastrar">
										<div class="cadastrar_texto">
											<h1>Editar usuário</h1>
											<h2>Os dados dos usuários são protegidos pela lei da proteção dos dados
												pessoais(Lei n.º22/11, de 17 de Junho).</h2>

										</div>
										<div class="cadastrar_form" id="perfil">
											<form method="post">
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>Título</label>
														<input id="addOffice" type="text" class="form-control"
															value="<?php echo $livro['titulo']; ?>" name="titulo"
															required>
													</div>
												</div>

												<div class="col-md-6 pr-0">
													<div class="form-group form-group-default">
														<label>Editora/Escritor</label>
														<input id="addPosition" type="text" class="form-control"
															value="<?php echo $livro['editora']; ?>" name="editora"
															required>
													</div>
												</div>
												<div class="form-group form-group-default">
													<div class="col-md-6">
														<label>Edição/Volume</label>
														<select name="edicao" required>
															<option value="<?php echo $livro['edicao']; ?>"><?php echo $livro['edicao']; ?></option>
															<option value="">Escolha a Edição</option>
															<option value="Edição Única">Edição Única</option>
															<option value="1ª Edição">1ª Edição</option>
															<option value="2ª Edição">2ª Edição</option>
															<option value="3ª Edição">3ª Edição</option>
															<option value="4ª Edição">4ª Edição</option>
															<option value="Vol. 1">Volume 1</option>
															<option value="Vol. 2">Volume 2</option>
															<option value="Vol. 3">Volume 3</option>
															<option value="Vol. 4">Volume 4</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>Classe*</label>
														<select name="classe" required>
															<option value="<?php echo $livro['classe']; ?>"><?php echo $livro['classe']; ?></option>
															<option value="">Escolha a classe</option>
															<option value="Sem classe">Sem classe</option>
															<option value="1ª Classe">1ª Classe</option>
															<option value="2ª Classe">2ª Classe</option>
															<option value="3ª Classe">3ª Classe</option>
															<option value="4ª Classe">4ª Classe</option>
															<option value="5ª Classe">5ª Classe</option>
															<option value="6ª Classe">6ª Classe</option>
															<option value="7ª Classe">7ª Classe</option>
															<option value="8ª Classe">8ª Classe</option>
															<option value="9ª Classe">9ª Classe</option>
															<option value="10ª Classe">10ª Classe</option>
															<option value="11ª Classe">11ª Classe</option>
															<option value="12ª Classe">12ª Classe</option>
														</select>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group form-group-default">
														<label>Ano de Lançamento</label>
														<input id="addName" type="number"
															value="<?php echo $livro['data_lancamento']; ?>"
															class="form-control" name="data_lancamento" required>
													</div>
												</div>
												<input id="addPosition" type="text" class="form-control" hidden
													value="<?php echo $livro['cod']; ?>" name="cod">
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label for="">Categorias*</label>
														<select name="cod_categoria" required>
															<option value="<?php echo $livro['id_categoria']; ?>"><?php echo $livro['nome_categoria']; ?></option>
															<option value="">Escolha a categoria</option>
															<?php foreach ($categorias as $listagem): ?>
																<option value="<?php echo $listagem['id_categoria']; ?>">
																	<?php echo $listagem['nome_categoria']; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group form-group-default">
														<label for="">Pago*</label>
														<input type="radio" name="disponibilidade" checked value="<?php echo $livro['disponibilidade'];?>"><?php echo$livro['disponibilidade'];?><br>
														<input type="radio" name="disponibilidade" value="Pago"
															onclick="mostraPreco()"> Sim<br>
														<input type="radio" name="disponibilidade" value="Grátis"
															onclick="esconderPreco()">Não
													</div>
												</div>
												<div class="col-sm-6" id="div-preco" style="display:none;">
													<div class="form-group form-group-default">
														<label>Preço</label>
														<input id="preco" type="number" class="form-control"
															name="preco">
													</div>
												</div>
												<button name="submit" type="submit">Editar Livro</button>
											</form>
										</div>
									</section>
								</div>
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
							href="https://www.themekita.com">Abel Canas</a> e <a href="https://www.themekita.com">Santos
							Francisco</a>
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

	<script>
		function esconderPreco() {
			var radio = document.querySelector('input[name="disponibilidade"]:checked');
			var divPreco = document.getElementById('div-preco');
			var campoPreco = document.getElementById('preco');

			if (radio != null && radio.value === "Grátis") {
				divPreco.style.display = "none";
				campoPreco.removeAttribute('required');
				campoPreco.value = ""; // limpa o valor do campo de entrada de preço
			} else {
				divPreco.style.display = "block";
			}
		}

		function mostraPreco() {
			var radio = document.querySelector('input[name="disponibilidade"]:checked');
			var divPreco = document.getElementById('div-preco');
			var campoPreco = document.getElementById('preco');

			if (radio != null && radio.value === "Pago") {
				divPreco.style.display = "block";
				campoPreco.setAttribute('required', '');
			} else {
				divPreco.style.display = "none";
				campoPreco.removeAttribute('required');
			}
		}
	</script>
</body>

</html>
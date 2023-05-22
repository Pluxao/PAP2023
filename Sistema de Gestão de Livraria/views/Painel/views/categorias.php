<?php
require '../../config.php';
require '../../verificar1.php';
require '../../admin1.php';

if (!empty($_GET['search'])) {
	$lista = [];
	$data = $_GET['search'];
	$sql = $pdo->query("SELECT *FROM livros_categorias, usuarios WHERE livros_categorias.cadastrador_categoria = usuarios.id AND (nome_categoria LIKE '%$data%' OR criado_categoria LIKE '%$data%' OR cadastrador_categoria LIKE '%$data%' OR pnome LIKE '%$data%' OR unome LIKE '%$data%') ORDER BY id_categoria");
	if ($sql->rowCount() > 0) {
		$lista = $sql->fetchALL(PDO::FETCH_ASSOC);
	} else {
		echo "<script>alert('Resultado não encontrado')</script>";
		echo "<script>window.location = 'categorias.php'</script>";
	}
} else {
	$lista = [];
	$sql = $pdo->query("SELECT *FROM livros_categorias, usuarios WHERE livros_categorias.cadastrador_categoria = usuarios.id ORDER BY id_categoria");
	if ($sql->rowCount() > 0) {
		$lista = $sql->fetchALL(PDO::FETCH_ASSOC);
	}
}

?>
<!DOCTYPE html>
<html lang="pt-pt">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Categorias dos livros</title>
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
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Base de dados</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="dashboard.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="categorias.php">Categorias</a>
							</li>
						</ul>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<a class="btn btn-primary" href="">Relatório</a>
									<button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
										data-target="#addRowModal">
										<i class="fa fa-th" aria-hidden="true"></i>
										Nova categoria
									</button>
								</div>
							</div>
							<div class="card-body">
								<!-- Modal -->
								<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header no-bd">
												<h5 class="modal-title">
													<span class="fw-mediumbold">
														Nova</span>
													<span class="fw-light">
														Categoria
													</span>
												</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p class="small">Cadastrar nova categoria</p>
												<form method="post" action="./categorias_action.php">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<input id="addOffice" type="text" class="form-control"
																	hidden value="<?php echo $consulta['id']; ?>"
																	name="cadastrador_categoria">
																<input id="addOffice" type="text" class="form-control"
																	placeholder="Nome da categoria*"
																	name="nome_categoria">
															</div>
														</div>
													</div>
													<div class="modal-footer no-bd">
														<button type="submit" id="addRowButton"
															class="btn btn-primary">Adicionar</button>
														<button type="button" class="btn btn-danger"
															data-dismiss="modal">Fechar</button>
													</div>
											</div>
											</form>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="table-responsive">
										<div class="d-flex box-search">
											<input type="search" id="pesquisar" class="form-control w-25"
												placeholder="Pesquisar Usuários"
												style="padding: 1%; border-radius: 4px;">
											<button onclick="searchData()"
												style="background-color:#ff9300; border-radius: 4px; border-color:#ff9300; padding: 1%;"><i
													class="fas fa-search"
													style="width:30px; color: white;"></i></button>
										</div>
										<table id="add-row" class="display table table-striped table-hover">
											<tr>
												<th>#</th>
												<th>Categoria</th>
												<th>Cadastrador</th>
												<th style="width: 10%">Ações</th>
											</tr>
											<?php foreach ($lista as $categorias): ?>
												<tr>
													<td>
														<?= $categorias['id_categoria']; ?>
													</td>
													<td>
														<?= $categorias['nome_categoria']; ?>
													</td>
													<td>
														<?= $categorias['pnome']; ?>&nbsp;&nbsp;
														<?= $categorias['unome']; ?>
													</td>
													<td>
														<div class="form-button-action">
															<a
																href="editarcategoria.php?id_categoria=<?= $categorias['id_categoria']; ?>"><button
																	type="button" data-toggle="tooltip" title=""
																	class="btn btn-link btn-primary btn-lg"
																	data-original-title="Editar">
																	<i class="fa fa-edit"></i>
																</button>
															</a>
															<a
																href="excluircategoria.php?id_categoria=<?= $categorias['id_categoria']; ?>">
																<button type="button" data-toggle="tooltip" title=""
																	class="btn btn-link btn-danger"
																	data-original-title="Remover">
																	<i class="fa fa-times"></i>
																</button>
															</a>
														</div>
													</td>
												</tr>
											<?php endforeach; ?>
											</tbody>
										</table>
									</div>
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
	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>
	<script>
		var search = document.getElementById('pesquisar');
		search.addEventListener("keydown", function (event) {
			if (event.key === "Enter") {
				searchData();
			}
		});

		function searchData() {
			window.location = "categorias.php?search=" + search.value;
		}

		$(document).ready(function () {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable({
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every(function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
							.appendTo($(column.footer()).empty())
							.on('change', function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);

								column
									.search(val ? '^' + val + '$' : '', true, false)
									.draw();
							});

						column.data().unique().sort().each(function (d, j) {
							select.append('<option value="' + d + '">' + d + '</option>')
						});
					});
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function () {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
				]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>

</html>
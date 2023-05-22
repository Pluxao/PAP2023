<?php
require '../../config.php';
require '../../verificar1.php';
require '../../admin1.php';

if (!empty($_GET['search'])) {
	$lista = [];
	$data = $_GET['search'];
	$sql = $pdo->query("SELECT *FROM usuarios WHERE user LIKE '%$data%' or id LIKE '%$data%' or pnome LIKE '%$data%' or unome LIKE '%$data%' or email LIKE '%$data%' or telefone LIKE '%$data%' or nasc LIKE '%$data%' or genero LIKE '%$data%' or estado LIKE '%$data%' ORDER BY id");
	if ($sql->rowCount() > 0) {
		$lista = $sql->fetchALL(PDO::FETCH_ASSOC);
	} else {
		echo "<script>alert('Dados não encontrados')</script>";
		echo "<script>window.location = 'usuarios.php'</script>";
	}
} else {
	$lista = [];
	$sql = $pdo->query("SELECT *FROM usuarios");
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
	<title>Usuários do Sistema</title>
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
								<a href="usuarios.php">Usuários</a>
							</li>
						</ul>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<a href="usuariosrl.php"><button class="btn btn-primary" >Relatório</button></a>
									<button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
										data-target="#addRowModal">
										<i class="fas fa-user-plus"></i>
										Novo usuário
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
														Novo</span>
													<span class="fw-light">
														Usuário
													</span>
												</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p class="small">Cadastrar novo usuário</p>
												<form method="post" action="../../cadastraruser_action.php">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<input id="addOffice" type="text" class="form-control"
																	placeholder="Nome de usuário*" name="user"
																	minlength="8" maxlength="16" required>
															</div>
														</div>
														<div class="col-md-6 pr-0">
															<div class="form-group form-group-default">
																<input id="addPosition" type="text" class="form-control"
																	placeholder="Primeiro nome*" name="pnome">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<input id="addOffice" type="text" class="form-control"
																	placeholder="Apelido*" name="unome">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label for="">Estado*</label>
																<select name="estado">
																	<option value="Utilizador">Utilizador</option>
																	<option value="Admin">Admin</option>
																</select>
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group form-group-default">
																<input id="addName" type="email" class="form-control"
																	placeholder="Email*" name="email">
															</div>
														</div>
														<div class="col-md-6 pr-0">
															<div class="form-group form-group-default">
																<input id="addPosition" type="text" class="form-control"
																	name="telefone" minlength="9" maxlength="9"
																	onkeypress="return event.charCode >= 48 && event.charCode <= 57"
																	placeholder="Número de telefone*" required>
															</div>
														</div>
														<div class="col-md-6 pr-0">
															<div class="form-group form-group-default">
																<label>Date de nascimento*</label>
																<input id="addPosition" type="date" class="form-control"
																	name="nasc"
																	min="<?php echo date('Y-m-d', strtotime('-100 year')); ?>"
																	max="<?php echo date('Y-m-d', strtotime('-6 year')); ?>"
																	required>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label>Gênero*</label>
																<select name="genero" placeholder="Gênero">
																	<option value="Masculino">Masculino</option>
																	<option value="Femenino">Femenino</option>
																</select>
															</div>
														</div>
														<div class="col-md-6 pr-0">
															<div class="form-group form-group-default">
																<input id="addPosition" type="password"
																	class="form-control" placeholder="Senha*"
																	name="senha" minlength="8" maxlength="16" required>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<input id="addOffice" type="password"
																	class="form-control" placeholder="Confirmar senha*"
																	name="confsenha" minlength="8" maxlength="16"
																	required>
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
												<th>Usuário</th>
												<th>Nome</th>
												<th>Email</th>
												<th>Telefone</th>
												<th>Data de nascimento</th>
												<th>Gênero</th>
												<th>Estado</th>
												<th style="width: 10%">Ações</th>
											</tr>
											<?php foreach ($lista as $usuario): ?>
												<tr>
													<td>
														<?= $usuario['user']; ?>
													</td>
													<td>
														<?= $usuario['pnome']; ?>&nbsp;&nbsp;
														<?= $usuario['unome']; ?>
													</td>
													<td>
														<?= $usuario['email']; ?>
													</td>
													<td>
														<?= $usuario['telefone']; ?>
													</td>
													<td>
														<?= $usuario['nasc']; ?>
													</td>
													<td>
														<?= $usuario['genero']; ?>
													</td>
													<td>
														<?= $usuario['estado']; ?>
													</td>
													<td>
														<div class="form-button-action">
															<a href="editaruser.php?id=<?= $usuario['id']; ?>"><button
																	type="button" data-toggle="tooltip" title=""
																	class="btn btn-link btn-primary btn-lg"
																	data-original-title="Editar">
																	<i class="fa fa-edit"></i>
																</button>
															</a>
															<a href="../../excluir.php?id=<?= $usuario['id']; ?>">
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
								<a class="nav-link" href="https://www.themekita.com">
									Loongoka
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Ajuda
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Termos de Usuários
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						<h1></h1>2022, feito com <i class="fa fa-heart heart text-danger"></i> by <a
							href="https://www.themekita.com">Abel Canas</a>
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
	<script src="../assets/js/pesquisar.js"></script>
	<script>

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
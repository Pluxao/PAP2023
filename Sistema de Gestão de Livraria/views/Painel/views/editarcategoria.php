<?php
    require '../../config.php';
    require '../../verificar.php';
    require '../../admin1.php';
    
    $categoria = [];
	$id_categoria = filter_input(INPUT_GET, 'id_categoria');
	if($id_categoria){
    $sql = $pdo->prepare("SELECT *FROM livros_categorias WHERE id_categoria = :id_categoria");
        $sql->bindValue(':id_categoria', $id_categoria);
        $sql->execute();

        if($sql->rowCount() > 0){
            $categoria = $sql->fetch(PDO::FETCH_ASSOC);
        }else{
            header("location: categorias.php");
        }
    }else{
        header("location: categorias.php");
    }

	if(isset($_POST["submit"])) {
        $id_categoria = filter_input(INPUT_POST, 'id_categoria');
        $nome_categoria = filter_input(INPUT_POST, 'nome_categoria');

        if($nome_categoria && $id_categoria){
            $sql = $pdo->prepare("UPDATE livros_categorias SET nome_categoria = :nome_categoria WHERE id_categoria = :id_categoria");
            $sql->bindValue(':nome_categoria', $nome_categoria);
            $sql->bindValue(':id_categoria', $id_categoria);
            $sql->execute();

            echo "<script>alert('A categoria foi editado!')</script>";
            echo "<script>window.open('categorias.php', '_self')</script>";
            exit();
        }else{
            echo "<script>alert('Erro!')</script>";
            echo "<script>window.open('categorias.php', '_self')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-pt">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Mudar Senha</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/loongoka.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
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
					<img src="../assets/img/loongoka-logo.png" alt="navbar brand" class="navbar-brand" style="width: 210px;">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
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
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="img_upload/<?php echo $consulta['imagem_perfil']?>"alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="img_upload/<?php echo $consulta['imagem_perfil']?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $consulta['pnome']?>&nbsp&nbsp<?php echo $consulta['unome'];?></h4>
												<p class="text-muted"><?php echo $consulta['email'];?></p>
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
							<img src="img_upload/<?php echo $consulta['imagem_perfil']?>" alt="Foto de perfil" class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $consulta['pnome'];?>&nbsp&nbsp<?php echo $consulta['unome'];?>
									<span class="user-level"><?php echo $consulta['estado'];?></span>
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
								<h2 class="text-white pb-2 fw-bold">Meu Perfil</h2></li>
								<h5 class="text-white op-7 mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  								<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
								</svg></i>&nbsp;&nbsp;<?php echo $consulta['pnome'];?>&nbsp;&nbsp;<?php echo $consulta['unome'];?></h5>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-8">
							<div class="card full-height">
								<div class="row py-3">
									<section class="cadastrar">
        							    <div class="cadastrar_texto">
                                            <h1>Editar Categoria</h1>
			                                <h2>Editar categoria dos livros cadastrados no nosso sistema</h2>
                                        </div>
                                        <div class="cadastrar_form" id="perfil">
											<form method="post">
												<input id="addOffice" hidden type="text" value="<?php echo$categoria['id_categoria'];?> "class="form-control" name="id_categoria">            										
												<input type="text" name="nome_categoria" value="<?php echo$categoria['nome_categoria'];?>">
            									<button style="padding: 3px;" name="submit" class="primary-btn" type="submit">Actualizar Categoria</button>
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
						<h1></h1>2022, feito com <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">Abel Canas</a> e <a href="https://www.themekita.com">Santos Francisco</a>
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
		Circles.create({
			id:'circles-1',
			radius:45,
			maxValue:400,
			width:7,
			value:<?php echo"$contar[pnome]"; ?>,
			text: <?php echo"$contar[pnome]"; ?>,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
		Circles.create({
			id:'circles-2',
			radius:45,
			maxValue:200,
			width:7,
			value:<?php echo"$contarm[pnome]"; ?>,
			text: <?php echo"$contarm[pnome]"; ?>,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
		Circles.create({
			id:'circles-3',
			radius:45,
			maxValue:200,
			width:7,
			value:<?php echo"$contarf[pnome]"; ?>,
			text: <?php echo"$contarf[pnome]"; ?>,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
		var barColors = [
    		"#ff9300",
    		"rgb(92, 138, 240)",
    	"rgb(228, 82, 153)",
  	];
		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');
		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'pie',
    			data: {
      			labels: ['Usuários','Administradores', 'Usuários normais'],
      			datasets: [{
        		label: 'Admin e usuários',
        		data: [<?php echo"$contar[pnome]"?>,<?php echo"$mda[pnome]"?>,<?php echo"$mdano[pnome]"?>],
					backgroundColor: barColors,
					borderColor: 'blue',
				}],
			},
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>
</html>
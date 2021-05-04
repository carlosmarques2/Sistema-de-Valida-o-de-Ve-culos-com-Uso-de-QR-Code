<?php
session_start();
include "config.php";
include "conexao.php";

if(!isset($_SESSION['id']) && empty($_SESSION['id']))
{
  header("Location: 401.html");
  exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>IFCode</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="css/adminx.css" media="screen" />
	<link rel="stylesheet" href="css/style2.css">
	<!--
      # Optional Resources
      Feel free to delete these if you don't need them in your project
    -->
</head>

<body>
	<div class="adminx-container">
		<nav class="navbar navbar-expand justify-content-between fixed-top">
			<a class="navbar-brand mb-0 h1 d-none d-md-block" href="tela_principal.php">
				<img src="img/logo-qrcode.png" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
				IFCode
			</a>

			<!-- <form class="form-inline form-quicksearch d-none d-md-block mx-auto">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-icon">
							<i data-feather="search"></i>
						</div>
					</div>
					<input type="text" class="form-control" id="search" placeholder="Type to search...">
				</div>
			</form> -->

			<div class="d-flex flex-1 d-block d-md-none">
				<a href="#" class="sidebar-toggle ml-3">
					<i data-feather="menu"></i>
				</a>
			</div>

			<ul class="navbar-nav d-flex justify-content-end mr-2">
				<!-- Notificatoins -->
				<div class="d-flex align-items-center">
					<span><?php echo $_SESSION['usuario']; ?></span>
				</div>
				<!-- Notifications -->
				<li class="nav-item dropdown">
					
					<a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
						<img src="img/logo-admin.png" class="border border-dark d-inline-block align-top" alt="">
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Perfil</a>
						<a class="dropdown-item" href="#">Configurações</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger" href="logout.php">Sair</a>
					</div>
				</li>
			</ul>
		</nav>

		<!-- expand-hover push -->
		<!-- Sidebar -->
		<div class="adminx-sidebar expand-hover push">
			<ul class="sidebar-nav">
				<li class="sidebar-nav-item">
					<a href="tela_principal.php" class="sidebar-nav-link active">
						<span class="sidebar-nav-icon">
							<i data-feather="home"></i>
						</span>
						<span class="sidebar-nav-name">
							Principal
						</span>
						<span class="sidebar-nav-end">

						</span>
					</a>
				</li>

				<li class="sidebar-nav-item">
					<a href="cadastro.php" class="sidebar-nav-link">
						<span class="sidebar-nav-icon">
							<i data-feather="plus-circle"></i>
						</span>
						<span class="sidebar-nav-name">
							Cadastrar
						</span>
					</a>
				</li>

				<li class="sidebar-nav-item">
					<a class="sidebar-nav-link" href="lista_qrcodes.php">
						<span class="sidebar-nav-icon">
							<i data-feather="grid"></i>
						</span>
						<span class="sidebar-nav-name">
							Qr Codes
						</span>
					</a>

				<li class="sidebar-nav-item">
					<a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navTables" aria-expanded="false" aria-controls="navTables">
						<span class="sidebar-nav-icon">
							<i data-feather="align-justify"></i>
						</span>
						<span class="sidebar-nav-name">
							Tabelas
						</span>
						<span class="sidebar-nav-end">
							<i data-feather="chevron-right" class="nav-collapse-icon"></i>
						</span>
					</a>

					<ul class="sidebar-sub-nav collapse" id="navTables">
						<li class="sidebar-nav-item">
							<a href="listar.php" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									P
								</span>
								<span class="sidebar-nav-name">
									Proprietários
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./layouts/tables_data.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									V
								</span>
								<span class="sidebar-nav-name">
									Veículos
								</span>
							</a>
						</li>
					</ul>
				</li>

				<li class="sidebar-nav-item">
					<a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navExtra" aria-expanded="false" aria-controls="navExtra">
						<span class="sidebar-nav-icon">
							<i data-feather="activity"></i>
						</span>
						<span class="sidebar-nav-name">
							Painel Admin
						</span>
					</a>
				</li>
			</ul>
		</div><!-- Sidebar End -->

		<!-- adminx-content-aside -->
		<div class="adminx-content">
			<!-- <div class="adminx-aside">

        </div> -->

			<div class="adminx-main-content">
				<div class="container-fluid">
					<!-- BreadCrumb -->
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb adminx-page-breadcrumb">
							<li class="breadcrumb-item" aria-current="page">Principal</li>
						</ol>
					</nav>

					<div class="pb-3">
						<h1>Principal</h1>
					</div>

					<div class="row">
						<div class="col-md-6 col-lg-3 d-flex">
							<div class="card mb-grid w-100">
								<div class="card-body d-flex flex-column">
									<div class="d-flex justify-content-between mb-3">
										<h5 class="card-title mb-0">
											Novo Cadastro
										</h5>
										
									</div>
									<a href="cadastro.php" class="btn btn-primary"><i data-feather="plus"></i></a>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-3 d-flex">
							<div class="card mb-grid w-100">
								<div class="card-body d-flex flex-column">
									<div class="d-flex justify-content-between mb-3">
										<h5 class="card-title mb-0">
											Lista de QR Codes
										</h5>
									</div>
									<a href="lista_qrcodes.php" class="btn btn-primary"><i data-feather="list"></i></a>
								</div>
							</div>
						</div>

						<!-- <div class="col-md-6 col-lg-3 d-flex">
							<div class="card border-0 bg-primary text-white text-center mb-grid w-100">
								<div class="d-flex flex-row align-items-center h-100">
									<div class="card-icon d-flex align-items-center h-100 justify-content-center">
										<i data-feather="users"></i>
									</div>
									<div class="card-body">
										<div class="card-info-title">Proprietários</div>
										<h3 class="card-title mb-0">
											768
										</h3>
									</div>
								</div>
							</div>
						</div> -->

						<div class="col-md-6 col-lg-4 d-flex">
							<div class="card border-0 bg-success text-white text-center mb-grid w-100">
								<a href="listar.php" class="link_users d-flex flex-row align-items-center h-100" title="Listar Proprietários">
									<div class="card-icon d-flex align-items-center h-100 justify-content-center">
										<i data-feather="users"></i>
									</div>
									<div class="card-body">
										<div class="card-info-title">Proprietários</div>
										<h3 class="card-title mb-0">
											<?php 
												function get_num_prop($conn){
													$query = "SELECT count(id) as num FROM proprietarios";

													$get_num = $conn->prepare($query);
													$get_num->execute();
													$row = $get_num->fetch(PDO::FETCH_ASSOC);

													return $row['num'];
												}

												echo get_num_prop($conn); ?>
										</h3>
									</div>
								</a>
							</div>
						</div>
					</div>

					<!-- <div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
									<div class="card-header-title">Featured</div>

									<nav class="card-header-actions">
										<a class="card-header-action" data-toggle="collapse" href="#card1" aria-expanded="false" aria-controls="card1">
											<i data-feather="minus-circle"></i>
										</a>

										<div class="dropdown">
											<a class="card-header-action" href="#" role="button" id="card1Settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i data-feather="settings"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="card1Settings">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>

										<a href="#" class="card-header-action">
											<i data-feather="x-circle"></i>
										</a>
									</nav>
								</div>
								<div class="card-body collapse show" id="card1">
									<h4 class="card-title">Special title treatment</h4>
									<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
									<a href="#" class="btn btn-primary">Go somewhere</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card">
								<div class="card-header">
									Featured
								</div>
								<div class="card-body">
									<h4 class="card-title">Special title treatment</h4>
									<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
									<a href="#" class="btn btn-primary">Go somewhere</a>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>

	<!-- If you prefer jQuery these are the required scripts -->
	<script src="js/jquery-3.6.0.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script> -->
	<script src="js/popper-1.12.3.min.js"></script>
	<script src="js/bootstrap-4.0.0-beta.2.min.js"></script>
	<script src="js/vendor.js"></script>
	<script src="js/adminx.js"></script>

	<!-- If you prefer vanilla JS these are the only required scripts -->
	<!-- script src="./dist/js/vendor.js"></script>
    <script src="./dist/js/adminx.vanilla.js"></script-->
</body>

</html>
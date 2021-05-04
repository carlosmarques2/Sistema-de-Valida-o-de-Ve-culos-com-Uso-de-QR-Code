<?php
session_start();
include "config.php";
include "conexao.php";

if(!isset($_SESSION['id']) && empty($_SESSION['id']) || $_SESSION['nivel']!="2")
{
  header("Location: 401.html");
  exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>IFCode - Cadastro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="css/adminx.css" media="screen" />
	<link rel="stylesheet" href="css/style2.css">
</head>

<body>
	<div class="adminx-container">
		<!-- Header -->
		<nav class="navbar navbar-expand justify-content-between fixed-top">
			<a class="navbar-brand mb-0 h1 d-none d-md-block" href="tela_principal.php">
				<img src="img/logo-qrcode.png" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
				IFCode
			</a>

			<div class="d-flex flex-1 d-block d-md-none">
				<a href="#" class="sidebar-toggle ml-3">
					<i data-feather="menu"></i>
				</a>
			</div>

			<ul class="navbar-nav d-flex justify-content-end mr-2">
				<!-- Notificatoins -->
				<div class="d-flex align-items-center">
					<span class="h6 mb-1"><?php echo $_SESSION['usuario']; ?></span>
				</div>
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
		<!-- // Header -->

		<!-- expand-hover push -->
		<div class="adminx-sidebar expand-hover push">
			<ul class="sidebar-nav">
				<li class="sidebar-nav-item">
					<a href="tela_principal.php" class="sidebar-nav-link">
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
					<a href="cadastro.php" class="sidebar-nav-link active">
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
							Listas
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
		<!-- Main Content -->
		<div class="adminx-content">
			<div class="adminx-main-content">
				<div class="container-fluid">
					<!-- BreadCrumb -->
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb adminx-page-breadcrumb">
							<li class="breadcrumb-item"><a href="tela_principal.php">Principal</a></li>
							<li class="breadcrumb-item active  aria-current=" page">Cadastro</li>
						</ol>
					</nav>

					<div class="pb-3">
						<h1>Cadastro</h1>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="card mb-grid">

								<div class="card mb-grid">
									<div class="card-header">
										<div class="card-header-title">Novo</div>
									</div>
									<div class="card-body">
										<form method="POST" action="proc_cad.php" id="needs-validation" novalidate >
											<div class="form-row">
												<div class="col-md-4 mb-3">
													<label class="form-label" for="validationCustom01">Nome</label>
													<input type="text" name="nome" class="form-control" id="validationCustom01" placeholder="Nome" value="" required>
													<div class="invalid-feedback">
														Campo Obrigatório
													</div>
												</div>
												<div class="col-md-8 mb-3">
													<label class="form-label" for="validationCustom02">Sobrenome</label>
													<input type="text" name="sobrenome" class="form-control" id="validationCustom02" placeholder="Sobrenome" value="" required>
													<div class="invalid-feedback">
														Campo Obrigatório
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-4 mb-3">
													<label class="form-label" for="validationCustom03">Matrícula</label>
													<input type="text" name="matricula" class="form-control" id="validationCustom03" placeholder="Matrícula" required>
													<div class="invalid-feedback">
														Campo Obrigatório
													</div>
												</div>
												<div class="col-md-4 mb-3">
													<label class="form-label" for="validationCustom04">Setor</label>
													<input type="text" name="setor" class="form-control" id="validationCustom04" placeholder="Setor" required>
													<div class="invalid-feedback">
														Campo Obrigatório
													</div>
												</div>
												<div class="col-md-4 mb-3">
													<label class="form-label" for="validationCustom05">Telefone</label>
													<input class="form-control input-phone mb-2" name="telefone" type="text" id="validationCustom05" placeholder="Telefone" required>
													<div class="invalid-feedback">
														Campo Obrigatório
													</div>
												</div>
											</div>
											
											<div class="form-row">
												<div class="col-md-6 mb-4">
												<label class="form-label" for="validationCustom06">Ocupação</label>
													<div class="form-check">
														<label class="form-check-label">
															<input class="form-check-input" type="radio" name="ocupacao" id="gridRadios1" value="Aluno" checked>
															Aluno
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input class="form-check-input" type="radio" name="ocupacao" id="gridRadios2" value="Servidor">
															Servidor
														</label>
													</div>
												</div>
											</div>

											<fieldset>
											<legend>Dados do Veículo</legend>
												<div class="form-row">
													<div class="col-md-5 mb-3">
														<label class="form-label" for="validationCustom06">Placa</label>
														<input type="text" name="placa" class="form-control input-placa" id="validationCustom06" placeholder="Placa" required>
														<div class="invalid-feedback">
															Campo Obrigatório
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label class="form-label" for="validationCustom07">Modelo</label>
														<input type="text" name="modelo" class="form-control" id="validationCustom07" placeholder="Modelo" required>
														<div class="invalid-feedback">
															Campo Obrigatório
														</div>
													</div>
													<div class="col-md-3 mb-3">
														<label class="form-label" for="validationCustom08">Cor</label>
														<input type="text" name="cor" class="form-control" id="validationCustom08" placeholder="Cor" required>
														<div class="invalid-feedback">
															Campo Obrigatório
														</div>
													</div>
												</div>
											</fieldset>
											

											<button class="btn btn-primary mr-2" type="submit">Cadastrar</button>
											<small class="text-muted">
											</small>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- // Main Content -->
		</div>

		<!-- If you prefer jQuery these are the required scripts -->
		<script src="js/jquery-3.6.0.min.js"></script>
		<script src="js/popper-1.12.3.min.js"></script>
		<script src="js/bootstrap-4.0.0-beta.2.min.js"></script>
		<script src="js/vendor.js"></script>
		<script src="js/adminx.js"></script>

		<!-- If you prefer vanilla JS these are the only required scripts -->
		<!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->

		<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
				'use strict';

				window.addEventListener('load', function() {
					var form = document.getElementById('needs-validation');
					if (form !== null) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					}
				}, false);
			})();

			var cleave = new Cleave('.input-phone', {
				delimiter: ' - ',
				blocks: [5, 4],
				uppercase: true
			});

			var cleave2 = new Cleave('.input-placa', {
				delimiter: '-',
				blocks: [3, 4],
				uppercase: true
			});
		</script>
</body>

</html>
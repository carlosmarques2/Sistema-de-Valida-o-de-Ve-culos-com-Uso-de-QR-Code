<?php
session_start();

include "./config.php";
include_once "./conexao.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//echo $id[0];
//var_dump(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY));

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>IFCode - Cadastro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="css/adminx.css" media="screen" />
</head>

<body>
	<div class="adminx-container">
		<!-- Header -->
		<nav class="navbar navbar-expand justify-content-between fixed-top">
			<a class="navbar-brand mb-0 h1 d-none d-md-block" href="index.html">
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
				<li class="nav-item dropdown">
					<a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
						<img src="img/retrato-generico.png" class="d-inline-block align-top" alt="">
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Perfil</a>
						<a class="dropdown-item" href="#">Configurações</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger" href="#">Sair</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- // Header -->

		<!-- expand-hover push -->
		<div class="adminx-sidebar expand-hover push" id="sidebar">
			<ul class="sidebar-nav">
				<li class="sidebar-nav-item">
					<a href="../index.html" class="sidebar-nav-link">
						<span class="sidebar-nav-icon">
							<i data-feather="home"></i>
						</span>
						<span class="sidebar-nav-name">
							Dashboard
						</span>
						<span class="sidebar-nav-end">

						</span>
					</a>
				</li>

				<li class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link">
						<span class="sidebar-nav-icon">
							<i data-feather="layout"></i>
						</span>
						<span class="sidebar-nav-name">
							Layout Options
						</span>
						<span class="sidebar-nav-end">
							<span class="badge badge-info">4</span>
						</span>
					</a>
				</li>

				<li class="sidebar-nav-item">
					<a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#example" aria-expanded="false" aria-controls="example">
						<span class="sidebar-nav-icon">
							<i data-feather="pie-chart"></i>
						</span>
						<span class="sidebar-nav-name">
							Charts
						</span>
						<span class="sidebar-nav-end">
							<i data-feather="chevron-right" class="nav-collapse-icon"></i>
						</span>
					</a>

					<ul class="sidebar-sub-nav collapse" id="example">
						<li class="sidebar-nav-item">
							<a href="./charts_chartjs.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Ch
								</span>
								<span class="sidebar-nav-name">
									ChartJS
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./charts_morris.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Mo
								</span>
								<span class="sidebar-nav-name">
									Morris
								</span>
							</a>
						</li>
					</ul>
				</li>

				<li class="sidebar-nav-item">
					<a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navTables" aria-expanded="false" aria-controls="navTables">
						<span class="sidebar-nav-icon">
							<i data-feather="align-justify"></i>
						</span>
						<span class="sidebar-nav-name">
							Tables
						</span>
						<span class="sidebar-nav-end">
							<i data-feather="chevron-right" class="nav-collapse-icon"></i>
						</span>
					</a>

					<ul class="sidebar-sub-nav collapse" id="navTables">
						<li class="sidebar-nav-item">
							<a href="./tables.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Re
								</span>
								<span class="sidebar-nav-name">
									Regular Tables
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./tables_data.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Da
								</span>
								<span class="sidebar-nav-name">
									Data Tables
								</span>
							</a>
						</li>
					</ul>
				</li>

				<li class="sidebar-nav-item">
					<a class="sidebar-nav-link" data-toggle="collapse" href="#navForms" aria-expanded="false" aria-controls="navForms">
						<span class="sidebar-nav-icon">
							<i data-feather="edit"></i>
						</span>
						<span class="sidebar-nav-name">
							Forms
						</span>
						<span class="sidebar-nav-end">
							<i data-feather="chevron-right" class="nav-collapse-icon"></i>
						</span>
					</a>

					<ul class="sidebar-sub-nav collapse show" id="navForms">
						<li class="sidebar-nav-item">
							<a href="./form_elements.html" class="sidebar-nav-link active">
								<span class="sidebar-nav-abbr">
									El
								</span>
								<span class="sidebar-nav-name">
									Elements
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./form_advanced.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Ad
								</span>
								<span class="sidebar-nav-name">
									Advanced Elements
								</span>
							</a>
						</li>
					</ul>
				</li>

				<li class="sidebar-nav-item">
					<a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navUI" aria-expanded="false" aria-controls="navUI">
						<span class="sidebar-nav-icon">
							<i data-feather="grid"></i>
						</span>
						<span class="sidebar-nav-name">
							UI Elements
						</span>
						<span class="sidebar-nav-end">
							<i data-feather="chevron-right" class="nav-collapse-icon"></i>
						</span>
					</a>

					<ul class="sidebar-sub-nav collapse" id="navUI">
						<li class="sidebar-nav-item">
							<a href="./icons.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Ic
								</span>
								<span class="sidebar-nav-name">
									Icons
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./buttons.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Bu
								</span>
								<span class="sidebar-nav-name">
									Buttons
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./notifications.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									No
								</span>
								<span class="sidebar-nav-name">
									Notifications
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./progress.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Pr
								</span>
								<span class="sidebar-nav-name">
									Progress Bars
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./tabs.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Ta
								</span>
								<span class="sidebar-nav-name">
									Tabs
								</span>
							</a>
						</li>
					</ul>
				</li>

				<li class="sidebar-nav-item">
					<a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navExtra" aria-expanded="false" aria-controls="navExtra">
						<span class="sidebar-nav-icon">
							<i data-feather="layers"></i>
						</span>
						<span class="sidebar-nav-name">
							Other Layouts
						</span>
						<span class="sidebar-nav-end">
							<i data-feather="chevron-right" class="nav-collapse-icon"></i>
						</span>
					</a>

					<ul class="sidebar-sub-nav collapse" id="navExtra">
						<li class="sidebar-nav-item">
							<a href="./login.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Lo
								</span>
								<span class="sidebar-nav-name">
									Login
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./signup.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Si
								</span>
								<span class="sidebar-nav-name">
									Sign Up
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./404.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Nf
								</span>
								<span class="sidebar-nav-name">
									404 Error
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./500.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Is
								</span>
								<span class="sidebar-nav-name">
									500 Error
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./timeline.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									Ti
								</span>
								<span class="sidebar-nav-name">
									Timeline
								</span>
							</a>
						</li>

						<li class="sidebar-nav-item">
							<a href="./invoice.html" class="sidebar-nav-link">
								<span class="sidebar-nav-abbr">
									In
								</span>
								<span class="sidebar-nav-name">
									Invoice
								</span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>

		<!-- Main Content -->
		<div class="adminx-content">
			<div class="adminx-main-content">
				<div class="container-fluid">
					<!-- BreadCrumb -->
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb adminx-page-breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active  aria-current=" page">Cadastro</li>
						</ol>
					</nav>

					<div class="pb-3">
						<h1>Adicionar Veículo</h1>
					</div>
                    <?php
                        $query =  "	SELECT *
									FROM proprietarios
									WHERE proprietarios.id=?;";

                        $resultado = $conn->prepare($query);
						
						$resultado->bindParam(1, $id);
                        $resultado->execute();

                        $row = $resultado->fetch(PDO::FETCH_ASSOC);

                    ?>
					<div class="row">
						<div class="col-lg-6">
							<div class="card mb-grid">

								<div class="card mb-grid">
									<div class="card-header">
										<div class="card-header-title">Cadastro</div>
									</div>
									<div class="card-body">
										<form method="POST" action="proc_cad_veiculo.php?id=<?php echo $id;?>" id="needs-validation" novalidate >
											<div class="form-row">
												<div class="col-md-6 mb-3">
													<label class="form-label">Nome do Proprietário</label>
													<p><?php echo $row['nome']." ".$row['sobrenome'] ?> </p>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-5 mb-3">
													<label class="form-label" for="validationCustom01">Placa</label>
													<input type="text" name="placa" class="form-control input-placa" id="validationCustom01" placeholder="Placa" required>
													<div class="invalid-feedback">
														Campo Obrigatório
													</div>
												</div>
												<div class="col-md-4 mb-3">
													<label class="form-label" for="validationCustom02">Modelo</label>
													<input type="text" name="modelo" class="form-control" id="validationCustom02" placeholder="Modelo" required>
													<div class="invalid-feedback">
														Campo Obrigatório
													</div>
												</div>
												<div class="col-md-3 mb-3">
													<label class="form-label" for="validationCustom03">Cor</label>
													<input type="text" name="cor" class="form-control" id="validationCustom03" placeholder="Cor" required>
													<div class="invalid-feedback">
														Campo Obrigatório
													</div>
												</div>
											</div>
											<button class="btn btn-primary mr-2" type="submit">Confirmar</button>
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
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

			var cleave2 = new Cleave('.input-placa', {
				delimiter: '-',
				blocks: [3, 4],
				uppercase: true
			});
		</script>
</body>

</html>
<?php
session_start();

include "./config.php";
include "./conexao.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>AdminX - Form Elements</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="css/adminx.css" media="screen" />
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
				<!-- Notifications -->
				<div class="d-flex align-items-center">
					<span><?php echo $_SESSION['usuario']; ?></span>
				</div>
				<li class="nav-item dropdown">
					<a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
						<img src="img/logo-admin.png" class="border border-dark d-inline-block align-top" alt="">
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
							<li class="breadcrumb-item"><a href="tela_principal.php">Principal</a></li>
							<li class="breadcrumb-item active  aria-current=" page">Mais Informações</li>
						</ol>
					</nav>

					<div class="pb-3">
						<h1>Proprietário</h1>
					</div>
					
					<?php
						$query_prop = " SELECT * 
										FROM proprietarios 
										WHERE id=$id;";

						$resultado_prop = $conn->prepare($query_prop);

						$resultado_prop->execute();

						$row = $resultado_prop->fetch(PDO::FETCH_ASSOC);

					?>

					<div class="row">
						<div class="col-lg-8">
							<div class="card mb-grid">
								<div class="card-header d-flex justify-content-between align-items-center">
									<div class="card-header-title">Informações</div>
								</div>
								<div class="card-body" id="card1">
									<div class="row">
										<div class="col-lg-auto">
											<img src="img/retrato-generico.png" alt="" width="205" height="228">
										</div>
										<form class="col-lg-auto">
											<div class="row">
												<div class="col-lg-auto">
													<div class="form-group">
														<label class="form-label">Nome</label>
														<p><?php echo $row['nome']." ".$row['sobrenome'] ?> </p>
													</div>
													<div class="form-group">
														<label class="form-label">Matrícula</label>
														<p><?php echo $row['matricula'] ?> </p>
													</div>
													<div class="form-group">
														<label class="form-label">Setor</label>
														<p>TESTE</p>
													</div>
												</div>
												<div class="col-lg-auto">
													<div class="form-group">
														<label class="form-label">Telefone</label>
														<p><?php echo $row['telefone'] ?> </p>
													</div>
													<div class="form-group">
														<label class="form-label">Ocupação</label>
														<p><?php echo $row['funcao'] ?> </p>
													</div>
												</div>
											</div>
										</form>
									</div>
									<div class="row justify-content-end mt-3 pr-3">
										<button id="button" class="btn btn-sm ml-1 mb-1 btn-secondary">Gerar QR Code</button>
										<a href="cadastrar_veiculo.php?id=<?php echo $row['id'] ?>">
											<button class="btn btn-sm ml-1 mb-1 btn-success">Adic. Veículo</button>
										</a>
										<a href="editar.php?id=<?php echo $row['id'] ?>">
											<button class="btn btn-sm ml-1 mb-1 btn-primary">Editar</button>
										</a>
										<a href="deletar_proc.php?id=<?php echo $row['id'] ?>">
											<button class="btn btn-sm ml-1 mb-1 btn-danger">Excluir</button>
										</a>
									</div>
									
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="card mb-grid">
										<div class="card-header d-flex justify-content-between align-items-center">
											<div class="card-header-title">Veículo</div>
										</div>
										<div class="card mb-grid">
											<div class="table-responsive-md">
											<?php
												$query_veic = " SELECT * 
																FROM veiculos 
																WHERE id_prop=$row[id]";

												$resultado_veic = $conn->prepare($query_veic);

												$resultado_veic->execute();
											?>
												<table class="table table-actions table-striped table-hover mb-0" data-table>
													<thead>
														<tr>
															<th scope="col">
																<label class="custom-control custom-checkbox m-0 p-0">
																	<input type="checkbox" class="custom-control-input table-select-all">
																	<span class="custom-control-indicator"></span>
																</label>
															</th>
															<th scope="col">Placa</th>
															<th scope="col">Modelo</th>
															<th scope="col">Cor</th>
															<th scope="col">Ações</th>
														</tr>
													</thead>
													<tbody>
														<?php while($row_veic = $resultado_veic->fetch(PDO::FETCH_ASSOC)){ ?>
															<tr>
																<th scope="row">
																	<label class="custom-control custom-checkbox m-0 p-0">
																		<input type="checkbox" class="custom-control-input table-select-row">
																		<span class="custom-control-indicator"></span>
																	</label>
																</th>
																<td><?php echo $row_veic['placa']; ?></td>
																<td><?php echo $row_veic['modelo']; ?></td>  
																<td><?php echo $row_veic['cor']; ?></td>
																<td>
																	<a href="editar_veiculo.php?id[]=<?php echo $row_veic['id']."&id[]=".$row['id'] ;?>">
																		<button class="btn btn-sm btn-primary">Editar</button>
																	</a> 
																	<a href="proc_deletar_veic.php?id[]=<?php echo $row_veic['id']."&id[]=".$row['id'] ;?>">
																		<button class="btn btn-sm btn-danger">Excluir</button>
																	</a>
																</td>
															</tr>
														<?php   } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
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

		$('#button').click(function() {
			$.ajax({
				type: "POST",
				url: "gera-qr-code.php",
				data: { id: "<?php echo $row['id'];?>" }
			}).done(function( msg ) {
				alert( "QR Code Gerado com Sucesso!");
			});
		});
	</script>
</body>

</html>
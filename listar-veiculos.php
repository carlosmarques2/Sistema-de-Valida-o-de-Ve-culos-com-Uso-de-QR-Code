<?php
session_start();

include "./config.php";
include "./conexao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>IFCode - Veículos</title>
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
						<a class="dropdown-item text-danger" href="#">Sair</a>
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
					<a href="#" class="sidebar-nav-link">
						<span class="sidebar-nav-icon">
							<i data-feather="plus-circle"></i>
						</span>
						<span class="sidebar-nav-name">
							Cadastrar
						</span>
					</a>
				</li>

				<li class="sidebar-nav-item">
					<a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#example" aria-expanded="false" aria-controls="example">
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

					<ul class="sidebar-sub-nav collapse show" id="navTables">
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
							<a href="listar-veiculos.php" class="sidebar-nav-link active">
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
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active  aria-current=" page">Veículos</li>
						</ol>
					</nav>

					<div class="pb-3">
						<h1>Veículos</h1>
					</div>
					
					<div class="row">
						<div class="col-md-8">
							<div class="card mb-grid">
								<div class="table-responsive-md">
									<table class="table table-actions table-striped table-hover mb-0" data-table>
										<thead>
											<tr>
												<th scope="col">
													<label class="custom-control custom-checkbox m-0 p-0">
														<input type="checkbox" class="custom-control-input table-select-all">
														<span class="custom-control-indicator"></span>
													</label>
												</th>
												<th scope="col">Modelo</th>
												<th scope="col">Placa</th>
												<th scope="col">Cor</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$query_veic =  "SELECT *
																FROM veiculos;";

												$resultado_veic = $conn->prepare($query_veic);

												$resultado_veic->execute();
											?>
											<?php   while($row_veic = $resultado_veic->fetch(PDO::FETCH_ASSOC)){ ?>
												<tr>
													<th scope="row">
														<label class="custom-control custom-checkbox m-0 p-0">
															<input type="checkbox" class="custom-control-input table-select-row">
															<span class="custom-control-indicator"></span>
														</label>
													</th>
													<td> <?php echo $row_veic['modelo']; ?> </td>
													<td> <?php echo $row_veic['placa']; ?> </td>  
													<td> <?php echo $row_veic['cor']; ?> </td>
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
		<!-- // Main Content -->
	</div>

	<!-- If you prefer jQuery these are the required scripts -->
	<script src="js/jquery-3.6.0.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script> -->
	<script src="js/popper-1.12.3.min.js"></script>
	<script src="js/bootstrap-4.0.0-beta.2.min.js"></script>
	<script src="js/vendor.js"></script>
	<script src="js/adminx.js"></script>

	<!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script> -->
	<script src="js/jquery.dataTables-1.10.16.min.js"></script>
	<script src="js/dataTable.bootstrap4-1.10.16.min.js"></script>
	<script>
		$(document).ready(function() {
			var table = $('[data-table]').DataTable({
				"columns": [
					null,
					null,
					null,
					{
						"orderable": false
					}
				],
				language: {
					url: 'http://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json'
				}
			});

			/* $('.form-control-search').keyup(function(){
			  table.search($(this).val()).draw() ;
			}); */
		});

	</script>
	<!-- If you prefer vanilla JS these are the only required scripts -->
	<!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->
</body>

</html>
<?php
session_start();

include "./config.php";
include "./conexao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>IFCode - Lista</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="css/adminx.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/style2.css">
</head>

<body>
	<div class="adminx-container">
		<!-- Header -->
		<nav class="navbar navbar-expand justify-content-between fixed-top">
			<a class="navbar-brand mb-0 h1 d-none d-md-block" href="tela_principal.php">
				<img src="img/logo-qrcode.png" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
				AdminX
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
					<a class="sidebar-nav-link active" href="#example">
						<span class="sidebar-nav-icon">
							<i data-feather="grid"></i>
						</span>
						<span class="sidebar-nav-name">
							QR Codes
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
							<a href="listar-veiculos.php" class="sidebar-nav-link">
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
        <?php

            $sql = "SELECT id, nome, matricula FROM proprietarios;";

            $resultado = $conn->prepare($sql);
            $resultado->execute();

			$id_check = 1;
        ?>
		<!-- Main Content -->
		<div class="adminx-content">
			<div class="adminx-main-content">
				<div class="container-fluid">
					<!-- BreadCrumb -->
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb adminx-page-breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active  aria-current=" page">Lista</li>
						</ol>
					</nav>

					<div class="pb-3">
						<h1>QR Codes</h1>
					</div>
				
					<div class="row">
							<?php while($row_prop = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
									<div class="col-sm-2">
										<div class="card md-grid m-1">
											<label for="<?php echo $id_check; ?>">
												<div class="card-body d-flex flex-column justify-content-start">
													<h6 class="card-title"><strong><?php echo $row_prop['nome']." - ".$row_prop['matricula']; ?></strong></h6>
														<div>
															<input id="<?php echo $id_check++;?>" class="form-check-input" type="checkbox" value="option1">
														</div>
												</div>
											</label>
										</div>
									</div>
							<?php } ?>
					</div>
					
					<div class="d-flex justify-content-end">
						<button id="botao" class="btn btn-primary">Imprimir Selecionados</button>
					</div>
				</div>
			</div>
		</div>
		<!-- // Main Content -->
	</div>

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/popper-1.12.3.min.js"></script>
	<script src="js/bootstrap-4.0.0-beta.2.min.js"></script>
	<script src="js/vendor.js"></script>
	<script src="js/adminx.js"></script>

	<script>
			$('#botao').click( function () {
				alert();
			} );
	</script>
</body>

</html>
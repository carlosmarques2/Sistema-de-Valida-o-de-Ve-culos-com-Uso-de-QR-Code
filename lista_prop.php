<?php
session_start();
include "config.php";
include "conexao.php";
include "funcoes3.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

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
</head>

<body>
	<div class="adminx-container">
		<nav class="navbar navbar-expand justify-content-between fixed-top">
			<a class="navbar-brand mb-0 h1 d-none d-md-block" href="tela_principal.php">
				<img src="img/logo-qrcode.png" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
				IFCode
			</a>

			<div class="d-flex flex-1 d-block d-md-none">
				<a href="index.php" class="navbar-brand mb-0 p-0 h1 ml-3">
                    <img src="img/logo-qrcode.png" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
                    IFCode
				</a>
			</div>

			<ul class="navbar-nav d-flex justify-content-end mr-2">
				<!-- Notificatoins -->
				<div class="d-flex align-items-center">
					<span class="h6 m-0"><?php echo $_SESSION['usuario']; ?></span>
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

		<div class="adminx-content">

			<div class="adminx-main-content">
				<div class="container-fluid">

					<div class="pb-3">
						<h2>Consulta de Dados</h2>
					</div>
                    <?php
                        
                        $query_prop =  "SELECT *
                                        FROM proprietarios
                                        WHERE id=?;";

                        $resultado_prop = $conn->prepare($query_prop);

                        $qrcode = $id;

                        $resultado_prop->bindParam(1, $qrcode);

                        $resultado_prop->execute();
                        
                        $row = $resultado_prop->fetch(PDO::FETCH_ASSOC);
                    ?>
					<div class="row d-flex justify-content-center">
						<div class="col-md-6 col-lg-6 d-flex">
							<div class="card mb-grid w-100">
								<div class="card-body d-flex flex-column">
									<div class="d-flex justify-content-center mb-4">
                                        <img class="foto" src="img/retrato-generico.png" alt="">
                                        
									</div>
                                    <div class="d-flex justify-content-center mb-3">
                                        <h3><strong><?php echo $row['nome'];?></strong></h3>
									</div>
                                    <div class="d-flex justify-content-center mb-3">
                                        <h4><?php echo $row['funcao'];?></h4>
									</div>
                                    <div class="d-flex justify-content-center mb-4">
                                        <h4><?php echo "(95) ".$row['telefone'];?></h4>
									</div>
                                    <div class="d-flex justify-content-center mb-1">
                                        <a href="<?php echo "https://wa.me/5595".formataTelefone($row['telefone']);?>" class="btn btn-success botao-msg"><i data-feather="message-circle"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/popper-1.12.3.min.js"></script>
	<script src="js/bootstrap-4.0.0-beta.2.min.js"></script>
	<script src="js/vendor.js"></script>
	<script src="js/adminx.js"></script>

</body>

</html>
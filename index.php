<?php
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id']))
{
  header("Location: tela_principal.php");
  exit;
}

if(!isset($_SESSION['erro'])){
    $_SESSION['erro'] = false;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>IFCode - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="CSS/adminx.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="CSS/style2.css">
</head>

<body>

    <div class="adminx-container d-flex justify-content-center align-items-center">
        <div class="page-login">
            <div class="text-center">
                <a class="navbar-brand mb-4 h1" href="index.php">
                    <img src="img/logo-qrcode.png" class="navbar-brand-image d-block mr-2" alt="" style="width:128px; height:128px">
                    <strong>IFCode</strong>
                </a>
            </div>

            <div class="card mb-0">
                
                <div class="card-body">
                    <form method="POST" action="validacao.php">
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail1" class="form-label">Usuário</label>
                            <input type="text" name="usuario" class="form-control" id="exampleDropdownFormEmail1" placeholder="Usuário" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="exampleDropdownFormPassword1" class="form-label">Senha</label>
                            <input type="password" name="senha" class="form-control" id="exampleDropdownFormPassword1" placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Lembrar-me</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-block btn-success">Entrar</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="#"><small>Esqueceu a Senha?</small></a>
                </div>
            </div>
            <?php if($_SESSION['erro']){?>
                <div id="login-erro" class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['msg']; 
                        unset($_SESSION['erro']);
                    ?>
                </div>
            <?php }?>
        </div>
    </div>
    
    <!-- If you prefer jQuery these are the required scripts -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="css/bootstrap.min.css"></script>
    <script src="js/vendor.js"></script>
    <script src="js/adminx.js"></script>
    <script>
        $('#login-erro').show(0).delay(5000).hide(0);
    </script>
    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->
</body>

</html>
<?php
    session_start();
?>
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
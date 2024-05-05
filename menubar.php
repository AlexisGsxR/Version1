<?php include("frmpath.php"); ?>      
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=$base_url?>index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Philleppe Cousteaux<sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?=$base_url?>index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item <?php if($Modulo == "Aplicaciones"){echo("active");} ?>">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseApli"
            aria-expanded="true" aria-controls="collapseApli">
            <i class="fas fa-fw fa-folder"></i>
            <span>Aplicaciones</span>
        </a>

        <div id="collapseApli" class="collapse <?php if($Modulo == "Aplicaciones"){echo("show");} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Aplicaciones:</h6>

                <a class="collapse-item <?php if($Titulo == "Horario"){echo("active");} ?>" href="<?=$base_url?>Horario/frmHorario.php">Horario</a>

             </div>
        </div>

    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item <?php if($Modulo == "Mantenedores"){echo("active");} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMant"
            aria-expanded="true" aria-controls="collapseMant">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Mantenedores</span>
        </a>

        <div id="collapseMant" class="collapse <?php if($Modulo == "Mantenedores"){echo("show");} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Administración:</h6>

                <a class="collapse-item <?php if($Titulo == "Colegio"){echo("active");} ?>" href="<?=$base_url?>Colegio/frmColegio.php">Colegio</a>
                
                <a class="collapse-item <?php if($Titulo == "Curso"){echo("active");} ?>" href="<?=$base_url?>Curso/frmCurso.php">Curso</a>

                <a class="collapse-item <?php if($Titulo == "Ramo"){echo("active");} ?>" href="<?=$base_url?>Ramo/frmRamo.php">Ramo</a>

                <a class="collapse-item <?php if($Titulo == "Sala"){echo("active");} ?>" href="<?=$base_url?>Sala/frmSala.php">Sala</a>

                <a class="collapse-item <?php if($Titulo == "Usuario"){echo("active");} ?>" href="<?=$base_url?>Usuario/frmUsuario.php">Usuario</a>

            </div>
        </div>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>   

</ul>
<!-- End of Sidebar -->
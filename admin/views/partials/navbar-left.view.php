<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="inicio" class="brand-link">
        <img src="views/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Administración</span>
    </a>
<!-- Sidebar -->
<div class="sidebar">
    
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <?php
            if (isset($_SESSION['image']) && $_SESSION['image'] != null) {
            ?>
                <img src="../views/images/users/<?php echo $_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image" />
            <?php
            } else {
            ?>
                <img src="../views/images/users/default/default-user.png" class="img-circle elevation-2" alt="User Image" />
            <?php
            }
            ?>
            
        </div>
        <div class="info">
        <a href="#" class="d-block"><?= $_SESSION['name'] ?></a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="inicio" class="nav-link">
                <i class="nav-icon nav-ico fas fa-home"></i>
                <p>Inicio</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon nav-ico fas fa-user"></i>
                <p>Usuarios <i class="right fas fa-angle-right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="add-user" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <!-- <i class="nav-icon nav-ico fa-solid fa-basket-shopping"></i> -->
                        <p>Nuevo usuario</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="users" class="nav-link">
                        <i class="nav-icon <?php echo $_GET['route'] == 'users' ? 'fa-solid fa-circle' : 'fa-regular fa-circle'; ?>"></i>
                        <p>Lista de usuarios</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon nav-ico fas fa-solid fa-list"></i>
                <p>Actividades <i class="right fas fa-angle-right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="add-activity-category" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <!-- <i class="nav-icon nav-ico fa-solid fa-basket-shopping"></i> -->
                        <p>Nueva Cat. Actividad</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="activity-category" class="nav-link">
                        <i class="nav-icon <?php echo $_GET['route'] == 'activity-category' ? 'fa-solid fa-circle' : 'fa-regular fa-circle'; ?>"></i>
                        <p>Categoría Actividades</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="calendar" class="nav-link">
                        <i class="nav-icon <?php echo $_GET['route'] == 'calendar' ? 'fa-solid fa-circle' : 'fa-regular fa-circle'; ?>"></i>
                        <p>Calendario Actividades</p>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon nav-ico fas fa-solid fa-paw"></i>
                <p>Animales <i class="right fas fa-angle-right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="add-animal" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <!-- <i class="nav-icon nav-ico fa-solid fa-basket-shopping"></i> -->
                        <p>Nuevo Animal</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="animals" class="nav-link">
                        <i class="nav-icon <?php echo $_GET['route'] == 'animals' ? 'fa-solid fa-circle' : 'fa-regular fa-circle'; ?>"></i>
                        <p>Lista de Animales</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="animals-adopted" class="nav-link">
                        <i class="nav-icon <?php echo $_GET['route'] == 'animals-adopted' ? 'fa-solid fa-circle' : 'fa-regular fa-circle'; ?>"></i>
                        <p>Animales Adoptados</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="animals-sponsored" class="nav-link">
                        <i class="nav-icon <?php echo $_GET['route'] == 'animals-sponsored' ? 'fa-solid fa-circle' : 'fa-regular fa-circle'; ?>"></i>
                        <p>Animales Apadrinados</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="animals-no-adopted" class="nav-link">
                        <i class="nav-icon <?php echo $_GET['route'] == 'animals-no-adopted' ? 'fa-solid fa-circle' : 'fa-regular fa-circle'; ?>"></i>
                        <p>Animales en Adopción</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon nav-ico fas fa-solid fa-blog"></i>
                <p>Blog <i class="right fas fa-angle-right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="add-publication" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <!-- <i class="nav-icon nav-ico fa-solid fa-basket-shopping"></i> -->
                        <p>Nueva Publicación</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="blog" class="nav-link">
                        <i class="nav-icon <?php echo $_GET['route'] == 'blog' ? 'fa-solid fa-circle' : 'fa-regular fa-circle'; ?>"></i>
                        <p>Lista de Publicaciones</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="comments" class="nav-link">
                        <i class="nav-icon <?php echo $_GET['route'] == 'comments' ? 'fa-solid fa-circle' : 'fa-regular fa-circle'; ?>"></i>
                        <p>Comentarios</p>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a href="emails" class="nav-link">
                <i class="nav-icon nav-ico fas fa-envelope"></i>
                <p>Email</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="donations" class="nav-link">
                <i class="nav-icon nav-ico fas fa-solid fa-hand-holding-dollar"></i>
                <p>Donaciones</p>
            </a>
        </li>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
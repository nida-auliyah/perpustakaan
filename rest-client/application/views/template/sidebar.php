    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Perpus</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <?php if ($this->session->userdata('level') == 'admin') : ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage
            </div>

            <!-- Nav Item - Profil Saya -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('buku') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Buku</span></a>
            </li>
            <!-- Nav Item - Profil Saya -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('Kategori') ?>">
                    <i class="fas fa-fw fa-align-left"></i>
                    <span>Kategori</span></a>
            </li>
            <!-- Nav Item - Profil Saya -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('Anggota') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Anggota</span></a>
            </li>
            <!-- Nav Item - Edit Profil -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Peminjaman') ?>">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Peminjaman</span></a>
            </li>

        <?php endif; ?>

        <?php if ($this->session->userdata('level') == 'user') : ?>

            <!-- Heading -->
            <div class="sidebar-heading">
                Home
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/index') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>

            <!-- Nav Item - Profil Saya -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('user/profil') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil Saya</span></a>
            </li>
            <!-- Nav Item - Edit Profil -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/edit_profil') ?>">
                    <i class="fas fa-fw fa-user-edit"></i>
                    <span>Edit Profil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading pb-3">
                Book
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-list-ul"></i>
                    <span>Kategori</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php foreach ($kategori as $kat) : ?>
                            <a class="collapse-item" href="<?= base_url('user/kategori/') . $kat['id_kategori']; ?>"><?= $kat['detail_kategori'] ?></a>
                        <?php endforeach ?>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- Nav Item - Profil Saya -->
            <li class="nav-item">
                <a class="nav-link pt-0" href="<?= base_url('PeminjamanUser') ?>">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pinjaman Saya</span></a>
            </li>

        <?php endif; ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <a class="nav-link pt-0" href="<?= base_url('Login/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
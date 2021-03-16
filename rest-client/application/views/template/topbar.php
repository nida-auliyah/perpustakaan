<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <?php if ($this->session->userdata('level') == 'user') : ?>
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shopping-cart fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter"><?= $this->cart->total_items(); ?></span>
                        </a>
                        <?php if ($this->cart->contents()) : ?>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Keranjang Buku
                                </h6>
                                <?php foreach ($this->cart->contents() as $item) : ?>
                                    <div class="dropdown-item d-flex align-items-center">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="<?= base_url('assets/book/') . $item['image']; ?>" alt="">
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><?= $item['name'] ?></div>
                                            <a href="<?= base_url('user/updateCart/') . $item['rowid']; ?>" class="small text-gray-900">Hapus</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <a class="dropdown-item text-center small text-gray-900" href="<?= base_url('user/pinjam') ?>">Pinjam Sekarang</a>
                                <a class="dropdown-item text-center small text-gray-600" href="<?= base_url('user/clearCart') ?>">Kosongkan Keranjang</a>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username') ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/') . 'default.jpg' ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <?php if ($this->session->userdata('level') == 'user') : ?>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profil Saya
                            </a>
                            <div class="dropdown-divider"></div>
                        <?php endif; ?>
                        <a class="dropdown-item" href="<?= base_url('login/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
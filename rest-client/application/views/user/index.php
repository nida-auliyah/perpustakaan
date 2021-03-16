<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->


        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-grey topbar mb-4 static-top ">

            <!-- Sidebar Toggle (Topbar) -->

            <?php if ($this->session->userdata('level') == 'user') : ?>

                <!-- Topbar Search -->
                <form method="post" action="<?= base_url('user/pencarian') ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-white shadow border-0 small" id="keyword" name="keyword" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

            <?php endif; ?>

            <!-- Topbar Navbar -->
        </nav>

</div>
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= base_url() ?>/assets/img/slider1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url() ?>/assets/img/slider2.jpg" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 mt-4 text-gray-900 text-center">All Buku</h1>

    <div class="row text-center mt-4">
        <?php foreach ($buku as $mn) : ?>
            <div class="col-md-3">
                <div class="card mb-3">
                    <img src="http://localhost/tugas_projek/rest-server/assets/book/<?= $mn["foto"]; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?= $mn["judul"]; ?></h5>
                        <a href="<?= base_url('user/addToCart/') . $mn['id']; ?>" class="btn btn-sm btn-primary">Pinjam</a>
                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailDataModal<?= $mn['id']; ?>">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<!-- Modal -->
<?php foreach ($buku as $mn) : ?>
    <div class=" modal fade" id="detailDataModal<?= $mn['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailDataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailDataModalLabel">Detail Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/book/') . $mn['foto']; ?>" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item"><strong><?= $mn['judul']  ?></strong></li>
                                <li class="list-group-item">Pengarang: <?= $mn['pengarang']  ?></li>
                                <li class="list-group-item">Penerbit: <?= $mn['penerbit']  ?></li>
                                <li class="list-group-item">Tahun Terbit: <?= $mn['tahun_terbit']  ?></li>
                                <li class="list-group-item">Isi: <?= $mn['isi']  ?> halaman</li>
                                <li class="list-group-item"><?= $mn['deskripsi']  ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
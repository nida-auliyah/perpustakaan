<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 mt-4 text-gray-900 text-center"><?= $title ?></h1>

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
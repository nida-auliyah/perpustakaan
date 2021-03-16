<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php if (empty($peminjaman)) : ?>
        <div class="alert alert-danger" role="alert">
            Data peminjaman tidak ditemukan
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($peminjaman as $pjn) :
                                            if ($pjn['status_peminjaman'] == 1) : ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $pjn['nama']; ?></td>
                                <td><?= $pjn['tanggal_peminjaman']; ?></td>
                                <td><?= $pjn['tanggal_pengembalian']; ?></td>
                                <td>
                                    <a href="<?= base_url('peminjaman/detail/') . $pjn['id_peminjaman']; ?>" class="badge badge-primary">detail</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                    <?php endif;
                                        endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div></div>
    <h1 class="h3 mb-4 text-gray-800">Peminjaman belum dikembalikan</h1>

    <div class="row">
        <div class="col-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($peminjaman as $pjn) :
                                            if ($pjn['status_peminjaman'] == 0) : ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $pjn['nama']; ?></td>
                                <td><?= $pjn['tanggal_peminjaman']; ?></td>
                                <td><?= $pjn['tanggal_pengembalian']; ?></td>
                                <td>
                                    <a href="<?= base_url('peminjaman/detail/') . $pjn['id_peminjaman']; ?>" class="badge badge-primary">detail</a>
                                    <a href="<?= base_url('peminjaman/konfirmasi/') . $pjn['id_peminjaman']; ?>" class="badge badge-success" data-toggle="modal" data-target="#konfirmasiDataModal<?= $pjn['id_peminjaman']; ?>">konfirmasi</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                    <?php endif;
                                                                                                                                                                                            endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<?php foreach ($peminjaman as $pjn) : ?>
    <div class=" modal fade" id="konfirmasiDataModal<?= $pjn['id_peminjaman']; ?>" tabindex="-1" role="dialog" aria-labelledby="konfirmasiDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url('peminjaman/konfirmasi/') . $pjn['id_peminjaman']; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteDataModalLabel">Konfirmasi Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('peminjaman/konfirmasi/') . $pjn['id_peminjaman']; ?>" method="post">
                        <div class="modal-body">
                            <p>Are kamu ingin mengkonfirmasi bahwa id <?= $pjn['id_peminjaman']; ?> telah mengembalikan buku?</p>
                        </div>
                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
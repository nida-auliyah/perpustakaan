<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="<?= base_url('peminjaman') ?>" class="btn btn-primary mb-3">Kembali</a>

    <?php if (empty($detail)) : ?>
        <div class="alert alert-danger" role="alert">
            Data detail_pesanan tidak ditemukan
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Isi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($detail as $dt) : ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $dt['judul']; ?></td>
                            <td><?= $dt['pengarang']; ?></td>
                            <td><?= $dt['penerbit']; ?></td>
                            <td><?= $dt['tahun_terbit']; ?></td>
                            <td><?= $dt['isi']; ?></td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
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
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($peminjaman as $pjn) :  ?>
                        <?php if ($pjn['id_user'] == $this->session->userdata('id_user')) : ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $pjn['tanggal_peminjaman']; ?></td>
                                <td><?= $pjn['tanggal_pengembalian']; ?></td>
                                <td>
                                    <a href="<?= base_url('peminjamanUser/detail/') . $pjn['id_peminjaman']; ?>" class="badge badge-primary">detail</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div></div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php if (empty($user)) : ?>
        <div class="alert alert-danger" role="alert">
            Data anggota tidak ditemukan
        </div>
    <?php endif; ?>


    <div class="row">
        <div class="col-lg">
            <?= form_error('nama_user', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>
            <?= form_error('alamat', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>
            <?= form_error('telepon', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($user as $usr) : ?>
                        <?php if ($usr['level'] == "user") : ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $usr['nama']; ?></td>
                                <td><?= $usr['alamat']; ?></td>
                                <td><?= $usr['telepon']; ?></td>
                            </tr>
                            <?php $no++; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
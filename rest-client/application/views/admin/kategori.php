<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDataModal">Tambah Data</a>

    <?php if (empty($kategori)) : ?>
        <div class="alert alert-danger" role="alert">
            Data kategori tidak ditemukan
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg">
            <?= form_error('nama_kategori', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>
            <?= form_error('detail_kategori', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kategori as $ktg) : ?>
                        <tr>
                            <th scope="row"><?= $ktg['id_kategori']; ?></th>
                            <td><?= $ktg['nama_kategori']; ?></td>
                            <td><?= $ktg['detail_kategori']; ?></td>
                            <td>
                                <a href="<?= base_url('kategori/edit/') . $ktg['id_kategori']; ?>" class="badge badge-success" data-toggle="modal" data-target="#editDataModal<?= $ktg['id_kategori']; ?>">edit</a>
                                <a href="<?= base_url('kategori/hapus/') . $ktg['id_kategori']; ?>" class="badge badge-danger" data-toggle="modal" data-target="#deleteDataModal<?= $ktg['id_kategori']; ?>">hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class=" modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDataModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kategori/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama kategori">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="detail_kategori" name="detail_kategori" placeholder="Detail">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach ($kategori as $ktg) : ?>
    <div class=" modal fade" id="editDataModal<?= $ktg['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('kategori/edit/') . $ktg['id_kategori']; ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id_kategori " name="id_kategori" value="<?= $ktg['id_kategori']; ?>">
                        <div class=" form-group">
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $ktg['nama_kategori'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="detail_kategori" name="detail_kategori" placeholder="Detail" value="<?= $ktg['detail_kategori'] ?>">
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal -->
<?php foreach ($kategori as $ktg) : ?>
    <div class=" modal fade" id="deleteDataModal<?= $ktg['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDataModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('kategori/hapus/') . $ktg['id_kategori']; ?>" method="post">
                    <div class="modal-body">
                        <p>Are kamu yakin untuk menghapus data <?= $ktg['nama_kategori']; ?> ?</p>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDataModal">Tambah Data</a>

    <?php if (empty($buku)) : ?>
        <div class="alert alert-danger" role="alert">
            Data buku tidak ditemukan
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg">
            <?= form_error('id_kategori', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>
            <?= form_error('judul', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>
            <?= form_error('pengarang', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>
            <?= form_error('penerbit', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>
            <?= form_error('tahun_terbit', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>
            <?= form_error('isi', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>
            <?= form_error('deskripsi', '<div class="alert alert-danger" role = "alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Isi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($buku as $bk) : ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><img src="http://localhost/tugas_projek/rest-server/assets/book/<?= $bk['foto'] ?>" width="100px"></td>
                            <td><?= $bk['detail_kategori']; ?></td>
                            <td><?= $bk['judul']; ?></td>
                            <td><?= $bk['pengarang']; ?></td>
                            <td><?= $bk['penerbit']; ?></td>
                            <td><?= $bk['tahun_terbit']; ?></td>
                            <td><?= $bk['isi']; ?></td>
                            <td>
                                <a href="<?= base_url('buku/edit/') . $bk['id']; ?>" class="badge badge-success" data-toggle="modal" data-target="#editDataModal<?= $bk['id']; ?>">edit</a>
                                <a href="<?= base_url('buku/hapus/') . $bk['id']; ?>" class="badge badge-danger" data-toggle="modal" data-target="#deleteDataModal<?= $bk['id']; ?>">hapus</a>
                            </td>
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
            <form action="<?= base_url('buku/tambah') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_kategori" class="pl-1">Nama Kategori</label>
                        <select class="form-control" id="id_kategori" name="id_kategori">
                            <option selected></option>
                            <?php foreach ($kategori as $bk) : ?>
                                <option value="<?= $bk['id_kategori']; ?>">
                                    <?= $bk['detail_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul" class="pl-1">Judul buku</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="pengarang" class="pl-1">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang">
                    </div>
                    <div class="form-group">
                        <label for="penerbit" class="pl-1">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit">
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit" class="pl-1">Tahun Terbit</label>
                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit">
                    </div>
                    <div class="form-group">
                        <label for="isi" class="pl-1">Isi</label>
                        <input type="text" class="form-control" id="isi" name="isi">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="pl-1">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="foto" class="pl-1">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
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
<?php foreach ($buku as $bk) : ?>
    <div class=" modal fade" id="editDataModal<?= $bk['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('buku/edit/') . $bk['id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id " name="id" value="<?= $bk['id']; ?>">
                        <div class="form-group">
                            <label for="id_kategori" class="pl-1">Nama Kategori</label>
                            <select class="form-control" id="id_kategori" name="id_kategori">
                                <option selected></option>
                                <?php foreach ($kategori as $mn) : ?>
                                    <option value="<?= $mn['id_kategori']; ?>">
                                        <?= $mn['detail_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul" class="pl-1">Judul buku</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $bk['judul'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="pengarang" class="pl-1">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $bk['pengarang'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="penerbit" class="pl-1">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $bk['penerbit'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="tahun_terbit" class="pl-1">Tahun Terbit</label>
                            <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $bk['tahun_terbit'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="isi" class="pl-1">Isi</label>
                            <input type="text" class="form-control" id="isi" name="isi" value="<?= $bk['isi'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="pl-1">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $bk['deskripsi'] ?>">
                        </div>
                        <input type="hidden" class="form-control" id="oldfoto" name="oldfoto" value="<?= $bk['foto'] ?>">
                        <div class="form-group">
                            <label for="foto" class="pl-1">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
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

<?php foreach ($buku as $bk) : ?>
    <div class=" modal fade" id="deleteDataModal<?= $bk['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDataModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('buku/hapus/') . $bk['id']; ?>" method="post">
                    <div class="modal-body">
                        <p>Apakah kamu yakin untuk menghapus data <?= $bk['judul']; ?> ?</p>
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
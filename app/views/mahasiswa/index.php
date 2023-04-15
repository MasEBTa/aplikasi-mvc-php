<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::Flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tambahDataMahasiswa" data-bs-toggle="modal" data-bs-target="#ModalTambahData">
                Tambah Data
            </button>
            <br /><br />
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $key) : ?>
                    <li class="list-group-item">
                        <?= $key['nama']; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $key['id']; ?>" class="badge rounded-pill bg-danger ms-1" style="text-decoration: none; float: right;" onclick="return confirm('apakah yakin mau menghapus data <?= $key['nama']; ?>')">hapus</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $key['id']; ?>" class="badge rounded-pill bg-warning float-end ms-1 tampilModalUbah" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#ModalTambahData" data-idnya="<?= $key['id']; ?>" data-base="<?= BASEURL; ?>">ubah</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $key['id']; ?>" class="badge rounded-pill bg-primary float-end" style="text-decoration: none">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalTambahData" tabindex="-1" aria-labelledby="ModalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form -->
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="idnya" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="namanya" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="namanya" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nrpnya" class="form-label">Nrp</label>
                        <input type="number" class="form-control" id="nrpnya" name="nrp">
                    </div>
                    <div class="mb-3">
                        <label for="InputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" name="email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="jurusannya" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="jurusannya" name="jurusan">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="gambarnya" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="gambarnya" name="gambar">
                    </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
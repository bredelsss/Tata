<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main>

    <div class="container-fluid" style="margin-top: 4em">
        <!-- <h1 class="mt-4">Data Motor</h1> -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active font-weight-bold text-dark">Ubah Data Pelanggan</li>
        </ol>

        <div class="card mb-4">
            <!-- <div class="card-header">
                <i class=""></i>
                <?= $title ?>
            </div> -->
            <div class="card-body">
                <!-- Form Tambah Buku -->
                <form action="/pelanggan/ubah/<?= $result['id_pelanggan'] ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('nama') ?
                                                                        'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('noHp', $result['nama_pelanggan']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('alamat') ?
                                                                        'is-invalid' : '' ?>" id="alamat" name="alamat" value="<?= old('noHp', $result['alamat']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('alamat') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="noHp" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('noHp') ?
                                                                        'is-invalid' : '' ?>" id="noHp" name="noHp" value="<?= old('noHp', $result['no_hp']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('noHp') ?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2 " type="submit">Simpan</button>
                        <ol></ol>
                        <a class="btn btn-danger" type="button" href="/pelanggan">Batal</a>
                        <ol></ol>
                        <a class="btn btn-dark" type="button" href="/pelanggan" >Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
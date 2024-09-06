<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main>
    
    <div class="container-fluid" style="margin-top: 4em">
        <!-- <h1 class="mt-4">Data Motor</h1> -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active font-weight-bold text-dark">Tambah Data Pelanggan</li>
        </ol>

        <div class="card mb-4">
            <!-- <div class="card-header">
                <i class=""></i>
                <?= $title ?>
            </div> -->
            <div class="card-body">
                <!-- Form Tambah Buku -->
                <form action="/pelanggan/tambah" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('nama') ?
                            'is-invalid' : '' ?>" id="nama" name="nama">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('alamat') ? 
                            'is-invalid' : '' ?>" id="alamat" name="alamat">
                             <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('alamat') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="noHp" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('noHp') ? 
                            'is-invalid' : '' ?>" id="noHp" name="noHp">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tahun') ?>
                            </div>
                        </div>
                    </div>
                    

                <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2 " type="submit">Simpan</button>
                        <ol></ol>
                        <button class="btn btn-danger" type="reset">Batal</button>
                        <ol></ol>
                        <a class="btn btn-dark" type="button" href="/pelanggan" >Kembali</a>
                    </div>

            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
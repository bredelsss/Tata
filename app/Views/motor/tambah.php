<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main>
    
    <div class="container-fluid" style="margin-top: 4em">
        <!-- <h1 class="mt-4">Data Motor</h1> -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active font-weight-bold text-dark">Tambah Data Motor</li>
        </ol>

        <div class="card mb-4">
            <!-- <div class="card-header">
                <i class=""></i>
                <?= $title ?>
            </div> -->
            <div class="card-body">
                <!-- Form Tambah Buku -->
                <form action="/motor/tambah" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('nama') ?
                            'is-invalid' : '' ?>" id="nama" name="nama">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama') ?>
                            </div>
                        </div>
                        <label for="plat" class="col-sm-2 col-form-label" style="max-width: 120px; margin-left: 34px;">No Plat</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('plat') ? 
                            'is-invalid' : '' ?>" id="plat" name="plat">
                             <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('plat') ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="tahun" class="col-sm-2 col-form-label">Tahun Rilis</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('tahun') ? 
                            'is-invalid' : '' ?>" id="tahun" name="tahun">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tahun') ?>
                            </div>
                        </div>
                        <label for="jenis" class="col-sm-2 col-form-label" style="max-width: 120px; margin-left: 34px;">Jenis</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('jenis') ? 
                            'is-invalid' : '' ?>" id="jenis" name="jenis">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('jenis') ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('jumlah') ? 
                            'is-invalid' : '' ?>" id="jumlah" name="jumlah">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('jumlah') ?>
                            </div>
                        </div>
                        <label for="warna" class="col-sm-2 col-form-label" style="max-width: 120px; margin-left: 34px;">Warna</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('warna') ? 
                            'is-invalid' : '' ?>" id="warna" name="warna">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('warna') ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('harga') ? 
                            'is-invalid' : '' ?>" id="harga" name="harga">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('warna') ?>
                            </div>
                        </div>
                        <label for="status" class="col-sm-2 col-form-label" style="max-width: 120px; margin-left: 34px;">Status </label>
                        <div class="col-sm-4">
                            <select type="text" class="form-control" id="status" name="status">
                                <option value="1">
                                    Tersedia</option>
                                <option value="0">
                                    Tidak tersedia</option>
                            </select>
                        </div>
                    </div>

                    

                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Fotor Motor</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control <?= $validation->hasError('foto') ? 'is-invalid' : '' ?>"
                            id="foto" name="foto" onchange="previewImage()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('foto') ?>
                            </div>
                            <div class="col-sm-6 mt-2">
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                            </div>
                        </div>
                    </div>

                <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                        <!-- <button class="btn btn-dark" href="/motor">Kembali</button> -->
                        <a class="btn btn-dark" type="button" href="/motor">Kembali</a>
                        <ol></ol>
                        <button class="btn btn-primary me-md-2 " type="submit">Simpan</button>
                        <ol></ol>
                        <button class="btn btn-danger" type="reset">Batal</button>
                    </div>

            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main>

    <div class="container-fluid" style="margin-top: 4em">
        <!-- <h1 class="mt-4">Data Motor</h1> -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active font-weight-bold text-dark">Ubah Data Motor</li>
        </ol>

        <div class="card mb-4">
            <!-- <div class="card-header">
                <i class=""></i>
                <?= $title ?>
            </div> -->
            <div class="card-body">
                <!-- Form Tambah Buku -->
                <form action="/motor/ubah/<?= $result['id_motor'] ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('nama') ?
                                                                        'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama', $result['nama_motor']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama') ?>
                            </div>
                        </div>
                        <label for="plat" class="col-sm-2 col-form-label" style="max-width: 120px; margin-left: 34px;">No Plat</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('plat') ?
                                                                        'is-invalid' : '' ?>" id="plat" name="plat" value="<?= old('nama', $result['no_platMotor']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('plat') ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="tahun" class="col-sm-2 col-form-label">Tahun Rilis</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('tahun') ?
                                                                        'is-invalid' : '' ?>" id="tahun" name="tahun" value="<?= old('nama', $result['tahun_rilis']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tahun') ?>
                            </div>
                        </div>
                        <label for="jenis" class="col-sm-2 col-form-label" style="max-width: 120px; margin-left: 34px;">Jenis</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('jenis') ?
                                                                        'is-invalid' : '' ?>" id="jenis" name="jenis" value="<?= old('nama', $result['jenis_motor']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('jenis') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('jumlah') ?
                                                                        'is-invalid' : '' ?>" id="jumlah" name="jumlah" value="<?= old('nama', $result['jumlah_motor']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('jumlah') ?>
                            </div>
                        </div>
                        <label for="warna" class="col-sm-2 col-form-label" style="max-width: 120px; margin-left: 34px;">Warna</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('warna') ?
                                                                        'is-invalid' : '' ?>" id="warna" name="warna" value="<?= old('nama', $result['warna_motor']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('warna') ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('harga') ?
                                                                        'is-invalid' : '' ?>" id="harga" name="harga" value="<?= old('nama', $result['harga']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('warna') ?>
                            </div>
                        </div>
                        <label for="status" style="max-width: 120px; margin-left: 45px;">Status</label>
                        <div class="col-sm-4">
                        <select type="text" class="form-control" id="status" name="status" style="margin-left:62px ;">
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
                        <input type="hidden" name="sampullama" value="<?= $result['foto_motor'] ?>">
                            <input type="file" class="form-control <?= $validation->hasError('foto') ? 'is-invalid' : '' ?>"
                            id="foto" name="foto" onchange="previewImage()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('foto') ?>
                            </div>
                            <div class="col-sm-6 mt-2">
                            <img src="/img/<?= $result['foto_motor'] == "" ? "default.jpg" :  $result 
                                            ['foto_motor'] ?>" alt="" class="img-thumbnail img-preview">
                            </div>
                        </div>
                    </div>
                    <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2 " type="submit">Simpan</button>
                        <ol></ol>
                        <button class="btn btn-danger" type="reset">Batal</button>
                        <ol></ol>
                        <a class="btn btn-dark" type="button" href="/motor" >Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
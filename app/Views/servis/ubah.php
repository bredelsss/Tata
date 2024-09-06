<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main>

    <div class="container-fluid" style="margin-top: 4em">
        <!-- <h1 class="mt-4">Data Motor</h1> -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active font-weight-bold text-dark">Ubah Data Servis</li>
        </ol>

        <div class="card mb-4">
            <!-- <div class="card-header">
                <i class=""></i>
                <?= $title ?>
            </div> -->
            <div class="card-body">
                <!-- Form Tambah Buku -->
                <form action="/servis/ubah/<?= $result['id_servis'] ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Servis</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control <?= $validation->hasError('tanggal') ?
                                                                        'is-invalid' : '' ?>" id="tanggal" name="tanggal" value="<?= old('plat', $result['tanggal_servis']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tanggal') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_selesai" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control <?= $validation->hasError('tanggal_selesai') ?
                                                                        'is-invalid' : '' ?>" id="tanggal_selesai" name="tanggal_selesai" value="<?= old('plat', $result['tanggal_selesai']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tanggal_selesai') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="plat" class="col-sm-2 col-form-label">No Plat Motor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('plat') ?
                                                                        'is-invalid' : '' ?>" id="plat" name="plat" value="<?= old('plat', $result['no_platMotor']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('plat') ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                    <label for="id_ket" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-3">
                            <select type="text" class="form-control" id="id_ket" name="id_ket">
                                <?php foreach ($detail as $value) : ?>
                                    <option value="<?= $value['id_ket'] ?>">
                                        <?= $value['keterangan'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    
                    <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2 " type="submit">Simpan</button>
                        <ol></ol>
                        <button class="btn btn-danger" type="reset" >Batal</button>
                        
                        <ol></ol>
                        <a class="btn btn-dark" type="button" href="/servis" >Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
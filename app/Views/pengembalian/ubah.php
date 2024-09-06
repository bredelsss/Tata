<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main>

    <div class="container-fluid" style="margin-top: 4em">
        <!-- <h1 class="mt-4">Data Motor</h1> -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active font-weight-bold text-dark">Ubah Data Pengembalian</li>
        </ol>

        <div class="card mb-4">
            <!-- <div class="card-header">
                <i class=""></i>
                <?= $title ?>
            </div> -->
            <div class="card-body">
                <!-- Form Tambah Buku -->
                <form action="/pengembalian/ubah/<?= $result['id_pengembalian'] ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="nota" class="col-sm-2 col-form-label">No Nota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('nota') ?
                                                                        'is-invalid' : '' ?>" id="nota" name="nota" value="<?= old('denda', $result['no_nota']) ?>" >
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tanggal') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pengembalan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('tanggal') ?
                                                                        'is-invalid' : '' ?>" id="tanggal" name="tanggal" value="<?= old('denda', $result['tanggal_pengembalian']) ?>" >
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tanggal') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="denda" class="col-sm-2 col-form-label">Denda</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('denda') ?
                                                                        'is-invalid' : '' ?>" id="denda" name="denda" value="<?= old('denda', $result['denda']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('denda') ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select type="text" class="form-control" id="status" name="status">
                            <option value="1">
                                Sudah Kembali</option>
                            <option value="0">
                               Belum Kembali</option>
                        </select>
                    </div>

                    
                    <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2 " type="submit">Simpan</button>
                        <ol></ol>
                        <!-- <button class="btn btn-danger" type="reset" >Batal</button> -->
                        <button class="btn btn-danger" type="reset">Batal</button>
                        <ol></ol>
                        <a class="btn btn-dark" type="button" href="/pengembalian">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
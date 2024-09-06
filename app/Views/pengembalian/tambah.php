<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main>
    
    <div class="container-fluid" style="margin-top: 4em">
        <!-- <h1 class="mt-4">Data Motor</h1> -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active font-weight-bold text-dark">Tambah Data Pengembalian</li>
        </ol>

        <div class="card mb-4">
            <!-- <div class="card-header">
                <i class=""></i>
                <?= $title ?>
            </div> -->
            <div class="card-body">
                <!-- Form Tambah Buku -->
                <form action="/pengembalian/tambah" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="nota" class="col-sm-2 col-form-label">No Nota </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('nota') ?
                            'is-invalid' : '' ?>" id="nota" name="nota">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nota') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pengembalian </label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control <?= $validation->hasError('tanggal') ?
                            'is-invalid' : '' ?>" id="tanggal" name="tanggal">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tanggal') ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="mb-3 row">
                    <label for="denda" class="col-sm-2 col-form-label">Denda</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('denda') ? 
                            'is-invalid' : '' ?>" id="denda" name="denda">
                             <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('denda') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 col-form-label">Status </label>
                        <div class="col-sm-3">
                            <select type="text" class="form-control" id="status" name="status">
                                <option value="1">
                                    Sudah Kembali</option>
                                <option value="0">
                                    Belum Kembali</option>
                            </select>
                        </div>
                    </div>

                    
                    
                    

                <div class="d-grip gap-2 d-md-flex justify-content-md-end" style="margin-top: 76px;">
                        <button class="btn btn-primary me-md-2 " type="submit">Simpan</button>
                        <ol></ol>
                        <button class="btn btn-danger" type="reset">Batal</button>
                        <ol></ol>
                        <a class="btn btn-dark" type="button" href="/pengembalian" >Kembali</a>
                    </div>

            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main>

    <div class="container-fluid" style="margin-top: 4em">
        <!-- <h1 class="mt-4">Data Motor</h1> -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active font-weight-bold text-dark">Tambah Transaksi Sewa Motor</li>
        </ol>

        <div class="card mb-4">
            <!-- <div class="card-header">
                <i class=""></i>
                
                <?= $title ?>
            </div> -->
            <div class="card-body">
            <button class="btn btn-primary" style="margin-top: 20px;" data-bs-target="#modalPel" data-bs-toggle="modal">Pilih Pelanggan</button>
                <button class="btn btn-primary" style="margin-top: 20px;"data-bs-target="#modalMotor" data-bs-toggle="modal">Pilih Motor</button>

            <form action="/sewa/tambah" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                
                <!-- Form Tambah Buku -->
              
                <div class="mb-3 row" style="margin-top: 20px;">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Motor</label>
                    <div class="col-sm-4">
                        <input id="nama" type="text" class="form-control <?= $validation->hasError('nama') ?
                                                                                'is-invalid' : '' ?>" name="nama" value="<?= old('id_motor', $result['id_motor']) ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama') ?>
                        </div>
                    </div>
                    <label for="tanggal_berangkat" class="col-sm-2 col-form-label" style="margin-left: 10px; max-width: 200px;">Tanggal Berangkat</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="tglM" name="tanggal_berangkat">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="plat" class="col-sm-2 col-form-label">No Plat</label>
                    <div class="col-sm-4">
                        <input id="no-plat" type="text" class="form-control <?= $validation->hasError('plat') ?
                                                                                'is-invalid' : '' ?>" name="plat">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('plat') ?>
                        </div>
                    </div>
                    <label for="tanggal_kembali" class="col-sm-2 col-form-label" style="margin-left: 10px; max-width: 200px;">Tanggal Kembali</label>
                    <div class="col-sm-3">
                        <input onchange="jumlahHari()" type="date" class="form-control" id="tglK" name="tanggal_kembali">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-4">
                        <input id="price" type="text" class="form-control <?= $validation->hasError('price') ?
                                                                                'is-invalid' : '' ?>" name="price">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('price') ?>
                        </div>
                    </div>
                    <label for="lama_pemakaian" class="col-sm-2 col-form-label" style="margin-left: 10px; max-width: 200px;">Lama Pemakaian</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="lama" name="lama_pemakaian">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="jaminan" class="col-sm-2 col-form-label">Jaminan</label>
                    <div class="col-sm-4">
                        <input id="jaminan" type="text" class="form-control <?= $validation->hasError('jaminan') ?
                                                                                'is-invalid' : '' ?>" name="jaminan">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('jaminan') ?>
                        </div>
                    </div>
                </div>

              
                <div class="mb-3 row" style="margin-top: 20px;">
                    <label for="namaP" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= $validation->hasError('nama') ?
                                                                    'is-invalid' : '' ?>" id="namaP" name="namaP">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama') ?>
                        </div>
                    </div>

                    <label class="col-form=label" style="margin-left: 22px; max-width: 200px;">Total Bayar</label>
                    <h1><span id="total" onchange="jumlahHari()">0</span></h1>

                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= $validation->hasError('alamat') ?
                                                                    'is-invalid' : '' ?>" id="alamat" name="alamat">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('alamat') ?>
                        </div>
                    </div>
                    
                </div>
               
                  <input type="hidden" name="user" value="<?= user()->id ?>">
                    <input type="hidden" name="id_pelanggan" id="id_pelanggan">
                    <input type="hidden" name="id_motor" id="id_motor">
                    <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2 " type="submit">Simpan</button>
                        <ol></ol>
                        <button class="btn btn-danger" type="reset">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>
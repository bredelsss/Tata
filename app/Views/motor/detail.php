<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4" style="margin-top: 4em">
       
        <!-- <ol class="breadcrumb mb-4">
        
        </ol> -->

        <div class="card mb-4">
            <div class="card-header">
                
                <?= $title ?>
            </div>
            <div class="card-body">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="/img/Vario-150.jpg" alt="" width="100%"> 
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                            
                            
                                <p class="card-text">Nama Motor:<br><?= $result['nama_motor'] ?></p>
                                <p class="card-text">No Plat Motor:<br><?= $result['no_platMotor'] ?></p>
                                <p class="card-text">Tahun Rilis: <?= $result['tahun_rilis'] ?></p>
                                <p class="card-text">Jenis: <?= $result['jenis_motor'] ?></p>
                                <p class="card-text">Harga: <?= $result['harga'] ?></p>
                                <p class="card-text">Jumlah: <?= $result['jumlah_motor'] ?></p>
                                <p class="card-text">Warna Motor: <?= $result['warna_motor'] ?></p>
                                <div class="d-grid gap-2 d-md-block">
                                    <a class="btn btn-dark" type="button" href="/motor">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
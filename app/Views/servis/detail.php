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
                        <!-- <div class="col-md-4">
                        <img src="/img/Vario-150.jpg" alt="" width="100%"> 
                        </div> -->
                        <div class="col-md-7">
                            <div class="card-body">
                            
                            
                                
                                <p class="card-text">Tanggal Servis  : <?= date('d M Y', strtotime($result['tanggal_servis'])) ?></p>
                                <p class="card-text">Tanggal Selesai  : <?= date('d M Y', strtotime($result['tanggal_selesai']))?></p>
                                <p class="card-text">No Plat Motor  : <?= $result['no_platMotor'] ?></p>
                                <p class="card-text">Keterangan     : <?= $result['keterangan'] ?></p>
                                
                                <div class="d-grid gap-2 d-md-block">
                                    <a class="btn btn-dark" type="button" href="/servis">Kembali</a>
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
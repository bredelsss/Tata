<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
  

<section class="section">
          <div class="section-header">
            <h1>Transaksi Penyewaan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
              <!-- <div class="breadcrumb-item"><a href=""></a></div> -->
              <div class="breadcrumb-item">Transaksi Penyewaan</div>
            </div>
          </div>

        
            <div class="row">
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h4>Transaksi Penyewaan</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                        <input type="date" name="tanggal_berangkat" class="form-control">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                  <a class="btn btn-primary mb-3" type="button" href="/sewa/tambah">Tambah Transaksi</a>
                    <div class="table-responsive">
                    <div class="row">
                        <div class="col">
                            <label class="col-form-label">Tgl: </label>
                            <input type="text" value="<?= date('d/m/Y') ?>" disabled>
                        </div>
                        <div class="col" style="margin-right: 410px;">
                            <label class="col-form-label">User: </label>
                            <input type="text" value="<?= user()->username ?>" disabled>
                        </div>
                        <!-- <div class="col">
                            <label class="col-form-label">Plgn: </label>
                            <input type="text" id="nama-cust" disabled>
                            <input type="hidden" id="id-cust">
                        </div>
                        <div class="col">
                            <label class="col-form-label">Telp: </label>
                            <input type="text" id="nama-cust" disabled>
                            <input type="hidden" id="id-cust">
                        </div> -->
                        
                            
                            <!-- <button class="btn btn-info" data-bs-target="#modalCust" data-bs-toggle="modal">Atur Tanggal</button> -->
                            <!-- <button class="btn btn-dark" data-bs-target="#modalCust" data-bs-toggle="modal">Cari Pelanggan</button> -->
                        
                    </div>
                      <table class="table">
                        <tr>
                          
                          <th>No Nota</th>
                          <th>Nama Pelanggan</th>
                          <th>Nama Motor</th>
                          <!-- <th>Jaminan</th> -->
                          <th>Harga</th>
                          <th>Tanggal Berangkat</th>
                          <th>Tanggal Kembali</th>
                          <th>Lama Sewa</th>
                          <th>Jaminan</th>
                          <th>Total</th>
                          <th>Action</th>
                        </tr>
                        <?php $no = 1;
                  foreach ($result as $value) : ?>
                    <tr>
                      
                      
                      <td><?= $value['no_nota'] ?></td>
                      <td><?= $value['nama_pelanggan'] ?></td>
                      <td><?= $value['nama_motor'] ?></td>
                      <td><?= $value['harga_sewa'] ?></td>
                      <td><?= date('d M Y', strtotime($value['tanggal_berangkat'])) ?></td>
                      
                      <td><?= date('d M Y', strtotime($value['tanggal_kembali'])) ?></td>
                      <td ><?= $value['lama_pemakaian'] ?></td>
                      <td><?= $value['jaminan'] ?></td>
                      
      
                      <td><?= $value['harga_sewa'] * $value['lama_pemakaian']?></td>
                      <td>
                      <ol></ol>
                        <a class="btn btn-primary fas fa-file-alt" href="/sewa/nota/<?= $value['no_nota'] ?>" role="button"></a>
                        <ol></ol>
                        <form action="/sewa/<?= $value['no_nota'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-danger fas fa-trash" role="button" onclick="confirm('Apakah anda yakin?')"></button>
                        </form>
                        <ol></ol>
                      </td>

                    <?php endforeach; ?>
                        <!-- <tr>
                          <td>1</td>
                          <td>
                            J67890
                            
                          </td>
                          <td>Honda Beat 2020</td>
                          <td>KTP</td>
                          <td>50000</td>
                          <td>25/11/22</td>
                          <td>26/11/22</td>
                          <td>1 Hari</td>
                          <td>
                            
                        </tr> -->
                        
                      </table>
                      <!-- <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <label class="col-form=label">Total Bayar</label>
                            <h1><span id="spanTotal">0</span></h1>
                        </div> -->
                        <!-- <div class="col-4">
                            <div class="mb-3 row">
                               <label class="col-4 col-form-label">Nominal</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="nominal" autocomplete="off">
                                </div> 
                            </div>
                            <div class="mb-3 row">
                               <label class="col-4 col-form-label">Kembalian</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="kembalian" disabled>
                                </div> 
                            </div>
                            <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                        <button onclick="bayar()" class="btn btn-success me-md-2" style="margin-right: 11px;" type="button">Proses Bayar</button>
                        <button onclick="location.reload()" class="btn btn-primary" type="button">Transaksi Baru</button> -->
                    </div>
                        </div>    
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
        </section>

<?= $this->endSection() ?>
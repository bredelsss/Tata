<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
  

<section class="section">
          <div class="section-header">
            <h1>Laporan Transaksi </h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
              <!-- <div class="breadcrumb-item"><a href=""></a></div> -->
              <div class="breadcrumb-item">Laporan Transaksi</div>
            </div>
          </div>

        
            <div class="row">
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h4>Laporan Transaksi</h4>
                    <div class="card-header-form">
                  
                      <form action="/sewa/report" method="POST"enctype="multipart/form-data">
                      <?= csrf_field() ?>
                        <div class="input-group">
                        <input type="date" name="tanggal_berangkat" class="form-control">
                        <input type="date" name="tanggal_kembali" class="form-control">
                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-info fas fa-search"></button>
                            
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                  


                  <div class="row ">
                    <div class="col">
                      <form action="/sewa/exportpdf" method="POST" enctype="multipart/form-data" class="form-inline">
                        <?= csrf_field()?>
                    <input type="date" name="tanggal_berangkat" class="form-control">
                    <input type="date" name="tanggal_kembali" class="form-control ml-3">
                    <button type="submit" class="btn btn-info ml-3">Cetak</button>
                    </form>
                    </div>
                    

                  </div>
                  
                    <div class="table-responsive mt-2">
                    <div class="row">
                        <!--  -->
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
                    </div>
                      <table class="table">
                        <tr>
                          
                          <th>No Nota</th>
                          <th>Nama Pelanggan</th>
                          <th>Nama Motor</th>
                          <th>User</th>
                          
                          <th>Tanggal Berangkat</th>
                          <th>Tanggal Kembali</th>
                          
                          
                          <th>Total</th>
                          <th>Action</th>
                        </tr>
                        <?php $no = 1;
                  foreach ($result as $value) : ?>
                    <tr>
                      
                      
                      <td><?= $value['no_nota'] ?></td>
                      <td><?= $value['nama_pelanggan'] ?></td>
                      <td><?= $value['nama_motor'] ?></td>
                      <td><?=  user()->username ?></td>
                      
                      <td><?= date('d M Y', strtotime($value['tanggal_berangkat'])) ?></td>
                      
                      <td><?= date('d M Y', strtotime($value['tanggal_kembali'])) ?></td>
                      
                      
                      
                      <td><?= $value['lama_pemakaian'] * $value['harga_sewa'] ?></td>
                      <td>
                      
                       
                        <form action="/sewa/<?= $value['no_nota'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-danger fas fa-trash" role="button" onclick="confirm('Apakah anda yakin?')"></button>
                        </form>
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
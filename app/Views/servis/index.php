<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
  

<section class="section">

          <div class="section-header border">
            <h1>Data Servis</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
              <div class="breadcrumb-item">Data Servis</div>
            </div>
          </div>
          <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('msg') ?>
      </div>
    <?php endif; ?>
          <div class="section-body">
            <!-- <h2 class="section-title">Tables</h2>
            <p class="section-lead">
              Examples for opt-in styling of tables (given their prevalent use in JavaScript plugins) with Bootstrap.
            </p> -->

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Servis</h4>
                    <div class="card-header-form">
                    <form action="/servis" method="POST"enctype="multipart/form-data">
                      <?= csrf_field() ?>
                        <div class="input-group">
                        <input type="date" name="tanggal_berangkat" class="form-control">
                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-info fas fa-search"></button>
                            
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                  <a class="btn btn-primary mb-3" type="button" href="/servis/tambah">Tambah Servis</a>
                  <div class="table-responsive">
                    
                  
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Id Ket</th>
                          <th scope="col">Tanggal Servis</th>
                          <th scope="col">Tanggal Selesai</th>
                          <th scope="col">No Plat</th>
                          
                          <!-- <th scope="col">Alamat</th>
                          <th scope="col">No Telepon</th> -->
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 1;
                  foreach ($result as $value) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $value['keterangan'] ?></td>
                      <td><?=date('d M Y', strtotime($value['tanggal_servis']))  ?></td>
                      <td><?=date('d M Y', strtotime($value['tanggal_selesai']))  ?></td>
                      <td><?= $value['no_platMotor'] ?></td>
                      
                      
                      
                      

                      <td>
                      <a class="btn btn-warning fas fa-pencil-alt" href="/servis/ubah/<?= $value['slug'] ?>" role="button"></a>
                      <form action="/servis/<?= $value['id_servis'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-danger fas fa-trash" role="button" onclick="confirm('Apakah anda yakin?')"></button>
                        </form>
                          <a class="btn btn-primary fas fa-info" href="/servis/<?= $value['slug'] ?>" role="button"></a>
                      </td>

                    <?php endforeach; ?>
                        <!-- <tr>
                          <th scope="row">1</th>
                          
                          <td>12345</td>
                          <td>AB 1234 YT</td>
                          <td>22/11/22</td>
                          
                          <td>
                            <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>12345</td>
                          <td>AB 5678 YT</td>
                          <td>25/11/22</td>
                          
                          <td>
                            <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
                          </td>
                        </tr> -->
                        
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
                
          </div>
        </section>
        
<?= $this->endSection() ?>
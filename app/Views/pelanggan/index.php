<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
  

<section class="section">

          <div class="section-header border">
            <h1>Data Pelanggan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              
              <div class="breadcrumb-item">Data Pelanggan</div>
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
                    <h4>Data Pelanggan</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input name="goleki" type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                  <a class="btn btn-primary mb-3" type="button" href="/pelanggan/tambah">Tambah Pelanggan</a>
                  <div class="table-responsive">
                    
                  
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <!-- <th scope="col">F</th> -->
                          <!-- <th scope="col">Id</th> -->
                          <th scope="col">Nama Pelanggan</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">No Telepon</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 1;
                  foreach ($result as $value) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      
                      <td><?= $value['nama_pelanggan'] ?></td>
                      <td><?= $value['alamat'] ?></td>
                      <td><?= $value['no_hp'] ?></td>
                      
                      

                      <td>
                      <a class="btn btn-warning fas fa-pencil-alt" href="/pelanggan/ubah/<?= $value['slug'] ?>" role="button"></a>
                        <!-- <a class="btn btn-primary fas fa-info" href="/motor/" role="button"></a> -->
                        <form action="/pelanggan/<?= $value['id_pelanggan'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-danger fas fa-trash" role="button" onclick="confirm('Apakah anda yakin?')"></button>
                        </form>
                      </td>

                    <?php endforeach; ?>
                        <!-- <tr>
                          <th scope="row">1</th>
                          <td>
                            <img alt="image" src="man.png" class="rounded-circle" width="55">
                          </td>
                          <td>12345</td>
                          <td>Wahyu Sudardi</td>
                          <td>Jl. Sana Sini</td>
                          <td>123456789</td>
                          <td>
                            <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>
                            <img alt="image" src="man.png" class="rounded-circle" width="55">
                          </td>
                          <td>12345</td>
                          <td>Sudardi</td>
                          <td>Jl. Sana Sana</td>
                          <td>123456789</td>
                          <td>
                            <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
  

<section class="section">

          <div class="section-header border">
            <h1>Data Pengembalian</h1>
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
                    <h4>Data Pengembalian</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                        <input type="date" name="tanggal_pengembalian" class="form-control">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                  <a class="btn btn-primary mb-3" type="button" href="/pengembalian/tambah">Tambah Pengembalian</a>
                  <div class="table-responsive">
                    
                  
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">No Nota</th>
                          <!-- <th scope="col">Id</th> -->
                          <th scope="col">Tanggal Pengembalian</th>
                          <th scope="col">Denda</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 1;
                  foreach ($result as $value) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $value['no_nota'] ?></td>
                      <td><?=date('d M Y', strtotime($value['tanggal_pengembalian']))  ?></td>
                      <td><?= $value['denda'] ?></td>
                      <td><span
                          class="badge badge-sm bg-gradient <?= $value['status'] == 1 ? 'btn-success' : 'btn-dark' ?> "><?= $value['status'] == 1 ? 'Sudah Dikembalikan' : 'Belum Dikembalikan' ?>
                        </span></td>
                      
                      
                      

                      <td>
                      <a class="btn btn-warning fas fa-pencil-alt" href="/pengembalian/ubah/<?= $value['slug'] ?>" role="button"></a>
                        <!-- <a class="btn btn-primary fas fa-info" href="/motor/" role="button"></a> -->
                        <form action="/pengembalian/<?= $value['id_pengembalian'] ?>" method="post" class="d-inline">
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
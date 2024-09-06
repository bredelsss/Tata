<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>


<section class="section">

  <div class="section-header border">
    <h1>Data User</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
      <div class="breadcrumb-item">Data User</div>
    </div>
  </div>

  <div class="section-body">
    <!-- <h2 class="section-title">Tables</h2>
            <p class="section-lead">
              Examples for opt-in styling of tables (given their prevalent use in JavaScript plugins) with Bootstrap.
            </p> -->

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Data User</h4>
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
            <a class="btn btn-primary mb-3" type="button" href="/users/tambah">Tambah User</a>
            <div class="table-responsive">


              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($result as $value) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      
                      <td><?= $value->firstname ?></td>
                      <td><?= $value->lastname ?></td>
                      <td><?= $value->email ?></td>
                      <td><?= $value->username ?></td>
                      

                      <td>
                      <form action="/users/<?= $value->id?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-danger fas fa-trash" role="button" onclick="confirm('Apakah anda yakin?')"></button>
                        </form>
                        
                      </td>

                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
</section>

<?= $this->endSection() ?>
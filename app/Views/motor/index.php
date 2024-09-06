<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>


<section class="section">
  <div class="section-header border">
    <h1>Data Motor</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Data Motor</div>
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
            <?= $title ?>
            <h4></h4>
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
            <a class="btn btn-primary mb-3" type="button" href="/motor/tambah">Tambah Motor</a>
            <div class="table-responsive">


              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto Motor</th>
                    <th scope="col">Nama Motor</th>
                    <th scope="col">No Plat</th>
                    <th scope="col">Tahun Rilis</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Status</th>
                    <!-- <th scope="col">Warna</th> -->
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($result as $value) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td>
                        <img src="img/<?= $value['foto_motor'] ?>" class="rounded" style="margin-top: 1em " alt="" width="100">
                      </td>
                      <td><?= $value['nama_motor'] ?></td>
                      <td><?= $value['no_platMotor'] ?></td>
                      <td><?= $value['tahun_rilis'] ?></td>
                      <td><?= $value['jenis_motor'] ?></td>
                      <td><?= $value['harga'] ?></td>
                      <td><span
                          class="badge badge-sm bg-gradient <?= $value['status'] == 1 ? 'btn-success' : 'btn-dark' ?> "><?= $value['status'] == 1 ? 'Tersedia' : 'Tidak tersedia' ?>
                        </span></td>

                      <td>
                        <a class="btn btn-warning fas fa-pencil-alt" href="/motor/ubah/<?= $value['slug'] ?>" role="button"></a>
                        <!-- <a class="btn btn-primary fas fa-info" href="/motor/" role="button"></a> -->
                        <form action="/motor/<?= $value['id_motor'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-danger fas fa-trash" role="button" onclick="confirm('Apakah anda yakin?')"></button>
                        </form>
                        <!-- <a class="d-inline p-2 btn btn-warning btn-sm" ><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="d-inline p-2 btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                        <!-- </td>class="fas fa-pencil-alt" -->
                    </td>
                  <?php endforeach; ?>
                  <!-- <tr>
                          <th scope="row">2</th>
                          <td>
                            <img alt="image" src="vario 150.jfif" class="rounded" width="75">
                            
                            <td>Honda Vario 150 2020</td>
                          <td>AB 1234 YT</td>
                          <td>2020</td>
                          <td>Matic</td>
                          <td>55000</td>
                          <td>10</td>
                          <td><div class="badge badge-secondary">Silver</div></td>
                          
                          <td>
                            <a href="#" class="d-inline p-2 btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="d-inline p-2 btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr> -->

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <script>
  $(document).ready(function () {
    $('#example').DataTable();
});
 </script>
</section>
<?= $this->endSection() ?>
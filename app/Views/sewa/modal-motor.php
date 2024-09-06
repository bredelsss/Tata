
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js%22%3E"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- <script src="<?= base_url()?>/js/scripts.js"></script> -->
        
        <!-- <link href="<?= base_url()?>/css/styles.css" rel="stylesheet" /> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script> -->
         <script src="https://code.jquery.com/jquery-3.5.1.min.js%22%3E"></script> 
<div class="modal fade" id="modalMotor" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Data Motor</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabel Buku Start -->
                <table id="datatablesSimple">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Foto Motor</th>
                            <th width="10%">Nama Motor</th>
                            <th width="10%">No Plat Motor</th>
                            <th width="10%">Tahun Rilis</th>
                            <th width="10%">Jenis Motor</th>
                            <th width="10%">Harga</th>
                            <th width="10%">Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;
                        foreach ($dataMotor as $value) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            
                            <td>
                                <img src="<?= base_url('img/'. $value['foto_motor'])?>" alt="" width="100">
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
                                <button onclick="add_cart('<?= $value['id_motor'] ?>', '<?= $value['nama_motor'] ?>', '<?= $value['no_platMotor'] ?>', '<?= $value['harga'] ?>')"class="btn btn-success"><i class="fa fa-cart-plus"></i> Tambahkan</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Tabel Buku End -->
            </div>
            <div class="modal-footer">
                <button id="clos"class="btn btn-primary" data-bs-dismiss="modal" aria-label="close">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="modalUbah" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Ubah Jumlah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-sm-7">
                        <input type="hidden" id="rowid">
                        <input type="number" id="qty" class="form-control" placeholder="Masukan jumlah produk" min="1" value="1">
                    </div>
                    <div class="col-sm-5">
                        <button class="btn btn-primary" onclick="update_cart()">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

 <script>
    function add_cart(id, name, noplat, price) 
        
          
    {
        $('#id_motor').val(id);
        $('#nama').val(name);
        $('#no-plat').val(noplat);
        $('#price').val(price);

        
        // $('#modalMotor').modal('hide');
        // document.getElementById('clos').click;
    }

</script>
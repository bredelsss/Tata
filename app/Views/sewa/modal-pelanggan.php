
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js%22%3E"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- <script src="<?= base_url()?>/js/scripts.js"></script> -->
        
        <!-- <link href="<?= base_url()?>/css/styles.css" rel="stylesheet" /> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js%22%3E"></script> -->
<div class="modal fade" id="modalPel" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Data Pelanggan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabel Buku Start -->
                <table id="datatablesSimple">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Nama</th>
                            <th width="10%">Alamat</th>
                            <th width="10%">No Hp</th>
                            <!-- <th width="10%">Tahun Rilis</th>
                            <th width="10%">Jenis Motor</th>
                            <th width="10%">Harga</th>
                            <th width="10%">Jumlah Motor</th> -->
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;
                        foreach ($dataPelanggan as $value) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_pelanggan'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                            <td><?= $value['no_hp'] ?></td>
                            
                            <td>
                                <button onclick="selectCustomer('<?= $value['id_pelanggan'] ?>', '<?= $value['nama_pelanggan'] ?>', '<?= $value['alamat'] ?>')"class="btn btn-success"><i class="fa fa-cart-plus"></i> Tambahkan</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Tabel Buku End -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
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
    function selectCustomer(id, name, alamat)
    {
        $('#id_pelanggan').val(id);
        $('#namaP').val(name);
        $('#alamat').val(alamat);
        $('#modalCust').modal('hide');
    }
</script>
<!-- <script>
    function add_cart(id, name, price, discount) {
        $.ajax({
            url: "/jual",
            method: "POST",
            data: {
                id: id,
                name: name,
                qty: 1,
                price: price,
                discount: discount,
            },
            success: function(data) {
                load()
            }
        });
    }

    function update_cart() {
        var rowid = $('#rowid').val();
        var qty = $('#qty').val();

        $.ajax({
            url: "/jual/update",
            method: "POST",
            data: {
                rowid: rowid,
                qty: qty,
            },
            success: function(data) {
                load();
                $('#modalUbah').modal('hide');
            }
        });
    }


    function bayar() {
        var nominal = $('#nominal').val();
        var idcust = $('#id-cust').val();
        $.ajax({
            url: "/jual/bayar",
            method: "POST",
            data: {
                'nominal' : nominal,
                'id-cust' : idcust
            },
            success: function(response) {
                var result = JSON.parse(response);
                swal({
                    title: result.msg,
                    icon: result.status ? "success" : "error",
                });
                
                load();
                $('#nominal').val("");
                $('#kembalian').val(result.data.kembalian);
            }
        });
    }


</script> -->
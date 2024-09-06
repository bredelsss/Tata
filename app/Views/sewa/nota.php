<?php

use App\Controllers\Pelanggan;
?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>


<section class="section">
  <div class="col-8 mx-auto bg-secondary pb-4" >
  <div class="section-header">
    <h1>Nota Penyewaan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Invoice</div>
    </div>
  </div>

  <div class="section-body">
    <div class="invoice" style="border-radius: 25px;">
      <div class="invoice-print">
        <div class="row">
          <div class="col-lg-12">
            <div class="invoice-title">
              <h2>Nota Penyewaan Motor</h2>
              <div class="invoice-number" ></div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <address>
                  <!-- <strong>Billed To:</strong><br> -->
                  
         
                    
                      
                </address>
                
              </div>
              <div class="col-md-6 text-md-right">
                <address>
                <strong>Nama Pelanggan:</strong><br>
                <h6><?= $result['nama_pelanggan'] ?></h6>
                      <h6><?= $result['alamat'] ?></h6>
                </address>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <address>
                  
                </address>
              </div>
              <div class="col-md-6 text-md-right">
                <address>
                  <strong>Tanggal Penyewaan:</strong><br>
                  <td><?= date('d M Y', strtotime($result['tanggal_berangkat'])) ?></td>
                </address>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-md-12">
            <div class="text-center">Penyewaan Motor</div>
            <p class="section-lead"></p>
            <div class="table-responsive">
              <table class="table table-striped table-hover table-md">
                <tr>
                  <th data-width="40">No</th>
                  <th class="text-center">Motor</th>
                  <th class="text-center">Harga</th>
                  <th class="text-center">Lama</th>
                  <th class="text-right">Total</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td class="text-center"><?= $result['nama_motor'] ?></td>
                  <td class="text-center"><?= $result['harga_sewa'] ?></td>
                  <td class="text-center"><?= $result['lama_pemakaian'] ?></td>
                  <td class="text-right"><?= $result['lama_pemakaian'] * $result['harga_sewa'] ?></td>
                </tr>
                <!-- <tr>
                  <td>2</td>
                  <td>Keyboard Wireless</td>
                  <td class="text-center">$20.00</td>
                  <td class="text-center">3</td>
                  <td class="text-right">$60.00</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Headphone Blitz TDR-3000</td>
                  <td class="text-center">$600.00</td>
                  <td class="text-center">1</td>
                  <td class="text-right">$600.00</td>
                </tr> -->
              </table>
            </div>
            <div class="row mt-4">
              <div class="col-lg-8">
                <!-- <div class="section-title">Payment Method</div>
                <p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p> -->
                <!-- <div class="images">
                  <img src="assets/img/visa.png" alt="visa">
                  <img src="assets/img/jcb.png" alt="jcb">
                  <img src="assets/img/mastercard.png" alt="mastercard">
                  <img src="assets/img/paypal.png" alt="paypal">
                </div> -->
              </div>
              <div class="col-lg-4 text-right">
                <div class="invoice-detail-item">
                  <div class="invoice-detail-name">Total</div>
                  <h5>Rp <?= $result['lama_pemakaian'] * $result['harga_sewa'] ?></h5>
                </div>
                
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <button onclick="window.print()" class="btn btn-primary " type="submit" role="button">P R I N T<i class="fas fa-print ml-3"></i></button>
          <a class="btn btn-dark" type="button" href="/sewa" >Kembali</a>
      <hr>
      <div class="text-md-right">
        <div class="float-lg-left mb-lg-0 mb-3">
          <!-- <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button> -->
          
          
        </div>
        
      </div>
    </div>
  </div>
  </div>
</section>

<?= $this->endSection() ?>
<html>

<head>
    <!-- Berisi CSS -->
    <style>
        .title {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .border-table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }

        .border-table th {
            border: 1px solid #000;
            background-color: #e1e3e9;
            font-weight: bold;
        }

        .border-table td {
            border: 1px solid #000;
        }
    </style>
    <!-- -->
</head>

<body>
    <main>
        <div class="title">
            <h1>LAPORAN PENYEWAAN TATA RENTAL MOTOR</h1>
        </div>

        <div>
            <!-- Isi Laporan -->
            <table class="border-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="5%">Nota</th>
                        <th width="15%">Nama Pelanggan</th>
                        <th width="10%">No Plat</th>
                        <th width="14%">Nama Motor</th>
                        <th width="10%">User</th>
                        <th width="15%">Tanggal Berangkat</th>
                        <th width="15%">Tanggal Kembali</th>
                        <th width="10%">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($result as $value) : ?>
                        <tr>
                            <td width="5%"><?= $no++ ?></td>
                            <td width="5%"><?= $value['no_nota'] ?></td>
                            <td width="15%"><?= $value['nama_pelanggan'] ?></td>
                            <td width="10%"><?= $value['no_platMotor'] ?></td>
                            <td width="14%"><?= $value['nama_motor'] ?></td>
                            <td width="10%"><?=  user()->username ?></td>
                            
                            <td width="15%"><?= date('d/m/Y', strtotime($value['tanggal_berangkat'])) ?></td>
                            
                            <td width="15%"><?= date('d/m/Y', strtotime($value['tanggal_kembali'])) ?></td>
                            
                            
                            
                            <td width="10%"><?= $value['lama_pemakaian'] * $value['harga_sewa'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- -->
        </div>
    </main>
</body>

</html>
<?php

namespace App\Models;

use CodeIgniter\Model;

class GrafikModel extends Model
{
    //Nama Tabel
    
    public function getReport($tahun)
    {
        return $this->db->table('transaksi_penyewaan as sd')
        ->select('MONTH(sd.tanggal_berangkat) month,  SUM(sd.total_harga) total')
       ->where('YEAR(sd.tanggal_berangkat)',$tahun)
       ->orderBy('MONTH(sd.tanggal_berangkat)')
       ->groupBy('MONTH(sd.tanggal_berangkat)')
        ->get()->getResultArray();
    }

    
}
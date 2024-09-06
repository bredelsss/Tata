<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class SewaModel extends Model
{
    //Nama Tabel
    protected $table        = 'transaksi_penyewaan';
    //Atribut yang digunakan menjadi primary key
    protected $primaryKey   = 'no_nota';
    
    protected $allowedFields = ['no_nota', 'harga_sewa', 'tanggal_berangkat', 'tanggal_kembali', 'lama_pemakaian', 'jaminan', 'id_user',
                                'id_pelanggan', 'id', 'id_motor', 'total_harga'];
    
    public function getSewa($id=  false){
        $query = $this->table('transaksi_penyewaan')
            ->join('motor', 'motor.id_motor = transaksi_penyewaan.id_motor', 'left')
            ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_penyewaan.id_pelanggan', 'left')
            ->join('users', 'users.id = transaksi_penyewaan.id', 'left');
            
            
            if ($id == false)
            return $query->get()->getResultArray(); 
        return $query->where(['no_nota'=> $id])->first();    
    }
    public function cariSewa($cari){
        $query = $this->table('transaksi_penyewaan')
            ->join('motor', 'motor.id_motor = transaksi_penyewaan.id_motor', 'inner')
            ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_penyewaan.id_pelanggan', 'inner')
            ->join('users', 'users.id = transaksi_penyewaan.id', 'inner')
            ->where('transaksi_penyewaan.tanggal_berangkat ', $cari);
    return $query->get()->getResultArray();
    }

    

    public function pencarian($kunci){
        return $this->table('servis')->like('no_platMotor',($kunci));
    }

    public function getLaporanFilter($from, $to){
        $query = $this->table('transaksi_penyewaan')
            ->join('motor', 'motor.id_motor = transaksi_penyewaan.id_motor', 'left')
            ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_penyewaan.id_pelanggan', 'left')
            ->join('users', 'users.id = transaksi_penyewaan.id', 'left')
            ->where('transaksi_penyewaan.tanggal_berangkat >=', $from)
            ->where('transaksi_penyewaan.tanggal_berangkat <=', $to);
        return $query->get()->getResultArray();       
    }

    public function cariLaporan($cari, $hasil){
        $query = $this->table('transaksi_penyewaan')
            ->join('motor', 'motor.id_motor = transaksi_penyewaan.id_motor', 'left')
            ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_penyewaan.id_pelanggan', 'left')
            ->join('users', 'users.id = transaksi_penyewaan.id', 'left')
            ->where('transaksi_penyewaan.tanggal_berangkat >=', $cari)
            ->where('transaksi_penyewaan.tanggal_berangkat <=', $hasil);
        return $query->get()->getResultArray();       
    }

   
    // public function search($keyword){
    //     $query = $this->table('transaksi_penyewaan');

    //         $query->like('transaksi_penyewaan.tanggal_berangkat', $keyword);
    //     return $query;       
    // }
    
}
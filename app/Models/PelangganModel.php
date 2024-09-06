<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    //Nama Tabel
    protected $table        = 'pelanggan';
    //Atribut yang digunakan menjadi primary key
    protected $primaryKey   = 'id_pelanggan';
    
    protected $allowedFields = ['nama_pelanggan', 'alamat', 'no_hp','slug'];
    
    public function getPelanggan($slug = false){
        $query = $this->table('pelanggan');
        if ($slug == false)
            return $query->get()->getResultArray();
        return $query->where(['slug'=> $slug])->first();
    }
    public function pencarian($kunci){
        return $this->table('pelanggan')->like('nama_pelanggan',($kunci));
    }
    
}
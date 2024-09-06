<?php

namespace App\Models;

use CodeIgniter\Model;

class PengembalianModel extends Model
{
    //Nama Tabel
    protected $table        = 'pengembalian';
    //Atribut yang digunakan menjadi primary key
    protected $primaryKey   = 'id_pengembalian';
    
    protected $allowedFields = ['tanggal_pengembalian', 'denda','slug', 'no_nota', 'status'];
    
    public function getPeng($slug = false){
        $query = $this->table('pengembalian');
        

        if ($slug == false)
            return $query->get()->getResultArray();
        return $query->where(['slug'=> $slug])->first();
    }
    public function pencarian($kunci){
        return $this->table('pengembalian')->like('denda',($kunci));
    }

    public function cariPeng($cari){
        $query = $this->table('pengembalian')
            ->where('pengembalian.tanggal_pengembalian ', $cari);
            
    return $query->get()->getResultArray();
    }
    
}
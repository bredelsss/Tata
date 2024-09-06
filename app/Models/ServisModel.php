<?php

namespace App\Models;

use CodeIgniter\Model;
use LDAP\Result;
use LDAP\ResultEntry;

class ServisModel extends Model
{
    //Nama Tabel
    protected $table        = 'servis';
    //Atribut yang digunakan menjadi primary key
    protected $primaryKey   = 'id_servis';
    
    protected $allowedFields = ['tanggal_servis', 'no_platMotor', 'slug', 'id_ket', 'tanggal_selesai'];
    
    public function getServis($slug = false){
        $query = $this->table('servis')
            ->join('detail_servis','id_ket');
            // ->where('servis.tanggal_servis =', $cari)

            if ($slug == false)
            return $query->get()->getResultArray();
        return $query->where(['slug'=> $slug])->first();
    }

    public function carServis($cari){
        $query = $this->table('servis')
            ->join('detail_servis','id_ket')
            ->where('servis.tanggal_servis ', $cari);
            
    return $query->get()->getResultArray();
    }

    

    // public function pencarian($kunci){
    //     $query=  $this->table('servis')->where('no_platMotor',($kunci));
    //     return $query;
    // }
    
}
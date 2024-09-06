<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    //Nama Tabel
    protected $table        = 'detail_servis';
    //Atribut yang digunakan menjadi primary key
    protected $primaryKey   = 'id_ket';
    
    
}
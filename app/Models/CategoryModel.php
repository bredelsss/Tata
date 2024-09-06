<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    //Nama Tabel
    protected $table        = 'detail_serv';
    //Atribut yang digunakan menjadi primary key
    protected $primaryKey   = 'id_ket';
    
    
}
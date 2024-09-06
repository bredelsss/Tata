<?php
namespace App\Models;

use CodeIgniter\Model;
class MotorModel extends Model
{
    protected $table = 'motor';
    protected $primaryKey = 'id_motor';
    

    protected $allowedFields = [
        'nama_motor','tahun_rilis', 'jenis_motor', 'harga', 'jumlah_motor',
        'warna_motor','slug','no_platMotor', 'foto_motor', 'status'
        
    ];

    public function getMotor($slug = false){
        $query = $this->table('motor');
        if ($slug == false)
            return $query->get()->getResultArray();
        return $query->where(['slug'=> $slug])->first();
    }
    public function pencarian($kunci){
        return $this->table('motor')->like('nama_motor',($kunci));
    }
}
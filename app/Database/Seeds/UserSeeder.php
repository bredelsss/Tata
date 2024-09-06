<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data =[
            [
            'firstname' => 'Jems',
            'lastname' => 'Yu',
            'username' => 'jameyu',
            'email' => 'jems@gmail.com',
            'password' => password_hash('hayuk', PASSWORD_BCRYPT), 
            ],
        ];
        $this->db->table('user2')->insertBatch($data);
        
    }
}

<?php

namespace App\Controllers;

class Nota extends BaseController
{
    public function index()
    {
        
        $data = [
            'title' => 'Nota Transaksi'
        ];
        return view('nota/index', $data);
    }


}



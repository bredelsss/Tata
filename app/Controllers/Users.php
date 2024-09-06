<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;

class Users extends BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $date = $this->request->getVar('goleki');
        if($date == null){
            $dataUser = $this->userModel->findAll();
        }
        else{
           
            $dataUser = $this->userModel->pencarian($date);
        }
        // $dataServis = $this->servisModel->getServis();
        // $data = [
        //     'title' => 'Detail Servis',
        //     'result' => $dataServis
        // ];
        // return view('servis/index', $data);
        $dataUser = $this->userModel->findAll();
        $data = [
            'title' => 'Data User',
            'result' => $dataUser
        ];
        return view('user/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah User',
            'validation' => \Config\Services::validation(),
        ];
        return view('user/tambah', $data);
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus");
        return redirect()->to('/users');
    }
}
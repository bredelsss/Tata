<?php

namespace App\Controllers;
use \App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    public $pelangganModel;
    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('goleki');

        if ($kunci == null) {
            $query = $this->pelangganModel;
            // $jumlah = "";
        } else if ($kunci != null) {
            $query = $this->pelangganModel->pencarian($kunci);
            // $jumlah = "Pencarian dengan nama <B>$kunci</B> ditemukan " . $query->affectedRows() . " Data";
        }

        $data['result'] = $query->paginate(10, 'pagepelanggan');
        $data['pager'] = $this->pelangganModel->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        // $data['jumlah'] = $jumlah;

        // $data['patchTitle'] = 'Motor';
        $data['title'] = 'Data Pelanggan';
        
        return view('pelanggan/index', $data);
    }
    
    public function tambah()
    {
        session();
        $data = [
            'title' => 'Tambah Pelanggan',
            // 'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('pelanggan/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'noHp' => 'required|numeric',
            ])) {
                return redirect()->to('/pelanggan/tambah/' . $this->request->getVar('slug'))->withInput();
            }

        $slug = url_title($this->request->getVar('noHp'), '-', true);
        $this->pelangganModel->save([
            
            'nama_pelanggan' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('noHp'),
            'slug' => $slug, 
        ]);

        session()->setFlashdata("msg", "Data Berhasil Ditambah!!");

        return redirect()->to('/pelanggan');
    }

    public function ubah($slug)
    {
        $dataPelanggan = $this->pelangganModel->getPelanggan($slug);
        //jika dta buku ksong
        if (empty($dataPelanggan)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("No Hp
            $slug tidak ditemukan");
        }

        $data = [
            'title' => 'Ubah Pelanggan',
            // 'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation(),
            'result' => $dataPelanggan
        ];
        return view('pelanggan/ubah', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'noHp' => 'required|numeric',
            ])) {
                return redirect()->to('/pelanggan/ubah/' . $this->request->getVar('slug'))->withInput();
            }

        $slug = url_title($this->request->getVar('noHp'), '-', true);
        $this->pelangganModel->save([
            'id_pelanggan' => $id,
            'nama_pelanggan' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('noHp'),
            'slug' => $slug, 
            // 'cover' => $namaFile,
        ]);
        session()->setFlashdata("msg", "Data berhasil diubah!");
        return redirect()->to('/pelanggan');
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!!");
        return redirect()->to('/pelanggan');
    }
}

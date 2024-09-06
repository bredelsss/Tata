<?php

namespace App\Controllers;
use \App\Models\PengembalianModel;
use \App\Models\SewaModel;

class Pengembalian extends BaseController
{
    public $pengModel, $sewa;
    public function __construct()
    {
        $this->pengModel = new PengembalianModel();
        $this->sewa = new SewaModel();
    }

    public function index()
    {
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('goleki');
        


        $date = $this->request->getVar('tanggal_pengembalian');
        if($date == null){
            // $dataServis = $this->servisModel->getServis();
            $dataPengembalian = $this->pengModel->getPeng();
        }
        else{
            $dataPengembalian = $this->pengModel->cariPeng($date);
        }
        $data = [
            'title' => 'Data Pengembalian',
            'result' => $dataPengembalian,
        ]; 
        
        return view('pengembalian/index', $data);
    }
    
    public function tambah()
    {
        session();
        $data = [
            'title' => 'Tambah Pengemballian',
            // 'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('pengembalian/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'tanggal'=>'required',
            'denda'=>'required|numeric',
            'nota' =>'required',
            ])) {
                return redirect()->to('/pengembalian/tambah/' . $this->request->getVar('slug'))->withInput();
            }

        $slug = url_title($this->request->getVar('nota'), '-', true);
        $this->pengModel->save([
            'no_nota' => $this->request->getVar('nota'),
            'tanggal_pengembalian' => $this->request->getVar('tanggal'),
            'denda' => $this->request->getVar('denda'),
            'status' => $this->request->getVar('status'),
            'slug' => $slug, 
        ]);

        session()->setFlashdata("msg", "Data Berhasil Ditambah!!");

        return redirect()->to('/pengembalian');
    }

    public function ubah($slug)
    {
        $dataPengembalian = $this->pengModel->getPeng($slug);
        //jika dta buku ksong
        if (empty($dataPengembalian)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Denda
            $slug tidak ditemukan");
        }

        $data = [
            'title' => 'Ubah Pengembalian',
            // 'category' => $this->catModel->findAll(),
            'sewa' => $this->sewa->findAll(),
            'validation' => \Config\Services::validation(),
            'result' => $dataPengembalian
        ];
        return view('pengembalian/ubah', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nota' =>'required',
            'tanggal'=>'required',
            'denda'=>'required|numeric',
            ])) {
                return redirect()->to('/pengembalian/tambah/' . $this->request->getVar('slug'))->withInput();
            }

        $slug = url_title($this->request->getVar('nota'), '-', true);
        $this->pengModel->save([
            'id_pengembalian' => $id,
            'no_nota' => $this->request->getVar('nota'),
            'tanggal_pengembalian' => $this->request->getVar('tanggal'),
            'denda' => $this->request->getVar('denda'),
            'status' => $this->request->getVar('status'),
            'slug' => $slug,  
            // 'cover' => $namaFile,
        ]);
        session()->setFlashdata("msg", "Data berhasil diubah!");
        return redirect()->to('/pengembalian');
    }

    public function delete($id)
    {
        $this->pengModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!!");
        return redirect()->to('/pengembalian');
    }
}

<?php

namespace App\Controllers;
use \App\Models\ServisModel;
use \App\Models\DetailModel;

class Servis extends BaseController
{
    public $servisModel, $detailModel;
    public function __construct()
    {
        $this->servisModel = new ServisModel();
        $this->detailModel = new DetailModel();
    }

    public function index()
    {
        $date = $this->request->getVar('tanggal_berangkat');
        if($date == null){
            $dataServis = $this->servisModel->getServis();
        }
        else{
            $dataServis = $this->servisModel->carServis($date);
        }
        // $dataServis = $this->servisModel->getServis();
        $data = [
            'title' => 'Detail Servis',
            'result' => $dataServis
        ];
        return view('servis/index', $data);
    }

    public function detail($slug)
    {
        $dataServis = $this->servisModel->getServis($slug);
        $data = [
            'title' => 'Detail Servis',
            'result' => $dataServis
        ];
        return view('servis/detail', $data);
    }
    
    public function tambah()
    {
        session();
        $data = [
            'title' => 'Tambah Servis',
            'detail' => $this->detailModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('servis/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'tanggal'=>'required',
            'tanggal_selesai'=>'required',
            'plat' => 'required',
            'id_ket' => 'required',
            ])) {
                return redirect()->to('/servis/tambah/' . $this->request->getVar('slug'))->withInput();
            }

        $slug = url_title($this->request->getVar('plat'), '-', true);
        $this->servisModel->save([
            
            'tanggal_servis' => $this->request->getVar('tanggal'),
            'tanggal_selesai' => $this->request->getVar('tanggal_selesai'),
            'no_platMotor' => $this->request->getVar('plat'),
            'id_ket' => $this->request->getVar('id_ket'),
            
            'slug' => $slug, 
        ]);

        session()->setFlashdata("msg", "Data Berhasil Ditambah!!");

        return redirect()->to('/servis');
    }

    public function ubah($slug)
    {
        $dataServis = $this->servisModel->getServis($slug);
        //jika dta buku ksong
        if (empty($dataServis)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("No Plat Motor
            $slug tidak ditemukan");
        }

        $data = [
            'title' => 'Ubah Servis',
            'detail' => $this->detailModel->findAll(),
            'validation' => \Config\Services::validation(),
            'result' => $dataServis
        ];
        return view('servis/ubah', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'tanggal'=>'required',
            'id_ket'=>'required',
            'tanggal_selesai' => 'required',
            ])) {
                return redirect()->to('/servis/ubah/' . $this->request->getVar('slug'))->withInput();
            }

        $slug = url_title($this->request->getVar('plat'), '-', true);
        $this->servisModel->save([
            'id_servis' => $id,
            'tanggal_servis' => $this->request->getVar('tanggal'),
            'tanggal_selesai' => $this->request->getVar('tanggal_selesai'),
            'no_platMotor' => $this->request->getVar('plat'),
            'id_ket' => $this->request->getVar('id_ket'),
            'slug' => $slug, 
            // 'cover' => $namaFile,
        ]);
        session()->setFlashdata("msg", "Data berhasil diubah!");
        return redirect()->to('/servis');
    }

    public function delete($id)
    {
        $this->servisModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!!");
        return redirect()->to('/servis');
    }
}

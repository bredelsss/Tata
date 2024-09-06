<?php

namespace App\Controllers;
use \App\Models\MotorModel;

class Motor extends BaseController
{
    public $motorModel;
    public function __construct(){
        $this->motorModel = new MotorModel();
    }

    public function index()
    {
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('goleki');

        if ($kunci == null) {
            $query = $this->motorModel;
            // $jumlah = "";
        } else if ($kunci != null) {
            $query = $this->motorModel->pencarian($kunci);
            // $jumlah = "Pencarian dengan nama <B>$kunci</B> ditemukan " . $query->affectedRows() . " Data";
        }

        $data['result'] = $query->paginate(10, 'pagemotor');
        $data['pager'] = $this->motorModel->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        // $data['jumlah'] = $jumlah;

        // $data['patchTitle'] = 'Motor';
        $data['title'] = 'Data Motor';
        
        return view('motor/index', $data);
    }

    public function detail($slug)
    {
        $dataMotor = $this->motorModel->getMotor($slug);
        $data = [
            'title' => 'Detail Motor',
            'result' => $dataMotor
        ];
        return view('motor/detail', $data);
    }
    

    public function tambah()
    {
        session();
        $data = [
            'title' => 'Tambah Motor',
            // 'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('motor/tambah', $data);
    }
    
    public function save(){
        if (!$this->validate([
            'plat' => [
                'rules' => 'required|is_unique[motor.no_platMotor]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ], 
            'nama'=>'required',
            'tahun'=>'required|integer',
            'harga' => 'required|numeric',
            'warna' => 'required',
            'jumlah' => 'required|integer',
            'plat' => 'required',
            'jenis' => 'required',
            'foto' => 
            [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB!!',
                    'is_image' => 'Yang anda pilih bukan gambar!!',
                    'mime_in' => 'Yang anda pilih bukan gambar!!',
                ]
            ],
        ])) {
            return redirect()->to('/motor/tambah')->withInput();
        }

        $namaFileLama = $this->request->getVar('fotolama');
        // Mengambil File Sampul
        $fileFoto = $this->request->getFile('foto');
        // Cek gambar, apakah masih gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFile = $namaFileLama;
        } else {
            // Generate Nama File
            $namaFile = $fileFoto->getRandomName();
            // Pindahkan File ke Folder img di public
            $fileFoto->move('img', $namaFile);

            // // Jika sampulnya default
            // if ($namaFileLama != $this->defaultImage && $namaFile != "") {
            //     // hapus gambar
            //     unlink('img/' . $namaFileLama);
            // }

        }
        
        $slug = url_title($this->request->getVar('plat'), '-', true);
        $this->motorModel->save([
            
            'no_platMotor' => $this->request->getVar('plat'),
            'tahun_rilis' => $this->request->getVar('tahun'),
            'nama_motor' => $this->request->getVar('nama'),
            'jenis_motor' => $this->request->getVar('jenis'),
            'warna_motor' => $this->request->getVar('warna'),
            'jumlah_motor' => $this->request->getVar('jumlah'),
            'harga' => $this->request->getVar('harga'),
            'status' => $this->request->getVar('status'),
            'slug' => $slug, 
            'foto_motor' => $namaFile
        ]);

        session()->setFlashdata("msg", "Data Berhasil Ditambah!!");

        return redirect()->to('/motor');
    }

    public function ubah($slug)
    {
        $dataMotor = $this->motorModel->getMotor($slug);
        //jika dta buku ksong
        if (empty($dataMotor)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Plat Motor
            $slug tidak ditemukan");
        }

        $data = [
            'title' => 'Ubah Buku',
            // 'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation(),
            'result' => $dataMotor
        ];
        return view('motor/ubah', $data);
    }

    public function update($id)
    {
        // $dataOld = $this->motorModel->getmotor($this->request->getVar('plat'));
        // if ($dataOld['no_polisi'] == $this->request->getVar('no_polisi')) {
        //     $rule_plat = 'required';
        // } else {
        //     $rule_plat = 'required|is_unique[daftar_motor.no_polisi]';
        // }

        if (!$this->validate([
            'plat' => [
                'rules' => 'required|is_unique[motor.no_platMotor]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ], 
            'nama'=>'required',
            'tahun'=>'required|integer',
            'harga' => 'required|numeric',
            'warna' => 'required',
            'jumlah' => 'required|integer',
            'plat' => 'required',
            'jenis' => 'required',
            'foto' => 
            [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB!!',
                    'is_image' => 'Yang anda pilih bukan gambar!!',
                    'mime_in' => 'Yang anda pilih bukan gambar!!',
                ]
            ],
            // 'nama_motor' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nama motor harus diisi'
            //     ]
            // ],
            // 'jenis_motor' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Merk motor harus diisi'
            //     ]
            // ],
            // 'warna_motor' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Warna motor harus diisi'
            //     ]
            // ],
            // 'no_platMotor' => [
            //     'rules' => 'required|is_unique[motor.no_platMotor]',
            //     'errors' => [
            //         'required' => 'No Polisi harus diisi',
            //         'is_unique' => 'No Polisi sudah ada'
            //     ]
            // ],
            // 'harga' => [
            //     'rules' => 'required|integer',
            //     'errors' => [
            //         'required' => 'Harga sewa harus diisi',
            //         'integer' => 'Harga sewa hanya boleh angka'
            //     ]
            // ],
            // 'gambar' =>
            // [
            //     'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => 'Gambar tidak boleh lebih dari 1MB',
            //         'is_image' => 'Yang anda pilih bukan gambar',
            //         'mime_in' => 'Extensi file harus .jpg, .jpeg, .png',
            //     ]
            // ],

        ])) {
            return redirect()->to('/motor/ubah/' . $this->request->getVar('slug'))->withInput();
        }

        $namaFileLama = $this->request->getVar('fotolama');
        // Mengambil File Sampul
        $fileFoto = $this->request->getFile('foto');
        // Cek gambar, apakah masih gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFile = $namaFileLama;
        } else {
            // Generate Nama File
            $namaFile = $fileFoto->getRandomName();
            // Pindahkan File ke Folder img di public
            $fileFoto->move('img', $namaFile);

            // // Jika sampulnya default
            // if ($namaFileLama != $this->defaultImage && $namaFile != "") {
            //     // hapus gambar
            //     unlink('img/' . $namaFileLama);
            // }

        }
        // $namaFileLama = $this->request->getVar('gambarLama');
        // $fileGambar = $this->request->getFile('gambar');
        // if ($fileGambar->getError() == 4) {
        //     $namaFile = $namaFileLama;
        // } else {
        //     $namaFile = $fileGambar->getRandomName();
        //     $fileGambar->move('assets/img', $namaFile);
        //     if ($namaFileLama != $this->defaultImage && $namaFileLama != "") {
        //         unlink('assets/img/' . $namaFileLama);
        //     }
        // }
        $slug = url_title($this->request->getVar('plat'), '-', true);
        $this->motorModel->save([
            'id_motor' => $id,
            'no_platMotor' => $this->request->getVar('plat'),
            'tahun_rilis' => $this->request->getVar('tahun'),
            'nama_motor' => $this->request->getVar('nama'),
            'jenis_motor' => $this->request->getVar('jenis'),
            'warna_motor' => $this->request->getVar('warna'),
            'jumlah_motor' => $this->request->getVar('jumlah'),
            'harga' => $this->request->getVar('harga'),
            'status' => $this->request->getVar('status'),
            'foto_motor' => $namaFile,
            'slug' => $slug, 
            // 'cover' => $namaFile,
        ]);
        session()->setFlashdata("msg", "Data berhasil diubah!");
        return redirect()->to('/motor');
    }

    public function delete($id)
    {
        // $dataMotor = $this->motorModel->find($id);
        $this->motorModel->delete($id);

        // if ($datamotor['gambar'] != $this->defaultImage) {
        //     unlink('assets/img/' . $datamotor['gambar']);
        // }

        session()->setFlashdata("msg", "Data motor berhasil dihapus!");
        return redirect()->to('/motor');
    }
}

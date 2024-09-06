<div class="section-header">
            <h1>Data Motor</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="">Motor</a></div>
              <div class="breadcrumb-item">Tabel Motor</div>
            </div>
          </div>

        
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Motor</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                    <a class="btn btn-primary mb-3" type="button" href="/motor/tambah">Tambah Motor</a>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Foto Motor</th>
                            <th>Merk Motor</th>
                            <th>No Plat Motor</th>
                            <th>Tahun Rilis</th>
                            <th>Jenis Motor</th>
                            <th>Jumlah</th>
                            <th>Warna Motor</th>
                            
                            <th>Action</th>
                          </tr>
                        </thead>
                        
                        <tr>
                          <td>
                            <img alt="image" src="beat 2.jfif" class="rounded" width="80" data-toggle="tooltip" title="Beat-Street">
                            
                          </td>
                          <td>Honda Beat Street 2020</td>
                          <td>AB 1234 YT</td>
                          <td>2020</td>
                          <td>Matic</td>
                          <td>10</td>
                          <td><div class="badge badge-dark">Hitam</div></td>
                          <!-- <td>Matic</td> -->
                          <td>
                            <a href="#" class="d-inline p-2 btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="d-inline p-2 btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                          <img alt="image" src="Vario 150.jfif" class="rounded" width="80" data-toggle="tooltip" title="Beat-Street">
                            
                          </td>
                          <th>Honda Vario 2020</th>
                          <td>AB 5678 YT</td>
                          <td>2020</td>
                          <td>Matic</td>
                          <td>10</td>
                          <td><div class="badge badge-secondary">Silver</div></td>
                          <!-- <td>Matic</td> -->
                          <td>                           
                            <a href="#" class="d-inline p-2 btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="d-inline p-2 btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          </td>

                        </tr>
                        <tr>
                          <td>
                          <img alt="image" src="beat2020.jfif" class="rounded" width="80" data-toggle="tooltip" title="Beat-Street">
                            
                          </td>
                          <td> Honda Beat 2020</td>
                          <td>AB 1257 YT</td>
                          <td>2020</td>
                          <td>Matic</td>
                          <td>10</td>
                          <td><div class="badge badge-dark">Hitam</div></td>
                          <!-- <td>Matic</td> -->
                          <td>
                            <a href="#" class="d-inline p-2 btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="d-inline p-2 btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            



                    <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-5">
                                    <input type="file" class="form-control <?= $validation->hasError('foto') ? 
                                        'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImage()">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('foto') ?>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                                        </div>                                        
                                    </div>
                                </div>


                                <img src="<?= base_url('img/' . $result['cover']) ?>" alt="" width="50%">

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

    public function update($id){
        if (!$this->validate([
            'plat' => [
                'rules' => 'required|is_unique[motor.no_platMotor]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ], 
            'tahun'=>'required|integer',
            'nama'=> 'required',
            'harga' => 'required|numeric',
            'warna' => 'required',
            'jumlah' => 'required|integer',
            'jenis' => 'required',
            // 'foto' => 
            // [
            //     'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => 'Gambar tidak boleh lebih dari 1MB!!',
            //         'is_image' => 'Yang anda pilih bukan gambar!!',
            //         'mime_in' => 'Yang anda pilih bukan gambar!!',
            //     ]
            // ],
        ])) {
            return redirect()->to('/motor/ubah/' . $this->request->getVar('no_platMotor'))->withInput();
        }
        $slug = url_title($this->request->getVar('plat'), '-', true);
        $this->motorModel->insert([
            'id_motor' => $id,
            'no_platMotor' => $this->request->getVar('plat'),
            'tahun_rilis' => $this->request->getVar('tahun'),
            'nama_motor' => $this->request->getVar('nama'),
            'jenis_motor' => $this->request->getVar('jenis'),
            'warna_motor' => $this->request->getVar('warna'),
            'jumlah_motor' => $this->request->getVar('jumlah'),
            'harga' => $this->request->getVar('harga'),
            'slug' => $slug, 
            // 'cover' => $namaFile,
        ]);

        session()->setFlashdata("msg", "Data Berhasil Diubah!!");
        return redirect()->to('/motor');
    }
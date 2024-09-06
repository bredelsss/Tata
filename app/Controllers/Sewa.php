<?php

namespace App\Controllers;
use \App\Models\SewaModel;
use \App\Models\MotorModel;
use \App\Models\PelangganModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sewa extends BaseController
{
    public $sewaModel, $motor, $pelanggan;
    public function __construct()
    {
        $this->sewaModel = new SewaModel();
        $this->motor = new MotorModel();
        $this->pelanggan = new PelangganModel();
        
    }

    public function index()
    {
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('goleki');
        $dataMotor = $this->motor->getMotor();
        
        // $total = $dataSewa['lama_pemakaian'] * $dataSewa
        // dd($dataSewa);
        $date = $this->request->getVar('tanggal_berangkat');
        if($date == null){
            $dataSewa = $this->sewaModel->getSewa();
        }
        else{
            $dataSewa = $this->sewaModel->cariSewa($date);
        } //
        //  dd($dataSewa);
        $data = [
            'title' => 'Data Transaksi',
            // 'dataMotor' => $dataMotor,
            'result' => $dataSewa
            // 'result' => $dataServis
        ];
        
        return view('sewa/index', $data);
    }

    public function tambah()
    {
        session();
        $dataMotor = $this->motor->getMotor();
        $dataPelanggan = $this->pelanggan->getPelanggan();
        $data = [
            'title' => 'Tambah Penyewaan',
            // 'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation(),
            'dataMotor' => $dataMotor,
            'dataPelanggan' => $dataPelanggan,
        ];
        return view('sewa/tambah', $data);
    }

    public function save()
    {
        // if (!$this->validate([
        //     'tanggal_berangkat'=>'required|numeric',
        //     'tanggal_selesai'=>'required',
        //     'plat' => 'required',
        //     'id_ket' => 'required',
        //     ])) {
        //         return redirect()->to('/sewa/tambah/');
        //     }

        
        $this->sewaModel->insert([
            // 'no_nota' => $id,
           
            'id_motor' => $this->request->getVar('id_motor'),
            'nama_motor' => $this->request->getVar('nama'),
            'id_pelanggan' => $this->request->getVar('id_pelanggan'),
            'total_harga' => $this->request->getVar('total'),
            'harga_sewa' => $this->request->getVar('price'),
            'nama_pelanggan' => $this->request->getVar('namaP'),
            'alamat' => $this->request->getVar('alamat'),
            'tanggal_berangkat' => $this->request->getVar('tanggal_berangkat'),
            'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
            'lama_pemakaian' => $this->request->getVar('lama_pemakaian'),
            'no_platMotor' => $this->request->getVar('plat'),
            'jaminan' => $this->request->getVar('jaminan'),
            'id_ket' => $this->request->getVar('id_ket'),
            'id' => user()->id,
            
        ]);

        session()->setFlashdata("msg", "Data Berhasil Ditambah!!");

        return redirect()->to('/sewa');
    }

    public function ubah()
    {
        session();
        $dataMotor = $this->motor->getMotor();
        $dataPelanggan = $this->pelanggan->getPelanggan();
        $dataSewa = $this->sewaModel->getSewa();
        $data = [
            'title' => 'Tambah Penyewaan',
            // 'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation(),
            'dataMotor' => $dataMotor,
            'dataPelanggan' => $dataPelanggan,
            'result' => $dataSewa
        ];
        return view('sewa/ubah', $data);
    }

    public function update()
    {
        // if (!$this->validate([
        //     'tanggal'=>'required',
        //     'tanggal_selesai'=>'required',
        //     'plat' => 'required',
        //     'id_ket' => 'required',
        //     ])) {
        //         return redirect()->to('/servis/tambah/' . $this->request->getVar('slug'))->withInput();
        //     }

        
        $this->sewaModel->save([
            // 'no_nota' => $id,
            'id_motor' => $this->request->getVar('id_motor'),
            'id_pelanggan' => $this->request->getVar('id_pelanggan'),
            'total_harga' => $this->request->getVar('total'),
            'harga_sewa' => $this->request->getVar('price'),
            'nama_pelanggan' => $this->request->getVar('namaP'),
            'alamat' => $this->request->getVar('alamat'),
            'tanggal_berangkat' => $this->request->getVar('tanggal_berangkat'),
            'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
            'lama_pemakaian' => $this->request->getVar('lama_pemakaian'),
            'no_platMotor' => $this->request->getVar('plat'),
            'jaminan' => $this->request->getVar('jaminan'),
            'id_ket' => $this->request->getVar('id_ket'),
            
            
        ]);

        session()->setFlashdata("msg", "Data Berhasil Ditambah!!");

        return redirect()->to('/sewa');
    }

    public function delete($id)
    {
        $this->sewaModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!!");
        return redirect()->to('/sewa');
    }

    

    public function nota($id)
    {
        $dataSewa = $this->sewaModel->getSewa($id);
        // dd($dataSewa);
        $data = [
            'title' => 'Nota Transaksi',
            'result' => $dataSewa
        ];
        return view('sewa/nota', $data);
    }

    public function getLaporan(){
        $query = $this->db->table('transaksi_penyewaan')
            ->join('motor', 'motor.id_motor = transaksi_penyewaan.id_motor', 'left')
            ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_penyewaan.id_pelanggan', 'left')
            ->join('users', 'users.id = transaksi_penyewaan.id', 'left');
            
            return $query->get()->getResultArray(); 
    }

    public function report()
    {
        $date = $this->request->getVar('tanggal_berangkat');
        $date2 = $this->request->getVar('tanggal_kembali');
        // $from = $this->request->getVar('tanggal_berangkat');
        // $to = $this->request->getVar('tanggal_kembali');
        // dd($from);
        if($date == null){
            $report = $this->sewaModel->getSewa();
            // dd($report);
        }
        else{
        $report = $this->sewaModel->cariLaporan($date, $date2);
        }
        // $from = $this->request->getVar('tgl_berangkat');
        // $to = $this->request->getVar('tgl_kembali');
        
        
        // $report = $this->sewaModel->getSewa();
        $data = [
            'title' => 'Laporan Penjualan',
            'result' => $report,
        ];
        return view('sewa/report', $data);
    }

    public function exportPDF()
    {
      
        $from = $this->request->getVar('tanggal_berangkat');
        $to = $this->request->getVar('tanggal_kembali');
        // dd($from);
        if($from == null && $to == null){
            $report = $this->sewaModel->getSewa();
            // dd($report);
        }
        if($from != null || $to != null){
        $report = $this->sewaModel->getLaporanFilter($from, $to);
        }
        // $report = $this->sewaModel->getLaporanFilter("2022-11-15", "2022-11-17");
        // dd($report);
        $data = [
            'title' => 'Laporan Penyewaan',
            'result' => $report,
        ];
        $html = view('sewa/exportPDF', $data);

        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->WriteHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-sewa.pdf', 'I');
    }

    
}
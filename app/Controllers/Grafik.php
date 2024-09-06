<?php

namespace App\Controllers;

use App\Models\GrafikModel;

class Grafik extends BaseController
{

    private $grafik;
    public function __construct(){
        $this->grafik= new GrafikModel();
    }
    public function index()
    {
        // $tahun = $this->request->getVar(2022);
        // dd($tahun);
        // $report = $this->grafik->getReport(2022);
        // // dd($report);
        $data = [
            'title' => 'Grafik',
            // 'status' => false,
            // 'data' => $report,
        ];
        return view('grafik/index', $data);
    }

    public function showChartTransaksi()
    {
      
        $tahun = $this->request->getVar('tahun');
        // dd($tahun);
        $report = $this->grafik->getReport($tahun);
        $response = [
            'status' => false,
            'data' => $report
        ];
        echo json_encode($response);
    }

    public function showChartTransaksi2()
    {
      
        $tahun2 = $this->request->getVar('tahun2');
        // dd($tahun);
        $report = $this->grafik->getReport2($tahun2);
        $response = [
            'status' => false,
            'data' => $report
        ];
        echo json_encode($response);
    }
}



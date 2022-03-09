<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PesananModel;

class LaporanController extends Controller{

    function __construct()
    {
        $this->laporan = new PesananModel();
    }
    public function tampil()
    {
        $data['data'] = $this->laporan->findAll();
        return view('laporanlist', $data);
    }

}
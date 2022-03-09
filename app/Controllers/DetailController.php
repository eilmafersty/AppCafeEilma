<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DetailModel;

class DetailController extends Controller{
    /**
     * Instance of the main Request object
     * 
     * @var HTTP\IncomingRequest
     */
    protected $request;

    function __construct()
    {
        $this->details = new DetailModel();
    }
    public function tampil()
    {
        $data['data'] = $this->details->findAll();
        return view('detaillist', $data);
    }
    public function simpan()
    {
        $data = array(
            'pesanan_id'=>$this->request->getPost('pesanan_id'),
            'menu_id'=>$this->request->getPost('menu_id'),
            'jumlah'=>$this->request->getPost('jumlah'),
        );
        $this->details->insert($data);
        return redirect('detailpesanan')->with('success','Data Berhasil Disimpan');
    }
    public function delete($id)
    {
        $this->details->delete($id);
        return redirect('detailpesanan')->with('success','Data Berhasil Dihapus');
    }
    public function edit($id)
    {
            $data = array(
                'pesanan_id'=>$this->request->getPost('pesanan_id'),
                'menu_id'=>$this->request->getPost('menu_id'),
                'jumlah'=>$this->request->getPost('jumlah'),
            );
            $this->details->update($id,$data);
            return redirect('detail')->with('success','Data Berhasil Diedit');
    }
}
<?php
class Dashboard extends Controller
{
    public function index($details = "", $id = '')
    {
        $data['title'] = 'Dashboard';
        $data['list-table'] = [
            'No',
            'Nama Santri',
            'Tahun Masuk',
            'Kategori'
        ];


        $data['details'] = $details;
        $data['id'] = htmlspecialchars($id);
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}

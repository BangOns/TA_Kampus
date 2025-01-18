<?php
class Data_Pelanggaran extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Pelanggaran';
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);

        $this->view('data_pelanggaran/index', $data);
        $this->view('templates/footer', $data);
    }
}
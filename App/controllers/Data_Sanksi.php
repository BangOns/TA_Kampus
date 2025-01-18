<?php
class Data_Sanksi extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Sanksi';
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);

        $this->view('data_sanksi/index', $data);
        $this->view('templates/footer', $data);
    }
}
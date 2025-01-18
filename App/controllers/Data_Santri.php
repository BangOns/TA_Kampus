<?php
class Data_Santri extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Santri';
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);

        $this->view('data_santri/index', $data);
        $this->view('templates/footer', $data);
    }
}
<?php
class Data_Pelanggaran extends Controller
{
    public function index($type = "", $action = "", $id = '')
    {
        $data['list-table'] = [
            'No',
            'Nama Pelanggaran',
            'Jenis Pelanggaran',

            'Bobot',
        ];
        $data['data-pelanggar'] = [
            [
                'No' => 1,
                'Jenis Pelanggaran' => 'Berat',
                'Nama Pelanggaran' => 'Kabur',
                'Bobot' => '1961',
            ],
            [
                'No' => 2,
                'Jenis Pelanggaran' => 'Sedang',
                'Nama Pelanggaran' => 'Kabur',

                'Bobot' => '1961',

            ],
            [
                'No' => 3,
                'Jenis Pelanggaran' => 'Ringan',
                'Nama Pelanggaran' => 'Kabur',
                'Bobot' => '1961',


            ],
        ];
        $data['kategori'] = [
            'Berat',
            'Sedang',
            'Ringan'
        ];
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $data['title'] = 'data_pelanggaran';
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('data_pelanggaran/index', $data);
        $this->view('templates/footer', $data);
    }
}
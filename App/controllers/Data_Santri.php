<?php
class Data_Santri extends Controller
{
    public function index($type = "", $action = "", $id = '')
    {
        $data['list-table'] = [
            'No',
            'Nama Santri',
            'Tahun Masuk',
            'Kategori'
        ];
        $data['data-santri'] = [
            [
                'No' => 1,
                'Nama Santri' => 'The Sliding Mr. Bones (Next Stop, Pottersville)',
                'Tahun Masuk' => 'Malcolm Lockyer',
                'Kategori' => '1961',
                'Sanksi' => 'Dicukur rambutnya'
            ],
            [
                'No' => 2,
                'Nama Santri' => 'The Bones (Next Stop, Pottersville)',
                'Tahun Masuk' => 'Malcolm ',
                'Kategori' => '1961',
                'Sanksi' => 'Dicukur rambutnya'

            ],
            [
                'No' => 3,
                'Nama Santri' => 'The Sliding Bones (Next Stop, Pottersville)',
                'Tahun Masuk' => 'Lockyer',
                'Kategori' => '1961',
                'Sanksi' => 'Dicukur rambutnya'


            ],
        ];
        $data['kategori'] = [
            'Berat',
            'Sedang',
            'Ringan'
        ];
        $data['title'] = 'data_santri';
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);

        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('data_santri/index', $data);
        $this->view('templates/footer', $data);
    }
}
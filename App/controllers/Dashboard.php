<?php
class Dashboard extends Controller
{
    public function index($type = "", $action = "", $id = '')
    {
        $data['title'] = 'dashboard';
        $data['list-table'] = [
            'No',
            'Nama Santri',
            'Tahun Masuk',
            'Kategori'
        ];
        $data['data-pelanggar'] = [
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
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
<?php
class Data_Sanksi extends Controller
{
    public function index($type = "", $action = "", $id = '')
    {
        $data['list-table'] = [
            'No',
            'Min-Max Nilai Akhir',
            'Kategori',
        ];
        $data['data-sanksi'] = [
            [
                'No' => 1,
                'Min-Max Nilai Akhir' => "0.00 - 0.20",
                'Kategori' => 'Ringan',
                'Keterangan' => 'Nasehat'
            ],
            [
                'No' => 2,
                'Min-Max Nilai Akhir' => "0.21 - 0.40",
                'Kategori' => 'Ringan',
                'Keterangan' => 'Nasehat + Menghafal 10 kosa kata B. Inggris dan B. Arab'
            ],
            [
                'No' => 3,
                'Min-Max Nilai Akhir' => "0.21 - 0.59",
                'Kategori' => 'Ringan',
                'Keterangan' => 'Menghafal 25 kosa kata B. Inggris dan B. Arab + Sholawat Nariyah 33×'
            ],
        ];

        $data['title'] = 'data_sanksi';
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);

        $this->view('data_sanksi/index', $data);
        $this->view('templates/footer', $data);
    }
}
<?php
class Dashboard extends Controller
{
    public function index($type = "", $action = "", $id = '')
    {
        if (!$_SESSION['user']) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
        $data['title'] = 'dashboard';
        $data['list-table'] = [
            'No',
            'Nama Santri',
            'Tahun Ajaran',
            'Kategori'
        ];
        $data['kategori'] = ['Ringan', 'Sedang', 'Berat'];
        // $results_data_sanksi = $this->model('Data_Sanksi_Model')->getDataAll();
        // foreach ($results_data_sanksi['data'] as  $rslt) {
        //     array_push($data['kategori'], $rslt['jenis_sanksi']);
        // }
        $results = $this->model('Data_Pelanggaran_Santri_Model')->getDataAll();
        $data['data-pelanggar'] = [];
        if ($results['status'] === 200 && !empty($results['data'])) {
            foreach ($results['data'] as $index => $rslt) {
                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $data_sanksi = $this->model('Data_Sanksi_Model')->getDataById($rslt['id_sanksi']);
                $newData = [
                    'No' => $index += 1,
                    'id' => $rslt['id_pelanggaran_santri'],
                    'Nama Santri' => $data_santri['data']['nama_santri'],
                    'Tahun Ajaran' => $data_santri['data']['tahun_ajaran'],
                    'Kategori' => $data_sanksi['data']['jenis_sanksi'],

                ];
                array_push($data['data-pelanggar'], $newData);
            };
        }


        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}

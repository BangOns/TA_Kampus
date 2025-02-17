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

        $resultsPelanggaranSantri = $this->model('Data_Pelanggaran_Santri_Model')->getDataAll();
        $resultsDataSantri = $this->model('Data_Santri_Model')->getDataAll();
        $resultsDataSanksi = $this->model('Data_Sanksi_Model')->getDataAll();
        $resultsDataPelanggaran = $this->model('Data_Pelanggaran_Model')->getDataAll();
        $data['data-card-summary'] = [];
        $data['data-pelanggar'] = [];
        $data['data-santri'] = [];
        if ($resultsPelanggaranSantri['status'] === 200 && !empty($resultsPelanggaranSantri['data'])) {
            foreach ($resultsPelanggaranSantri['data'] as $index => $rslt) {
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

        if ($resultsPelanggaranSantri['status'] === 200 && $resultsDataPelanggaran['status'] === 200 && $resultsDataSantri['status'] === 200 && $resultsDataSanksi['status'] === 200) {
            $data['data-santri'] = $resultsDataSantri['data'];
            $data['data-card-summary'] = [
                [
                    'title' => 'Santri',
                    'jumlah' => count($resultsDataSantri['data']),
                ],
                [
                    'title' => 'Pelanggaran',
                    'jumlah' => count($resultsDataPelanggaran['data']),
                ],
                [
                    'title' => 'Sanksi',
                    'jumlah' => count($resultsDataSanksi['data']),
                ],
                [
                    'title' => 'Pelanggaran Santri',
                    'jumlah' => count($resultsPelanggaranSantri['data'])
                ],



            ];
        }
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }

    public function addData()
    {
        $resultsDataSanksi = $this->model('Data_Sanksi_Model')->getDataAll();

        $result = $this->model('Data_Pelanggaran_Santri_Model')->addPelanggaranSantri($_POST, $resultsDataSanksi['data']);
        var_dump($result);
    }
}
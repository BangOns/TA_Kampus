<?php
class Data_Pelanggaran extends Controller
{
    public function index($type = "", $action = "", $id = '')
    {
        if (!$_SESSION['user']) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
        $data['list-table'] = [
            'No',
            'Nama Pelanggaran',
            'Jenis Pelanggaran',
            'Bobot',
        ];
        $data['detail-pelanggar'] = [];
        $data['data-pelanggar'] = [];
        $results = $this->model('Data_Pelanggaran_Model')->getDataAll();
        if ($results['status'] === 200 && !empty($results['data'])) {
            foreach ($results['data'] as $index => $rslt) {
                $newData = [
                    'No' => $index += 1,
                    'id' => $rslt['id_pelanggaran'],
                    'Jenis Pelanggaran' => $rslt['jenis_pelanggaran'],
                    'Nama Pelanggaran' => $rslt['nama_pelanggaran'],
                    'Bobot' => $rslt['bobot_pelanggaran'],

                ];
                array_push($data['data-pelanggar'], $newData);
            }
        }
        if ($id !== '') {
            $resultDetailPelanggaran = $this->model('Data_Pelanggaran_Model')->getDataById($id);
            if ($resultDetailPelanggaran['status'] === 200 && !empty($resultDetailPelanggaran['data'])) {
                $data['detail-pelanggar'] = $resultDetailPelanggaran['data'];
            }
        }
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
    public function addData()
    {
        $result = $this->model('Data_Pelanggaran_Model')->AddPelanggaran($_POST);
        if ($result['status'] === 200) {
            header('Location: ' . BASEURL . '/data_pelanggaran');
            exit;
        } else {
            header('Location: ' . BASEURL . '/data_pelanggaran');
            exit;
        }
    }
    public function editData($id)
    {
        $result = $this->model('Data_Pelanggaran_Model')->EditPelanggaran($_POST, $id);
        if ($result['status'] === 200) {
            header('Location: ' . BASEURL . '/data_pelanggaran');
            exit;
        } else {
            header('Location: ' . BASEURL . '/data_pelanggaran');
            exit;
        }
    }
}

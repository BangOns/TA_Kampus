<?php
class Data_Sanksi extends Controller
{
    public function index($type = "", $action = "", $id = '')
    {
        if (!$_SESSION['user']) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
        $data['list-table'] = [
            'No',
            'Min-Max Nilai Akhir',
            'Kategori Sanksi',
        ];
        $data['data-sanksi'] = [];
        $data['detail-sanksi'] = [];

        $results = $this->model('Data_Sanksi_Model')->getDataAll();
        if ($results['status'] === 200 && !empty($results['data'])) {
            foreach ($results['data'] as $index => $rslt) {
                $newData = [
                    'No' => $index += 1,
                    'id' => $rslt['id_sanksi'],
                    'Min-Max Nilai Akhir' => $rslt['min_skor'] . " - " . $rslt['max_skor'],
                    'Kategori Sanksi' => $rslt['jenis_sanksi'],
                    'Keterangan' => $rslt['deskripsi_sanksi']

                ];
                array_push($data['data-sanksi'], $newData);
            }
        }
        if ($id !== '') {
            $resultDetailSanksi = $this->model('Data_Sanksi_Model')->getDataById($id);
            if ($resultDetailSanksi['status'] === 200 && !empty($resultDetailSanksi['data'])) {
                $data['detail-sanksi'] = $resultDetailSanksi['data'];
            }
        }
        $data['title'] = 'data_sanksi';
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);

        $this->view('data_sanksi/index', $data);
        $this->view('templates/footer', $data);
    }
    public function addData()
    {
        $resultDataAll = $this->model('Data_Sanksi_Model')->getDataAll($_POST);
        $result = $this->model('Data_Sanksi_Model')->AddSanksi($_POST, $resultDataAll['data']);
        if ($result['status'] === 200) {
            header('Location: ' . BASEURL . '/data_sanksi');
            exit;
        } else {
            header('Location: ' . BASEURL . '/data_sanksi');
            exit;
        }
    }
    public function editData($id)
    {
        $result = $this->model('Data_Sanksi_Model')->EditSanksi($_POST, $id);
        if ($result['status'] === 200) {
            header('Location: ' . BASEURL . '/data_sanksi');
            exit;
        } else {
            header('Location: ' . BASEURL . '/data_sanksi');
            exit;
        }
    }
}
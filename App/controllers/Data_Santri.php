<?php
class Data_Santri extends Controller
{
    public function index($type = "", $action = "", $id = '')
    {
        if (!$_SESSION['user']) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
        $data['list-table'] = [
            'No',
            'Nama Santri',
            'Alamat',
            'Tahun Masuk'
        ];
        $data['data-santri'] = [];
        $data['detail-santri'] = [];
        $results = $this->model('Data_Santri_Model')->getDataAll();
        if ($results['status'] === 200 && !empty($results['data'])) {
            foreach ($results['data'] as $index => $rslt) {
                $newData = [
                    'No' => $index += 1,
                    'id' => $rslt['id_santri'],
                    'Nama Santri' => $rslt['nama_santri'],
                    'Alamat' => $rslt['alamat'],
                    'Tahun Masuk' => $rslt['tahun_ajaran'],

                ];
                array_push($data['data-santri'], $newData);
            }
        }
        if ($id !== '') {
            $resultDetailSantri = $this->model('Data_Santri_Model')->getDataById($id);
            if ($resultDetailSantri['status'] === 200 && !empty($resultDetailSantri['data'])) {
                $data['detail-santri'] = $resultDetailSantri['data'];
            }
        }
        $data['title'] = 'data_santri';
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);

        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('data_santri/index', $data);
        $this->view('templates/footer', $data);
    }
    public function addData()
    {
        $result = $this->model('Data_Santri_Model')->AddSantri($_POST);
        if ($result['status'] === 200) {
            header('Location: ' . BASEURL . '/data_santri');
            exit;
        } else {
            header('Location: ' . BASEURL . '/data_santri');
            exit;
        }
    }
    public function editData($id)
    {
        $result = $this->model('Data_Santri_Model')->EditSantri($_POST, $id);
        if ($result['status'] === 200) {
            header('Location: ' . BASEURL . '/data_santri');
            exit;
        } else {
            header('Location: ' . BASEURL . '/data_santri');
            exit;
        }
    }
}
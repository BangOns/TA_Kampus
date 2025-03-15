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
        //
        $limitPerhalaman = 2;
        $totalData =  $this->model('Data_Santri_Model')->getDataAll();
        $generateLimitToPagination = generatePaginate($totalData, $limitPerhalaman);

        //
        $results = $this->model('Data_Santri_Model')->getDataAllToTable($generateLimitToPagination['index-limit'], $limitPerhalaman);
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
        $data['total-halaman'] = $generateLimitToPagination['total-halaman'];
        $data['halaman-aktif'] = $generateLimitToPagination['halaman-aktif'];
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
            Flasher::setFlash('Tambah Data Santri', 'Berhasil', 'success');

            $this->redirect('/data_santri');
        } else {
            Flasher::setFlash('Tambah Data Santri', 'Gagal', 'error');

            $this->redirect('/data_santri');
        }
    }
    public function editData($id)
    {
        $result = $this->model('Data_Santri_Model')->EditSantri($_POST, $id);
        if ($result['status'] === 200) {
            Flasher::setFlash('Ubah Data Santri', 'Berhasil', 'success');

            $this->redirect('/data_santri');
        } else {
            Flasher::setFlash('Ubah Data Santri', 'Gagal', 'error');

            $this->redirect('/data_santri');
        }
    }
    public function deleteData($id)
    {
        $result = $this->model('Data_Santri_Model')->deleteSantri($id);
        if ($result['status'] === 200) {
            Flasher::setFlash('Hapus Data Santri', 'Berhasil', 'success');

            $this->redirect('/data_santri');
        } else {
            Flasher::setFlash('Hapus Data Santri', 'Gagal', 'error');

            $this->redirect('/data_santri');
        }
    }
}

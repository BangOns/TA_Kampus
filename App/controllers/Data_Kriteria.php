<?php
class Data_Kriteria extends Controller
{
    public function index($type = "", $action = "", $id = '')
    {
        if (!$_SESSION['user']) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
        $data['list-table'] = [
            'Nama',
            'Bobot',
        ];
        $data['kriteria'] = [];
        $data['sub_kriteria'] = [];

        $resultDataKriteria = $this->model('Data_Kriteria_Model')->getDataAllKriteria();
        $resultDataSubKriteria = $this->model('Data_Kriteria_Model')->getDataAllSubkriteria();
        if ($resultDataKriteria['status'] === 200) {
            $result = [];
            foreach ($resultDataKriteria['data'] as $item) {
                $key = $item['kriteria'];
                if (!isset($result[$key])) {
                    $result[$key] = [
                        'kriteria' => $item['kriteria'],
                        'jenis_kriteria' => $item['jenis_kriteria'],
                        'id_kriteria' => $item['id_kriteria'],
                        'items' => []
                    ];
                }
                $result[$key]['items'][] = $item;
            }
            $data['kriteria'] = array_values($result);
        }
        if ($resultDataSubKriteria['status'] === 200) {
            $data['sub_kriteria'] = $resultDataSubKriteria['data'];
        }

        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $data['title'] = 'data_kriteria';
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('data_kriteria/index', $data);
        $this->view('templates/footer', $data);
    }
    public function tambahKriteria()
    {
        $result = $this->model('Data_Kriteria_Model')->AddKriteria($_POST);


        if ($result['status'] === 200) {
            $resultDataPelanggaranSantri = $this->model('Dashboard_Model')->getData();
            $resultKriteriaAll = $this->model('Data_Kriteria_Model')->getDataAllKriteria();
            if ($resultKriteriaAll['status'] === 200 && count($resultDataPelanggaranSantri['data']) !== 0) {
                $uniqueIds = array_unique(array_column($resultKriteriaAll['data'], 'id_kriteria'));
                $dataUpdate = [];
                foreach ($resultDataPelanggaranSantri['data'] as $item) {
                    $dataUntukInsert = array_values(array_filter($uniqueIds, function ($id) use ($item) {
                        $existingIds = array_column($item['kriteria'], 'id_kriteria');
                        return !in_array($id, $existingIds);
                    }));
                    $nilai = [];
                    foreach ($item['sub_kriteria'] as $key => $value) {

                        $resultKriteriaById = $this->model('Data_Kriteria_Model')->getDataSubKriteriaById($value['id_subkriteria']);
                        $nilai[] = $value['id_subkriteria'] . '|' . $resultKriteriaById['data']['bobot_subkriteria'];
                    }
                    $resultKriteriaById = $this->model('Data_Kriteria_Model')->getDataSubKriteriaByIdKriteria($dataUntukInsert[0]);

                    $nilai[] = $resultKriteriaById['data']['id_subkriteria'] . '|' . $resultKriteriaById['data']['bobot_subkriteria'];
                    $dataUpdate = [
                        'id_santri' => $item['id_santri'],
                        'nama_pelanggaran' => $item['id_pelanggaran'],
                        'waktu' => $item['waktu'],
                        'id_kriteria' => array_values(array_unique(array_column($resultKriteriaAll['data'], 'id_kriteria'))),
                        'nilai' => $nilai,
                    ];
                }
                $resultUpdatedata = $this->model('Dashboard_Model')->editDataPenilaian($dataUpdate, $item['id_reference']);
                if ($resultUpdatedata['status'] === 200) {
                    Flasher::setFlash('Tambah Data Kriteria', 'Berhasil', 'success');

                    $this->redirect('/data_kriteria');
                } else {
                    Flasher::setFlash('Tambah Data Kriteria', 'Gagal', 'error');

                    $this->redirect('/data_kriteria');
                }
            }
            Flasher::setFlash('Tambah Data kriteria', 'Berhasil', 'success');

            $this->redirect('/data_kriteria');
        } else {
            Flasher::setFlash('Tambah Data kriteria', 'Gagal', 'error');

            $this->redirect('/data_kriteria');
        }
    }
    public function getDataKriteriaId()
    {
        $result = $this->model('Data_Kriteria_Model')->getDataKriteriaById($_POST['id']);
        if ($result['status'] === 200) {
            echo json_encode($result['data']);
        } else {
            echo json_encode([]);
        }
    }
    public function getDataKriteriaIds($id)
    {
        $result = $this->model('Data_Kriteria_Model')->getDataKriteriaById($id);
        if ($result['status'] === 200) {
            echo json_encode($result['data']);
        } else {
            echo json_encode([]);
        }
    }
    public function editKriteriaById($id)
    {
        $result = $this->model('Data_Kriteria_Model')->editKriteria($_POST, $id);
        if ($result['status'] === 200) {
            Flasher::setFlash('Ubah Data Kriteria', 'Berhasil', 'success');

            $this->redirect('/data_kriteria');
        } else {
            Flasher::setFlash('Ubah Data Kriteria', 'Gagal', 'error');

            $this->redirect('/data_kriteria');
        }
    }

    public function deleteKriteriaById($id)
    {
        $resultDataPenilaian = $this->model('Dashboard_Model')->deleteDataPenilaianIfKriteia($id);
        if ($resultDataPenilaian['status'] === 200) {
            $result = $this->model('Data_Kriteria_Model')->deleteKriteria($id);
            if ($result['status'] === 200) {
                Flasher::setFlash('Hapus Data Kriteria', 'Berhasil', 'success');

                $this->redirect('/data_kriteria');
            } else {
                Flasher::setFlash('Hapus Data Kriteria', 'Gagal', 'error');

                $this->redirect('/data_kriteria');
            }
        } else {
            Flasher::setFlash('Ubah Data Kriteria', 'Gagal', 'error');

            $this->redirect('/data_kriteria');
        }
    }
    // Sub Kriteria
    public function getDataSubKriteriaId()
    {
        $result = $this->model('Data_Kriteria_Model')->getDataSubKriteriaById($_POST['id']);
        if ($result['status'] === 200) {
            echo json_encode($result['data']);
        } else {
            echo json_encode([]);
        }
    }

    public function getDataSubKriteriaIds($id)
    {
        $result = $this->model('Data_Kriteria_Model')->getDataSubKriteriaById($id);
        if ($result['status'] === 200) {
            echo json_encode($result['data']);
        } else {
            echo json_encode([]);
        }
    }

    public function tambahSubKriteria($id)
    {
        $result = $this->model('Data_Kriteria_Model')->AddSubKriteria($_POST, $id);
        if ($result['status'] === 200) {
            Flasher::setFlash('Tambah Data Sub Kriteria', 'Berhasil', 'success');

            $this->redirect('/data_kriteria');
        } else {
            Flasher::setFlash('Tambah Data Sub Kriteria', 'Gagal', 'error');

            $this->redirect('/data_kriteria');
        }
    }
    public function editSubKriteria($id_subkriteria)
    {
        $result = $this->model('Data_Kriteria_Model')->editSubKriteria($_POST,  $id_subkriteria);
        if ($result['status'] === 200) {
            Flasher::setFlash('Tambah Data Sub Kriteria', 'Berhasil', 'success');

            $this->redirect('/data_kriteria');
        } else {
            Flasher::setFlash('Hapus Data Kriteria', 'Gagal', 'error');

            $this->redirect('/data_kriteria');
        }
    }
    public function deleteSubKriteriaById($id_subkriteria)
    {
        $resultDataPenilaian = $this->model('Dashboard_Model')->deleteDataPenilaianIfSubKriteria($id_subkriteria);
        if ($resultDataPenilaian['status'] === 200) {
            $result = $this->model('Data_Kriteria_Model')->deleteSubKriteria($id_subkriteria);
            if ($result['status'] === 200) {
                Flasher::setFlash('Hapus Data Sub Kriteria', 'Berhasil', 'success');

                $this->redirect('/data_kriteria');
            } else {
                Flasher::setFlash('Hapus Data Sub Kriteria', 'Gagal', 'error');

                $this->redirect('/data_kriteria');
            }
        } else {
            Flasher::setFlash('Hapus Data Sub Kriteria', 'Gagal', 'error');

            $this->redirect('/data_kriteria');
        }
    }
}

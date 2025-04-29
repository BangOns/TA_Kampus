<?php
class Dashboard extends Controller
{
    public function index($type = "", $action = "", $id = '')
    {
        if (!$_SESSION['user']) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        $data['title'] = 'Dashboard';
        $data['list-table'] = [
            'No',
            'Nama Santri',
            'jenis',
            'frekuensi',
            'dampak',
            'keseriusan',
            'permohonan',
            'Kategori Sanksi'
        ];
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $data['kriteria_pelanggaran'] = [
            'jenis_pelanggaran' => [
                '1' => 'Ringan',
                '2' => 'Sedang',
                '3' => 'Berat',
            ],
            'frekuensi_pelanggaran' => [
                '1' => '1 kali',
                '2' => '2 kali',
                '3' => '3 kali lebih',
            ],
            'dampak_pelanggaran' => [
                '1' => 'Kecil',
                '2' => 'Sedang',
                '3' => 'Besar',
            ],
            'keseriusan_niat' => [
                '1' => 'Tidak Sengaja',
                '2' => 'Kurang Sengaja',
                '3' => 'Sengaja',
            ],
            'permohonan_maaf' => [
                '1' => 'Tidak ada',
                '2' => 'Tidak Tulus',
                '3' => 'Meminta Maaf',
            ],
        ];
        $data['kategori'] = ['Ringan', 'Sedang', 'Berat'];
        // Get data All
        $resultsPelanggaranSantri = $this->model('Data_Pelanggaran_Santri_Model')->getDataAll();
        $resultsDataSantri = $this->model('Data_Santri_Model')->getDataAll();
        $resultsDataSanksi = $this->model('Data_Sanksi_Model')->getDataAll();
        $resultsDataPelanggaran = $this->model('Data_Pelanggaran_Model')->getDataAll();
        $data['data-pelanggar'] = [];
        if ($resultsPelanggaranSantri['status'] === 200 && !empty($resultsPelanggaranSantri['data'])) {
            foreach ($resultsPelanggaranSantri['data'] as $index => $rslt) {
                $get_sanksi = updateNilaiPelanggaranSantri($rslt['nilai_akhir'], $resultsDataSanksi['data']);
                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $data_sanksi = $resultsDataSanksi['data'][$get_sanksi];
                $newData = [
                    'No' => $index += 1,
                    'id' => $rslt['id_pelanggaran_santri'],
                    'Nama Santri' => $data_santri['data']['nama_santri'],
                    'pelanggaran-dilakukan' => $rslt['nama_pelanggaran'],
                    'jenis' => $data['kriteria_pelanggaran']['jenis_pelanggaran'][$rslt['c1']],
                    'frekuensi' => $data['kriteria_pelanggaran']['frekuensi_pelanggaran'][$rslt['c2']],
                    'dampak' => $data['kriteria_pelanggaran']['dampak_pelanggaran'][$rslt['c3']],
                    'keseriusan' => $data['kriteria_pelanggaran']['keseriusan_niat'][$rslt['c4']],
                    'permohonan' => $data['kriteria_pelanggaran']['permohonan_maaf'][$rslt['c5']],
                    'Tahun Ajaran' => $data_santri['data']['tahun_ajaran'],
                    'Kelas' => $data_santri['data']['kelas'],
                    'Waktu' => $rslt['waktu'],
                    'Kategori Sanksi' => $data_sanksi['jenis_sanksi'],

                ];
                array_push($data['data-pelanggar'], $newData);
            };
        }
        // get data for card Summary
        $data['data-card-summary'] = [];
        $data['data-santri'] = [];
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
        // Get data for detail
        $data['detail-pelanggaran-santri'] = [];
        if ($id) {
            $resultDataPelanggaranSantri = $this->model('Data_Pelanggaran_Santri_Model')->getDataById($id);
            if ($resultDataPelanggaranSantri['status'] === 200) {
                //
                $get_sanksi = updateNilaiPelanggaranSantri($resultDataPelanggaranSantri['data']['nilai_akhir'], $resultsDataSanksi['data']);
                $data_santri = $this->model('Data_Santri_Model')->getDataById($resultDataPelanggaranSantri['data']['id_santri']);
                $data_sanksi = $resultsDataSanksi['data'][$get_sanksi];
                //
                $data_detail_pelanggaran_santri = [
                    'nama-santri' => $data_santri['data']['nama_santri'],
                    'kelas' => $data_santri['data']['kelas'],
                    'tahun-ajaran' => $data_santri['data']['tahun_ajaran'],
                    'alamat' => $data_santri['data']['alamat'],
                    'nama-pelanggaran' => $resultDataPelanggaranSantri['data']['nama_pelanggaran'],
                    'waktu' => $resultDataPelanggaranSantri['data']['waktu'],
                    'kategori-pelanggaran' => $data['kriteria_pelanggaran']['jenis_pelanggaran'][$resultDataPelanggaranSantri['data']['c1']],
                    'frekuensi' => $data['kriteria_pelanggaran']['frekuensi_pelanggaran'][$resultDataPelanggaranSantri['data']['c2']],
                    'dampak' => $data['kriteria_pelanggaran']['dampak_pelanggaran'][$resultDataPelanggaranSantri['data']['c3']],
                    'keseriusan' => $data['kriteria_pelanggaran']['keseriusan_niat'][$resultDataPelanggaranSantri['data']['c4']],
                    'permohonan' => $data['kriteria_pelanggaran']['permohonan_maaf'][$resultDataPelanggaranSantri['data']['c5']],
                    'sanksi' => $data_sanksi['deskripsi_sanksi'],
                ];
                $data['detail-pelanggaran-santri'] = $data_detail_pelanggaran_santri;
            }
        }
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }

    public function addData()
    {

        $result = $this->model('Data_Pelanggaran_Santri_Model')->addPelanggaranSantri($_POST);
        if ($result['status'] === 200) {
            Flasher::setFlash('Tambah Data Pelanggaran Santri', 'Berhasil', 'success');

            $this->redirect('/dashboard');
        } else {
            Flasher::setFlash('Tambah Data Pelanggaran Santri', 'Gagal', 'error');

            $this->redirect('/dashboard');
        }
    }
    public function editData($id)
    {
        $result = $this->model('Data_Pelanggaran_Santri_Model')->editPelanggaranSantri($_POST, $id);
        if ($result['status'] === 200) {
            Flasher::setFlash('Ubah Data Pelanggaran Santri', 'Berhasil', 'success');

            $this->redirect('/dashboard');
        } else {
            Flasher::setFlash('Ubah Data Pelanggaran Santri', 'Gagal', 'error');

            $this->redirect('/dashboard');
        }
    }
    public function deleteData($id)
    {
        $result = $this->model('Data_Pelanggaran_Santri_Model')->deletePelanggaranSantri($id);
        if ($result['status'] === 200) {
            Flasher::setFlash('Hapus Data Pelanggaran Santri', 'Berhasil', 'success');

            $this->redirect('/dashboard');
        } else {
            Flasher::setFlash('Hapus Data Pelanggaran Santri', 'Gagal', 'error');

            $this->redirect('/dashboard');
        }
    }
}

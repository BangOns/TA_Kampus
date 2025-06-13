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
                '1' => 'Berat',
                '2' => 'Sedang',
                '3' => 'Ringan',
            ],
            'frekuensi_pelanggaran' => [
                '1' => '3 kali >',
                '2' => '2 kali',
                '3' => '1 kali',
            ],
            'dampak_pelanggaran' => [
                '1' => 'Besar',
                '2' => 'Sedang',
                '3' => 'Kecil',
            ],
            'keseriusan_niat' => [
                '1' => 'Sengaja',
                '2' => 'Kurang Sengaja',
                '3' => 'Tidak Sengaja',
            ],
            'permohonan_maaf' => [
                '1' => 'Meminta Maaf',
                '2' => 'Tidak Tulus',
                '3' => 'Tidak ada',
            ],
        ];
        $data['kategori'] = ['Ringan', 'Sedang', 'Berat'];
        $data['data-pelanggaran'] = [];
        // Get data All
        $resultsPelanggaranSantri = $this->model('Data_Pelanggaran_Santri_Model')->getDataAll();
        $resultsDataSantri = $this->model('Data_Santri_Model')->getDataAll();
        $resultsDataSanksi = $this->model('Data_Sanksi_Model')->getDataAll();
        $resultsDataPelanggaran = $this->model('Data_Pelanggaran_Model')->getDataAll();
        $resultDataKriteria = $this->model('Data_Kriteria_Model')->getDataAllKriteria();
        $resultDataSantriPelanggar = $this->model('Dashboard_Model')->getData();

        // $data['data-update-pelanggaran-santri'] = $resultDataSantriPelanggar['data'];
        $data['kriteria'] = [];
        $data['data-input-kriteria'] = [];
        $data['list-table2'] = ['No', 'Nama Santri'];
        if ($resultDataKriteria['status'] === 200) {
            $result = [];
            $result_data_input = [];
            foreach ($resultDataKriteria['data'] as $item) {
                $key = $item['kriteria'];
                if (!isset($result[$key])) {
                    $result[$key] = [
                        'kriteria' => $item['kriteria'],
                        'id_kriteria' => $item['id_kriteria'],
                    ];
                    $result_data_input[$key] = [
                        'kriteria' => $item['kriteria'],
                        'id_kriteria' => $item['id_kriteria'],
                        'items' => []
                    ];
                }
                $result_data_input[$key]['items'][] = $item;
            }
            $dataresult = array_values($result);
            $dataresultInput = array_values($result_data_input);
            foreach ($dataresult as $key => $value) {
                $data['list-table2'][] = $value['kriteria'];
            }
            $data['kriteria'] = $dataresult;
            $data['data-input-kriteria'] = $dataresultInput;
        }
        $data['list-table2'][] = 'Kategori Sanksi';
        $data['data-pelanggar'] = [];
        $data['data-pelanggar-santri'] = [];
        if ($resultDataSantriPelanggar['status'] === 200) {
            $newData = [];
            foreach ($resultDataSantriPelanggar['data'] as $index => $rslt) {
                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $row = [
                    'No' => $index + 1,
                    'id' => $rslt['id_reference'],
                    'Nama Santri' => $data_santri['data']['nama_santri'],
                ];
                foreach ($rslt['sub_kriteria'] as $krt) {
                    $data_subkriteria = $this->model('Data_Kriteria_Model')->getDataSubKriteriaById($krt['id_subkriteria']);
                    $data_kriteria = $this->model('Data_Kriteria_Model')->getDataKriteriaById($data_subkriteria['data']['id_kriteria']);
                    $row[$data_kriteria['data']['kriteria']] = $data_subkriteria['data']['sub_kriteria'];
                }
                $row['Kategori Sanksi'] = 'Berat';
                $newData[] = $row;
            }

            $data['data-pelanggar-santri'] = $newData;
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
            $data['data-pelanggaran'] = $resultsDataPelanggaran['data'];
        }
        // Get data for detail
        $data['detail-pelanggaran-santri'] = [];
        if ($id) {
            $dataResult = [];
            $resultDataPelanggaranSantri = $this->model('Dashboard_Model')->getData();
            if (isset($resultDataPelanggaranSantri['data'])) {
                $filtered = array_filter($resultDataPelanggaranSantri['data'], function ($item) use ($id) {
                    return $item['id_reference'] === $id;
                });
                $data_santri = $this->model('Data_Santri_Model')->getDataById($filtered[0]['id_santri']);
                $data_pelanggaran = $this->model('Data_Pelanggaran_Model')->getDataById($filtered[0]['id_pelanggaran']);
                $dataResult = [
                    'nama-santri' => $data_santri['data']['nama_santri'],
                    'kelas' => $data_santri['data']['kelas'],
                    'tahun-ajaran' => $data_santri['data']['tahun_ajaran'],
                    'alamat' => $data_santri['data']['alamat'],
                    'waktu' => $filtered[0]['waktu'],
                    'nama-pelanggaran' => $data_pelanggaran['data']['nama_pelanggaran'],
                ];
                foreach ($rslt['sub_kriteria'] as $krt) {
                    $data_subkriteria = $this->model('Data_Kriteria_Model')->getDataSubKriteriaById($krt['id_subkriteria']);
                    $data_kriteria = $this->model('Data_Kriteria_Model')->getDataKriteriaById($data_subkriteria['data']['id_kriteria']);
                    $dataResult['kriteria'][$data_kriteria['data']['kriteria']] = $data_subkriteria['data']['sub_kriteria'];
                }
            }
            $data['detail-pelanggaran-santri'] = $dataResult;
        }
        // if ($id) {
        //     if ($resultDataPelanggaranSantri['status'] === 200) {
        //         //
        //         $get_sanksi = updateNilaiPelanggaranSantri($resultDataPelanggaranSantri['data']['nilai_akhir'], $resultsDataSanksi['data']);
        //         $data_santri = $this->model('Data_Santri_Model')->getDataById($resultDataPelanggaranSantri['data']['id_santri']);
        //         $data_sanksi = $resultsDataSanksi['data'][$get_sanksi];
        //         //
        //         $data_detail_pelanggaran_santri = [
        //             'nama-santri' => $data_santri['data']['nama_santri'],
        //             'kelas' => $data_santri['data']['kelas'],
        //             'tahun-ajaran' => $data_santri['data']['tahun_ajaran'],
        //             'alamat' => $data_santri['data']['alamat'],
        //             'nama-pelanggaran' => $resultDataPelanggaranSantri['data']['nama_pelanggaran'],
        //             'waktu' => $resultDataPelanggaranSantri['data']['waktu'],
        //             'kategori-pelanggaran' => $data['kriteria_pelanggaran']['jenis_pelanggaran'][$resultDataPelanggaranSantri['data']['c1']],
        //             'frekuensi' => $data['kriteria_pelanggaran']['frekuensi_pelanggaran'][$resultDataPelanggaranSantri['data']['c2']],
        //             'dampak' => $data['kriteria_pelanggaran']['dampak_pelanggaran'][$resultDataPelanggaranSantri['data']['c3']],
        //             'keseriusan' => $data['kriteria_pelanggaran']['keseriusan_niat'][$resultDataPelanggaranSantri['data']['c4']],
        //             'permohonan' => $data['kriteria_pelanggaran']['permohonan_maaf'][$resultDataPelanggaranSantri['data']['c5']],
        //             'sanksi' => $data_sanksi['deskripsi_sanksi'],
        //         ];
        //         $data['detail-pelanggaran-santri'] = $data_detail_pelanggaran_santri;
        //     }
        // }
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }

    public function addData()
    {
        $result = $this->model('Dashboard_Model')->addDataPenilian($_POST);
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
    public function getDataAll()
    {
        $resultsPelanggaranSantri = $this->model('Dashboard_Model')->getData();
        $resultsDataSantri = $this->model('Data_Santri_Model')->getDataAll();
        $resultsDataSanksi = $this->model('Data_Sanksi_Model')->getDataAll();
        $resultsDataPelanggaran = $this->model('Data_Pelanggaran_Model')->getDataAll();
        if ($resultsPelanggaranSantri['status'] !== 200 || $resultsDataSantri['status'] !== 200 || $resultsDataSanksi['status'] !== 200 || $resultsDataPelanggaran['status'] !== 200) {
            return [
                'status' => 500,
                'message' => 'Error fetching data',
                'data' => []
            ];
        }
        echo json_encode(
            [
                'status' => 200,
                'message' => 'Data fetched successfully',
                'data' => [
                    [
                        'label' => 'Santri',
                        'data' => $resultsDataSantri['data']
                    ],
                    [
                        'label' => 'Pelanggaran',
                        'data' => $resultsDataPelanggaran['data']
                    ],
                    [
                        'label' => 'Sanksi',
                        'data' => $resultsDataSanksi['data']
                    ],
                    [
                        'label' => 'Pelanggaran Santri',
                        'data' => $resultsPelanggaranSantri['data']
                    ]
                ]
            ]
        );
    }
}

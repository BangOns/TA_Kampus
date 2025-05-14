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
            'No',
            'Nama',
            'Bobot',
        ];
        $data['kriteria_pelanggaran'] = [
            [
                'nama' => 'jenis_pelanggaran',
                'items' => [
                    [
                        'No' => '1',
                        'Nama' => 'Berat',
                        'Bobot' => '1'
                    ],
                    [
                        'No' => '2',
                        'Nama' => 'Sedang',
                        'Bobot' => '2'
                    ],
                    [
                        'No' => '3',
                        'Nama' => 'Ringan',
                        'Bobot' => '3'
                    ],

                ]
            ],
            [
                'nama' => 'frekuensi_pelanggaran',
                'items' => [
                    [
                        'No' => '1',
                        'Nama' => '3 kali lebih',
                        'Bobot' => '1'
                    ],
                    [
                        'No' => '2',
                        'Nama' => '2 kali',
                        'Bobot' => '2'
                    ],
                    [
                        'No' => '3',
                        'Nama' => '1 kali',
                        'Bobot' => '3'
                    ],

                ]
            ],
            [
                'nama' => 'dampak_pelanggaran',
                'items' => [
                    [
                        'No' => '1',
                        'Nama' => 'Besar',
                        'Bobot' => '1'
                    ],
                    [
                        'No' => '2',
                        'Nama' => 'Sedang',
                        'Bobot' => '2'
                    ],
                    [
                        'No' => '3',
                        'Nama' => 'Kecil',
                        'Bobot' => '3'
                    ],

                ]
            ],
            [
                'nama' => 'keseriusan_niat',
                'items' => [
                    [
                        'No' => '1',
                        'Nama' => 'Sengaja',
                        'Bobot' => '1'
                    ],
                    [
                        'No' => '2',
                        'Nama' => 'Kurang Sengaja',
                        'Bobot' => '2'
                    ],
                    [
                        'No' => '3',
                        'Nama' => 'Tidak Sengaja',
                        'Bobot' => '3'
                    ],

                ]
            ],
            [
                'nama' => 'permohonan_maaf',
                'items' => [
                    [
                        'No' => '1',
                        'Nama' => 'Meminta Maaf',
                        'Bobot' => '1'
                    ],
                    [
                        'No' => '2',
                        'Nama' => 'Tidak Tulus',
                        'Bobot' => '2'
                    ],
                    [
                        'No' => '3',
                        'Nama' => 'Tidak Meminta Maaf',
                        'Bobot' => '3'
                    ],

                ],
            ]
        ];
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $data['title'] = 'data_kriteria';
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('data_kriteria/index', $data);
        $this->view('templates/footer', $data);
    }
    public function addData()
    {
        $result = $this->model('Data_Pelanggaran_Model')->AddPelanggaran($_POST);
        if ($result['status'] === 200) {
            Flasher::setFlash('Tambah Data Pelanggaran', 'Berhasil', 'success');

            $this->redirect('/data_pelanggaran');
        } else {
            Flasher::setFlash('Tambah Data Pelanggaran', 'Gagal', 'error');

            $this->redirect('/data_pelanggaran');
        }
    }
    public function editData($id)
    {
        $result = $this->model('Data_Pelanggaran_Model')->EditPelanggaran($_POST, $id);
        if ($result['status'] === 200) {
            Flasher::setFlash('Ubah Data Pelanggaran', 'Berhasil', 'success');

            $this->redirect('/data_pelanggaran');
        } else {
            Flasher::setFlash('Ubah Data Pelanggaran', 'Gagal', 'error');

            $this->redirect('/data_pelanggaran');
        }
    }

    public function deleteData($id)
    {
        $result = $this->model('Data_Pelanggaran_Model')->deletePelanggaran($id);
        if ($result['status'] === 200) {
            Flasher::setFlash('Hapus Data Pelanggaran', 'Berhasil', 'success');

            $this->redirect('/data_pelanggaran');
        } else {
            Flasher::setFlash('Hapus Data Pelanggaran', 'Gagal', 'error');

            $this->redirect('/data_pelanggaran');
        }
    }
}

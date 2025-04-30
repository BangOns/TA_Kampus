<?php
class Proses_Normalisasi extends Controller
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
            'jenis',
            'frekuensi',
            'dampak',
            'keseriusan',
            'permohonan',
        ];
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
        $resultsPelanggaranSantri = $this->model('Data_Pelanggaran_Santri_Model')->getDataAll();
        // Data Alternatif
        $data['data-alternatif'] = [];
        if ($resultsPelanggaranSantri['status'] === 200 && !empty($resultsPelanggaranSantri['data'])) {
            foreach ($resultsPelanggaranSantri['data'] as $index => $rslt) {

                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $newData = [
                    'No' => $index += 1,
                    'id' => $rslt['id_pelanggaran_santri'],
                    'Nama' => $data_santri['data']['nama_santri'],
                    'pelanggaran-dilakukan' => $rslt['nama_pelanggaran'],
                    'jenis' => $data['kriteria_pelanggaran']['jenis_pelanggaran'][$rslt['c1']],
                    'frekuensi' => $data['kriteria_pelanggaran']['frekuensi_pelanggaran'][$rslt['c2']],
                    'dampak' => $data['kriteria_pelanggaran']['dampak_pelanggaran'][$rslt['c3']],
                    'keseriusan' => $data['kriteria_pelanggaran']['keseriusan_niat'][$rslt['c4']],
                    'permohonan' => $data['kriteria_pelanggaran']['permohonan_maaf'][$rslt['c5']],
                    'Tahun Ajaran' => $data_santri['data']['tahun_ajaran'],
                    'Kelas' => $data_santri['data']['kelas'],
                    'Waktu' => $rslt['waktu'],

                ];
                array_push($data['data-alternatif'], $newData);
            };
        }

        // Nilai Alternatif 
        $data['data-nilai-alternatif'] = [];
        if ($resultsPelanggaranSantri['status'] === 200 && !empty($resultsPelanggaranSantri['data'])) {
            foreach ($resultsPelanggaranSantri['data'] as $index => $rslt) {

                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $newData = [
                    'No' => $index += 1,
                    'id' => $rslt['id_pelanggaran_santri'],
                    'Nama' => $data_santri['data']['nama_santri'],
                    'jenis' => round($rslt['c1'] / 3, 2),
                    'frekuensi' => round($rslt['c2'] / 3, 2),
                    'dampak' => round($rslt['c3'] / 3, 2),
                    'keseriusan' => round($rslt['c4'] / 3, 2),
                    'permohonan' => round($rslt['c5'] / 3, 2),


                ];
                array_push($data['data-nilai-alternatif'], $newData);
            };
        }

        // Data Hasil Normalisasi 
        $data['data-nilai-normalisasi'] = [];
        $c1 = 0.35;
        $c2 = 0.25;
        $c3 = 0.2;
        $c4 = 0.15;
        $c5 = 0.05;
        if ($resultsPelanggaranSantri['status'] === 200 && !empty($resultsPelanggaranSantri['data'])) {
            foreach ($resultsPelanggaranSantri['data'] as $index => $rslt) {

                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $newData = [
                    'No' => $index += 1,
                    'id' => $rslt['id_pelanggaran_santri'],
                    'Nama' => $data_santri['data']['nama_santri'],
                    'pelanggaran-dilakukan' => $rslt['nama_pelanggaran'],
                    'jenis' =>  round((($rslt['c1'] / 3) * $c1), 2),
                    'frekuensi' => round((($rslt['c2'] / 3) * $c2), 2),
                    'dampak' => round((($rslt['c3'] / 3) * $c3), 2),
                    'keseriusan' => round((($rslt['c4'] / 3) * $c4), 2),
                    'permohonan' => round((($rslt['c5'] / 3) * $c5), 2),

                ];
                array_push($data['data-nilai-normalisasi'], $newData);
            };
        }
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $data['title'] = 'proses_normalisasi';
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('proses_normalisasi/index', $data);
        $this->view('templates/footer', $data);
    }
}

<?php
class Perhitungan_Saw extends Controller
{

    public  static $skala_bobot_benefit = 3;
    public  static $skala_bobot_cost = 1;
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
                    'jenis' => round(self::$skala_bobot_cost / $rslt['c1'], 2),
                    'frekuensi' => round(self::$skala_bobot_cost / $rslt['c2'], 2),
                    'dampak' => round(self::$skala_bobot_cost / $rslt['c3'], 2),
                    'keseriusan' => round(self::$skala_bobot_cost / $rslt['c4'], 2),
                    'permohonan' => round($rslt['c5'] / self::$skala_bobot_benefit, 2),


                ];
                array_push($data['data-nilai-alternatif'], $newData);
            };
        }

        // Data Hasil Normalisasi 
        $data['data-nilai-normalisasi'] = [];
        $c1 = 0.30;
        $c2 = 0.25;
        $c3 = 0.20;
        $c4 = 0.15;
        $c5 = 0.10;
        if ($resultsPelanggaranSantri['status'] === 200 && !empty($resultsPelanggaranSantri['data'])) {
            foreach ($resultsPelanggaranSantri['data'] as $index => $rslt) {

                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $newData = [
                    'No' => $index += 1,
                    'id' => $rslt['id_pelanggaran_santri'],
                    'Nama' => $data_santri['data']['nama_santri'],
                    'pelanggaran-dilakukan' => $rslt['nama_pelanggaran'],
                    'jenis' =>  round((self::$skala_bobot_cost / ($rslt['c1']) * $c1), 2),
                    'frekuensi' => round((self::$skala_bobot_cost / ($rslt['c2']) * $c2), 2),
                    'dampak' => round((self::$skala_bobot_cost / ($rslt['c3']) * $c3), 2),
                    'keseriusan' => round((self::$skala_bobot_cost / ($rslt['c4']) * $c4), 2),
                    'permohonan' => round((($rslt['c5'] / 3) * $c5), 2),

                ];
                array_push($data['data-nilai-normalisasi'], $newData);
            };
        }
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $data['title'] = 'perhitungan_saw';
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('perhitungan_saw/index', $data);
        $this->view('templates/footer', $data);
    }
}

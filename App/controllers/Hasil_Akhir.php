<?php
class Hasil_Akhir extends Controller
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
            'nilai akhir',
            'Kategori Sanksi'
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
                '1' => 'Tidak Ada',
                '2' => 'Tidak Tulus',
                '3' => 'Meminta Maaf',
            ],
        ];
        $resultsPelanggaranSantri = $this->model('Data_Pelanggaran_Santri_Model')->getDataAll();
        // Nilai Alternatif 
        $data['data-matriks'] = [];
        $resultsDataSanksi = $this->model('Data_Sanksi_Model')->getDataAll();
        if ($resultsPelanggaranSantri['status'] === 200 && !empty($resultsPelanggaranSantri['data'])) {
            usort($resultsPelanggaranSantri['data'], function ($a, $b) {
                return $b['nilai_akhir'] <=> $a['nilai_akhir'];
            });
            foreach ($resultsPelanggaranSantri['data'] as $index => $rslt) {
                $get_sanksi = updateNilaiPelanggaranSantri($rslt['nilai_akhir'], $resultsDataSanksi['data']);
                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $data_sanksi = $resultsDataSanksi['data'][$get_sanksi];

                $newData = [
                    'No' => $index += 1,
                    'id' => $rslt['id_pelanggaran_santri'],
                    'Nama' => $data_santri['data']['nama_santri'],
                    'nilai akhir' => $rslt['nilai_akhir'],
                    'Kategori Sanksi' => $data_sanksi['jenis_sanksi'],
                ];
                array_push($data['data-matriks'], $newData);
            };
        }
        $data['type'] = $type;
        $data['action'] = $action;
        $data['id'] = htmlspecialchars($id);
        $data['title'] = 'hasil_akhir';
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('hasil_akhir/index', $data);
        $this->view('templates/footer', $data);
    }
}

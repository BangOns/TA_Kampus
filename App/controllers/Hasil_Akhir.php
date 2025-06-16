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
            'Nama Santri',
            'Nilai Akhir',
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

        $resultsDataSanksi = $this->model('Data_Sanksi_Model')->getDataAll();
        $resultDataKriteria = $this->model('Data_Kriteria_Model')->getDataAllKriteria();
        $resultDataSantriPelanggar = $this->model('Dashboard_Model')->getData();
        $data['data-hasil-akhir'] = [];

        if ($resultDataSantriPelanggar['status'] === 200) {
            $newData = [];
            $getBobot = [];
            foreach ($resultDataSantriPelanggar['data'] as $index => $rslt) {
                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $row = [
                    'No' => $index + 1,
                    'Nama Santri' => $data_santri['data']['nama_santri'],
                ];
                foreach ($rslt['sub_kriteria'] as $krt) {
                    $data_subkriteria = $this->model('Data_Kriteria_Model')->getDataSubKriteriaById($krt['id_subkriteria']);
                    $data_kriteria = $this->model('Data_Kriteria_Model')->getDataKriteriaById($data_subkriteria['data']['id_kriteria']);
                    $row[$data_kriteria['data']['kriteria']] = $data_subkriteria['data']['sub_kriteria'];
                    $row['kriteria'][$data_kriteria['data']['kriteria']] = $data_subkriteria['data']['sub_kriteria'];

                    $getBobot[$data_kriteria['data']['kriteria']] = $data_subkriteria['data']['bobot_subkriteria'];
                }
                $nilai_akhir = sumPelanggaranSantriUpdate($resultDataKriteria['data'], $getBobot);
                $merge_kategori_sanksi = updateNilaiPelanggaranSantri(floatval(number_format($nilai_akhir, 2)), $resultsDataSanksi['data']);
                $data_sanksi = $resultsDataSanksi['data'][$merge_kategori_sanksi];
                $row['Kategori Sanksi'] = $data_sanksi['jenis_sanksi'];
                $row['Nilai Akhir'] = $nilai_akhir;
                $newData[] = $row;
            }
            usort($newData, function ($a, $b) {
                return $b['Nilai Akhir'] <=> $a['Nilai Akhir'];
            });
            foreach ($newData as $index => &$item) {
                $item['No'] = $index + 1;
            }
            $data['data-hasil-akhir'] = $newData;
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

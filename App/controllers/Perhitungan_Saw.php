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
        $data['list-table2'] = ['No', 'Nama Santri'];
        $resultDataKriteria = $this->model('Data_Kriteria_Model')->getDataAllKriteria();
        $resultDataSantriPelanggar = $this->model('Dashboard_Model')->getData();
        $getLengthKriteria = [];
        if ($resultDataKriteria['status'] === 200) {
            $result = [];
            $counter = [];
            foreach ($resultDataKriteria['data'] as $item) {
                $key = $item['id_kriteria'];
                // Hitung berapa kali id_kriteria muncul
                if (!isset($counter[$key])) {
                    $counter[$key] = 1;
                } else {
                    $counter[$key]++;
                }
                if (!isset($result[$key])) {
                    $result[$key] = [
                        'kriteria' => $item['kriteria'],
                        'id_kriteria' => $item['id_kriteria'],
                    ];
                }
            }
            foreach ($result as $key => &$res) {
                $getLengthKriteria[$res['id_kriteria']] = $counter[$key];
            }
            $dataresult = array_values($result);
            foreach ($dataresult as $key => $value) {
                $data['list-table2'][] = $value['kriteria'];
            }
            $data['kriteria'] = $dataresult;
        }
        // Data Alternatif
        $data['data-alternatif2'] = [];
        $data['data-alternatif-mobile'] = [];
        if ($resultDataSantriPelanggar['status'] === 200) {
            $newData = [];
            $newDataMobile = [];
            foreach ($resultDataSantriPelanggar['data'] as $index => $rslt) {
                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $row = [
                    'No' => $index + 1,
                    'Nama Santri' => $data_santri['data']['nama_santri'],
                ];
                $row_mobile = [
                    'No' => $index + 1,
                    'Nama Santri' => $data_santri['data']['nama_santri'],
                ];
                foreach ($rslt['sub_kriteria'] as $krt) {
                    $data_subkriteria = $this->model('Data_Kriteria_Model')->getDataSubKriteriaById($krt['id_subkriteria']);
                    $data_kriteria = $this->model('Data_Kriteria_Model')->getDataKriteriaById($data_subkriteria['data']['id_kriteria']);
                    $row[$data_kriteria['data']['kriteria']] = $data_subkriteria['data']['sub_kriteria'];
                    $row_mobile['kriteria'][$data_kriteria['data']['kriteria']] = $data_subkriteria['data']['sub_kriteria'];
                }
                $newData[] = $row;
                $newDataMobile[] = $row_mobile;
            }

            $data['data-alternatif2'] = $newData;
            $data['data-alternatif-mobile'] = $newDataMobile;
        }


        // Nilai Alternatif 
        $data['data-matriks'] = [];
        $data['data-matriks-mobile'] = [];
        if ($resultDataSantriPelanggar['status'] === 200) {
            $newData = [];
            $newDataMoble = [];
            $counter = [];
            foreach ($resultDataSantriPelanggar['data'] as $index => $rslt) {
                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $row = [
                    'No' => $index + 1,
                    'Nama Santri' => $data_santri['data']['nama_santri'],
                ];
                $row_mobile = [
                    'No' => $index + 1,
                    'Nama Santri' => $data_santri['data']['nama_santri'],
                ];
                foreach ($rslt['sub_kriteria'] as $krt) {
                    $data_subkriteria = $this->model('Data_Kriteria_Model')->getDataSubKriteriaById($krt['id_subkriteria']);
                    $data_kriteria = $this->model('Data_Kriteria_Model')->getDataKriteriaById($data_subkriteria['data']['id_kriteria']);
                    $row[$data_kriteria['data']['kriteria']] = sumMatriksKeputusan($data_kriteria['data']['jenis_kriteria'], $data_subkriteria['data']['bobot_subkriteria'], $getLengthKriteria[intval($data_subkriteria['data']['id_kriteria'])]);
                    $row_mobile['kriteria'][$data_kriteria['data']['kriteria']] = sumMatriksKeputusan($data_kriteria['data']['jenis_kriteria'], $data_subkriteria['data']['bobot_subkriteria'], $getLengthKriteria[intval($data_subkriteria['data']['id_kriteria'])]);
                }
                $newData[] = $row;
                $newDataMoble[] = $row_mobile;
            }

            $data['data-matriks'] = $newData;
            $data['data-matriks-mobile'] = $newDataMoble;
        }


        // Data Hasil Normalisasi 
        $data['data-normalisasi'] = [];
        $data['data-normalisasi-mobile'] = [];
        if ($resultDataSantriPelanggar['status'] === 200) {
            $newData = [];
            $newDataMobile = [];
            foreach ($resultDataSantriPelanggar['data'] as $index => $rslt) {
                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $row = [
                    'No' => $index + 1,
                    'Nama Santri' => $data_santri['data']['nama_santri'],
                ];
                $row_mobile = [
                    'No' => $index + 1,
                    'Nama Santri' => $data_santri['data']['nama_santri'],
                ];
                foreach ($rslt['sub_kriteria'] as $krt) {
                    $data_subkriteria = $this->model('Data_Kriteria_Model')->getDataSubKriteriaById($krt['id_subkriteria']);
                    $data_kriteria = $this->model('Data_Kriteria_Model')->getDataKriteriaById($data_subkriteria['data']['id_kriteria']);
                    $row[$data_kriteria['data']['kriteria']] = sumNormalisasi($data_kriteria['data']['jenis_kriteria'], $data_subkriteria['data']['bobot_subkriteria'], $data_kriteria['data']['bobot_kriteria'], $getLengthKriteria[intval($data_subkriteria['data']['id_kriteria'])]);
                    $row_mobile['kriteria'][$data_kriteria['data']['kriteria']] = sumNormalisasi($data_kriteria['data']['jenis_kriteria'], $data_subkriteria['data']['bobot_subkriteria'], $data_kriteria['data']['bobot_kriteria'], $getLengthKriteria[intval($data_subkriteria['data']['id_kriteria'])]);
                }
                $newData[] = $row;
                $newDataMobile[] = $row_mobile;
            }

            $data['data-normalisasi'] = $newData;
            $data['data-normalisasi-mobile'] = $newDataMobile;
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

<?php

use Mpdf\Mpdf;

$autoloadPath = dirname(__DIR__, 2) . '/vendor/autoload.php';

if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
} else {
    var_dump('File autoload.php tidak ditemukan. Pastikan sudah menjalankan "composer install".');
}
date_default_timezone_set('Asia/Jakarta');

function getTanggalIndonesia($lokasi = 'Depok')
{
    $formatter = new IntlDateFormatter(
        'id_ID',
        IntlDateFormatter::FULL,
        IntlDateFormatter::NONE,
        'Asia/Jakarta',
        IntlDateFormatter::GREGORIAN,
        'EEEE dd MMMM yyyy'
    );

    $tanggal = $formatter->format(new DateTime());
    return "$lokasi, $tanggal";
}

class Cetak_Laporan extends Controller
{
    public $formatDate;
    public function __construct()
    {
        $this->formatDate = getTanggalIndonesia();
    }
    public function index()
    {
        $data['list-cetak-laporan'] = [
            [
                'title' => 'Laporan Data Pelanggaran Santri',
                'link' => BASEURL . '/cetak_laporan/laporan_pelanggaran_santri',
                'icons' => BASEURL . '/icons/icons-pelanggaran-cetak.svg'
            ],
            [
                'title' => 'Laporan Data Santri',
                'link' => BASEURL . '/cetak_laporan/laporan_santri',
                'icons' => BASEURL . '/icons/icons-santri-cetak.svg'

            ],
            [
                'title' => 'Laporan Data Pelanggaran',
                'link' => BASEURL . '/cetak_laporan/laporan_pelanggaran',
                'icons' => BASEURL . '/icons/icons-pelanggaran-cetak.svg'

            ],
            [
                'title' => 'Laporan Data Sanksi',
                'link' => BASEURL . '/cetak_laporan/laporan_sanksi',
                'icons' => BASEURL . '/icons/icons-sanksi-cetak.svg'
            ],
            [
                'title' => 'Laporan Data Kriteria',
                'link' => BASEURL . '/cetak_laporan/laporan_data_kriteria',
                'icons' => BASEURL . '/icons/icons-sanksi-cetak.svg'
            ]
        ];
        $data['pengurus_pondok'] = [
            "nama_pengurus" => "Sulaeman Haekal",
            "NIDN" => "12312312312",
        ];
        $data['formatDate'] = $this->formatDate;
        $data['title'] = 'cetak_laporan';
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('cetak_laporan/index', $data);
        $this->view('templates/footer');
    }
    public function laporan_santri()
    {
        $data['data-santri'] = [];
        $resultsDataSantri = $this->model('Data_Santri_Model')->getDataAll();
        if ($resultsDataSantri['status'] === 200 && !empty($resultsDataSantri['data'])) {
            $data['data-santri'] = $resultsDataSantri['data'];
        }
        ob_start();
        $data['pengurus_pondok'] = [
            "nama_pengurus" => "Sulaeman Haekal",
            "NIDN" => "12312312312",
        ];
        $data['title'] = 'laporan_santri';
        $data['formatDate'] = $this->formatDate;
        $this->view('templates/header', $data);
        $this->view('cetak_laporan/santri', $data);
        $this->view('templates/footer');
        $html = ob_get_clean();

        // Konfigurasi Dompdf


        // Inisialisasi mPDF
        $mpdf = new Mpdf(
            [
                'default_font' => 'Arial'
            ]
        );
        $mpdf->SetFont('Arial');
        // Load HTML ke mPDF
        $mpdf->WriteHTML($html);

        // Render PDF
        $mpdf->Output('laporan_santri.pdf', 'I');
    }
    public function laporan_pelanggaran()
    {
        $data['data-pelanggaran'] = [];
        $resultsDataPelanggaran = $this->model('Data_Pelanggaran_Model')->getDataAll();
        if ($resultsDataPelanggaran['status'] === 200 && !empty($resultsDataPelanggaran['data'])) {
            $data['data-pelanggaran'] = $resultsDataPelanggaran['data'];
        }
        ob_start();
        $data['pengurus_pondok'] = [
            "nama_pengurus" => "Sulaeman Haekal",
            "NIDN" => "12312312312",
        ];
        $data['title'] = 'laporan_pelanggaran';
        $data['formatDate'] = $this->formatDate;
        $this->view('templates/header', $data);
        $this->view('cetak_laporan/pelanggaran', $data);
        $this->view('templates/footer');
        $html = ob_get_clean();

        // Konfigurasi Dompdf


        // Inisialisasi mPDF
        $mpdf = new Mpdf(
            [
                'default_font' => 'Arial'
            ]
        );
        $mpdf->SetFont('Arial');
        // Load HTML ke mPDF
        $mpdf->WriteHTML($html);

        // Render PDF
        $mpdf->Output('laporan_pelanggaran.pdf', 'I');
    }
    public function laporan_sanksi()
    {
        $data['data-sanksi'] = [];
        $data['formatDate'] = $this->formatDate;

        $resultsDataSanksi = $this->model('Data_Sanksi_Model')->getDataAll();
        if ($resultsDataSanksi['status'] === 200 && !empty($resultsDataSanksi['data'])) {
            $data['data-sanksi'] = $resultsDataSanksi['data'];
        }
        ob_start();
        $data['pengurus_pondok'] = [
            "nama_pengurus" => "Sulaeman Haekal",
            "NIDN" => "12312312312",
        ];
        $data['title'] = 'laporan_sanksi';
        $this->view('templates/header', $data);
        $this->view('cetak_laporan/sanksi', $data);
        $this->view('templates/footer');
        $html = ob_get_clean();

        // Konfigurasi Dompdf


        // Inisialisasi mPDF
        $mpdf = new Mpdf(
            [
                'default_font' => 'Arial'
            ]
        );
        $mpdf->SetFont('Arial');
        // Load HTML ke mPDF
        $mpdf->WriteHTML($html);

        // Render PDF
        $mpdf->Output('laporan_sanksi.pdf', 'I');
    }
    public function laporan_pelanggaran_santri()
    {
        $data['data-pelanggaran-santri'] = [];
        $data['data-santri'] = [];
        $data['formatDate'] = $this->formatDate;

        $resultDataKriteria = $this->model('Data_Kriteria_Model')->getDataAllKriteria();
        $resultDataSantriPelanggar = $this->model('Dashboard_Model')->getData();
        $resultsDataSanksi = $this->model('Data_Sanksi_Model')->getDataAll();

        $data['list-table2'] = ['No', 'Nama Santri', 'Pelanggaran'];
        if ($resultDataKriteria['status'] === 200) {
            $result = [];
            foreach ($resultDataKriteria['data'] as $item) {
                $key = $item['kriteria'];
                if (!isset($result[$key])) {
                    $result[$key] = [
                        'kriteria' => $item['kriteria'],
                        'id_kriteria' => $item['id_kriteria'],
                    ];
                }
            }
            $dataresult = array_values($result);
            foreach ($dataresult as $key => $value) {
                $data['list-table2'][] = 'C' . ($key + 1);
            }
            $data['kriteria'] = $dataresult;
        }
        $data['list-table2'][] = 'Kategori Sanksi';

        $data['data-pelanggaran-santri'] = [];
        if ($resultDataSantriPelanggar['status'] === 200) {
            $newData = [];
            $getBobot = [];
            foreach ($resultDataSantriPelanggar['data'] as $index => $rslt) {
                $data_santri = $this->model('Data_Santri_Model')->getDataById($rslt['id_santri']);
                $data_pelanggaran = $this->model('Data_Pelanggaran_Model')->getDataById($rslt['id_pelanggaran']);

                $row = [
                    'No' => $index + 1,
                    'Nama Santri' => $data_santri['data']['nama_santri'],
                    'Pelanggaran' => $data_pelanggaran['data']['nama_pelanggaran'],
                ];
                foreach ($rslt['sub_kriteria'] as $index => $krt) {
                    $data_subkriteria = $this->model('Data_Kriteria_Model')->getDataSubKriteriaById($krt['id_subkriteria']);
                    $data_kriteria = $this->model('Data_Kriteria_Model')->getDataKriteriaById($data_subkriteria['data']['id_kriteria']);
                    $row["C" . ($index + 1)] = $data_subkriteria['data']['sub_kriteria'];

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
            $data['data-pelanggaran-santri'] = $newData;
        }


        ob_start();
        $data['pengurus_pondok'] = [
            "nama_pengurus" => "Sulaeman Haekal",
            "NIDN" => "12312312312",
        ];
        $data['title'] = 'laporan_pelanggaran_santri';
        $this->view('templates/header', $data);
        $this->view('cetak_laporan/pelanggaran_santri', $data);
        $this->view('templates/footer');
        $html = ob_get_clean();

        // Inisialisasi mPDF
        $mpdf = new Mpdf(
            [
                'default_font' => 'Arial'
            ]
        );
        $mpdf->SetFont('Arial');

        // Load HTML ke mPDF
        $mpdf->WriteHTML($html);

        // Render PDF
        $mpdf->Output('laporan_pelanggaran_santri.pdf', 'I');
    }
    public function laporan_data_kriteria()
    {

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


        ob_start();
        $data['pengurus_pondok'] = [
            "nama_pengurus" => "Sulaeman Haekal",
            "NIDN" => "12312312312",
        ];
        $data['title'] = 'laporan_data_kriteria';
        $data['formatDate'] = $this->formatDate;
        $this->view('templates/header', $data);
        $this->view('cetak_laporan/kriteria', $data);
        $this->view('templates/footer');
        $html = ob_get_clean();


        // Inisialisasi mPDF
        $mpdf = new Mpdf(
            [
                'default_font' => 'Arial',
            ]
        );

        $mpdf->SetFont('Arial');
        // Load HTML ke mPDF
        $mpdf->WriteHTML($html);

        // Render PDF
        $mpdf->Output('laporan-kriteria.pdf', 'I');
    }
}

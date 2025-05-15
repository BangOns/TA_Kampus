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

        $resultsPelanggaranSantri = $this->model('Data_Pelanggaran_Santri_Model')->getDataAll();
        $resultsDataSantri = $this->model('Data_Santri_Model')->getDataAll();

        if (($resultsPelanggaranSantri['status'] === 200 && !empty($resultsPelanggaranSantri['data']))
            && ($resultsDataSantri['status'] === 200 && !empty($resultsDataSantri['data']))
        ) {
            usort($resultsPelanggaranSantri['data'], function ($a, $b) {
                return $b['nilai_akhir'] <=> $a['nilai_akhir'];
            });
            $data['data-pelanggaran-santri'] = $resultsPelanggaranSantri['data'];
            $data['data-santri'] = $resultsDataSantri['data'];
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
                        'Nama' => '3 kali >',
                        'Bobot' => '1'
                    ],
                    [
                        'No' => '2',
                        'Nama' => '2 kali',
                        'Bobot' => '2'
                    ],
                    [
                        'No' => '3',
                        'Nama' => '1kali',
                        'Bobot' => '3'
                    ],

                ]
            ],
            [
                'nama' => 'dampak_pelanggaran',
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
                        'Nama' => 'Tidak ada',
                        'Bobot' => '3'
                    ],

                ],
            ]
        ];
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
        $mpdf->Output('laporan-kriteria.pdf', 'I');
    }
}

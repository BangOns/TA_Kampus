<?php

use Mpdf\Mpdf;

$autoloadPath = dirname(__DIR__, 2) . '/vendor/autoload.php';

if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
} else {
    var_dump('File autoload.php tidak ditemukan. Pastikan sudah menjalankan "composer install".');
}



class Cetak_Laporan extends Controller
{
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

            ]
        ];
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
        $data['title'] = 'cetak_laporan_santri';

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
        $data['title'] = 'cetak_laporan_pelanggaran';

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

        $resultsDataSanksi = $this->model('Data_Sanksi_Model')->getDataAll();
        if ($resultsDataSanksi['status'] === 200 && !empty($resultsDataSanksi['data'])) {
            $data['data-sanksi'] = $resultsDataSanksi['data'];
        }
        ob_start();
        $data['title'] = 'cetak_laporan_sanksi';

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
        $mpdf->Output('laporan_pelanggaran.pdf', 'I');
    }
    public function laporan_pelanggaran_santri()
    {
        $data['data-pelanggaran-santri'] = [];
        $data['data-santri'] = [];
        $resultsPelanggaranSantri = $this->model('Data_Pelanggaran_Santri_Model')->getDataAll();
        $resultsDataSantri = $this->model('Data_Santri_Model')->getDataAll();

        if (($resultsPelanggaranSantri['status'] === 200 && !empty($resultsPelanggaranSantri['data']))
            && ($resultsDataSantri['status'] === 200 && !empty($resultsDataSantri['data']))
        ) {
            $data['data-pelanggaran-santri'] = $resultsPelanggaranSantri['data'];
            $data['data-santri'] = $resultsDataSantri['data'];
        }
        ob_start();
        $data['title'] = 'cetak_laporan_pelanggaran_santri';

        $this->view('templates/header', $data);
        $this->view('cetak_laporan/pelanggaran_santri', $data);
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
        $mpdf->Output('laporan_pelanggaran_santri.pdf', 'I');
    }
}

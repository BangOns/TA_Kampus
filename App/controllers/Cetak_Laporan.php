<?php

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
    public function laporan_santri() {}
    public function laporan_pelanggaran() {}
    public function laporan_sanksi() {}
    public function laporan_pelanggaran_santri() {}
}
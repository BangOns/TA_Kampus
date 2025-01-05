<?php
class Dashboard extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['list-dashboard'] = [
            [
                'title' => 'Dashboard',
                'icon' => 'icons-dashboard.svg',
                'link' => BASEURL . '/dashboard'
            ],
            [
                'title' => 'Data Santri',
                'icon' => 'icons-santri.svg',
                'link' => BASEURL . '/data-santri'
            ],
            [
                'title' => 'Data Pelanggaran',
                'icon' => 'icons-pelanggaran.svg',
                'link' => BASEURL . '/data-pelanggaran'
            ],
            [
                'title' => 'Data Sanksi',
                'icon' => 'icons-sanksi.svg',
                'link' => BASEURL . '/data-sanksi'
            ],



        ];
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('dashboard/index');
        $this->view('templates/footer');
    }
}
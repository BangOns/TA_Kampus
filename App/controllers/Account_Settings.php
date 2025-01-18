<?php
class Account_Settings extends Controller
{
    public function index($id = 0)
    {
        if (!$id) {
            header('Location: ' . BASEURL . '/pageError');
            exit;
        }
        $data['title'] = 'Account Settings';
        $this->view('templates/header', $data);
        $this->view('templates/components/navbar', $data);
        $this->view('account_settings/index', $data);
        $this->view('templates/footer', $data);
    }
}
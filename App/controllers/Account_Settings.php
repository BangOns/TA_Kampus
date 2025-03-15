<?php
class Account_Settings extends Controller
{
    public function index($id = "")
    {
        if (!$id) {
            header('Location: ' . BASEURL . '/pageError');
            exit;
        }
        $data['admin'] = [];

        $result = $this->model('Account_Settings_Model')->getDataAdminById($id);
        if ($result['status'] === 200) {
            $data['admin'] = $result['data']['name'];
        } else {
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

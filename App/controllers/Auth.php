<?php
class Auth extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('Auth/index');
        $this->view('templates/footer');
    }
    public function register()
    {
        $data['pertanyaan'] = [
            'Siapa nama ibu anda ?',
            'Siapa nama ayah anda ?',
            'Apa nama hewan peliharaan anda ?',
            'Apa nama sekolah dasar anda ?'
        ];
        $data['title'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('Auth/register', $data);
        $this->view('templates/footer');
    }
    public function login()
    {
        $result =  $this->model('Auth_Model')->login($_POST);

        if ($result['status'] == '200') {
            $_SESSION['user'] = $result['user'][0] . ',' . $result['user'][1];
            $this->redirect('/dashboard');
        } else {
            Flasher::setFlash('Login', 'Gagal', 'error');

            $this->redirect('/auth');
        }
    }
    public function addAdmin()
    {
        $result =  $this->model('Auth_Model')->register($_POST);
        if ($result['status'] == '200') {
            Flasher::setFlash('Register', 'Berhasil', 'success');

            $this->redirect('/auth');
        } else {
            Flasher::setFlash('Register', 'Gagal', 'error');

            $this->redirect('/auth/register');
        }
    }
}

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
        $data['title'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('Auth/register');
        $this->view('templates/footer');
    }
    public function login()
    {
        $result =  $this->model('Auth_Model')->login($_POST);
        if ($result['status'] == '200') {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }
    public function addAdmin()
    {
        $result =  $this->model('Auth_Model')->register($_POST);
        if ($result['status'] == '200') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        }
    }
}
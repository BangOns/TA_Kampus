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
}
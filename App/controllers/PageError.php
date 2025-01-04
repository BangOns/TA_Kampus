<?php

class PageError extends Controller
{
    public function index()
    {
        $data['title'] = 'Error 404';
        $this->view('templates/header', $data);
        $this->view('error/index');
        $this->view('templates/footer');
    }
}
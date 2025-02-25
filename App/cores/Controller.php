<?php
class Controller
{

    public function view($view, $data = [])
    {
        require_once '../App/views/' . $view . '.php';
    }
    public function model($model)
    {

        $file = dirname(__DIR__, 1) . '/models/' . $model . '.php';

        if (file_exists($file)) {
            require_once $file;
            return new $model(); // Mengembalikan instance dari model
        } else {
            die("File model '$model.php' tidak ditemukan di App/models/");
        }
    }
    public function redirect($url)
    {
        header('Location: ' . BASEURL . $url);
        exit;
    }
}
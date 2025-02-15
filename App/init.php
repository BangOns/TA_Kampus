<?php

require_once 'config/config.php';
require_once 'utils/SumPelanggaranSantri.php';
require_once 'utils/SchemaResponse.php';

spl_autoload_register(function ($class) {

    $file = __DIR__ . '/cores/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        die("File core '$class.php' tidak ditemukan di App/cores/");
    }
});

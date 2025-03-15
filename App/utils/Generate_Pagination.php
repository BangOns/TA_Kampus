<?php

function generatePaginate($totalData, $limitPerhalaman)
{
    $totalData = count($totalData['data']);
    $totalHalaman = ceil($totalData / $limitPerhalaman);
    $getIndexHalamatAktif =  strpos($_SERVER['REQUEST_URI'], '?') ? intval(explode('=', explode('?', $_SERVER['REQUEST_URI'])[1])[1]) : 0;
    $halamanAktif = (isset($getIndexHalamatAktif)) ? ($getIndexHalamatAktif !== 0 ?  $getIndexHalamatAktif : 1) : 1;
    $indexLimit = ($limitPerhalaman * $halamanAktif) - $limitPerhalaman;
    return [
        "total-halaman" => $totalHalaman,
        "index-limit" => $indexLimit,
        "halaman-aktif" => $halamanAktif,
    ];
}

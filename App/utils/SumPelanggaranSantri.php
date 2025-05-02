<?php
function sumPelanggaranSantri($data)
{
    $c1 = 0.35;
    $c2 = 0.25;
    $c3 = 0.2;
    $c4 = 0.15;
    $c5 = 0.15;

    $sumNilaiAkhir =  round(($data['jenis'] * $c1) +  ($data['frekuensi'] * $c2) + ($data['dampak'] * $c3) + ($data['keseriusan_niat'] * $c4) + ($data['permohonan_maaf'] * $c5), 2);

    return $sumNilaiAkhir;
}

function updateNilaiPelanggaranSantri($nilai_akhir, $data_sanksi)
{
    $get_skor_sanksi = 0;
    $filter_skor = [];
    foreach ($data_sanksi as $ds) {
        array_push($filter_skor, array($ds['min_skor'], $ds['max_skor']));
    };
    foreach (array_reverse($filter_skor) as $fs) {
        if ($nilai_akhir >= $fs[0] && $nilai_akhir <= $fs[1]) {
            $get_skor_sanksi = $fs[0];
            break;
        }
    }
    $get_index_sanksi_by_skor = array_search($get_skor_sanksi, array_column($data_sanksi, 'min_skor'));
    return $get_index_sanksi_by_skor;
}

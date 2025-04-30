<?php
function sumPelanggaranSantri($data)
{
    $c1 = 0.35;
    $c2 = 0.25;
    $c3 = 0.2;
    $c4 = 0.15;
    $c5 = 0.05;

    $sumNilaiAkhir =  round((($data['jenis'] / 3) * $c1) +  (($data['frekuensi'] / 3) * $c2) + (($data['dampak'] / 3) * $c3) + (($data['keseriusan_niat'] / 3) * $c4) + (($data['permohonan_maaf'] / 3) * $c5), 2);

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

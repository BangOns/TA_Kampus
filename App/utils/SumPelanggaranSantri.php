<?php
function sumPelanggaranSantri($data)
{
    $c1 = 0.30;
    $c2 = 0.25;
    $c3 = 0.20;
    $c4 = 0.15;
    $c5 = 0.10;

    $sumNilaiAkhir =  round(($data['jenis']  * $c1) +  ($data['frekuensi']  * $c2) + ($data['dampak']  * $c3) + ($data['keseriusan_niat']  * $c4) + ($data['permohonan_maaf']  * $c5), 2);

    return $sumNilaiAkhir;
}

function updateNilaiPelanggaranSantri($nilai_akhir, $data_sanksi)
{

    $highest_max = 0;
    foreach ($data_sanksi as $sanksi) {
        if ($sanksi['max_skor'] > $highest_max) {
            $highest_max = $sanksi['max_skor'];
        }
    }

    if ($nilai_akhir > $highest_max) {
        $highest_min = 0;
        $highest_index = null;

        foreach ($data_sanksi as $index => $sanksi) {
            if ($sanksi['min_skor'] > $highest_min) {
                $highest_min = $sanksi['min_skor'];
                $highest_index = $index;
            }
        }

        return $highest_index;
    }

    $ranges = [];
    foreach ($data_sanksi as $index => $sanksi) {
        if (isset($sanksi['min_skor']) && isset($sanksi['max_skor'])) {
            $ranges[] = [
                'index' => $index,
                'min' => $sanksi['min_skor'],
                'max' => $sanksi['max_skor']
            ];
        }
    }

    usort($ranges, function ($a, $b) {
        return $b['min'] - $a['min'];
    });

    foreach ($ranges as $range) {
        if ($nilai_akhir >= $range['min'] && $nilai_akhir <= $range['max']) {
            return $range['index'];
        }
    }

    // If no range matches (shouldn't happen if ranges are properly defined)
    return null;
}

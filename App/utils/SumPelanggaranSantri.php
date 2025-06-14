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

function sumPelanggaranSantriUpdate($dataAll, $data)
{
    $dataresult = [];
    $counter = [];

    foreach ($dataAll as $item) {
        $key = $item['id_kriteria'];

        // Hitung berapa kali id_kriteria muncul
        if (!isset($counter[$key])) {
            $counter[$key] = 1;
        } else {
            $counter[$key]++;
        }

        // Masukkan data hanya sekali untuk setiap id_kriteria
        if (!isset($result[$key])) {
            $result[$key] = [
                'kriteria' => $item['kriteria'],
                'id_kriteria' => $key,
                'bobot_kriteria' => $item['bobot_kriteria'],
                'jenis_kriteria' => $item['jenis_kriteria'],
                // isikan sementara, nanti update setelah foreach
                'length_kriteria' => 0,
            ];
        }
    }

    // Masukkan jumlah ke masing-masing hasil akhir
    foreach ($result as $key => &$res) {
        $res['length_kriteria'] = $counter[$key];
    }

    // Ubah ke indexed array kalau dibutuhkan
    $dataresult = array_values($result);
    $hasil = [];
    foreach ($dataresult as $item) {
        if (isset($data[$item['kriteria']])) {
            if ($item['jenis_kriteria'] == 'benefit') {
                $hasil[] = ($item['length_kriteria'] / $data[$item['kriteria']]) * ($item['bobot_kriteria'] / 10);
            } else {
                $hasil[] = ($data[$item['kriteria']] / $item['length_kriteria']) * ($item['bobot_kriteria'] / 10);
            }
        }
    }
    return array_sum($hasil);
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

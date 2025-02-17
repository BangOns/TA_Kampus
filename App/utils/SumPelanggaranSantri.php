<?php
function sumPelanggaranSantri($data)
{
    $c1 = 0.35;
    $c2 = 0.25;
    $c3 = 0.2;
    $c4 = 0.15;
    $c5 = 0.05;
    return round(($data['jenis'] * $c1) +  ($data['frekuensi'] * $c2) + ($data['dampak'] * $c3) + ($data['keseriusan_niat'] * $c4) + ($data['permohonan_maaf'] * $c5), 2);
}

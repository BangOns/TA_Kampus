<?php

function renderCardDataHasilAkhir($data)
{
    // Mulai dengan section utama
    echo '<section class="w-full flex flex-col gap-4 md:hidden">';
    // Looping melalui data kriteria untuk menampilkan tiap artikel
    foreach ($data as $index => $kriteria) {
        echo '<article class="w-full py-3 h-auto border border-slate-300 rounded shadow px-5 sm:px-7">';
        echo '<section class="py-2">';
        echo '<h1 class="font-semibold text-sm sm:text-base">' . $kriteria['Nama'] . '</h1>';
        // Menampilkan detail kriteriaan dalam tabel
        echo '<section class="py-2 text-xs sm:text-sm">';
        echo '<table class="w-full table-collapse">';
        echo '<tbody class="divide-y divide-gray-200 w-full">';
        echo '<tr>';
        echo '<td class="py-2">Jenis Pelanggaran</td>';
        echo '<td class="font-semibold">' . $kriteria['nilai akhir'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="py-2">Frekuensi</td>';
        echo '<td class="font-semibold">' . $kriteria['Kategori Sanksi'] . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</section>';


        echo '</article>';
    }

    echo '</section>';
}

<?php

function renderCardKriteria($data, $menu)
{
    // Mulai dengan section utama
    echo '<section class="w-full flex flex-col gap-4 md:hidden">';
    // Looping melalui data kriteria untuk menampilkan tiap artikel
    foreach ($data as $index => $kriteria) {
        echo '<article class="w-full py-3 h-auto border border-slate-300 rounded shadow px-5 sm:px-7">';
        // Menampilkan detail kriteriaan dalam tabel
        echo '<section class="py-2 text-xs sm:text-sm">';
        echo '<table class="w-full table-collapse">';
        echo '<tbody class="divide-y divide-gray-200 w-full">';
        echo '<tr>';
        echo '<td class="py-2">Nama</td>';
        echo '<td class="font-semibold">' . $kriteria['Nama'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="py-2">Bobot</td>';
        echo '<td class="font-semibold">' . $kriteria['Bobot'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="py-2">Jenis Kriteria</td>';
        echo '<td class="font-semibold">' . 'Benefit' . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</section>';

        // Menambahkan tombol untuk melihat opsi lebih lanjut
        echo '<section class="py-2 h-auto">';
        echo '<button onclick="buttonToggleMenuMobile(\'#menu-mobile-' . $index . '\')" class="w-full flex items-center justify-center gap-2 text-white py-2 text-xs sm:text-sm bg-black rounded">View More Option';
        echo '<div class="size-4 text-white">';
        include dirname(__DIR__, 5) . '/public/icons/icons-dropdown.svg';
        echo '</div>';
        echo '</button>';
        echo '<section id="menu-mobile-' . $index . '" class="w-full hidden flex-col gap-2 p-2 border border-gray-300 rounded">';
        foreach ($menu as $mn) {
            // Menambahkan menu opsi tambahan
            echo  "<button type='button' data-id='{$kriteria['id_kriteria']}' data-id_subkriteria='{$kriteria['id_subkriteria']}'  class='{$mn['class']} '>";
            echo '<div class="size-4">';
            include($mn['icon']);
            echo '</div>';
            echo $mn['text'] . "</button>";
        }
        echo '</section>';
        echo '</article>';
    }

    echo '</section>';
}

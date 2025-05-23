<?php

function renderCardSanksi($data, $menu)
{
    $kategoriSanksi = [
        "Ringan" => 'text-yellow-400',
        "Sedang" => 'text-orange-400',
        "Berat" => 'text-red-500',
    ];
    // Mulai dengan section utama
    echo '<section class="w-full flex flex-col gap-4 md:hidden">';
    // Looping melalui data pelanggar untuk menampilkan tiap artikel
    foreach ($data as $index => $pelanggar) {
        echo '<article class="w-full py-3 h-auto border border-slate-300 rounded shadow px-5 sm:px-7">';
        echo '<section  >';
        echo '<h1 class="font-semibold ' .  $kategoriSanksi[$pelanggar['Kategori Sanksi']]  . '   text-lg">' . $pelanggar['Kategori Sanksi'] . '</h1>';
        echo '</section>';

        // Menampilkan detail pelanggaran dalam tabel
        echo '<section class="py-2 text-xs sm:text-sm">';
        echo '<table class="w-full table-collapse">';
        echo '<tbody class="divide-y divide-gray-200 w-full">';
        echo '<tr>';
        echo '<td class="py-2">Deskripsi</td>';
        echo '<td class=" font-semibold">' . $pelanggar['Keterangan'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="py-2">Min - Max Nilai</td>';
        echo '<td class=" font-semibold">' . $pelanggar['Min-Max Nilai Akhir'] . '</td>';
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
            echo  "<a href='{$mn['href']}/{$pelanggar['No']}' class='{$mn['class']} justify-center'>";
            echo '<div class="size-4">';
            include($mn['icon']);
            echo '</div>';
            echo $mn['text'] . "</a>";
        }
        echo '</section>';
        echo '</article>'; // Akhir dari artikel
    }

    echo '</section>'; // Akhir dari section utama
}

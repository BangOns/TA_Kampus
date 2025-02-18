<?php

function renderTable($data, $columns, $menu)
{
    $kategoriSanksi = [
        "Ringan" => 'text-yellow-500',
        "Sedang" => 'text-orange-400',
        "Berat" => 'text-red-500',
    ];
    echo '<table class="hidden font-poppins md:table w-full table-auto sm:text-xs text-sm lg:text-base  border border-gray-300 divide-y divide-gray-200">';
    echo '<thead class="text-black "><tr>';
    foreach ($columns as $column) {
        echo "<th class='font-medium text-start " . ($column == 'No' ? "pl-2 py-2 w-1/6" : "") . " font-semibold '>$column</th>";
    }
    echo '<th></th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody class="divide-y divide-gray-200">';
    foreach ($data as $index => $row) {
        echo '<tr class="bg-white">';
        foreach ($columns as $indexColumn => $column) {
            echo "<td class=' " . ($indexColumn == 0 ? "pl-2 py-3" : "") . ($indexColumn == 1 ? " font-semibold" : "") . ($column == 'Kategori' || $column == 'Jenis Pelanggaran' ? $kategoriSanksi[$row[$column]] : "") . "'>" . $row[$column] . '</td>';
        }

        echo "<td class='pr-1 relative'>
        <div onclick=\"buttonToggleMenu('#menu-$index')\" class='size-5 hover:cursor-pointer'>
            ";
        include(dirname(__DIR__, 4) . '/public/icons/icons-menu-table.svg');
        echo "</div>
        <div id='menu-$index' class='absolute invisible scale-0 transition-all ease-in-out duration-300 w-24 sm:right-7 lg:right-9 md:top-6 space-y-2 border shadow bg-white rounded p-2 max-lg:text-xs'>";
        foreach ($menu as $mn) {
            echo "<a href='{$mn['href']}/{$row['id']}'  class='{$mn['class']}'>
                     <div class='size-4'>
                         ";
            include($mn['icon']);
            echo " </div>" . $mn['text'] .
                "</a>";
        }
        echo "</td>";
        echo '</tr>';
    }

    echo '</tbody></table>';
}
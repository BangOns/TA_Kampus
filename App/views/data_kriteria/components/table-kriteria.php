<?php
$data_table_kriteria = $data['kriteria'];
$result = [];

foreach ($data_table_kriteria as $item) {
    $key = $item['kriteria']; // grup berdasarkan nama kriteria

    if (!isset($result[$key])) {
        $result[$key] = [
            'kriteria' => $item['kriteria'],
            'jenis_kriteria' => $item['jenis_kriteria'],
            'id_kriteria' => $item['id_kriteria'],
            'items' => []
        ];
    }

    $result[$key]['items'][] = $item;
}
$result = array_values($result);

$link_menu_table = [
    [
        'text' => 'Edit Sub-Kriteria',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-edit.svg',
        'class' => 'editSubKriteria  py-1 px-2 sm:py-2 sm:px-2 lg:px-3 rounded transition-all items-center  text-orange-300 hidden md:flex text-xs md:text-sm gap-1 lg:text-sm',
    ],
    [
        'text' => 'Delete Sub-Kriteria',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-delete.svg',
        'class' => 'deleteSubKriteria text-nowrap  py-1 px-2 sm:py-2 sm:px-2 lg:px-3 rounded transition-all items-center  text-red-500 hidden md:flex text-xs md:text-sm gap-1 lg:text-sm',
    ],
];
$link_menu_card = [

    [
        'text' => 'Edit Sub-Kriteria',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-edit.svg',
        'class' => ' editSubkriteria w-full text-sm px-1 py-2 text-yellow-500 flex items-center gap-2 hover:bg-slate-200'
    ],
    [
        'text' => 'Delete Sub-Kriteria',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-delete.svg',
        'class' => ' deleteSubkriteria w-full text-sm px-1 py-2 text-red-500 flex items-center gap-2 hover:bg-slate-200'
    ]
]

?>

<article class="w-full  font-poppins max-md:space-y-3 ">
    <!-- Area Table and Search -->
    <section class="w-full mt-4">
        <section class="w-full basis-1/2 flex md:my-4 ">
            <button data-type="tambah-kriteria"
                class=" tambahKriteria py-1 px-2 sm:py-2 sm:px-2 lg:px-3   rounded transition-all items-center bg-black text-white  flex text-xs md:text-sm gap-1 lg:text-sm ">
                <div class="size-5">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-add.svg'; ?>
                </div>
                Tambah Kriteria
            </button>
        </section>
        <!-- Table & Card Pelanggar -->
        <article class="w-full max-md:space-y-3 max-md:mt-3 ">
            <!-- Table Pelanggar -->
            <?php if (count($result) !== 0) {

                echo "<section class='w-full space-y-5 max-md:hidden '>";
                foreach ($result as $key => $value) {
                    echo "<section class='w-full basis-full flex my-4 justify-between items-center max-md:gap-2'>
                    <h1 class='hidden md:block text-nowrap font-semibold'>" . ucwords(preg_replace("/[-_]/", " ", $value["kriteria"])) . "</h1> - 
                    <h1 class='hidden md:block text-nowrap font-semibold'> (" . ucwords(preg_replace("/[-_]/", " ", $value["jenis_kriteria"])) . ")</h1>
                    
                    ";
                    echo "
                    <section class='w-full hidden md:flex justify-end gap-2'>
                      <button data-id='{$value['id_kriteria']}'
                     class='editKriteria  py-1 px-2 sm:py-2 sm:px-2 lg:px-3 rounded transition-all items-center bg-orange-300 text-white hidden md:flex text-xs md:text-sm gap-1 lg:text-sm'>
                   <div class='size-5'>";
                    include dirname(__DIR__, 4) . '/public/icons/icons-edit.svg';
                    echo "</div>
                      Edit Kriteria
                  </button>
                    <button 
                    data-type='edit-kriteria'
                     class='deleteKriteria  py-1 px-2 sm:py-2 sm:px-2 lg:px-3 rounded transition-all items-center bg-red-400 text-white hidden md:flex text-xs md:text-sm gap-1 lg:text-sm'>
                   <div class='size-5'>";
                    include dirname(__DIR__, 4) . '/public/icons/icons-delete.svg';
                    echo "</div>
                      Delete Kriteria
                  </button>
                    </section>
                    </section>";
                    echo "<section class='w-full hidden md:flex gap-2 items-center'>
                     <button 
                       class='tambahSubKriteria  py-1 px-2 sm:py-2 sm:px-2 lg:px-3 rounded transition-all items-center bg-black text-white hidden md:flex text-xs md:text-sm gap-1 lg:text-sm'>
                     <div class='size-5'>";
                    include dirname(__DIR__, 4) . '/public/icons/icons-add.svg';
                    echo "</div>
                        Tambah Sub-Kriteria
                    </button>
                  
                    </section>";
                    echo '<table class="hidden font-poppins md:table w-full table-auto sm:text-xs text-sm lg:text-base  border border-gray-300 divide-y divide-gray-200">';
                    echo '<thead class="text-black "><tr>';
                    foreach ($data['list-table'] as $columnIndex => $value_column) {
                        echo "<th class=' text-start " . ($columnIndex == 0 ? "pl-2 py-2 " : "") . " font-semibold '>$value_column</th>";
                    }
                    echo '<th></th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody class="divide-y divide-gray-200">';
                    foreach ($value['items'] as $index => $row) {
                        echo '<tr class="bg-white">';
                        foreach ($data['list-table'] as $indexColumn => $column) {
                            echo "<td class=' " . ($indexColumn == 0 ? "pl-2 py-3" : "")  . "'>" . $row[$column] . '</td>';
                        }
                        if ($link_menu_table) {
                            echo "<td class='pr-1 relative'>
    <div onclick=\"buttonToggleMenu('#menu-$index')\" class='size-5 hover:cursor-pointer'> ";
                            include(dirname(__DIR__, 4) . '/public/icons/icons-menu-table.svg');
                            echo "</div>
    <div id='menu-$index' class='absolute invisible z-10 scale-0 transition-all ease-in-out duration-300 w-auto sm:right-20  xl:right-12 md:top-6 space-y-2 border shadow bg-white rounded p-2 max-lg:text-xs'>";
                            foreach ($link_menu_table as $mn) {
                                echo "<button  class='{$mn['class']}'>
                 <div class='size-4'> ";
                                include($mn['icon']);
                                echo " </div>" . $mn['text'] .
                                    "</button>";
                            }
                            echo "</td>";
                            echo '</tr>';
                        }
                    }

                    echo '</tbody></table>';
                }
                echo '</section >';
                // Card Pelanggar
                foreach ($data['kriteria_pelanggaran'] as $key => $value) {
                    echo "<h1 class='block md:hidden font-semibold'>" . ucwords(preg_replace("/[-_]/", " ", $value["nama"])) . "</h1>";
                    include_once dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-kriteria.php';
                    renderCardKriteria($value['items'], $link_menu_card);
                }
            } else {
                echo '<section class="w-full text-center ">
            <p class="text-2xl font-semibold">Data Not Found X</p>
        </section>';
            }
            ?>
        </article>
    </section>
</article>
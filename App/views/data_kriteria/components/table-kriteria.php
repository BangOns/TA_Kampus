<?php

echo json_encode($data['kriteria']);

$link_menu_card = [

    [
        'text' => 'Tambah Sub-Kriteria',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-edit.svg',
        'class' => ' tambahSubkriteria w-full text-sm px-1 py-2 text-yellow-500 flex items-center gap-2 hover:bg-slate-200'
    ],
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
            <?php if (count($data['kriteria']) !== 0) {

                echo "<section class='w-full space-y-5 max-md:hidden '>";
                foreach ($data['kriteria'] as $key => $value) {
                    echo "<section class='w-full basis-full flex my-4 justify-between items-center max-md:gap-2'>
                    <h1 class='hidden md:block text-nowrap font-semibold'>" . ucwords(preg_replace("/[-_]/", " ", $value["kriteria"])) . "</h1>";
                    echo "
                    <section class='w-full hidden md:flex justify-end gap-2'>
                      <button data-id='test'
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
                    <button 
                     class='editSubKriteria  py-1 px-2 sm:py-2 sm:px-2 lg:px-3 rounded transition-all items-center bg-orange-300 text-white hidden md:flex text-xs md:text-sm gap-1 lg:text-sm'>
                   <div class='size-5'>";
                    include dirname(__DIR__, 4) . '/public/icons/icons-edit.svg';
                    echo "</div>
                      Edit Sub-Kriteria
                  </button>
                    <button 
                     class='deleteSubKriteria  py-1 px-2 sm:py-2 sm:px-2 lg:px-3 rounded transition-all items-center bg-red-400 text-white hidden md:flex text-xs md:text-sm gap-1 lg:text-sm'>
                   <div class='size-5'>";
                    include dirname(__DIR__, 4) . '/public/icons/icons-delete.svg';
                    echo "</div>
                      Delete Sub-Kriteria
                  </button>
                    </section>";
                    include_once dirname(__DIR__, 3) . '/views/templates/components/table-data.php';
                    renderTable($value['items'], $data['list-table']);
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
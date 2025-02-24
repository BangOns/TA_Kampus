<?php


$link_menu = [
    [
        'href' => BASEURL . '/data_sanksi/detail/data-sanksi',
        'text' => 'Details',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-detail.svg',
        'class' => 'w-full text-sm px-1 py-2 text-sky-500 flex items-center gap-2 hover:bg-slate-200'
    ],
    [
        'href' => BASEURL . '/data_sanksi/edit/data-sanksi',
        'text' => 'Edit',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-edit.svg',
        'class' => 'w-full text-sm px-1 py-2 text-yellow-500 flex items-center gap-2 hover:bg-slate-200'
    ],
    [
        'href' => BASEURL . '/data_sanksi/delete/data-sanksi',
        'text' => 'Delete',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-delete.svg',
        'class' => 'w-full text-sm px-1 py-2 text-red-500 flex items-center gap-2 hover:bg-slate-200'
    ]
]

?>
<article class="w-full  font-poppins max-md:space-y-3 ">
    <!-- Area Table and Search -->
    <section class="w-full mt-4">

        <!-- Button Tambah Pelanggar -->
        <section class="w-full basis-1/2 flex my-4 ">
            <a href="<?= BASEURL; ?>/<?= $data['title']; ?>/add/data-sanksi"
                class="py-1 px-2 sm:py-2 sm:px-2 lg:px-3   rounded transition-all items-center bg-black text-white  flex text-xs md:text-sm gap-1 lg:text-sm ">
                <div class="size-5">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-add.svg'; ?>
                </div>
                Tambah Sanksi
            </a>
        </section>
        <section class="w-full pb-2">
            <p class="text-xs ">Setiap Kategori Sanksi hanya menerima 3 data <span class="text-red-500">*</span></p>
        </section>
        <!-- Table & Card Pelanggar -->
        <article class="w-full max-md:space-y-3 max-md:mt-3 ">
            <!-- Table Pelanggar -->
            <?php if (count($data['data-sanksi']) !== 0) {

                include dirname(__DIR__, 3) . '/views/templates/components/table-data.php';
                renderTable($data['data-sanksi'], $data['list-table'], $link_menu);
                // Card Pelanggar
                include dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-sanksi.php';
                renderCardSanksi($data['data-sanksi'], $link_menu);
            } else {
                echo '<section class="w-full text-center ">
        <p class="text-2xl font-semibold">Data Not Found X</p>
    </section>';
            }
            ?>
        </article>

    </section>
</article>
<!-- Pagination -->

<section class=" my-3 font-poppins font-semibold ">
    <ul class="flex w-full justify-center  ">
        <!-- Cursor Left -->
        <li class=" border border-slate-300 rounded-l-md ">
            <a href="#"
                class="flex w-full h-full items-center gap-2 text-xs md:text-sm px-3 py-2 hover:cursor-pointer hover:bg-slate-200 bg-white ">
                <div class="size-4">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-left.svg'; ?>
                </div>
                Previous
            </a>
        </li>
        <!-- List Paginate -->
        <li class=" border border-slate-300 ">
            <a href="#"
                class="flex px-4 items-center h-full  text-xs md:text-sm  w-full hover:cursor-pointer hover:bg-slate-200 bg-white">
                1
            </a>
        </li>
        <!-- Cursor Right -->
        <li class=" border border-slate-300 rounded-r-md ">
            <a href="#"
                class="flex w-full h-full items-center gap-2 text-xs md:text-sm px-3 py-2 hover:bg-slate-200 bg-white hover:cursor-pointer">
                Next
                <div class="size-4">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-right.svg'; ?>
                </div>
            </a>
        </li>
    </ul>
</section>
<?php
$data_santri = $data['data-santri'];
if (isset($_POST["search"])) {
    $data_santri = array_filter($data['data-santri'], fn($item) => str_starts_with(strtolower($item['Nama Santri']), strtolower($_POST['search'])));
};
$link_menu = [
    [
        'href' => BASEURL . '/data_santri/detail/data-santri',
        'text' => 'Details',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-detail.svg',
        'class' => 'w-full text-sm px-1 py-2 text-sky-500 flex items-center gap-2 hover:bg-slate-200'
    ],
    [
        'href' => BASEURL . '/data_santri/edit/data-santri',
        'text' => 'Edit',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-edit.svg',
        'class' => 'w-full text-sm px-1 py-2 text-yellow-500 flex items-center gap-2 hover:bg-slate-200'
    ],
    [
        'href' => BASEURL . '/data_santri/delete/data-santri',
        'text' => 'Delete',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-delete.svg',
        'class' => 'w-full text-sm px-1 py-2 text-red-500 flex items-center gap-2 hover:bg-slate-200'
    ]
]

?>

<article class="w-full  font-poppins max-md:space-y-3 ">

    <!-- Area Table and Search -->
    <section class="w-full mt-4">
        <!-- Filter and Search -->
        <form method="post" class="w-full flex gap-3  ">
            <section class=" lg:w-1/5 rounded flex bg-white px-2 md:px-3 items-center border border-slate-300 py-1">
                <input type="text" placeholder="Cari Nama Santri" id="search" name="search"
                    class=" w-full py-1 border-none bg-transparent text-xs sm:text-sm focus:outline-none focus:ring-0">
                <div class="size-4 md:size-5 text-slate-600">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-search.svg'; ?>
                </div>
            </section>
            <section class="flex items-center h-full">
                <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded">Search</button>
            </section>
        </form>
        <!-- Button Tambah Pelanggar -->
        <section class="w-full basis-1/2 flex my-4 ">
            <a href="<?= BASEURL; ?>/<?= $data['title']; ?>/add/data-santri"
                class="py-1 px-2 sm:py-2 sm:px-2 lg:px-3   rounded transition-all items-center bg-black text-white  flex text-xs md:text-sm gap-1 lg:text-sm ">
                <div class="size-5">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-add.svg'; ?>
                </div>
                Tambah Santri
            </a>
        </section>
        <!-- Table & Card Pelanggar -->
        <article class="w-full max-md:space-y-3 max-md:mt-3 ">
            <!-- Table Pelanggar -->
            <?php if (count($data_santri) !== 0) {
                include dirname(__DIR__, 3) . '/views/templates/components/table-data.php';
                renderTable($data_santri, $data['list-table'], $link_menu);
                include dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-santri.php';
                renderCardSantri($data_santri, $link_menu);
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

<!-- <section class=" my-3 font-poppins font-semibold "> -->
<!-- <ul class="flex w-full justify-center  "> -->
<!-- Cursor Left -->
<!-- <li class=" border border-slate-300 rounded-l-md ">
            <a href="<?= BASEURL ?>/data_santri?page=<?= $data['halaman-aktif'] - 1 ?>"
                class="flex w-full h-full <?= $data['halaman-aktif'] <= 1 ? 'pointer-events-none' : ''  ?>   items-center gap-2 text-xs md:text-sm px-3 py-2 hover:cursor-pointer hover:bg-slate-200 bg-white ">
                <div class="size-4">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-left.svg'; ?>
                </div>
                Previous
            </a>
        </li> -->
<!-- List Paginate -->
<!-- <?php for ($i = 1; $i <= $data['total-halaman']; $i++) : ?>
            <li class=" border border-slate-300 ">
                <a href="<?= BASEURL ?>/data_santri?page=<?= $i ?>"
                    class="flex px-4 items-center h-full  text-xs md:text-sm  w-full hover:cursor-pointer hover:bg-slate-200 bg-white">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?> -->

<!-- Cursor Right -->
<!-- <li class=" border border-slate-300 rounded-r-md ">
            <a href="<?= BASEURL ?>/data_santri?page=<?= $data['halaman-aktif'] + 1 ?>"
                class="flex w-full h-full items-center gap-2 text-xs md:text-sm px-3 py-2 hover:bg-slate-200 bg-white hover:cursor-pointer  <?= $data['halaman-aktif'] >= $data['total-halaman'] ? 'pointer-events-none' : ''  ?>  ">
                Next
                <div class="size-4">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-right.svg'; ?>
                </div>
            </a>
        </li> -->
<!-- </ul> -->
<!-- </section> -->
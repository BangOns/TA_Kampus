<?php
$dataPelanggar = [
    [
        'No' => 1,
        'Nama Santri' => 'The Sliding Mr. Bones (Next Stop, Pottersville)',
        'Tahun Masuk' => 'Malcolm Lockyer',
        'Kategori' => '1961',
        'Sanksi' => 'Dicukur rambutnya'
    ],
    [
        'No' => 2,
        'Nama Santri' => 'The Bones (Next Stop, Pottersville)',
        'Tahun Masuk' => 'Malcolm ',
        'Kategori' => '1961',
        'Sanksi' => 'Dicukur rambutnya'

    ],
    [
        'No' => 3,
        'Nama Santri' => 'The Sliding Bones (Next Stop, Pottersville)',
        'Tahun Masuk' => 'Lockyer',
        'Kategori' => '1961',
        'Sanksi' => 'Dicukur rambutnya'


    ],


];

$link_menu = [
    [
        'href' => BASEURL . '/dashboard/detail-data-pelanggaran-santri/{$row["No"]}',
        'text' => 'Details',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-detail.svg',
        'class' => 'w-full text-sm px-1 py-2 text-sky-500 flex items-center gap-2 hover:bg-slate-200'
    ],
    [
        'href' => BASEURL . '/dashboard/edit-data-pelanggaran-santri/{$row["No"]}',
        'text' => 'Edit',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-edit.svg',
        'class' => 'w-full text-sm px-1 py-2 text-yellow-500 flex items-center gap-2 hover:bg-slate-200'
    ],
    [
        'href' => BASEURL . '/dashboard/delete-data-pelanggaran-santri/{$row["No"]}',
        'text' => 'Delete',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-delete.svg',
        'class' => 'w-full text-sm px-1 py-2 text-red-500 flex items-center gap-2 hover:bg-slate-200'
    ]
]

?>

<article class="w-full mt-10 font-poppins max-md:space-y-3 ">
    <header class="w-full flex items-center ">
        <section class="w-full md:basis-1/2">
            <h2 class="font-semibold text-sm sm:text-base md:text-xl py-2 font-mona tracking-wider">Daftar
                Pelanggar</h2>
            <p class="  text-xs text-slate-400">Berikan peringatan terhadap pelanggar</p>
        </section>

    </header>
    <!-- Area Table and Search -->
    <section class="w-full mt-4">
        <!-- Filter and Search -->
        <header class="w-full flex gap-3  ">
            <section class=" lg:w-1/5 rounded flex bg-white px-2 md:px-3 items-center border border-slate-300 py-1">
                <input type="text" placeholder="Cari Nama Santri"
                    class="w-full  py-1 border-none bg-transparent text-xs sm:text-sm focus:outline-none focus:ring-0">
                <div class="size-4 md:size-5 text-slate-600">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-search.svg'; ?>
                </div>
            </section>
            <section class="lg:w-1/5 rounded flex bg-white px-2 md:px-3  items-center border border-slate-300 py-1">
                <label for="kategori" class="size-3 md:size-5 text-slate-600">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-filter.svg'; ?>
                </label>
                <select name="kategori" id="kategori"
                    class="w-full px-3 py-1 border-none bg-transparent text-xs sm:text-sm focus:outline-none text-slate-400 selection:text-black hover:cursor-pointer  focus:ring-0">
                    <option value="">Kategori</option>
                    <option value="Berat">Berat</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Ringan">Ringan</option>
                </select>
            </section>
        </header>
        <!-- Button Tambah Pelanggar -->
        <section class="w-full basis-1/2 flex my-4 ">
            <button
                class="py-1 px-2 sm:py-2 sm:px-2 lg:px-3   rounded transition-all items-center bg-black text-white  flex text-xs md:text-sm gap-1 lg:text-sm ">
                <div class="size-5">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-add.svg'; ?>
                </div>
                Tambah Pelanggar
            </button>
        </section>
        <!-- Table & Card Pelanggar -->
        <article class="w-full max-md:space-y-3 max-md:mt-3 ">
            <!-- Table Pelanggar -->
            <?php include dirname(__DIR__, 3) . '/views/templates/components/table-data.php';
            renderTable($dataPelanggar, $data['list-table'], $link_menu); ?>
            <!-- Card Pelanggar -->
            <?php include dirname(__DIR__, 3) . '/views/templates/components/card-data-mobile.php';
            renderPelanggarSection($dataPelanggar, $link_menu); ?>
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
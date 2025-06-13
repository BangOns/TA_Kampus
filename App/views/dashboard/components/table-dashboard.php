<?php
$datas = $data['data-pelanggar-santri'];
$data_list = $data['list-table2'];
if (isset($_POST["search"])) {
    $datas = array_filter($data['data-pelanggar-santri'], fn($item) => str_starts_with(strtolower($item['Nama Santri']), strtolower($_POST['search'])));
};

$link_menu = [
    [
        'href' => BASEURL . '/dashboard/detail/data-pelanggaran-santri',
        'text' => 'Details',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-detail.svg',
        'class' => 'w-full text-sm px-1 py-2 text-sky-500 flex items-center gap-2 hover:bg-slate-200'
    ],
    [
        'href' => BASEURL . '/dashboard/edit/data-pelanggaran-santri',
        'text' => 'Edit',
        'icon' => dirname(__DIR__, 4) . '/public/icons/icons-edit.svg',
        'class' => 'w-full text-sm px-1 py-2 text-yellow-500 flex items-center gap-2 hover:bg-slate-200'
    ],
    [
        'href' => BASEURL . '/dashboard/delete/data-pelanggaran-santri',
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
        <form action="<?= BASEURL; ?>/dashboard/index/search" method="post" class="w-full flex gap-3  items-center">
            <section class=" lg:w-1/5 rounded flex bg-white px-2 md:px-3 items-center border border-slate-300 py-1">
                <input type="text" placeholder="Cari Nama Santri" name="search" id="search"
                    class="w-full  py-1 border-none bg-transparent text-xs sm:text-sm focus:outline-none focus:ring-0">
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
            <a href="<?= BASEURL; ?>/dashboard/add/data-pelanggaran-santri"
                class="py-1 px-2 sm:py-2 sm:px-2 lg:px-3   rounded transition-all items-center bg-black text-white  flex text-xs md:text-sm gap-1 lg:text-sm ">
                <div class="size-5">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-add.svg'; ?>
                </div>
                Tambah Pelanggar
            </a>
        </section>
        <!-- Table & Card Pelanggar -->
        <article class="w-full max-md:space-y-3 max-md:mt-3 ">
            <?php if (count($datas) !== 0) {
                echo '<table class="hidden font-poppins md:table w-full table-auto sm:text-xs text-sm lg:text-base  border border-gray-300 divide-y divide-gray-200">';
                echo '<thead class="text-black "><tr>';
                foreach ($data_list as $column) {
                    echo "<th class='font-medium text-start " . ($column == 'No' ? "pl-2 py-2 w-1/6" : "") . " font-semibold '>$column</th>";
                }
                echo '<th></th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody class="divide-y divide-gray-200">';
                foreach ($datas as $index => $row) {
                    echo '<tr class="bg-white">';
                    foreach ($data_list as $indexColumn => $column) {
                        echo "<td class=' " . ($indexColumn == 0 ? "pl-2 py-3" : "") . ($indexColumn == 1 ? " font-semibold" : "") . "'>" . $row[$column] . '</td>';
                    }
                    if ($link_menu) {
                        echo "<td class='pr-1 relative'>
                    <div onclick=\"buttonToggleMenu('#menu-$index')\" class='size-5 hover:cursor-pointer'>
                        ";
                        include(dirname(__DIR__, 4) . '/public/icons/icons-menu-table.svg');
                        echo "</div>
                    <div id='menu-$index' class='absolute invisible z-10 scale-0 transition-all ease-in-out duration-300 w-24 sm:right-20  xl:right-28 md:top-6 space-y-2 border shadow bg-white rounded p-2 max-lg:text-xs'>";
                        foreach ($link_menu as $mn) {
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
                }

                echo '</tbody></table>';
                // include dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-pelanggaran-santri.php';
                // renderCardPelanggaranSantri($datas, $link_menu);
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

<!-- <section class=" my-3 font-poppins font-semibold ">
    <ul class="flex w-full justify-center  "> -->
<!-- Cursor Left -->
<!-- <li class=" border border-slate-300 rounded-l-md ">
            <a href="#"
                class="flex w-full h-full items-center gap-2 text-xs md:text-sm px-3 py-2 hover:cursor-pointer hover:bg-slate-200 bg-white ">
                <div class="size-4">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-left.svg'; ?>
                </div>
                Previous
            </a>
        </li> -->
<!-- List Paginate -->
<!-- <li class=" border border-slate-300 ">
            <a href="#"
                class="flex px-4 items-center h-full  text-xs md:text-sm  w-full hover:cursor-pointer hover:bg-slate-200 bg-white">
                1
            </a>
        </li> -->
<!-- Cursor Right -->
<!-- <li class=" border border-slate-300 rounded-r-md ">
            <a href="#"
                class="flex w-full h-full items-center gap-2 text-xs md:text-sm px-3 py-2 hover:bg-slate-200 bg-white hover:cursor-pointer">
                Next
                <div class="size-4">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-right.svg'; ?>
                </div>
            </a>
        </li>
    </ul>
</section> -->

<!-- <section class="lg:w-1/5 rounded flex bg-white px-2 md:px-3  items-center border border-slate-300 py-1">
                <label for="kategori" class="size-3 md:size-5 text-slate-600">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-filter.svg'; ?>
                </label>
                <select name="kategori" id="kategori"
                    class="w-full px-3 py-1 border-none bg-transparent text-xs sm:text-sm focus:outline-none text-slate-400 selection:text-black hover:cursor-pointer  focus:ring-0">
                    <option value="">Kategori</option>
                    <?php foreach ($data['kategori'] as $kategori) : ?>
                        <option class="hover:cursor-pointer" value="<?= $kategori ?>"><?= $kategori ?></option>
                    <?php endforeach; ?>

                </select>
            </section> -->
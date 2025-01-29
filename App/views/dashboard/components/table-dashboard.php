<?php
$dataPelanggar = [
    [
        'No' => 1,
        'Nama Santri' => 'The Sliding Mr. Bones (Next Stop, Pottersville)',
        'Pelanggaran' => 'Malcolm Lockyer',
        'Kategori' => '1961',
        'Sanksi' => 'Dicukur rambutnya'
    ],
    [
        'No' => 2,
        'Nama Santri' => 'The Bones (Next Stop, Pottersville)',
        'Pelanggaran' => 'Malcolm ',
        'Kategori' => '1961',
        'Sanksi' => 'Dicukur rambutnya'

    ],
    [
        'No' => 3,
        'Nama Santri' => 'The Sliding Bones (Next Stop, Pottersville)',
        'Pelanggaran' => 'Lockyer',
        'Kategori' => '1961',
        'Sanksi' => 'Dicukur rambutnya'

    ],


];


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
                    <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-search.svg'; ?>
                </div>
            </section>
            <section class="lg:w-1/5 rounded flex bg-white px-2 md:px-3  items-center border border-slate-300 py-1">
                <label for="kategori" class="size-3 md:size-5 text-slate-600">
                    <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-filter.svg'; ?>
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
                    <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-add.svg'; ?>
                </div>
                Tambah Pelanggar
            </button>
        </section>
        <!-- Table & Card Pelanggar -->
        <article class="w-full max-md:space-y-3 max-md:mt-3 ">
            <!-- Table Pelanggar -->
            <table
                class="hidden md:table w-full table-auto    sm:text-xs text-sm lg:text-base  border border-gray-300 divide-y divide-gray-200">
                <thead class="text-black ">
                    <tr>
                        <?php foreach ($data['list-table'] as $list_table) : ?>
                            <th
                                class="font-medium text-start <?= $list_table == 'No' ? "pl-2 py-2  w-1/6" : "" ?> font-semibold ">
                                <?= $list_table ?></th>
                        <?php endforeach; ?>

                        <th></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($dataPelanggar as $index => $pelanggar) : ?>

                        <tr class="bg-white">
                            <td class="pl-2 py-3 "> <?= $index + 1 ?> </td>
                            <td class="font-semibold"><?= $pelanggar['Nama Santri'] ?></td>
                            <td><?= $pelanggar['Pelanggaran'] ?></td>
                            <td><?= $pelanggar['Kategori'] ?></td>
                            <td class="pr-1 relative ">
                                <div onclick="buttonToggleMenu('#menu-<?= $index ?>')" class="size-5 hover:cursor-pointer">
                                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-menu-table.svg'; ?>
                                </div>
                                <div id="menu-<?= $index ?>"
                                    class="absolute invisible  scale-0 transition-all ease-in-out duration-300  w-20 sm:right-7 lg:right-9 md:top-6 space-y-2  border shadow bg-white rounded ">
                                    <a href="<?= BASEURL; ?>/dashboard/detail-data-pelanggaran-santri/<?= $pelanggar['No'] ?>"
                                        class=" open-modals w-full text-sm px-1 py-2 text-sky-500 flex  items-center gap-2 hover:bg-slate-200">
                                        <div class="size-4">
                                            <?php include dirname(__DIR__, 4) . '/public/icons/icons-detail.svg'; ?>
                                        </div>
                                        Details
                                    </a>
                                    <a href="<?= BASEURL; ?>/dashboard/edit-data-pelanggaran-santri/<?= $pelanggar['No'] ?>"
                                        class="w-full text-sm px-1 py-2 text-yellow-500 flex  items-center gap-2 hover:bg-slate-200">
                                        <div class="size-4">
                                            <?php include dirname(__DIR__, 4) . '/public/icons/icons-edit.svg'; ?>
                                        </div>
                                        Edit
                                    </a>
                                    <button
                                        class="w-full text-sm px-1 py-2 text-red-500 flex  items-center gap-2 hover:bg-slate-200">
                                        <div class="size-4">
                                            <?php include dirname(__DIR__, 4) . '/public/icons/icons-delete.svg'; ?>
                                        </div>
                                        Delete
                                    </button>


                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Card Pelanggar -->
            <section class=" w-full flex flex-col gap-4 sm:flex-row md:hidden">
                <?php foreach ($dataPelanggar as $index => $pelanggar) : ?>

                    <article class="w-full h-auto  border border-slate-300 rounded shadow px-3">
                        <section class="py-2 ">
                            <h1 class="font-semibold text-sm sm:text-base "><?= $pelanggar['Nama Santri'] ?></h1>
                            <p class="text-xs text-slate-600">Kelas 3B | Tahun Ajaran 2023</p>
                        </section>
                        <section class="py-2 text-xs sm:text-sm">
                            <table class="w-full table-collapse">
                                <tbody class="divide-y divide-gray-200 w-full">
                                    <tr>
                                        <td class=" py-2">Kategori</td>
                                        <td class="text-red-500 font-semibold"><?= $pelanggar['Pelanggaran'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Sanksi</td>
                                        <td class="text-red-500 font-semibold">Dicukur rambutnya</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                        <section class="py-2 h-auto">
                            <button onclick="buttonToggleMenuMobile('#menu-mobile-<?= $index ?>')"
                                class="w-full flex items-center justify-center gap-2  text-white py-2 text-xs sm:text-sm bg-black rounded ">View
                                More Option
                                <div class="size-4 text-white">

                                    <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-dropdown.svg'; ?>
                                </div>
                            </button>
                            <section id="menu-mobile-<?= $index ?>"
                                class="w-full hidden flex-col gap-2 p-2 border border-gray-300 rounded">
                                <a href="<?= BASEURL; ?>/dashboard/detail-data-pelanggaran-santri/<?= $pelanggar['No'] ?>"
                                    class="w-full text-sm px-1 py-2 text-sky-500 flex justify-center items-center gap-2 hover:bg-slate-200">
                                    <div class="size-4">
                                        <?php include dirname(__DIR__, 4) . '/public/icons/icons-detail.svg'; ?>
                                    </div>
                                    Details
                                </a>
                                <a href="<?= BASEURL; ?>/dashboard/edit-data-pelanggaran-santri/<?= $pelanggar['No'] ?>"
                                    class="w-full text-sm px-1 py-2 text-yellow-500 flex justify-center items-center gap-2 hover:bg-slate-200">
                                    <div class="size-4">
                                        <?php include dirname(__DIR__, 4) . '/public/icons/icons-edit.svg'; ?>
                                    </div>
                                    Edit
                                </a>
                                <a href="<?= BASEURL; ?>/dashboard/detail-data-pelanggaran-santri/<?= $pelanggar['No'] ?>"
                                    class="w-full text-sm px-1 py-2 text-red-500 flex justify-center items-center gap-2 hover:bg-slate-200">
                                    <div class="size-4">
                                        <?php include dirname(__DIR__, 4) . '/public/icons/icons-delete.svg'; ?>
                                    </div>
                                    Delete
                                </a>
                            </section>
                        </section>
                    </article>
                <?php endforeach; ?>

            </section>

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
                    <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-left.svg'; ?>
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
                    <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-right.svg'; ?>
                </div>
            </a>
        </li>
    </ul>
</section>
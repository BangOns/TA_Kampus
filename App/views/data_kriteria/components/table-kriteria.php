<article class="w-full  font-poppins max-md:space-y-3 ">
    <!-- Area Table and Search -->
    <section class="w-full mt-4">
        <section class="w-full basis-1/2 flex my-4 ">
            <button
                class=" showKriteria py-1 px-2 sm:py-2 sm:px-2 lg:px-3   rounded transition-all items-center bg-black text-white  flex text-xs md:text-sm gap-1 lg:text-sm ">
                <div class="size-5">
                    <?php include dirname(__DIR__, 4) . '/public/icons/icons-add.svg'; ?>
                </div>
                Tambah Kriteria
            </button>
        </section>
        <!-- Table & Card Pelanggar -->
        <article class="w-full max-md:space-y-3 max-md:mt-3 ">
            <!-- Table Pelanggar -->
            <?php if (count($data['kriteria_pelanggaran']) !== 0) {

                echo "<section class='w-full space-y-5'>";
                foreach ($data['kriteria_pelanggaran'] as $key => $value) {
                    echo "
                <section class='w-full basis-1/2 flex my-4 justify-between items-center max-md:gap-2'>
                    <h1 class='hidden md:block font-semibold'>" . ucwords(preg_replace("/[-_]/", " ", $value["nama"])) . "</h1>";
                    echo "
                    <a href='" . BASEURL . "/" . $data['title'] . "/add/data-sanksi'
                       class='py-1 px-2 sm:py-2 sm:px-2 lg:px-3 rounded transition-all items-center bg-black text-white flex text-xs md:text-sm gap-1 lg:text-sm'>
                     <div class='size-5'>";
                    include dirname(__DIR__, 4) . '/public/icons/icons-add.svg';
                    echo "</div>
                        Tambah Sub-Kriteria
                    </a>
                </section>";
                    include_once dirname(__DIR__, 3) . '/views/templates/components/table-data.php';
                    renderTable($value['items'], $data['list-table']);
                }
                echo '</section >';
                // Card Pelanggar
                foreach ($data['kriteria_pelanggaran'] as $key => $value) {
                    echo "<h1 class='block md:hidden font-semibold'>" . ucwords(preg_replace("/[-_]/", " ", $value["nama"])) . "</h1>";
                    include_once dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-kriteria.php';
                    renderCardKriteria($value['items']);
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
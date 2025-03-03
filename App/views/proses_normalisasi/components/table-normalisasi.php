<article class="w-full  font-poppins max-md:space-y-3 ">

    <!-- Area Table and Search -->
    <section class="w-full mt-4">


        <!-- Table & Card Data Alternatif -->
        <article class="w-full max-md:space-y-3 max-md:mt-3 ">
            <header class="w-full pb-2">
                <h1 class="text-lg">Data Alternatif</h1>
            </header>
            <!-- Table Pelanggar -->
            <?php if (count($data['data-alternatif']) !== 0) {
                include dirname(__DIR__, 3) . '/views/templates/components/table-data.php';
                renderTable($data['data-alternatif'], $data['list-table']);
                // Card Pelanggar
                // include dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-pelanggaran.php';
                // renderCardNormalisasi($data['data-pelanggar']);
            } else {
                echo '<section class="w-full text-center ">
            <p class="text-2xl font-semibold">Data Not Found X</p>
        </section>';
            }
            ?>
        </article>

        <!-- Table & Card Nilai Alternatif -->
        <article class="w-full max-md:space-y-3 mt-3 ">
            <header class="w-full pb-2">
                <h1 class="text-lg">Nilai Alternatif</h1>
            </header>
            <!-- Table Pelanggar -->
            <?php if (count($data['data-nilai-alternatif']) !== 0) {
                include_once dirname(__DIR__, 3) . '/views/templates/components/table-data.php';
                renderTable($data['data-nilai-alternatif'], $data['list-table']);
                // Card Pelanggar
                // include_once dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-pelanggaran.php';
                // renderCardNormalisasi($data['data-pelanggar']);
            } else {
                echo '<section class="w-full text-center ">
            <p class="text-2xl font-semibold">Data Not Found X</p>
        </section>';
            }
            ?>
        </article>

        <!-- Table & Card Hasil Normalisasi -->
        <article class="w-full max-md:space-y-3 mt-3 ">
            <header class="w-full pb-2">
                <h1 class="text-lg">Hasil Normalisasi</h1>
            </header>
            <!-- Table Pelanggar -->
            <?php if (count($data['data-nilai-normalisasi']) !== 0) {
                include_once dirname(__DIR__, 3) . '/views/templates/components/table-data.php';
                renderTable($data['data-nilai-normalisasi'], $data['list-table']);
                // Card Pelanggar
                // include_once dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-pelanggaran.php';
                // renderCardNormalisasi($data['data-pelanggar']);
            } else {
                echo '<section class="w-full text-center ">
            <p class="text-2xl font-semibold">Data Not Found X</p>
        </section>';
            }
            ?>
        </article>

    </section>
</article>
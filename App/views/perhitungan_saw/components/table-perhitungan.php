<article class="w-full  font-poppins max-md:space-y-3 ">
    <!-- Area Table and Search -->
    <section class="w-full mt-4">
        <!-- Table & Card Data Alternatif -->
        <article class="w-full max-md:space-y-3 max-md:mt-3 ">
            <header class="w-full pb-2">
                <h1 class="text-lg">Data Alternatif</h1>
            </header>
            <!-- Table Pelanggar -->
            <?php if (count($data['data-alternatif2']) !== 0) {
                include_once __DIR__ . '/render-perhitungan.php';
                renderTablePerhitungan($data['data-alternatif2'], $data['list-table2']);
                // Card Pelanggar
                include_once dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-normalisasi.php';
                renderCardDataAlternatif($data['data-alternatif-mobile']);
            } else {
                echo '<section class="w-full text-center ">
            <p class="text-2xl font-semibold">Data Not Found X</p>
        </section>';
            } ?>
        </article>
        <!-- Table & Card Nilai Alternatif -->
        <article class="w-full max-md:space-y-3 mt-3 ">
            <header class="w-full pb-2">
                <h1 class="text-lg">Matriks Normalisasi</h1>
            </header>
            <!-- Table Pelanggar -->
            <?php if (count($data['data-matriks']) !== 0) {
                include_once __DIR__ . '/render-perhitungan.php';
                renderTablePerhitungan($data['data-matriks'], $data['list-table2']);
                // Card Pelanggar
                include_once dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-normalisasi.php';
                renderCardDataNilaiAlternatif($data['data-matriks-mobile']);
            } else {
                echo '<section class="w-full text-center ">
            <p class="text-2xl font-semibold">Data Not Found X</p>
        </section>';
            }  ?>
        </article>
        <!-- Table & Card Hasil Normalisasi -->
        <article class="w-full max-md:space-y-3 mt-3 ">
            <header class="w-full pb-2">
                <h1 class="text-lg">Hasil Normalisasi</h1>
            </header>
            <!-- Table Pelanggar -->
            <?php if (count($data['data-normalisasi']) !== 0) {
                include_once __DIR__ . '/render-perhitungan.php';
                renderTablePerhitungan($data['data-normalisasi'], $data['list-table2']);
                // Card Pelanggar
                include_once dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-normalisasi.php';
                renderCardDataNilaiNormalisasi($data['data-normalisasi-mobile']);
            } else {
                echo '<section class="w-full text-center ">
            <p class="text-2xl font-semibold">Data Not Found X</p>
        </section>';
            } ?>
        </article>
    </section>
</article>
<article class="w-full  font-poppins max-md:space-y-3 ">

    <!-- Area Table and Search -->
    <section class="w-full mt-4">

        <!-- Table & Card Matriks -->
        <article class="w-full max-md:space-y-3 mt-3 ">

            <!-- Table Pelanggar -->
            <?php if (count($data['data-matriks']) !== 0) {
                include_once dirname(__DIR__, 3) . '/views/templates/components/table-data.php';
                renderTable($data['data-matriks'], $data['list-table']);
                // Card Pelanggar
                include_once dirname(__DIR__, 3) . '/views/templates/components/card-mobile/card-data-hasil-akhir.php';
                renderCardDataHasilAkhir($data['data-matriks']);
            } else {
                echo '<section class="w-full text-center ">
            <p class="text-2xl font-semibold">Data Not Found X</p>
        </section>';
            }
            ?>
        </article>



    </section>
</article>
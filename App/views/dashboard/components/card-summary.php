<article
    class="w-full flex gap-5 md:gap-3 mt-5 justify-around md:justify-center lg:justify-between items-center font-poppins max-lg:flex-wrap ">
    <?php if ($data['data-card-summary']) {
        foreach ($data['data-card-summary'] as  $value) {
            echo '<section
            class=" basis-full sm:basis-2/5 md:basis-2/5 lg:basis-1/4 w-full lg:w-full bg-slate-50 p-4 rounded-lg shadow-lg border">
            <header class="w-full ">
                <h1 class="max-lg:text-sm">Total</h1>
            </header>
            <article class="pt-2 lg:pt-4 lg:pb-2">
                <h2 class="font-semibold text-xl lg:text-3xl">' . $value['jumlah'] . '</h2>
            </article>
            <section class="w-full">
                <p class="text-sm">' . $value['title'] . '</p>
            </section>
        </section>';
        }
    } ?>
</article>
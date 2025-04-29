<article class="w-full flex justify-center max-lg:flex-wrap gap-5 mt-5">
    <?php foreach ($data['list-cetak-laporan'] as $laporan) : ?>

        <a href="<?= $laporan['link'] ?>">
            <button
                class="w-fit bg-slate-600 text-white hover:bg-slate-700 font-poppins font-semibold rounded p-2 flex gap-2  hover:shadow-lg "
                type="submit">
                <img src="<?= $laporan['icons'] ?>" width="20" height="20" alt="" class="text-white">
                <?= $laporan['title'] ?>
            </button>
        </a>
    <?php endforeach; ?>
</article>
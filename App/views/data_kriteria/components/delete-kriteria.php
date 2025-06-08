<article
    class="w-full h-full font-poppins modals-delete not-show justify-center items-center fixed top-0 left-0 z-10 bg-black/50 bg-modals max-md:px-5">
    <form class="  w-full  md:w-2/3 p-3 bg-white rounded-md h-auto" id="form-delete-kriteria" method="post">
        <header class="w-full px-2 flex justify-end items-center">
            <button type="button" id="close-modals" class="text-red-500 size-5 md:size-6 close-modals">
                <?php include dirname(__DIR__, 4) . '/public/icons/icons-close.svg'; ?>
            </button>
        </header>
        <section class="w-full text-center">
            <p class="text-xl">Apakah anda yakin ingin menghapus data ini</p>
        </section>
        <footer class="w-full flex justify-center mt-4 gap-5 text-sm px-4">
            <button
                type="button"
                class="close-modals bg-slate-500 text-white px-2 md:px-3 py-1 rounded-md hover:bg-slate-600 text-xs md:text-base">Close</button>
            <button type="submit"
                class="bg-red-500 text-white  px-2 md:px-3 py-1 rounded-md hover:bg-red-700 text-xs md:text-base">Delete</button>
        </footer>
    </form>
</article>
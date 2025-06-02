<article
    class="w-full h-full font-poppins justify-center flex items-center fixed top-0 left-0 z-10  bg-black/50 modals-kriteria max-md:px-5">
    <form action="" method="post"
        class="  w-full  lg:w-4/6 p-3 bg-white rounded-md h-auto">
        <header class="w-full px-2 flex justify-between items-center">
            <h1 class="text-base sm:text-lg md:text-2xl font-semibold judul-kriteria">

            </h1>
            <button id="close-modals" class="text-red-500 size-5 md:size-6">
                <?php include dirname(__DIR__, 4) . '/public/icons/icons-close.svg'; ?>
            </button>
        </header>
        <footer class="w-full flex justify-center max-md:justify-end mt-4 gap-5 text-sm px-4">
            <button
                class="showKriteria bg-slate-500 text-white px-2 md:px-3 py-1 rounded-md hover:bg-slate-600 text-xs md:text-base ">Close</button>
            <button type="submit"
                class="bg-black text-white  px-2 md:px-3 py-1 rounded-md hover:bg-black/70 text-xs md:text-base">Save</button>
        </footer>
    </form>
</article>
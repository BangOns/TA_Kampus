<article
    class="w-full h-full font-poppins justify-center  not-show items-center bg-black/50 fixed top-0 left-0 z-10  modals-kriteria max-md:px-5">
    <form id="form-kriteria" method="post"
        class="  w-full  lg:w-1/3 p-3 bg-white rounded-md h-auto">
        <header class="w-full px-2 flex justify-between items-center pb-3  ">
            <h1 class="text-base sm:text-lg md:text-2xl font-semibold judul-kriteria">
            </h1>
            <button type="button" class="close-modals text-red-500 size-5 md:size-6">
                <?php include dirname(__DIR__, 4) . '/public/icons/icons-close.svg'; ?>
            </button>
        </header>
        <article class="w-full space-y-4 px-2">
            <section>
                <label for="kriteria">Nama Kriteria</label>
                <input type="text" name="kriteria" id="kriteria"
                    class="w-full border border-slate-300 rounded-md px-2 py-1 mt-1 disabled:cursor-not-allowed focus:outline-none focus:border-slate-500"
                    placeholder="Masukkan nama kriteria" required>
            </section>
            <section>
                <label for="bobot_kriteria">Bobot Kriteria</label>
                <input type="number" name="bobot_kriteria" id="bobot_kriteria"
                    class="w-full border border-slate-300 rounded-md px-2 py-1 mt-1 disabled:cursor-not-allowed focus:outline-none focus:border-slate-500"
                    placeholder="Masukkan Bobot kriteria" required min="0" max="10">
            </section>
            <section>
                <label for="jenis_kriteria">Jenis Kriteria</label>
                <select id="jenis_kriteria" name="jenis_kriteria" class="disabled:cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Pilih Jenis Kriteria</option>
                    <option value="Benefit">Benefit</option>
                    <option value="Cost">Cost</option>
                </select>

            </section>
            <hr>
            <section>
                <label for="nama_kriteria">Nama Sub-Kriteria</label>
                <input type="text" name="sub_kriteria" id="sub_kriteria"
                    class="w-full border border-slate-300 rounded-md disabled:cursor-not-allowed px-2 py-1 mt-1 focus:outline-none focus:border-slate-500"
                    placeholder="Masukkan nama kriteria" required>
            </section>
            <section>
                <label for="">Bobot Sub-Kriteria</label>
                <input type="number" name="bobot_subkriteria" id="bobot_subkriteria"
                    class="w-full border border-slate-300 rounded-md px-2 py-1 mt-1 disabled:cursor-not-allowed focus:outline-none focus:border-slate-500"
                    placeholder="Masukkan Bobot kriteria" required min="0" max="10">
            </section>
        </article>
        <footer class="w-full flex justify-center md:justify-end mt-4 gap-5 text-sm px-4">
            <button
                type="button"
                class="close-modals bg-slate-500 text-white px-2 md:px-3 py-1 rounded-md hover:bg-slate-600 text-xs md:text-base ">Close</button>
            <button type="submit"
                class="bg-black text-white  px-2 md:px-3 py-1 rounded-md hover:bg-black/70 text-xs md:text-base">Save</button>
        </footer>
    </form>
</article>
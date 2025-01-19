<article class="w-full mt-7 font-poppins space-y-3">
    <header class="w-full flex items-center">
        <section class="w-full basis-1/2">
            <h2 class="font-semibold text-sm sm:text-base md:text-xl font-mona tracking-widest">Daftar Pelanggar</h2>
            <p class="max-md:hidden text-[10px] md:text-xs text-slate-400">berikan peringatan terhadap pelanggar</p>
        </section>
        <section class="w-full basis-1/2 flex justify-end ">
            <button
                class="py-2 px-2 lg:p-3  rounded-full transition-all items-center bg-red-500 hover:bg-red-600 text-white shadow-lg hover:shadow-xl flex text-xs md:text-sm gap-1 lg:text-base ">
                <div class="size-5">
                    <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-add.svg'; ?>
                </div>
                Tambah Pelanggar
            </button>
        </section>
    </header>
    <!-- Area Table and Search -->
    <section class="w-full">
        <!-- Filter and Search -->
        <header class="w-full flex gap-3 max-lg:justify-between">
            <section class=" lg:w-1/5 rounded-full flex bg-slate-50 px-2 md:px-3 items-center border py-1">
                <input type="text" placeholder="Cari Nama Santri"
                    class="w-full  py-1 border-none bg-transparent text-xs sm:text-sm focus:outline-none focus:ring-0">
                <div class="size-4 md:size-5 text-slate-600">
                    <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-search.svg'; ?>
                </div>
            </section>
            <section class="lg:w-1/5 rounded-full flex bg-slate-50 px-2 md:px-3 items-center border py-1">
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
        <!-- Table -->
        <section class="w-full mt-3">
            <table class="w-full table-auto rounded-t-xl overflow-hidden border border-gray-700">
                <thead class="bg-slate-500 text-white">
                    <tr>
                        <th class="font-medium text-start py-2 pl-2">Nama Santri</th>
                        <th class="font-medium text-start">Tahun Ajaran</th>
                        <th class="font-medium text-start">Kategori</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="odd:bg-slate-100 even:bg-slate-50">
                        <td class="pl-2 py-1">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                        <td>Malcolm Lockyer</td>
                        <td>1961</td>
                    </tr>
                    <tr class="odd:bg-slate-100 even:bg-slate-50">
                        <td class="pl-2 py-1">Witchy Woman</td>
                        <td>The Eagles</td>
                        <td>1972</td>
                    </tr>
                    <tr class="odd:bg-slate-100 even:bg-slate-50">
                        <td class="pl-2 py-1">Witchy Woman</td>
                        <td>The Eagles</td>
                        <td>1972</td>
                    </tr>
                    <tr class="odd:bg-slate-100 even:bg-slate-50">
                        <td class="pl-2 py-1">Witchy Woman</td>
                        <td>The Eagles</td>
                        <td>1972</td>
                    </tr>
                    <tr class="odd:bg-slate-100 even:bg-slate-50">
                        <td class="pl-2 py-1">Witchy Woman</td>
                        <td>The Eagles</td>
                        <td>1972</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>
</article>
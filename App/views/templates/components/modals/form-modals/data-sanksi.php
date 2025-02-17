<section class="w-full  mt-4 px-4 space-y-3">
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Kategori Sanksi<span class="text-red-500">*</span> </label>
        <select name="jenis_sanksi" id="jenis_sanksi" required
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none text-slate-400 selection:text-black hover:cursor-text  focus:ring-0">
            <option value="">Kategori Sanksi</option>
            <option value="Ringan">Ringan</option>
            <option value="Sedang">Sedang</option>
            <option value="Berat">Berat</option>
        </select>
    </section>

    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Min - Max Nilai Akhir<span class="text-red-500">*</span> </label>
        <select name="min-max" id="min-max" required
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none text-slate-400 selection:text-black hover:cursor-text  focus:ring-0">
            <option value="">Pilih Kategori Sanksi dahulu</option>

        </select>
    </section>
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Keterangan<span class="text-red-500">*</span> </label>
        <textarea placeholder="Keterangan..." name="deskripsi_sanksi" required minlength="1"
            class=" w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0"> </textarea>
    </section>
</section>
<script>
    const minMaxKategori = [{
            kategori: "Ringan",
            item: ["0.0 - 0.20", "0.21 - 0.40", "0.41 - 0.59"]
        },
        {
            kategori: "Sedang",
            item: ["0.60 - 0.65", "0.66 - 0.70", '0.71 - 0.75']
        },
        {
            kategori: "Berat",
            item: ["0.76 - 0.80", "0.81 - 0.85", "0.86 - 1.00"]
        }
    ];

    $('#jenis_sanksi').on("change", (e) => {

        const result = e.target.value;

        const findKategori = minMaxKategori.find((item) => item.kategori === result);
        let getData = '';
        getData += `<option value="">Pilih Nilai</option>`;
        findKategori.item.map((items) => {
            getData += `<option value="${items}">${items}</option>`;
        });
        $('#min-max').html(getData);

    });
</script>
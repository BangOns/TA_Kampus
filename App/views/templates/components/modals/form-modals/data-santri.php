<section class="w-full  mt-4 px-4 space-y-3">
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Masukkan Nama<span class="text-red-500">*</span> </label>
        <input type="text" placeholder="Nama Santri..." name="nama_santri" required
            value="<?= $data['detail-santri']['nama_santri'] ?? '' ?>"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0">
    </section>
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Kelas<span class="text-red-500">*</span> </label>
        <input type="text" placeholder="2A" name="kelas" required value="<?= $data['detail-santri']['kelas'] ?? '' ?>"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0">
    </section>

    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Alamat<span class="text-red-500">*</span> </label>
        <input type="text" placeholder="Jl.Raden..." name="alamat" required
            value="<?= $data['detail-santri']['alamat'] ?? '' ?>"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0">
    </section>
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Tahun Ajaran<span class="text-red-500">*</span> </label>
        <input type="number" min="2000" max="2100" step="1" minlength="1" maxlength="4" placeholder="2021"
            name="tahun_ajaran" required value="<?= $data['detail-santri']['tahun_ajaran'] ?? '' ?>"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0">
    </section>
</section>
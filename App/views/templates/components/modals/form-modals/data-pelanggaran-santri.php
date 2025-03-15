<section class="w-full  mt-4 px-4 space-y-3">
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Pilih Nama<span class="text-red-500">*</span> </label>
        <select name="id_santri" id="id_santri" required
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text  focus:ring-0">
            <option value="">Nama Santri</option>
            <?php foreach ($data['data-santri'] as  $ds) : ?>
                <option value="<?= $ds['id_santri'] ?>"
                    <?= ($data['detail-pelanggaran-santri'] ? ($data['detail-pelanggaran-santri']['nama-santri']  == $ds['nama_santri'] ? 'selected' : '') : '') ?>>
                    <?= $ds['nama_santri'] ?></option><?php endforeach; ?>
        </select>
    </section>
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Pelanggaran Yang Dilakukan<span class="text-red-500">*</span> </label>

        <input type="text" placeholder="merokok..." name="nama_pelanggaran" required
            value="<?= $data['detail-pelanggaran-santri']['nama-pelanggaran']  ?? '' ?>"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0">
    </section>
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Waktu yang dilakukan<span class="text-red-500">*</span> </label>
        <input type="date" placeholder="merokok..." name="waktu" required
            value="<?= $data['detail-pelanggaran-santri']['waktu']  ?? '' ?>"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0">
    </section>
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Jenis pelanggaran<span class="text-red-500">*</span> </label>
        <select name="c1" id="c1" required
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text  focus:ring-0">
            <option value="">Kategori</option>
            <?php foreach ($data['kriteria_pelanggaran']['jenis_pelanggaran'] as $key => $jp) : ?>
                <option value="<?= $key ?>"
                    <?= ($data['detail-pelanggaran-santri'] ? ($data['detail-pelanggaran-santri']['kategori-pelanggaran']  == $jp ? 'selected' : '') : '') ?>>
                    <?= $jp ?></option>
            <?php endforeach; ?>
        </select>
    </section>
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Frekuensi pelanggaran<span class="text-red-500">*</span> </label>
        <select name="c2" id="c2" required
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text  focus:ring-0">
            <option value="">Berapa kali</option>
            <?php foreach ($data['kriteria_pelanggaran']['frekuensi_pelanggaran'] as $key => $fp) : ?>
                <option value="<?= $key ?>"
                    <?= ($data['detail-pelanggaran-santri'] ? ($data['detail-pelanggaran-santri']['frekuensi']  == $fp ? 'selected' : '') : '') ?>>
                    <?= $fp ?></option>
            <?php endforeach; ?>
        </select>
    </section>
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Dampak pelanggaran<span class="text-red-500">*</span> </label>
        <select name="c3" id="c3" required
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text  focus:ring-0">
            <option value="">Dampak</option>
            <?php foreach ($data['kriteria_pelanggaran']['dampak_pelanggaran'] as $key => $dp) : ?>
                <option value="<?= $key ?>"
                    <?= ($data['detail-pelanggaran-santri'] ? ($data['detail-pelanggaran-santri']['dampak']  == $dp ? 'selected' : '') : '') ?>>
                    <?= $dp ?></option>
            <?php endforeach; ?>
        </select>
    </section>
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Keseriusan Niat<span class="text-red-500">*</span> </label>
        <select name="c4" id="c4" required
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text  focus:ring-0">
            <option value="">Keseriusan</option>
            <?php foreach ($data['kriteria_pelanggaran']['keseriusan_niat'] as $key => $kn) : ?>
                <option value="<?= $key ?>"
                    <?= ($data['detail-pelanggaran-santri'] ? ($data['detail-pelanggaran-santri']['keseriusan']  == $kn ? 'selected' : '') : '') ?>>
                    <?= $kn ?></option>
            <?php endforeach; ?>
        </select>
    </section>
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Permohonan Maaf<span class="text-red-500">*</span> </label>
        <select name="c5" id="c5" required
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text  focus:ring-0">
            <option value="">Permohonan</option>
            <?php foreach ($data['kriteria_pelanggaran']['permohonan_maaf'] as $key => $pm) : ?>
                <option value="<?= $key ?>"
                    <?= ($data['detail-pelanggaran-santri'] ? ($data['detail-pelanggaran-santri']['permohonan']  == $pm ? 'selected' : '') : '') ?>>
                    <?= $pm ?></option>
            <?php endforeach; ?>
        </select>
    </section>
</section>
<?php
$kategori = [
    "1" => "Ringan",
    "2" => "Sedang",
    "3" => "Berat",
];
?>
<section class="w-full  mt-4 px-4 space-y-3">
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Nama Pelanggaran<span class="text-red-500">*</span> </label>
        <input type="text" placeholder="merokok..." name="nama_pelanggaran"
            value="<?= $data['detail-pelanggar']['nama_pelanggaran'] ?? '' ?>"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0">
    </section>

    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Jenis pelanggaran<span class="text-red-500">*</span> </label>
        <select name="jenis_pelanggaran" id="jenis_pelanggaran"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text   focus:ring-0">
            <option value="">Jenis Pelanggaran</option>
            <?php foreach ($kategori as $key => $value) : ?>
                <option value="<?= $key ?>"
                    <?= ($data['detail-pelanggar'] ? ($data['detail-pelanggar']['bobot_pelanggaran']  == $key ? 'selected' : '') : '') ?>>
                    <?= $value ?></option>
            <?php endforeach; ?>

        </select>
    </section>

</section>
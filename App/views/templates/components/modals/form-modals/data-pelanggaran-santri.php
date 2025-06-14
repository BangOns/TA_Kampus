<?php
$data_input_kriteria = $data['data-input-kriteria'];
$data_kriteria = $data['detail-pelanggaran-santri'];
?>

<section class="w-full  mt-4 px-4 space-y-3">
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Pilih Nama<span class="text-red-500">*</span> </label>
        <select name="id_santri" id="id_santri" required
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text  focus:ring-0">
            <option value="">Nama Santri</option>
            <?php foreach ($data['data-santri'] as  $ds) : ?>
                <option value="<?= $ds['id_santri'] ?>"
                    <?= ($data_kriteria ? ($data_kriteria['nama-santri']  == $ds['nama_santri'] ? 'selected' : '') : '') ?>>
                    <?= $ds['nama_santri'] ?></option>
            <?php endforeach; ?>
        </select>
    </section>
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Pilih Pelanggaran<span class="text-red-500">*</span> </label>
        <select name="nama_pelanggaran" id="nama_pelanggaran" required
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text  focus:ring-0">
            <option value="">Pelanggaran yang Dilakukan</option>
            <?php foreach ($data['data-pelanggaran'] as  $ds) : ?>
                <?= $ds ?>
                <option value="<?= $ds['id_pelanggaran'] ?>"
                    <?= ($data_kriteria ? ($data_kriteria['nama-pelanggaran']  == $ds['nama_pelanggaran'] ? 'selected' : '') : '') ?>>

                    <?= $ds['nama_pelanggaran'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </section>
    <!-- <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Pelanggaran Yang Dilakukan<span class="text-red-500">*</span> </label>


        <input type="text" placeholder="merokok..." name="nama_pelanggaran" required
            value="<?= $data_kriteria['nama-pelanggaran']  ?? '' ?>"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0">
    </section> -->
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Waktu yang dilakukan<span class="text-red-500">*</span> </label>
        <input type="date" placeholder="merokok..." name="waktu" required
            value="<?= $data_kriteria['waktu']  ?? '' ?>"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0">
    </section>
    <?php foreach ($data_input_kriteria as $key => $item): ?>
        <section class="w-full  space-y-2">
            <label class="text-xs md:text-base "><?= $item['kriteria'] ?><span class="text-red-500">*</span> </label>
            <input type="hidden" name="id_kriteria[]" value="<?= $item['id_kriteria'] ?>">
            <select name="nilai[]" required
                class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text  focus:ring-0">
                <option value="">Kategori</option>
                <?php foreach ($item['items'] as $key => $value) : ?>

                    <?php
                    $selected = ($data_kriteria['kriteria'][$value['kriteria']] ?? '') == $value['Nama'] ? 'selected' : '';
                    ?>
                    <option value="<?= $value['id_subkriteria'] . '|' . $value['Bobot'] ?>" data-sub="<?= $value['id_subkriteria'] ?>" <?= $selected ?>>
                        <?= $value['Nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </section>
    <?php endforeach; ?>
</section>
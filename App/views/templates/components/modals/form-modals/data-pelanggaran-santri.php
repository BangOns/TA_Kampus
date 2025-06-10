<?php
$data_kriteria = $data['data-kriteria'];
$result = [];
foreach ($data_kriteria as $item) {
    $key = $item['kriteria'];
    if (!isset($result[$key])) {
        $result[$key] = [
            'kriteria' => $item['kriteria'],
            'jenis_kriteria' => $item['jenis_kriteria'],
            'id_kriteria' => $item['id_kriteria'],
            'items' => []
        ];
    }
    $result[$key]['items'][] = $item;
}
$result = array_values($result);
?>

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
        <label class="text-xs md:text-base ">Pilih Pelanggaran<span class="text-red-500">*</span> </label>
        <select name="nama_pelanggaran" id="nama_pelanggaran" required
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text  focus:ring-0">
            <option value="">Pelanggaran yang Dilakukan</option>
            <?php foreach ($data['data-pelanggaran'] as  $ds) : ?>
                <?= $ds ?>
                <option value="<?= $ds['id_pelanggaran'] ?>">
                    <?= $ds['nama_pelanggaran'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </section>
    <!-- <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Pelanggaran Yang Dilakukan<span class="text-red-500">*</span> </label>


        <input type="text" placeholder="merokok..." name="nama_pelanggaran" required
            value="<?= $data['detail-pelanggaran-santri']['nama-pelanggaran']  ?? '' ?>"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0">
    </section> -->
    <section class="w-full  space-y-2">
        <label class="text-xs md:text-base ">Waktu yang dilakukan<span class="text-red-500">*</span> </label>
        <input type="date" placeholder="merokok..." name="waktu" required
            value="<?= $data['detail-pelanggaran-santri']['waktu']  ?? '' ?>"
            class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-noneselection:text-black hover:cursor-text  focus:ring-0">
    </section>
    <?php foreach ($result as $key => $item): ?>
        <section class="w-full  space-y-2">
            <label class="text-xs md:text-base "><?= $item['kriteria'] ?><span class="text-red-500">*</span> </label>
            <input type="hidden" name="id_kriteria[]" value="<?= $item['id_kriteria'] ?>">
            <select name="nilai[]" required
                class="w-full border px-2 py-1 rounded bg-transparent text-xs sm:text-sm focus:outline-none  selection:text-black hover:cursor-text  focus:ring-0">
                <option value="">Kategori</option>
                <?php foreach ($item['items'] as $key => $value) : ?>

                    <option value="<?= $value['id_subkriteria'] . '|' . $value['Bobot'] ?>" data-sub="<?= $value['id_subkriteria'] ?>">

                        <?= $value['Nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </section>
    <?php endforeach; ?>
    <!-- <section class="w-full  space-y-2">
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
    </section> -->
    <!-- <section class="w-full  space-y-2">
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
    </section> -->
    <!-- <section class="w-full  space-y-2">
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
    </section> -->
    <!-- <section class="w-full  space-y-2">
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
    </section> -->
</section>
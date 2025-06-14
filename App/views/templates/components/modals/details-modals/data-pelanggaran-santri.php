<?php
date_default_timezone_set('Asia/Jakarta');
$originalDate = $data['detail-pelanggaran-santri']['waktu']; // Contoh tanggal
$dateTime = new DateTime($originalDate);
$formattedDate = $dateTime->format('l d F Y');
$nama_santri = $data['detail-pelanggaran-santri']['nama-santri'];
$kelas = $data['detail-pelanggaran-santri']['kelas'];
$tahun_ajaran = $data['detail-pelanggaran-santri']['tahun-ajaran'];
$alamat = $data['detail-pelanggaran-santri']['alamat'];
$nama_pelanggaran = $data['detail-pelanggaran-santri']['nama-pelanggaran'];
$waktu = $formattedDate;
$color_pelanggaran_and_sanksi = [
    "Ringan" => 'text-yellow-500',
    "Sedang" => 'text-orange-400',
    "Berat" => 'text-red-500',
];
?>

<article class="w-full mt-4 px-6 space-y-2">
    <header class="w-full">
        <h2 class="text-base md:text-xl font-semibold"><?= $nama_santri ?></h2>
        <section class="w-full flex gap-2">
            <p class="text-xs md:text-sm text-slate-600">Kelas <?= $kelas ?> | Tahun Ajaran <?= $tahun_ajaran ?> </p>
        </section>
    </header>
    <article class="w-full px-3">
        <table class="table-collapse w-full">
            <tbody class="divide-y divide-gray-200 text-xs md:text-base">

                <tr>
                    <td class="py-4 pr-4 text-slate-600">Alamat</td>
                    <td><?= $alamat ?></td>
                </tr>
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Pelanggaran yang dilakukan</td>
                    <td class=" text-red-500 font-semibold"><?= $nama_pelanggaran ?></td>
                </tr>
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Waktu Melakukan</td>
                    <td class=" font-semibold"><?= $waktu ?></td>
                </tr>
                <?php foreach ($data['detail-pelanggaran-santri']['kriteria'] as $kriteria => $sub_kriteria) : ?>
                    <td class="py-4 pr-4 text-slate-600"><?= $kriteria ?></td>
                    <td class=" font-semibold "><?= $sub_kriteria ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php foreach ($data['detail-pelanggaran-santri']['sanksi'] as $sanksi => $value) : ?>
                    <td class="py-4 pr-4 text-slate-600"><?= $sanksi ?></td>
                    <td class=" font-semibold "><?= $value ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </article>

</article>
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
$kategori = $data['detail-pelanggaran-santri']['kategori'];
$frekuensi = $data['detail-pelanggaran-santri']['frekuensi'];
$dampak = $data['detail-pelanggaran-santri']['dampak'];
$keseriusan = $data['detail-pelanggaran-santri']['keseriusan'];
$permohonan = $data['detail-pelanggaran-santri']['permohonan'];
$sanksi = $data['detail-pelanggaran-santri']['sanksi'];

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
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Kategori</td>
                    <td class=" font-semibold"><?= $kategori ?></td>
                </tr>
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Frekuensi Pelanggaran</td>
                    <td class=" font-semibold"><?= $frekuensi ?></td>
                </tr>
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Dampak pelanggaran</td>
                    <td class=" font-semibold"><?= $dampak ?></td>
                </tr>
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Keseriusan Niat</td>
                    <td class=" font-semibold"><?= $keseriusan ?></td>
                </tr>
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Permohonan Maaf</td>
                    <td class=" font-semibold"><?= $permohonan ?></td>
                </tr>
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Sanksi</td>
                    <td class="text-red-500 font-semibold"><?= $sanksi ?></td>
                </tr>
            </tbody>
        </table>

    </article>
    <!-- <article class="w-full">
        <header class=" text-base md:text-xl font-semibold">
            <h2>Pelanggaran yang dilakukan :</h2>
        </header>
        <ul class=" text-xs md:text-base list-disc pl-5 space-y-3 mt-2">
            <li>Terlambat</li>
            <li>Merokok</li>
            <li>Memakai seragam tidak rapi</li>
        </ul>

    </article> -->
</article>
<header style="width: 100%; align-items: center; ">
    <section class="w-[10%] float-left" style="width: 10%; float: left;">
        <img src="http://localhost/takampus/public/img/icons-logo.png" width="50" height="50" alt="banner-auth">
    </section>
    <section class="w-[90%] float-right text-center">
        <h1 class="text-2xl uppercase font-bold ">
            Pondok Pesantren Asshaburratib
        </h1>
        <p class="pt-2 text-sm">
            Jl. Mangga Rt 06 Rw 05 Kel. Beji Kec. Beji Kota Depok. Kabupaten Beji Depok, Provinsi: JAWA BARAT <br>
            No. Telp: +628979415635 | Email : info@ashhaburratib.com
        </p>
    </section>
</header>
<hr class="mt-5">
<section class="w-full mt-5 text-center">
    <header class="w-full">

        <h1 style="font-weight: 800;">
            <?= ucwords(preg_replace("/[-_]/", " ", $data["title"]));  ?></h1>
    </header>
    <article class="mt-4">
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggaran</th>
                    <th>Nama Santri</th>
                    <th>Nilai Akhir</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['data-pelanggaran-santri'] as $index => $item) : ?>
                <?php
                    // Cari santri berdasarkan id_santri
                    $santri = array_filter($data['data-santri'], function ($s) use ($item) {
                        return $s['id_santri'] == $item['id_santri'];
                    });

                    // Ambil nama santri (jika ditemukan)
                    $namaSantri = !empty($santri) ? reset($santri)['nama_santri'] : "Tidak Diketahui";
                    ?>
                <tr>
                    <td><?= $index += 1 ?></td>
                    <td><?= ucfirst($item['nama_pelanggaran']); ?></td>
                    <td><?= $namaSantri ?></td>
                    <td><?= number_format($item['nilai_akhir'], 2); ?></td>
                    <td><?= $item['c1']; ?></td>
                    <td><?= $item['c2']; ?></td>
                    <td><?= $item['c3']; ?></td>
                    <td><?= $item['c4']; ?></td>
                    <td><?= $item['c5']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </article>
</section>
<?php
$sanksi = $data['data-sanksi'];

usort($sanksi, function ($a, $b) {
    return strcmp($a['min_skor'], $b['min_skor']);
});


?>
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
                    <th>Jenis Sanksi</th>
                    <th>Deskripsi</th>
                    <th>Min Skor</th>
                    <th>Max Skor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sanksi as $index => $item) : ?>
                    <tr>
                        <td><?= $index += 1 ?></td>
                        <td><?= $item['jenis_sanksi']; ?></td>
                        <td><?= $item['deskripsi_sanksi']; ?></td>
                        <td><?= $item['min_skor']; ?></td>
                        <td><?= $item['max_skor']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </article>
</section>

<footer
    class="w-full mt-10 float-right">
    <section class="w-[90%] float-right " style="text-align: right;">
        <p><?= $data['formatDate'] ?></p>
        <p>Pengurus Pondok</p>
    </section>
    <section class="w-[90%] float-right" style="text-align: right; margin-top: 13%;">
        <p><?= $data['pengurus_pondok']['nama_pengurus'] ?></p>
        <p>NIDN: <?= $data['pengurus_pondok']['NIDN'] ?></p>
    </section>

</footer>
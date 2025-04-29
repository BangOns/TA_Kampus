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
    <?php foreach ($data['kriteria_pelanggaran'] as $key => $value) : ?>
        <article class="mt-4">
            <h1
                class=" text-start  text-lg font-semibold">
                <?= ucwords(preg_replace("/[-_]/", " ", $value["nama"]));  ?>
            </h1>
            <table border="1" width="100%" cellspacing="0" cellpadding="5" class="mt-2">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($value['items'] as $index => $item) : ?>
                        <tr>
                            <td><?= $index += 1 ?></td>
                            <td><?= $item['Nama']; ?></td>
                            <td><?= $item['Bobot']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>

        </article>
</section>
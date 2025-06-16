<?php
$datas = $data['data-pelanggaran-santri'];
$data_list = $data['list-table2'];
$imagePath = realpath(dirname(__DIR__, 3)) . '/public/img/icons-logo.png';
var_dump(file_exists($imagePath)); // Should return true
?>

<header style="width: 100%; align-items: center; ">
    <section class="w-[10%] float-left" style="width: 10%; float: left;">
        <img src="'img/icons-logo.png' ?>" width="50" height="50" alt="banner-auth">
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
        <!-- Table -->
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <?php foreach ($data['list-table2'] as $list): ?>

                        <th><?= $list ?></th>
                    <?php endforeach; ?>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($datas as $index => $row) : ?>
                    <tr style="background-color: #fff;">
                        <?php foreach ($data_list as $indexColumn => $column) : ?>
                            <?php
                            $value = isset($row[$column]) ? $row[$column] : 'tidak ada';

                            ?>
                            <td><?= htmlspecialchars($value) ?></td>
                        <?php endforeach; ?>
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
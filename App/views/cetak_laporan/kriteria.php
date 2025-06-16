<?php

$data_table_kriteria = $data['kriteria'];
$path = dirname(__DIR__, 3) . '/public/icons/icons-ash.svg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$img_logo = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($img_logo);
?>
<header style="width: 100%; align-items: center; ">
    <section class="w-[10%] float-left" style="width: 10%; float: left;">
        <img src="<?= $base64 ?>" width="90" height="90" alt="banner-auth">

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
<hr class="mt-5 mb-1">
<section class="w-full mt-1 text-center">
    <header class="w-full">
        <h1 style="font-weight: 800;">
            <?= ucwords(preg_replace("/[-_]/", " ", $data["title"]));  ?></h1>
    </header>
    <?php foreach ($data_table_kriteria as $key => $value): ?>
        <section class="w-full  my-4 max-md:gap-2">
            <h1 class=" text-left font-semibold">
                <?= ucwords(preg_replace("/[-_]/", " ", $value["kriteria"])) ?> - (<?= ucwords(preg_replace("/[-_]/", " ", $value["jenis_kriteria"])) ?>)
            </h1>
        </section>


        <?php if ($value['items'][0]['id_subkriteria'] === null): ?>
            <section class="w-full  text-center ">
                <p class="text-2xl font-semibold">Data Not Found X</p>
            </section>
        <?php else: ?>
            <table border="1" width="100%" cellspacing="0" cellpadding="5">
                <thead class="text-black ">
                    <tr>
                        <?php foreach ($data['list-table'] as $columnIndex => $value_column): ?>
                            <th class="text-start <?= $columnIndex == 0 ? 'pl-2 py-2' : '' ?> font-semibold">
                                <?= $value_column ?>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($value['items'] as $index => $row): ?>
                        <tr style="background-color: #fff;">
                            <?php foreach ($data['list-table'] as $indexColumn => $column): ?>
                                <td class="<?= $indexColumn == 0 ? 'pl-2 py-3' : '' ?>">
                                    <?= $row[$column] ?>
                                </td>
                            <?php endforeach; ?>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endforeach; ?>


    </article>
</section>
<footer
    class="w-full mt-5 float-right">
    <section class="w-[90%] float-right " style="text-align: right;">
        <p><?= $data['formatDate'] ?></p>
        <p>Pengurus Pondok</p>
    </section>
    <section class="w-[90%] float-right" style="text-align: right; margin-top: 7%;">
        <p><?= $data['pengurus_pondok']['nama_pengurus'] ?></p>
        <p>NIDN: <?= $data['pengurus_pondok']['NIDN'] ?></p>
    </section>

</footer>
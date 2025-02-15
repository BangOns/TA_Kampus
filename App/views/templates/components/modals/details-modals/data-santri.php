<article class="w-full mt-4 px-6 space-y-2">
    <header class="w-full">
        <h2 class="text-base md:text-xl font-semibold"><?= $data['detail-santri']['nama_santri'] ?></h2>
        <section class="w-full flex gap-2">
            <p class="text-xs md:text-sm text-slate-600">Kelas <?= $data['detail-santri']['kelas'] ?> | Tahun Ajaran
                <?= $data['detail-santri']['tahun_ajaran'] ?> </p>
        </section>
    </header>
    <article class="w-full px-3">
        <table class="table-collapse ">
            <tbody class="divide-y divide-gray-200 text-xs md:text-base">

                <tr>
                    <td class="py-4 pr-4 text-slate-600">Alamat</td>
                    <td><?= $data['detail-santri']['alamat'] ?></td>
                </tr>

            </tbody>
        </table>

    </article>

</article>
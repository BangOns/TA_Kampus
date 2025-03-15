<article class="w-full mt-4 px-6 space-y-2">
    <article class="w-full px-3">
        <table class="table-collapse ">
            <tbody class="divide-y divide-gray-200 text-xs md:text-base">

                <tr>
                    <td class="py-4 pr-4 text-slate-600">Kategori</td>
                    <td> <?= $data['detail-sanksi']['jenis_sanksi'] ?></td>
                </tr>
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Nilai Akhir</td>
                    <td><?= $data['detail-sanksi']['min_skor'] ?> - <?= $data['detail-sanksi']['max_skor'] ?></td>
                </tr>
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Keterangan</td>
                    <td><?= $data['detail-sanksi']['deskripsi_sanksi'] ?></td>
                </tr>

            </tbody>
        </table>

    </article>

</article>
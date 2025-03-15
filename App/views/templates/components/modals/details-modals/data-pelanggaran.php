<article class="w-full mt-4 px-6 space-y-2">
    <article class="w-full px-3">
        <table class="table-collapse ">
            <tbody class="divide-y divide-gray-200 text-xs md:text-base">
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Nama Pelanggaran</td>
                    <td><?= $data['detail-pelanggar']['nama_pelanggaran'] ?></td>
                </tr>
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Jenis Pelanggaran</td>
                    <td><?= $data['detail-pelanggar']['jenis_pelanggaran'] ?></td>
                </tr>
                <tr>
                    <td class="py-4 pr-4 text-slate-600">Bobot</td>
                    <td class="text-red-500 font-semibold"><?= $data['detail-pelanggar']['bobot_pelanggaran'] ?></td>
                </tr>

            </tbody>
        </table>

    </article>

</article>
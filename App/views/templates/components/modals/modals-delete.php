<?php
$isModal = $data['type'];
$action = $data['action'];
$id = $data['id'];
$filepath = __DIR__ . '/modals-delete.php';
if (!file_exists($filepath)) {
    $isModal = "Data Not Found";
}
?>
<article
    class="w-full h-full <?= $data['type'] === "delete" ? 'flex' : 'hidden' ?> font-poppins justify-center items-center fixed top-0 left-0 z-10 bg-black/50 bg-modals max-md:px-5">
    <section class="  w-full  md:w-2/3 p-3 bg-white rounded-md h-auto">
        <header class="w-full px-2 flex justify-end items-center">
            <a href="<?= BASEURL; ?>/<?= $data['title'] ?>" id="close-modals" class="text-red-500 size-5 md:size-6">
                <?php include dirname(__DIR__, 5) . '/public/icons/icons-close.svg'; ?>
            </a>
        </header>
        <section class="w-full text-center">
            <p class="text-xl">Apakah anda yakin ingin menghapus data ini</p>
        </section>
        <footer class="w-full flex justify-center mt-4 gap-5 text-sm px-4">
            <a href="<?= BASEURL; ?>/<?= $data['title'] ?>"
                class="bg-slate-500 text-white px-2 md:px-3 py-1 rounded-md hover:bg-slate-600 text-xs md:text-base">Close</a>
            <a href="<?= BASEURL; ?>/<?= $data['title'] ?>/deleteData/<?= $id ?>"
                class="bg-red-500 text-white  px-2 md:px-3 py-1 rounded-md hover:bg-red-700 text-xs md:text-base">Delete</a>
        </footer>
    </section>
</article>
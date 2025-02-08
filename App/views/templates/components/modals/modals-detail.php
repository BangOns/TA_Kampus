<?php
$isModal = $data['type'];
$action = $data['action'];
$id = $data['id'];
$filepath = __DIR__ . '/details-modals/' .  $data['action'] . '.php';
if (!file_exists($filepath)) {
    $isModal = "Data Not Found";
}
?>
<article
    class="w-full h-full <?= $isModal === "detail" ? 'flex' : 'hidden' ?> font-poppins justify-center items-center fixed top-0 left-0 z-10 bg-black/50 bg-modals max-md:px-5">
    <section class="  w-full  md:w-2/3 p-3 bg-white rounded-md h-auto">
        <header class="w-full px-2 flex justify-between items-center">
            <h1 class="text-base sm:text-lg md:text-2xl font-semibold judulModal">
                <?= ucwords(preg_replace("/-/", " ", $isModal)) ?>
            </h1>
            <a href="<?= BASEURL; ?>/dashboard" id="close-modals" class="text-red-500 size-5 md:size-6">
                <?php include dirname(__DIR__, 5) . '/public/icons/icons-close.svg'; ?>
            </a>
        </header>
        <?php file_exists($filepath) ? include $filepath : ''; ?>
        <footer class="w-full flex justify-end mt-4 gap-5 text-sm px-4">
            <a href="<?= BASEURL; ?>/<?= $data['title'] ?>"
                class="bg-slate-500 text-white px-2 md:px-3 py-1 rounded-md hover:bg-slate-600 text-xs md:text-base">Close</a>
            <a href="<?= BASEURL; ?>/<?= $data['title'] ?>/edit/<?= $data['action'] ?>/<?= $id ?>"
                class="bg-black text-white  px-2 md:px-3 py-1 rounded-md hover:bg-black/70 text-xs md:text-base">Edit</a>
        </footer>
    </section>
</article>
<?php
$filepath = __DIR__ . '/form-modals/'  . $data['action'] . '.php';
if (!file_exists($filepath)) {
    $isModal = "Data Not Found";
}
$getTextData = isset($data['action']) ? explode("-", $data['action']) : null;
$urlPost = [
    'add' => BASEURL . "/" . $data['title'] . "/" . $data['type'] . ucwords($getTextData[0]) . "/",
    'edit' => BASEURL .  "/" . $data['title'] . "/" . $data['type'] . ucwords($getTextData[0]) . "/"  . $id
]

?>
<article
    class="w-full h-full <?= $data['type'] === "edit" || $data['type'] === "add" ? 'flex' : 'hidden' ?> font-poppins justify-center items-center fixed top-0 left-0 z-10 bg-black/50 bg-modals max-md:px-5">
    <form action="<?= $urlPost[$data['type']] ?>" method="post"
        class="  w-full  md:w-fit p-3 bg-white rounded-md h-auto">
        <header class="w-full px-2 flex justify-between items-center">
            <h1 class="text-base sm:text-lg md:text-2xl font-semibold judulModal">
                <?= ucwords(preg_replace("/-/", " ", $data['type'])) ?>
            </h1>
            <a href="<?= BASEURL; ?>/<?= $data['title'] ?>" id="close-modals" class="text-red-500 size-5 md:size-6">
                <?php include dirname(__DIR__, 5) . '/public/icons/icons-close.svg'; ?>
            </a>
        </header>
        <?php file_exists($filepath) ? include $filepath : ''; ?>
        <footer class="w-full flex justify-end mt-4 gap-5 text-sm px-4">
            <a href="<?= BASEURL; ?>/<?= $data['title'] ?>"
                class="bg-slate-500 text-white px-2 md:px-3 py-1 rounded-md hover:bg-slate-600 text-xs md:text-base">Close</a>
            <button type="submit"
                class="bg-black text-white  px-2 md:px-3 py-1 rounded-md hover:bg-black/70 text-xs md:text-base">Save</button>
        </footer>
    </form>
</article>
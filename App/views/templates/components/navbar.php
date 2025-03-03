<?php
$title = ucwords(preg_replace("/[-_]/", " ", $data["title"]));

$users = explode(',', $_SESSION['user']);
$list_navbar = [
    [
        'title' => 'Dashboard',
        'icon' => 'icons-dashboard.svg',
        'link' => BASEURL . '/dashboard'
    ],
    [
        'title' => 'Data Santri',
        'icon' => 'icons-santri.svg',
        'link' => BASEURL . '/data_santri'
    ],
    [
        'title' => 'Data Pelanggaran',
        'icon' => 'icons-pelanggaran.svg',
        'link' => BASEURL . '/data_pelanggaran'
    ],
    [
        'title' => 'Data Sanksi',
        'icon' => 'icons-sanksi.svg',
        'link' => BASEURL . '/data_sanksi'
    ],
    [
        'title' => 'Data Kriteria',
        'icon' => 'icons-kriteria.svg',
        'link' => BASEURL . '/data_kriteria'
    ],
    [
        'title' => 'Proses Normalisasi',
        'icon' => 'icons-normalisasi.svg',
        'link' => BASEURL . '/proses_normalisasi'
    ],
];

$list_settings_navbar = [
    [
        'title' => 'Account Settings',
        'icon' => 'icons-settings.svg',
        'link' => BASEURL . '/account_settings'
    ],
    [
        'title' => 'Logout',
        'icon' => 'icons-logout.svg',
        'link' => BASEURL . '/logout'
    ],

];
?>
<?php include __DIR__ . '/navbar-top.php'; ?>
<header
    class=" top-0 max-md:w-full transition-all max-md:pr-2 max-md:-translate-x-full  lg:w-64   fixed h-screen  font-poppins pl-3 pt-6 pb-3 md:mt-10 flex flex-col gap-3 container-navbar md:bg-white bg-slate-300">
    <section class="w-full flex md:hidden items-center ">
        <a href="<?= BASEURL ?>/dashboard" class="w-full flex gap-2 items-center">
            <img src="<?= BASEURL; ?>/icons/icons-logo.svg" width="30" height="30" alt="">
            <figcaption class="text-sm font-semibold">Logo Test</figcaption>
        </a>
        <button onclick="handleMenuCloseNavbar()"
            class="block md:hidden w-fit bg-slate-50 h-fit p-1  rounded-full hover:shadow-lg ">
            <div class="size-4 ">
                <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-close.svg'; ?>
            </div>
        </button>
    </section>
    <section class="w-full  block">
        <figure class="w-full   flex gap-2 ">
            <img src="<?= BASEURL  ?>/img/image-profile.png" alt="profile" width="30" height="30"
                class="object-cover size-9 md:size-10">
            <figcaption class="font-poppins ">
                <h2 class="text-sm font-semibold"><?= $users[1] ?> </h2>
                <p class="text-xs font-light text-slate-400">admin</p>
            </figcaption>
        </figure>
    </section>
    <nav class=" w-full basis-5/6 flex flex-col gap-2">
        <ul class=" flex flex-col gap-3  md:pl-2 md:pr-6 ">
            <?php foreach ($list_navbar as $list) : ?>
                <li class=" w-full h-fit  ">
                    <a href="<?= $list['link'] ?>"
                        class=" group text-xs sm:text-sm text-black hover:bg-slate-200 transition-all  h-full rounded p-2  items-center flex gap-2 font-semibold <?= str_contains($list['title'], $title) ? ' bg-slate-200' : " bg-transparent" ?> ">
                        <div class="size-5 group-hover:font-bold">
                            <?php include dirname(__DIR__, 4)  . '/public/icons/' . $list['icon']; ?>
                        </div>
                        <?= $list['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <section class=" flex flex-col w-full gap-2 md:pl-2 ">
            <?php foreach ($list_settings_navbar as $list) : ?>

                <a href="<?= $list['link'] ?>/<?= $users[0] ?>" class="flex  gap-2 items-center  text-black text-xs sm:text-sm py-2 px-2 rounded font-semibold
            hover:text-white 
            transition-all  
             <?= str_contains($list['title'], $data['title']) ? ($list['title'] === 'Logout' ? "bg-red-600 text-white" : "bg-sky-600 text-white") : "text-black bg-transparent" ?> 
            <?= $list['title'] === 'Logout' ? "hover:bg-red-600" : "hover:bg-sky-600" ?> "
                    onclick=" <?= $list['title'] === 'Logout' ? ' confirm(\'Are you sure want to logout?\')' : '' ?>">
                    <div class="size-5 group-hover:font-bold">
                        <?php include dirname(__DIR__, 4)  . '/public/icons/' . $list['icon']; ?>
                    </div>
                    <?= $list['title'] ?>
                </a>
            <?php endforeach; ?>


        </section>
    </nav>
</header>

<script>
    const ContainerNavbar = document.querySelector('.container-navbar');

    function handleMenuCloseNavbar() {
        ContainerNavbar.classList.add('max-md:-translate-x-full');
    }

    function handleMenuOpenNavbar() {
        ContainerNavbar.classList.remove('max-md:-translate-x-full');
    }
</script>
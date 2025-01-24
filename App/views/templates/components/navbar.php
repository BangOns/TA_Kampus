<?php
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
<header
    class=" max-md:w-full transition-all max-md:pr-2 max-md:-translate-x-full  lg:w-64 bg-slate-300  fixed h-screen  font-poppins pl-3 pt-6 pb-3 flex flex-col justify-between container-navbar ">
    <section class="w-full flex items-center md:pl-2">
        <a href="<?= BASEURL ?>/dashboard" class="w-full flex gap-2 items-center">
            <img src="<?= BASEURL; ?>/icons/icons-logo.svg" width="40" height="40  alt="">
            <figcaption class=" font-semibold">Logo Test</figcaption>
        </a>
        <button onclick="handleMenuCloseNavbar()"
            class="block md:hidden w-fit bg-slate-50 h-fit p-1  rounded-full hover:shadow-lg ">
            <div class="w-5 h-5 ">

                <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-close.svg'; ?>
            </div>
        </button>
    </section>
    <section class="w-full md:hidden block">
        <figure class="w-full   flex gap-2 ">
            <img src="<?= BASEURL  ?>/img/image-profile.png" alt="profile" width="40" height="40"
                class="object-cover size-10">
            <figcaption class="font-poppins ">
                <h2 class="text-sm">Syahroni </h2>
                <p class="text-xs font-light text-slate-400">admin</p>
            </figcaption>
        </figure>
    </section>
    <nav class=" w-full basis-5/6 flex flex-col justify-between">
        <ul class=" flex flex-col gap-4 basis-4/5  md:pl-2 md:pr-6 ">
            <?php foreach ($list_navbar as $list) : ?>
                <li class=" w-fit md:w-full h-fit  ">
                    <a href="<?= $list['link'] ?>"
                        class="hover:text-white max-lg:text-sm text-black hover:bg-slate-600 transition-all  h-full rounded-full p-3 items-center flex gap-3  <?= str_contains($list['title'], $data['title']) ? 'text-white bg-black' : "text-black bg-transparent" ?> ">
                        <?php include dirname(__DIR__, 4)  . '/public/icons/' . $list['icon']; ?>
                        <?= $list['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <section class="flex flex-col w-full basis-2/12 gap-3 px-2">
            <?php foreach ($list_settings_navbar as $list) : ?>

                <a href="<?= $list['link'] ?>/2" class="flex  gap-3 items-center  text-black text-sm py-2 px-2 rounded-lg  
            hover:text-white 
            transition-all  
             <?= str_contains($list['title'], $data['title']) ? ($list['title'] === 'Logout' ? "bg-red-600 text-white" : "bg-sky-600 text-white") : "text-black bg-transparent" ?> 
            <?= $list['title'] === 'Logout' ? "hover:bg-red-600" : "hover:bg-sky-600" ?> "
                    onclick=" <?= $list['title'] === 'Logout' ? ' confirm(\'Are you sure want to logout?\')' : '' ?>">
                    <?php include dirname(__DIR__, 4)  . '/public/icons/' . $list['icon']; ?>
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
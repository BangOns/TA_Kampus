<header class="w-full flex justify-between items-center  ">
    <section class="basis-1/3">
        <h1 class="text-3xl font-semibold font-poppins"><?= $data['title']; ?></h1>
    </section>
    <section class="basis-1/2 w-full hidden md:flex justify-end">
        <figure class="w-fit pl-4 pr-6 p-2  flex gap-2 rounded-full bg-slate-50 shadow-lg ">
            <img src="<?= BASEURL  ?>/img/image-profile.png" alt="profile" width="40" height="40"
                class="object-cover size-10">
            <figcaption class="font-poppins ">
                <h2 class="text-sm">Syahroni </h2>
                <p class="text-xs font-light text-slate-400">admin</p>
            </figcaption>
        </figure>
    </section>
    <section class="block md:hidden">
        <button class="w-fit bg-slate-50 p-2 rounded-full hover:shadow-lg " onclick="handleMenuOpenNavbar()">
            <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-menu-navbar.svg'; ?>
        </button>
    </section>
</header>
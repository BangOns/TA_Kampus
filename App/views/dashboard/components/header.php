<header class="w-full flex justify-between items-center   ">
    <section class="w-full ">
        <h1 class="text-xl md:text-3xl font-semibold font-poppins"><?= $data['title']; ?></h1>
    </section>
    <section class="block md:hidden">
        <button class="w-fit bg-slate-50 p-2 rounded-full hover:shadow-lg " onclick="handleMenuOpenNavbar()">
            <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-menu-navbar.svg'; ?>
        </button>
    </section>
</header>
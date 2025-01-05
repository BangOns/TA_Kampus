<header
    class=" transition-all max-md:-translate-x-full lg:w-64 bg-slate-300  fixed h-screen  font-poppins pl-5 lg:pl-8 pt-6 pb-3 flex flex-col justify-between">
    <figure class="w-full flex gap-2 items-center">
        <img src="<?= BASEURL; ?>/icons/icons-logo.svg" width="40" height="40  alt="">
        <figcaption class=" font-semibold">Logo Test</figcaption>
    </figure>

    <nav class=" w-full basis-5/6 flex flex-col justify-between">
        <ul class=" flex flex-col gap-3 basis-4/5">
            <?php foreach ($data['list-dashboard'] as $list) : ?>
            <li class="basis-[11%] w-full h-full">
                <a href="<?= $list['link'] ?>"
                    class="hover:text-white max-lg:text-sm text-black hover:bg-black transition-all  h-full rounded-full px-3 items-center flex gap-3 <?= str_contains($list['title'], $data['title']) ? 'text-white bg-black' : "text-black bg-transparent" ?> ">
                    <?php include dirname(__DIR__, 4)  . '/public/icons/' . $list['icon']; ?>
                    <?= $list['title'] ?></a>
            </li>
            <?php endforeach; ?>
        </ul>

        <section class=" w-full space-y-4">
            <section class="w-full flex gap-2 items-center">
                <figure class="rounded-full bg-slate-400 w-14 h-14 overflow-hidden">
                    <img src="<?= BASEURL; ?>/img/image-profile.png" alt="image-profile" width="40" height="40"
                        class="size-14 mt-1">
                </figure>
                <article>
                    <h2 class="text-sm font-semibold ">Youre name</h2>
                    <p class="text-xs font-light text-slate-600  ">Admin</p>
                </article>
            </section>
            <section class="flex w-full gap-8 ">
                <a href="#"
                    class="flex justify-center items-center bg-red-500 text-white text-sm py-2 px-2 rounded-lg hover:bg-red-800 transition-all"
                    onclick="confirm('Are you sure want to logout?')">Logout</a>
                <a href="#"
                    class="flex justify-center items-center bg-sky-500 hover:bg-sky-800 transition-all text-white text-sm py-2 px-2 rounded-lg">Profile</a>
            </section>
        </section>
    </nav>
</header>
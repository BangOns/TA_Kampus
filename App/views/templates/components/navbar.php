<?php
?>
<header class="w-1/5 fixed h-screen  font-poppins pl-12 pt-6 flex flex-col justify-between">
    <figure class="w-full ">
        <img src="<?= BASEURL; ?>/icons/icons-logo.svg" width="40" height="40  alt="">
    </figure>
    
    <nav class=" w-full basis-5/6 flex flex-col justify-between">
        <ul class=" flex flex-col gap-10 basis-4/5">
            <?php foreach ($data['list-dashboard'] as $list) : ?>

            <li class="basis-[11%] w-full h-full">
                <a href="<?= $list['link'] ?>"
                    class="hover:text-white  text-black hover:bg-black transition-all  h-full rounded-full px-3 items-center flex gap-3 ">
                    <?php include dirname(__DIR__, 4)  . '/public/icons/' . $list['icon']; ?>
                    <?= $list['title'] ?></a>
            </li>
            <?php endforeach; ?>




        </ul>

        <section class=" w-full justify-self-end">

            <button class=" bg-slate-600 text-white py-2 px-4 rounded-lg">Logout</button>
        </section>
        </nav>
</header>
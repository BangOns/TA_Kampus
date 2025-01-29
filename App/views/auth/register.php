<main class=" w-svw h-svh max-[380px]:h-auto">
    <section class="w-full h-full max-sm:p-0 max-lg:px-5 flex justify-center items-center   ">
        <article class="w-full h-full lg:w-3/4   sm:h-[90%]  bg-white rounded-md shadow-xl flex flex-row-reverse">
            <!-- Form -->
            <?php require  __DIR__ . '/components/form_register.php'; ?>
            <!-- Content -->
            <section class="basis-1/2 w-full h-full max-md:hidden">
                <img src="<?= BASEURL; ?>/img/banner-login.png" class="object-cover w-full h-full rounded-l-md"
                    alt="banner-auth">
            </section>
        </article>
    </section>

</main>
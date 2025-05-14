<section class="basis-full md:basis-1/2 w-full max-sm:h-full flex flex-col   items-center px-5 md:pl-8 pt-8  gap-6">
    <header class="w-full max-md:flex justify-center">
        <img src="<?= BASEURL; ?>/img/icons-logo.png" alt="">
    </header>
    <section class="w-full space-y-2 max-md:text-center">
        <h1 class="text-sm md:text-2xl font-poppins_bold text-slate-700 ">Welcome Back !
        </h1>
        <p class="text-xs text-slate-400 font-poppins"> Harap isi data dengan benar</p>
    </section>
    <form action="<?= BASEURL ?>/auth/login" method="post" class="w-full h-auto sm:h-full    space-y-3 font-poppins">
        <!-- Id Admin -->
        <section class="flex flex-col gap-1 w-full ">
            <label for="id_admin" class="  text-slate-700 max-sm:text-sm ">ID Admin</label>
            <input type="text" required name="id_admin" id="id_admin" placeholder="your'e id"
                class=" max-sm:w-full w-11/12 md:w-4/5 border px-3 py-1 rounded  border-slate-500 max-sm:text-sm ">
        </section>
        <!-- Password -->
        <section class="flex flex-col gap-1 w-full">
            <label for="password" class=" text-slate-700 max-sm:text-sm ">Password</label>
            <div class="flex  gap-2 w-full">
                <input type="password" required id="password" name="password" placeholder="****"
                    class=" w-11/12 md:w-4/5 border px-3 py-1 rounded  border-slate-500 pw max-sm:text-sm ">
                <button type="button" class=" border-slate-700 border  px-2 rounded viewPass ">
                    <img src="<?= BASEURL; ?>/icons/icons-view.png" width="20" height="20" alt="">
                </button>
            </div>
        </section>
        <!-- Action Login -->
        <!-- <section class="max-sm:w-full w-11/12 md:w-4/5  flex justify-between  items-center">
            <section class="flex items-center gap-1">
                <input type="checkbox" name="remember" id="remember">
                <label class="text-xs sm:text-sm  ">remember me </label>
            </section>
            <section class="">
                <a href="#" class="text-xs sm:text-sm underline text-sky-300">Lupa password?</a>
            </section>
        </section> -->
        <!-- Button Login Account -->
        <section class="flex flex-col justify-center max-sm:w-full w-11/12 md:w-4/5  gap-2">
            <button type="submit" class="py-1 rounded  bg-slate-400 w-full">Login</button>
            <section class="w-full flex justify-center items-center gap-2">
                <div class="w-full h-[1px] bg-slate-300"></div>
                <p class="text-sm">OR</p>
                <div class="w-full h-[1px] bg-slate-300"></div>

            </section>
            <p class="text-sm text-slate-400 text-center">
                Belum Punya akun ?
                <a href="<?= BASEURL ?>/auth/register" class="text-sm text-sky-400 underline">Register</a>
            </p>

        </section>
    </form>
</section>
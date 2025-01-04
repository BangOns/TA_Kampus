<section class="basis-full md:basis-1/2 w-full max-sm:h-full flex flex-col   items-center px-5 md:pl-8 pt-8  gap-1">
    <header class="w-full space-y-1 max-md:text-center">
        <h1 class="text-sm md:text-2xl font-poppins_bold text-slate-700 ">Welcome !
        </h1>
        <p class="text-xs text-slate-400 font-poppins"> Harap isi data dengan benar</p>
    </header>
    <form action="" method="post" class="w-full h-auto sm:h-full space-y-5 sm:space-y-3 font-poppins">
        <!-- Id and Name -->
        <div class="w-full flex gap-4 max-sm:flex-col ">
            <!-- Id Admin -->
            <section class="flex flex-col gap-1 w-full ">
                <label for="id_admin" class=" text-slate-700 max-sm:text-sm ">ID Admin</label>
                <div class="flex gap-2 w-full">
                    <input type="text" name="id_admin" id="id_admin" required placeholder="your'e id"
                        class=" w-11/12  border px-3 py-1 rounded  border-slate-500 max-sm:text-sm ">
                    <button type="button" class=" border-slate-700 border  px-2 rounded randomId">
                        <img src="<?= BASEURL; ?>/icons/view.png" width="20" height="20" alt="">
                    </button>
                </div>
                <p class="text-xs md:text-[8px] lg:text-xs text-slate-500"><span class="text-red-500">*</span>Mengandung
                    3 huruf dan
                    3
                    angka</p>
            </section>
            <!-- Name -->
            <section class="flex flex-col gap-1 w-full ">
                <label for="name" class=" text-slate-700 max-sm:text-sm ">Name</label>
                <div class=" w-full">
                    <input type="text" name="name" id="name" required placeholder="your'e name"
                        class=" w-full  border px-3 py-1 rounded  border-slate-500 max-sm:text-sm ">
                </div>
            </section>
        </div>
        <!-- Section Password -->
        <div class="w-full flex gap-4 max-sm:flex-col ">
            <!-- Password -->
            <section class="flex flex-col gap-1 w-full">
                <label for="password" class=" text-slate-700 max-sm:text-sm ">Password</label>
                <div class="flex   gap-2 w-full">
                    <input type="password" id="password" required name="password" placeholder="****"
                        class="  border px-3 py-1 rounded  border-slate-500 pw max-sm:text-sm w-11/12">
                    <button type="button" class="viewPass border-slate-700 border  px-2 rounded ">
                        <img src="<?= BASEURL; ?>/icons/icons-view.png" width="20" height="20" alt="">
                    </button>
                </div>
                <p class="text-xs md:text-[8px] lg:text-xs text-slate-500"><span class="text-red-500">*</span>Mengandung
                    8 karakter
                </p>
            </section>
            <!-- Re-Password -->
            <section class="flex flex-col gap-1 w-full">
                <label for="repassword" class=" text-slate-700 max-sm:text-sm ">Re-Password</label>
                <div class="flex   gap-2 w-full">
                    <input type="password" id="repassword" required name="repassword" placeholder="****"
                        class="  border px-3 py-1 rounded  border-slate-500 repw max-sm:text-sm w-11/12">
                    <button type="button" class="viewRePass border-slate-700 border  px-2 rounded ">
                        <img src="<?= BASEURL; ?>/icons/icons-view.png" class="" width="20" height="20" alt="">
                    </button>
                </div>
            </section>
        </div>
        <!-- Select Option Hint -->
        <section class="flex flex-col gap-1 w-full">
            <label for="hint" class=" text-slate-700 max-sm:text-sm ">Pilih Pertanyaan</label>
            <div class="flex   gap-2 w-full">
                <select name="hint" id="" class="  border px-3 py-1 rounded  border-slate-500 pw max-sm:text-sm w-full">
                    <option value="1">Siapa nama ibu anda ?</option>
                    <option value="2">Siapa nama ayah anda ?</option>
                    <option value="3">Apa nama hewan peliharaan anda ?</option>
                    <option value="4">Apa nama sekolah dasar anda ?</option>
                </select>
            </div>
        </section>
        <!-- Answer Hint -->
        <section class="flex flex-col gap-1 w-full">
            <label for="answer_hint" class=" text-slate-700 max-sm:text-sm ">Jawaban anda </label>
            <div class="flex   gap-2 w-full">
                <input type="text" required id="answer_hint" name="answer_hint" placeholder="jawaban..."
                    class="  border px-3 py-1 rounded  border-slate-500 pw max-sm:text-sm w-full">
            </div>
            <p class="text-xs text-slate-500"><span class="text-red-500">*</span>Mohon diingat pilihan dan
                jawaban anda
            </p>
        </section>
        <!-- Button Register Account -->
        <section class="flex flex-col justify-center w-full  gap-2">
            <button type="submit" class="py-1 rounded  bg-slate-400 w-full">Register</button>
            <section class="w-full flex justify-center items-center gap-2">
                <div class="w-full h-[1px] bg-slate-300"></div>
                <p class="text-sm">OR</p>
                <div class="w-full h-[1px] bg-slate-300"></div>

            </section>
            <p class="text-sm text-slate-400 text-center">
                Sudah Punya akun ?
                <a href="<?= BASEURL ?>/auth" class="text-sm text-sky-400 underline">Login</a>
            </p>
        </section>
    </form>
</section>
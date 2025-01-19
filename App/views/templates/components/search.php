<div
    class=" group overflow-hidden max-w-10 w-full flex gap-3 hover:rounded-lg hover:w-full hover:max-w-full transition-all duration-500 ease-in-out bg-slate-50 rounded-full shadow-lg px-2 py-1 hover:shadow-xl hover:cursor-pointer hover:bg-sky-300 items-center container-search">
    <label for="search" class="hover:cursor-pointer ">
        <?php include_once dirname(__DIR__, 4) . '/public/icons/icons-search.svg'; ?>
    </label>
    <input type="text" placeholder="Search..." onfocus="handleFocusSearch(true)" autocomplete="off"
        onblur="handleFocusSearch(false)"
        class=" w-full px-2 py-1  focus:ring-0 focus:outline-none border-none bg-transparent ring-0 active:ring-0 active:outline-none  outline-none font-semibold   "
        name="search" id="search">
</div>
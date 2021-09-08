<header x-data="{ isOpen: false }" class="w-full bg-gray-800 py-5 px-6 md:block lg:hidden">
    <div class="flex items-center justify-between relative">
        <a href="#" class="text-red-400 text-2xl font-semibold font-display uppercase text-center">{{config('app.name')}}</a>

        <button @click="isOpen = !isOpen"
                class="text-white text-3xl focus:outline-none relative">
            <i x-show="!isOpen" class="fi fi-rr-menu-burger text-red-400"></i>
            <i x-show="isOpen" class="fi fi-rr-cross text-red-400"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
        <x-admin.navigation selector="mobileNavId"></x-admin.navigation>
    </nav>
</header>

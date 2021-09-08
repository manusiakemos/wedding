<aside class="relative bg-gray-800 dark:bg-gray-900 h-screen w-72 hidden lg:block" id="sidebar">
    <div class="p-6">
        <a href="#" class="tracking-wide text-red-500 text-xl font-semibold font-display uppercase text-center">{{config('app.name')}}</a>
    </div>
    <nav class="text-white text-base">
       <x-admin.navigation selector="sidebarnav"></x-admin.navigation>
    </nav>
    <a href="{{url('logout')}}" class="btn-logout absolute w-full upgrade-btn bottom-0 bg-red-400 text-white flex items-center justify-center py-4">
        <i class="flex items-center fi-rr-sign-out mr-3"></i>
        <span class="text-sm font-bold">Sign Out</span>
    </a>
</aside>

<header class="w-full bg-gradient-to-r from-gray-700 to-gray-800 items-center py-2 px-5 flex">
    <div class="w-1/2"></div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end items-center">
        <div class="flex items-center justify-between">
            <div class="items-center">
                <button @click="isOpen = !isOpen"
                        class="rounded-full overflow-hidden border-4 border-gray-1O00 hover:border-red-400 focus:border-gray-500 focus:outline-none">
                    <img class="w-10 h-10"
                         src="{{ auth()->user()->getMedia("avatar")->first()
                                ? asset(auth()->user()->getMedia("avatar")->first()->getUrl())
                                : asset('images/avatar.png')}}"
                         alt="avatar">
                </button>
            </div>
            <div class="mx-3 items-center">
                <span class="text-sm text-white font-semibold">{{auth()->user()->name}}</span>
            </div>
        </div>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-40 bg-gray-700 rounded-lg border-2 border-gray-800 shadow-lg py-2 mt-16 z-10">
            <a href="{{route('profile')}}" class="block px-4 py-2 account-link text-white">Account</a>
            <a href="{{url('/login')}}" class="block px-4 py-2 account-link text-white btn-logout">Sign Out</a>
        </div>
    </div>
</header>

@push("scripts")
    <form action="{{ url('/logout') }}" method="post" id="formlogout">
        @csrf
    </form>
    <script>
        $(".btn-logout").on("click", function (e) {
            e.preventDefault();
            document.querySelector("#formlogout").submit();
        });
    </script>
@endpush

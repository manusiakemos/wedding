<div wire:ignore.self>
    <ul id="{{$selector}}" class="font-body text-sm capitalize">
        <li class="nav-item {{session('active') == 'home' ? 'nav-active' : ''}}">
            <a href="{{route('home')}}" aria-expanded="false" class="text-sm">
                <div class="flex items-center">
                    <i class="text-xl flex items-center fi fi-rr-stats"></i>
                    <span class="ml-3"> Dashboard </span>
                </div>
            </a>
        </li>

        <li class="nav-item {{session('active') == 'theme' ? 'nav-active' : ''}}">
            <a href="{{route('theme')}}" aria-expanded="false" class="text-sm">
                <div class="flex items-center">
                    <i class="text-xl flex items-center fi fi-rr-palette"></i>
                    <span class="ml-3"> Theme </span>
                </div>
            </a>
        </li>

        <li class="nav-item {{session('active') == 'invitation' ? 'nav-active' : ''}}">
            <a href="{{route('invitation')}}" aria-expanded="false" class="text-sm">
                <div class="flex items-center">
                    <i class="text-xl flex items-center fi-rr-document-signed"></i>
                    <span class="ml-3"> Invitation </span>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="text-sm flex justify-between items-center">
                <div class="flex items-center">
                    <i class="text-xl flex items-center fi fi-rr-settings"></i>
                    <span class="ml-3"> Admin </span>
                </div>
                <span class="flex items-center fi-rr-angle-right text-gray-400 dark:text-gray-300 mr-3"></span>
            </a>
            <ul class="pt-2 pl-2 {{session('expanded') == 'admin' ? 'mm-show' : 'mm-collapse'}}">
                <li class="nav-item {{session('active') == 'user' ? 'nav-active' : ''}} ml-5">
                    <a href="{{route('user')}}" aria-expanded="false" class="text-sm">
                        User
                    </a>
                </li>
                <li class="nav-item {{session('active') == 'profile' ? 'nav-active' : ''}} ml-5">
                    <a href="{{route('profile')}}" aria-expanded="false" class="text-sm">
                        Profile
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
@push("scripts")
    <script>
        $("#{{$selector}}").metisMenu();
    </script>
@endpush


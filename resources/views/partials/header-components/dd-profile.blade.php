<div class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
    <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
        <img class="object-cover w-9 h-9 rounded-full" src="{{ asset('images/profile/user-1.jpg') }}" alt=""
            aria-hidden="true">
    </a>
    <div class="card hs-dropdown-menu transition-[opacity,margin] border border-gray-400 rounded-[7px] duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[200px] hidden z-[12]"
        aria-labelledby="hs-dropdown-custom-icon-trigger">
        <div class="card-body p-0 py-2">
            <a href="{{ route('profile.index') }}" class="flex gap-2 items-center px-4 py-[6px] hover:bg-blue-500">
                <i class="ti ti-user text-gray-500 text-xl "></i>
                <p class="text-sm text-gray-500">Profil Saya</p>
            </a>
            <div class="px-4 mt-[7px] grid">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn-outline-primary w-full hover:bg-blue-600 hover:text-white">Logout</button>
                </form>
            </div>

        </div>
    </div>
</div>

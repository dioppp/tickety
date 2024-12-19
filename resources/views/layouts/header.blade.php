<!-- navbar -->
<nav class="bg-gray-800">
    <div class="container flex">
        <div class="flex items-center justify-between flex-grow md:pl-12 py-5">
            <div class="flex items-center space-x-6 capitalize">
                <a href="">
                    <img src="{{ asset('images/logos/tickety-white.png') }}" alt="Logo" style="max-height: 50px">
                </a>
            </div>
            @if (Auth::check())
                <a href="{{ route('profile.index') }}"
                    class="text-gray-200 hover:text-white transition px-4 py-2 rounded-md hover:bg-blue-700">
                    {{ ucwords(Auth::user()->name) }}
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="text-gray-200 hover:text-white transition px-4 py-2 rounded-md hover:bg-blue-700">
                    Login
                </a>
            @endif
        </div>
    </div>
</nav>

<!-- ./navbar -->

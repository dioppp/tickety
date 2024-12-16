<footer class="bg-white pt-16 pb-12 border-t border-gray-100">
    <div class="container grid grid-cols-1 px-8">
        <div class="col-span-1 space-y-4">
            <img src="{{ asset('images/logos/tickety-rectangle.png') }}" alt="logo" class="w-30" style="max-height: 80px">
            <div class="mr-2">
                <p class="text-gray-500">
                    Tiket mudah di tanganmu, event meriah menantimu!
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- copyright -->
<div class="bg-gray-800 py-4">
    <div class="container flex items-center justify-between px-8">
        <p class="text-white">&copy; {{ \Carbon\Carbon::now()->year }} Tickety - All Right Reserved</p>
        <div>
            <img src="{{ asset('images/methods.png') }}" alt="methods" class="h-5">
        </div>
    </div>
</div>
<!-- ./copyright -->

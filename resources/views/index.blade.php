@extends('layouts.app')

@section('content')
    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('{{ asset('images/banner-1.jpg') }}');">
        <div class="container px-8">
            <h1 class="text-6xl text-primary font-medium mb-4 capitalize"
                style="text-shadow:
                    -1px -1px 0 #fff, 1px -1px 0 #fff,
                    -1px 1px 0 #fff, 1px 1px 0 #fff;">
                Tiket Mudah, <br> Event Meriah
            </h1>
            <p>Dengan Tickety, memesan tiket untuk konser, festival, dan acara favoritmu jadi lebih mudah. <br> Temukan
                acara seru dan pesan tiket dengan cepat, tanpa ribet. <br> Nikmati momen meriah di setiap kesempatan!
            </p>
            <div class="mt-12">
                <a href="{{ route('event.index') }}"
                    class="bg-primary border border-primary text-white px-8 py-3 font-medium
                    rounded-md hover:bg-transparent hover:text-primary">Cek
                    Event</a>
            </div>
        </div>
    </div>
    <!-- ./banner -->

    <!-- recommended -->
    <div class="container py-16 px-8" id="shop">
        <h2 class="text-2xl font-medium text-gray-800 mb-6">Recommended For You</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach ($events as $event)
                <a href="{{ route('event.show', $event->id) }}" class="block bg-white shadow rounded overflow-hidden group"
                    target="_blank">
                    <div class="relative">
                        @if ($event->image == 'default.jpg')
                            <img class="w-full object-cover rounded-t-xl" src="{{ asset('images/events/tulus.jpg') }}"
                                style="max-height: 180px" alt="Image Description">
                        @else
                            <img class="w-full object-cover rounded-t-xl" src="{{ asset('storage/' . $event->image) }}"
                                style="max-height: 180px" alt="Image Description">
                        @endif
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <h4 class="font-medium text-xl mb-2 text-gray-800">
                            {{ ucwords($event->event_name) }}
                        </h4>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">
                                {{ formatRupiah($event->cheapestTicketPrice()) }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
    <!-- ./recommended -->
@endsection

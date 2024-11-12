@extends('partials.app')

@section('content')
    <main class="h-full overflow-y-auto  max-w-full  pt-4">
        <div class="container full-container py-5 flex flex-col gap-6">
            <div class="card-body">
                <div class="grid grid-cols-1 xl:grid-cols-4 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6">
                    @foreach ($events as $event)
                        <div class="flex flex-col gap-6">
                            <div class="card overflow-hidden">
                                <a href="{{ route('event.index') }}" class="bg-white">
                                    <img class="w-full h-auto rounded-t-xl" src="{{ asset('images/events/tulus.jpg') }}"
                                        alt="Image Description">
                                    <div class="card-body">
                                        <h3 class="text-lg font-medium text-gray-700">
                                            {{ $event->title }}
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500 pr-10">
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
                                        </p>
                                        <h4 class="text-sm font-bold text-gray-700 mt-2">
                                            {{ formatRupiah($event->cheapestTicketPrice()) }}
                                        </h4>
                                        <br>
                                        <hr>
                                        <a href="{{ route('dashboard') }}" class="flex items-center mt-4">
                                            <img class="object-cover w-9 h-9 rounded-full"
                                                src="{{ asset('images/profile/user-3.jpg') }}" alt=""
                                                aria-hidden="true">
                                            <span class="text-sm px-3">{{ ucfirst($event->user->name) }}</span>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection

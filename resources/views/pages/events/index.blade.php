@extends('partials.app')

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-4 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6">
        @foreach ($events as $event)
            <div class="flex flex-col gap-6">
                <div class="card overflow-hidden">
                    <a href="{{ route('event.show', $event->id) }}" class="bg-white">
                        @if ($event->image == 'default.jpg')
                            <img class="w-full object-cover rounded-t-xl" src="{{ asset('images/events/tulus.jpg') }}"
                                style="max-height: 150px" alt="Image Description">
                        @else
                            <img class="w-full object-cover rounded-t-xl" src="{{ asset('storage/' . $event->image) }}"
                                style="max-height: 150px" alt="Image Description">
                        @endif
                        <div class="card-body">
                            <h3 class="text-lg font-medium text-gray-700">
                                {{ ucwords($event->event_name) }}
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
                                    src="{{ asset('images/profile/user-3.jpg') }}" alt="" aria-hidden="true">
                                <span class="text-sm px-3">{{ ucwords($event->user->name) }}</span>
                            </a>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

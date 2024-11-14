@extends('partials.app')

@section('content')
    {{-- First Row --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
        {{-- First Column --}}
        <div class="col-span-2">
            <div class="card overflow-hidden">
                @if ($event->image == 'default.jpg')
                    <img class="w-full object-cover rounded-t-xl" src="{{ asset('images/events/tulus.jpg') }}"
                        style="max-height: 320px" alt="Image Description">
                @else
                    <img class="w-full object-cover rounded-t-xl" src="{{ asset('storage/' . $event->image) }}"
                        style="max-height: 320px" alt="Image Description">
                @endif
            </div>
        </div>

        {{-- Second Column --}}
        <div class="card">
            <div class="card-body">
                <h4 class="text-gray-600 text-[21px] font-semibold mb-5">
                    {{ ucwords($event->event_name) }}
                </h4>
                <div class="flex gap-6 items-center justify-between">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-1">
                            <i class="ti ti-calendar-month text-blue-600"></i>
                            <p class="text-gray-600 text-sm font-medium">
                                {{ \Carbon\Carbon::parse($event->start_date)->format('d M') }} -
                                {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}
                            </p>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="ti ti-clock text-blue-600"></i>
                            <p class="text-gray-600 text-sm font-medium">
                                {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }} WIB
                            </p>
                        </div>
                        <div class="flex items-center gap-1 mb-6">
                            <i class="ti ti-map-pin text-blue-600"></i>
                            <p class="text-gray-600 text-sm font-medium">
                                {{ ucwords($event->location) }}
                            </p>
                        </div>
                    </div>
                </div>
                <hr class="mt-8">
                <div class="flex gap-1 items-center mt-1">
                    <div class="flex flex-col gap-4">
                        <a href="{{ route('dashboard') }}" class="flex items-center mt-4">
                            <img class="object-cover w-9 h-9 rounded-full" src="{{ asset('images/profile/user-3.jpg') }}"
                                alt="" aria-hidden="true">
                        </a>
                    </div>
                    <div class="flex flex-col gap-2 mt-4">
                        <span class="text-sm px-3 text-gray-500">Diselenggarakan oleh</span>
                        <a href="{{ route('dashboard') }}"
                            class="text-sm px-3 font-semibold">{{ ucwords($event->user->name) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Second Row --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
        {{-- First Column --}}
        <div class="col-span-2">
            <div class="card h-full">
                <div class="card-body">
                    <h4 class="text-gray-600 text-lg font-semibold mb-6">Detail Event</h4>
                    <div class="relative overflow-x-auto">
                        <h4 class="text-gray-600 text-md font-semibold mb-3">Deskripsi</h4>
                        <h4 class="text-gray-600 text-sm font-medium mb-6">{{ ucfirst($event->event_description) }}</h4>
                        <h4 class="text-gray-600 text-md font-semibold">Tiket</h4>
                        <!-- Table -->
                        <table class="text-left w-full whitespace-nowrap text-sm">
                            <thead class="text-gray-700">
                                <tr class="font-semibold text-gray-600">
                                    <th scope="col" class="p-4">No.</th>
                                    <th scope="col" class="p-4">Nama Tiket</th>
                                    <th scope="col" class="p-4">Deskripsi</th>
                                    <th scope="col" class="p-4">Harga</th>
                                    <th scope="col" class="p-4">Berakhir</th>
                                    <th scope="col" class="p-4">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tickets as $t)
                                    <tr>
                                        <td class="p-4 font-semibold text-gray-600 ">{{ $loop->iteration }}</td>
                                        <td class="p-4">
                                            <div class="flex flex-col gap-1">
                                                <span
                                                    class="font-normal text-gray-600">{{ ucwords($t->ticket_name) }}</span>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <span
                                                class="font-normal text-gray-600">{{ ucfirst($t->ticket_description) }}</span>
                                        </td>
                                        <td class="p-4">
                                            <span class="font-semibold text-gray-600">{{ formatRupiah($t->price) }}</span>
                                        </td>
                                        <td class="p-4">
                                            <h3 class="font-semibold text-blue-600">
                                                {{ \Carbon\Carbon::parse($t->sell_end_date)->format('d M Y') }}</h3>
                                            <span
                                                class="font-normal text-blue-600">{{ \Carbon\Carbon::parse($t->sell_end_time)->format('H:i') }}
                                                WIB</span>
                                        </td>
                                        <td class="p-4">
                                            @php
                                                $now = \Carbon\Carbon::now();
                                                $sellStartDateTime = \Carbon\Carbon::parse(
                                                    $t->sell_start_date . ' ' . $t->sell_start_time,
                                                );
                                                $sellEndDateTime = \Carbon\Carbon::parse(
                                                    $t->sell_end_date . ' ' . $t->sell_end_time,
                                                );
                                            @endphp

                                            @if ($now->lessThan($sellStartDateTime))
                                                <span
                                                    class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-gray-500">Belum
                                                    Dijual</span>
                                            @elseif ($t->stock > 0 && $now->lessThanOrEqualTo($sellEndDateTime))
                                                <span
                                                    class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-teal-500">Tersedia</span>
                                            @elseif ($t->stock == 0)
                                                <span
                                                    class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-red-500">Habis
                                                    Terjual</span>
                                            @elseif ($now->greaterThan($sellEndDateTime))
                                                <span
                                                    class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-red-500">Penjualan
                                                    Berakhir</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <p class="text-gray-600 text-center">No data available</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Second Column --}}
        <div class="card">
            <div class="card-body">
                <h4 class="text-gray-600 text-lg font-semibold mb-6">
                    Mau Beli Tiket?
                </h4>
                <ul class="timeline-widget relative">
                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-600 text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-600 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-600 text-sm font-normal">
                                Payment received from John Doe of $385.90
                            </p>
                        </div>
                    </li>
                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-600 min-w-[90px] py-[6px] text-sm pr-4 text-end">
                            10:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-300 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4 text-sm">
                            <p class="text-gray-600 font-semibold">
                                New sale recorded
                            </p>
                            <a href="javascript:void('')" class="text-blue-600">#ML-3467</a>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-600 min-w-[90px] text-sm py-[6px] pr-4 text-end">
                            12:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-teal-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-600 text-sm font-normal">
                                Payment was made of $64.95 to Michael
                            </p>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-600 min-w-[90px] text-sm py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-yellow-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4 text-sm">
                            <p class="text-gray-600 font-semibold">
                                New sale recorded
                            </p>
                            <a href="javascript:void('')" class="text-blue-600">#ML-3467</a>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-600 text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-red-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-600 text-sm font-semibold">
                                New arrival recorded
                            </p>
                        </div>
                    </li>
                    <li class="timeline-item flex relative overflow-hidden">
                        <div class="timeline-time text-gray-600 text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            12:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-teal-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-600 text-sm font-normal">
                                Payment Done
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>
@endsection

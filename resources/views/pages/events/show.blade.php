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
                <div class="card-body flex flex-col">
                    <h4 class="text-gray-600 text-lg font-semibold mb-6">Detail Event</h4>
                    <div class="relative overflow-x-auto">
                        <h4 class="text-gray-600 text-md font-semibold mb-3">Deskripsi</h4>
                        <h4 class="text-gray-600 text-sm font-medium mb-6">{{ ucfirst($event->event_description) }}</h4>
                        <h4 class="text-gray-600 text-md font-semibold">Tiket</h4>
                        <!-- Ticket -->
                        <div class="card-body">
                            <div class="flex flex-col gap-6">
                                {{-- Ticket --}}
                                @foreach ($tickets as $t)
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-gray-600 text-lg font-semibold mb-3">
                                                {{ ucwords($t->ticket_name) }}
                                            </h4>
                                            <div class="flex gap-6 items-center justify-between">
                                                <div class="flex flex-col gap-4">
                                                    <h4 class="text-gray-500 text-sm font-medium">
                                                        {{ ucfirst($t->ticket_description) }}
                                                    </h4>
                                                    <div class="flex items-center gap-1">
                                                        <i class="ti ti-clock text-blue-600"></i>
                                                        <p class="font-normal text-blue-600 text-sm">
                                                            Berakhir
                                                            {{ \Carbon\Carbon::parse($t->sell_end_date)->format('d M Y') }}
                                                            <i class="ti ti-tallymark-1"></i>
                                                            {{ \Carbon\Carbon::parse($t->sell_end_time)->format('H:i') }}
                                                            WIB
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-3 mt-4">
                                                <hr>
                                                <div class="flex gap-6 items-center justify-between">
                                                    <span class="text-gray-600 text-lg font-bold">
                                                        {{ formatRupiah($t->price) }}
                                                    </span>
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
                                                        <div class="relative flex items-center justify-center"
                                                            data-hs-input-number="">
                                                            <button type="button"
                                                                class="inline-flex text-sm text-blue-600 font-medium rounded-full border border-blue-600 py-[2px] px-[2px]"
                                                                tabindex="-1" aria-label="Decrease"
                                                                onclick="decrementValue(this, {{ $t->price }}, {{ $t->id }})">
                                                                <i class="ti ti-minus"></i>
                                                            </button>
                                                            <input
                                                                class="bg-transparent text-gray-800 focus:ring-0 p-0 text-center w-11"
                                                                style="border: none; cursor: default" type="text"
                                                                aria-roledescription="Number field" value="0" readonly
                                                                data-hs-input-number-input="" data-max-value="5"
                                                                data-ticket-id="{{ $t->id }}"
                                                                data-price="{{ $t->price }}"
                                                                data-ticket-name="{{ $t->ticket_name }}"
                                                                id="number-input-{{ $t->id }}">
                                                            <button type="button"
                                                                class="inline-flex text-sm text-blue-600 font-medium rounded-full border border-blue-600 py-[2px] px-[2px]"
                                                                tabindex="-1" aria-label="Increase"
                                                                onclick="incrementValue(this, {{ $t->price }}, {{ $t->id }})">
                                                                <i class="ti ti-plus"></i>
                                                            </button>
                                                        </div>
                                                    @elseif ($t->stock == 0)
                                                        <span
                                                            class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-red-500">Habis
                                                            Terjual</span>
                                                    @elseif ($now->greaterThan($sellEndDateTime))
                                                        <span
                                                            class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-red-500">Penjualan
                                                            Berakhir</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Second Column --}}
        <div class="flex flex-col gap-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-gray-600 text-lg font-semibold mb-6">
                        Mau Beli Tiket?
                    </h4>
                    <div id="default-message">
                        <h4 class="text-gray-600 text-sm font-medium">Kamu belum memilih tiket.</h4>
                        <hr class="mt-4 mb-4">
                        <div class="flex gap-6 items-center justify-between mb-3">
                            <h4 class="text-gray-600 text-sm font-medium items-center">
                                Harga mulai dari
                            </h4>
                            <span class="text-gray-600 text-lg font-bold" id="total-price">
                                {{ formatRupiah($event->cheapestTicketPrice()) }}
                            </span>
                        </div>
                    </div>
                    <div id="ticket-summaries"></div>
                    <div id="grand-summary" style="display: none;">
                        <div class="flex gap-6 items-center justify-between mb-3">
                            <h4 class="text-gray-600 text-sm font-medium items-center">
                                Total Tiket: <span id="grand-total-tickets">0</span>
                            </h4>
                            <span class="text-gray-600 text-lg font-bold" id="grand-total-price">
                                Rp0
                            </span>
                        </div>
                    </div>
                    <div class="grid items-center">
                        <a href="{{ route('event.create') }}" class="btn font-medium hover:bg-blue-700 py-3"
                            aria-current="page">
                            <i class="ti ti-ticket"></i>
                            Beli Tiket Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function incrementValue(button, price, ticketId) {
            var input = button.previousElementSibling;
            var currentValue = parseInt(input.value);
            var maxValue = parseInt(input.getAttribute('data-max-value'));

            var totalTickets = getTotalTickets();

            if (totalTickets < maxValue) {
                input.value = currentValue + 1;
                updateSummary();
            } else {
                Swal.fire({
                    icon: 'warning',
                    text: 'Maksimal pembelian tiket dalam satu kali transaksi adalah ' + maxValue + ' tiket',
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 3000,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });
            }
        }

        function decrementValue(button, price, ticketId) {
            var input = button.nextElementSibling;
            var currentValue = parseInt(input.value);

            if (currentValue > 0) {
                input.value = currentValue - 1;
                updateSummary();
            }
        }

        function getTotalTickets() {
            var totalTickets = 0;
            document.querySelectorAll('input[data-hs-input-number-input]').forEach(function(input) {
                totalTickets += parseInt(input.value);
            });
            return totalTickets;
        }

        function updateSummary() {
            var ticketSummaries = {};
            var grandTotalTickets = 0;
            var grandTotalPrice = 0;

            document.querySelectorAll('input[data-hs-input-number-input]').forEach(function(input) {
                var ticketId = input.getAttribute('data-ticket-id');
                var ticketCount = parseInt(input.value);
                var ticketPrice = parseInt(input.getAttribute('data-price'));

                if (!ticketSummaries[ticketId]) {
                    ticketSummaries[ticketId] = {
                        count: 0,
                        price: 0,
                        name: input.getAttribute('data-ticket-name')
                    };
                }

                ticketSummaries[ticketId].count += ticketCount;
                ticketSummaries[ticketId].price += ticketCount * ticketPrice;
                grandTotalTickets += ticketCount;
                grandTotalPrice += ticketCount * ticketPrice;
            });

            var ticketSummariesContainer = document.getElementById('ticket-summaries');
            ticketSummariesContainer.innerHTML = '';

            Object.keys(ticketSummaries).forEach(function(ticketId) {
                var summary = ticketSummaries[ticketId];

                if (summary.count > 0) {
                    var summaryElement = document.createElement('div');
                    summaryElement.innerHTML = `
                    <h4 class="text-gray-600 text-md font-medium mb-3">
                        ${summary.name}
                    </h4>
                    <div class="flex gap-6 items-center justify-between mb-3">
                        <h4 class="text-gray-500 text-sm font-medium">
                            ${summary.count} Tiket
                        </h4>
                        <span class="text-gray-600 text-md font-bold">
                            ${formatRupiah(summary.price)}
                        </span>
                    </div>
                    <hr class="mt-4 mb-4">
                `;
                    ticketSummariesContainer.appendChild(summaryElement);
                }
            });

            var grandSummary = document.getElementById('grand-summary');
            if (grandTotalTickets > 0) {
                grandSummary.style.display = 'block';
            } else {
                grandSummary.style.display = 'none';
            }

            document.getElementById('grand-total-tickets').innerText = grandTotalTickets;
            document.getElementById('grand-total-price').innerText = formatRupiah(grandTotalPrice);

            var defaultMessage = document.getElementById('default-message');
            if (grandTotalTickets > 0) {
                defaultMessage.style.display = 'none';
            } else {
                defaultMessage.style.display = 'block';
            }
        }

        function formatRupiah(amount) {
            return 'Rp' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
    </script>
@endpush

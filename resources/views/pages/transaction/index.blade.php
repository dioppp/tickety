@extends('partials.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6">

        {{-- Second Column --}}
        <div class="col-span-2">
            <div class="card h-full">
                <div class="card-body">
                    <div class="relative overflow-x-auto">
                        <!-- table -->
                        <table class="text-left w-full whitespace-nowrap text-sm">
                            <thead class="text-gray-700">
                                <tr class="font-semibold text-gray-600">
                                    <th scope="col" class="p-4">No</th>
                                    <th scope="col" class="p-4">Event</th>
                                    <th scope="col" class="p-4">Jumlah Tiket</th>
                                    <th scope="col" class="p-4">Tanggal Pembelian</th>
                                    <th scope="col" class="p-4">Harga</th>
                                    <th scope="col" class="p-4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <td class="p-4 font-semibold text-gray-600 ">{{ $transaction->id }}</td>
                                        <td class="p-4">
                                            <h3 class=" font-semibold text-gray-600">
                                                {{ $transaction->orders->first()->ticket->event->event_name }}</h3>
                                        </td>
                                        <td class="p-4">
                                            <span
                                                class="font-normal text-gray-500">{{ $transaction->orders->sum('quantity') }}</span>
                                        </td>
                                        <td class="p-4">
                                            <span
                                                class="font-normal text-gray-500">{{ \Carbon\Carbon::parse($transaction->created_at)->translatedFormat('d F Y, H:i') }}
                                                WIB</span>
                                        </td>
                                        <td class="p-4">
                                            <span
                                                class="font-semibold text-base text-gray-600">{{ formatRupiah($transaction->total) }}</span>
                                        </td>
                                        <td class="p-4">
                                            @if ($transaction->status == 0)
                                                <button disabled
                                                    class="py-2 px-3 inline-flex items-center text-sm font-semibold rounded-md border border-transparent bg-yellow-500 text-white">
                                                    Belum Dibayar
                                                </button>
                                            @elseif ($transaction->status == 1)
                                                <button disabled
                                                    class="py-2 px-3 inline-flex items-center text-sm font-semibold rounded-md border border-transparent bg-teal-500 text-white">
                                                    Pembayaran Sukses
                                                </button>
                                            @elseif ($transaction->status == 2)
                                                <button disabled
                                                    class="py-2 px-3 inline-flex items-center text-sm font-semibold rounded-md border border-transparent bg-red-500 text-white">
                                                    Pembayaran Gagal
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="p-4 text-center">Belum ada transaksi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4 mr-3">
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

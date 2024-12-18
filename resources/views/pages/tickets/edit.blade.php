@extends('partials.app')

@section('content')
    <div class="card">
        <div class="card-body flex flex-col gap-6">
            <form action="{{ route('ticket.update', $ticket->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h6 class="text-lg text-gray-600 font-semibold mb-3">Ubah Jenis Tiket</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="flex flex-col gap-6" id="ticket-forms">
                            <div>
                                <label for="ticket_name" class="block text-sm font-semibold mb-2 text-gray-600">Nama
                                    Tiket</label>
                                <input type="text" name="ticket_name" id="ticket_name"
                                    class="@error('ticket_name') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="Maksimal 50 karakter" value="{{ old('ticket_name', $ticket->ticket_name) }}">
                                @error('ticket_name')
                                    <div class="invalid-feedback text-sm text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="stock" class="block text-sm font-semibold mb-2 text-gray-600">Jumlah
                                    Tiket</label>
                                <input type="number" name="stock" id="stock"
                                    class="@error('stock') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="0" value="{{ old('stock', $ticket->stock) }}">
                                @error('stock')
                                    <div class="invalid-feedback text-sm text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="price" class="block text-sm font-semibold mb-2 text-gray-600">Harga
                                    Tiket</label>
                                <input type="number" name="price" id="price"
                                    class="@error('price') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="Rp0" value="{{ old('price', $ticket->price) }}">
                                @error('price')
                                    <div class="invalid-feedback text-sm text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="ticket_description"
                                    class="block text-sm font-semibold mb-2 text-gray-600">Deskripsi Tiket</label>
                                <input type="text" name="ticket_description" id="ticket_description"
                                    class="@error('ticket_description') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="Deskripsi Tiket" value="{{ old('ticket_description', $ticket->ticket_description) }}">
                                @error('ticket_description')
                                    <div class="invalid-feedback text-sm text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6">
                                <div>
                                    <label for="sell_start_date"
                                        class="block text-sm font-semibold mb-2 text-gray-600">Tanggal Mulai
                                        Penjualan</label>
                                    <input type="date" name="sell_start_date" id="sell_start_date"
                                        class="@error('sell_start_date') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('sell_start_date', $ticket->sell_start_date) }}">
                                    @error('sell_start_date')
                                        <div class="invalid-feedback text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="sell_end_date"
                                        class="block text-sm font-semibold mb-2 text-gray-600">Tanggal Berakhir
                                        Penjualan</label>
                                    <input type="date" name="sell_end_date" id="sell_end_date"
                                        class="@error('sell_end_date') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('sell_end_date', $ticket->sell_end_date) }}">
                                    @error('sell_end_date')
                                        <div class="invalid-feedback text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6">
                                <div>
                                    <label for="sell_start_time"
                                        class="block text-sm font-semibold mb-2 text-gray-600">Jam Mulai Penjualan</label>
                                    <input type="time" name="sell_start_time" id="sell_start_time"
                                        class="@error('sell_start_time') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('sell_start_time', $ticket->sell_start_time) }}">
                                    @error('sell_start_time')
                                        <div class="invalid-feedback text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="sell_end_time" class="block text-sm font-semibold mb-2 text-gray-600">Jam Berakhir Penjualan</label>
                                    <input type="time" name="sell_end_time" id="sell_end_time"
                                        class="@error('sell_end_time') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('sell_end_time', $ticket->sell_end_time) }}">
                                    @error('sell_end_time')
                                        <div class="invalid-feedback text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="block py-3 btn text-sm text-white font-medium w-fit hover:bg-blue-700 mt-4">Ubah Tiket</button>
            </form>
        </div>
    </div>
@endsection

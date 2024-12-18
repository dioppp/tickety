@extends('partials.app')

@section('content')
    <div class="card">
        <div class="card-body flex flex-col gap-6">
            <form action="{{ route('ticket.store') }}" method="POST">
                @csrf
                <h6 class="text-lg text-gray-600 font-semibold mb-3">Tambah Jenis Tiket</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="flex flex-col gap-6" id="ticket-forms">
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <div>
                                <label for="ticket_name" class="block text-sm font-semibold mb-2 text-gray-600">Nama
                                    Tiket</label>
                                <input type="text" name="tickets[0][ticket_name]" id="ticket_name"
                                    class="@error('tickets.0.ticket_name') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="Maksimal 50 karakter" value="{{ old('tickets.0.ticket_name') }}">
                                @error('tickets.0.ticket_name')
                                    <div class="invalid-feedback text-sm text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="stock" class="block text-sm font-semibold mb-2 text-gray-600">Jumlah
                                    Tiket</label>
                                <input type="number" name="tickets[0][stock]" id="stock"
                                    class="@error('tickets.0.stock') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="0" value="{{ old('tickets.0.stock') }}">
                                @error('tickets.0.stock')
                                    <div class="invalid-feedback text-sm text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="price" class="block text-sm font-semibold mb-2 text-gray-600">Harga
                                    Tiket</label>
                                <input type="number" name="tickets[0][price]" id="price"
                                    class="@error('tickets.0.price') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="Rp0" value="{{ old('tickets.0.price') }}">
                                @error('tickets.0.price')
                                    <div class="invalid-feedback text-sm text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="ticket_description"
                                    class="block text-sm font-semibold mb-2 text-gray-600">Deskripsi Tiket</label>
                                <input type="text" name="tickets[0][ticket_description]" id="ticket_description"
                                    class="@error('tickets.0.ticket_description') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="Deskripsi Tiket" value="{{ old('tickets.0.ticket_description') }}">
                                @error('tickets.0.ticket_description')
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
                                    <input type="date" name="tickets[0][sell_start_date]" id="sell_start_date"
                                        class="@error('tickets.0.sell_start_date') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('tickets.0.sell_start_date') }}">
                                    @error('tickets.0.sell_start_date')
                                        <div class="invalid-feedback text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="sell_end_date"
                                        class="block text-sm font-semibold mb-2 text-gray-600">Tanggal Berakhir
                                        Penjualan</label>
                                    <input type="date" name="tickets[0][sell_end_date]" id="sell_end_date"
                                        class="@error('tickets.0.sell_end_date') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('tickets.0.sell_end_date') }}">
                                    @error('tickets.0.sell_end_date')
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
                                    <input type="time" name="tickets[0][sell_start_time]" id="sell_start_time"
                                        class="@error('tickets.0.sell_start_time') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('tickets.0.sell_start_time') }}">
                                    @error('tickets.0.sell_start_time')
                                        <div class="invalid-feedback text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="sell_end_time" class="block text-sm font-semibold mb-2 text-gray-600">Jam Berakhir Penjualan</label>
                                    <input type="time" name="tickets[0][sell_end_time]" id="sell_end_time"
                                        class="@error('tickets.0.sell_end_time') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('tickets.0.sell_end_time') }}">
                                    @error('tickets.0.sell_end_time')
                                        <div class="invalid-feedback text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" id="add-ticket-button"
                    class="py-2 px-4 inline-flex items-center gap-x-2 mt-4 text-sm font-semibold rounded-md border border-blue-600 text-blue-600 hover:border-blue-600 hover:text-white hover:bg-blue-600">
                    <i class="ti ti-circle-plus"></i> Tambah Jenis Tiket
                </button>
                <button class="block py-3 btn text-sm text-white font-medium w-fit hover:bg-blue-700 mt-8">Tambah Tiket
                    Sekarang</button>
            </form>
        </div>
    </div>

    <!-- Ticket form template -->
    <template id="ticket-form-template">
        <div>
            <label for="ticket_name" class="block text-sm font-semibold mb-2 text-gray-600">Nama Tiket</label>
            <input type="text" name="tickets[__index__][ticket_name]" id="ticket_name"
                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                placeholder="Maksimal 50 karakter">
        </div>
        <div>
            <label for="stock" class="block text-sm font-semibold mb-2 text-gray-600">Jumlah Tiket</label>
            <input type="number" name="tickets[__index__][stock]" id="stock"
                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                placeholder="0">
        </div>
        <div>
            <label for="price" class="block text-sm font-semibold mb-2 text-gray-600">Harga Tiket</label>
            <input type="number" name="tickets[__index__][price]" id="price"
                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                placeholder="Rp0">
        </div>
        <div>
            <label for="ticket_description" class="block text-sm font-semibold mb-2 text-gray-600">Deskripsi
                Tiket</label>
            <input type="text" name="tickets[__index__][ticket_description]" id="ticket_description"
                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                placeholder="Deskripsi Tiket">
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6">
            <div>
                <label for="sell_start_date" class="block text-sm font-semibold mb-2 text-gray-600">Tanggal Mulai
                    Penjualan</label>
                <input type="date" name="tickets[__index__][sell_start_date]" id="sell_start_date"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            </div>
            <div>
                <label for="sell_end_date" class="block text-sm font-semibold mb-2 text-gray-600">Tanggal Berakhir
                    Penjualan</label>
                <input type="date" name="tickets[__index__][sell_end_date]" id="sell_end_date"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6">
            <div>
                <label for="sell_start_time" class="block text-sm font-semibold mb-2 text-gray-600">Jam Mulai
                    Penjualan</label>
                <input type="time" name="tickets[__index__][sell_start_time]" id="sell_start_time"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            </div>
            <div>
                <label for="sell_end_time" class="block text-sm font-semibold mb-2 text-gray-600">Jam Berakhir
                    Penjualan</label>
                <input type="time" name="tickets[__index__][sell_end_time]" id="sell_end_time"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            </div>
        </div>
    </template>
@endsection

@push('scripts')
    <script>
        document.getElementById('add-ticket-button').addEventListener('click', function() {
            // Get the ticket form template
            var template = document.getElementById('ticket-form-template').innerHTML;

            // Get the current number of ticket forms
            var ticketForms = document.querySelectorAll('#ticket-forms > div');
            var index = ticketForms.length;

            // Replace the placeholder index with the actual index
            template = template.replace(/__index__/g, index);

            // Create a new div element and set its innerHTML to the template
            var newTicketForm = document.createElement('div');
            newTicketForm.innerHTML = template;

            // Append the new ticket form to the ticket forms container
            document.getElementById('ticket-forms').appendChild(newTicketForm);
        });
    </script>
@endpush

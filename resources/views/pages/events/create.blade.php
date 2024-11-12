@extends('partials.app')

@section('content')
    <div class="card">
        <div class="card-body flex flex-col gap-6">
            <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h6 class="text-lg text-gray-600 font-semibold mb-3">Buat Event</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="flex flex-col gap-6">
                            <input type="hidden" name="user_id" value="1">
                            <div>
                                <label for="event_name" class="block text-sm font-semibold mb-2 text-gray-600">Nama
                                    Event</label>
                                <input type="text" name="event_name" id="event_name"
                                    class="@error('event_name') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="Nama Event">
                                @error('event_name')
                                    <div class="invalid-feedback text-sm text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="category" class="block text-sm font-semibold mb-2 text-gray-600">Kategori
                                    Event</label>
                                <select name="category" id="category"
                                    class="@error('category') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
                                    <option value="">Pilih Kategori Event</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->value }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback text-sm text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="event_description"
                                    class="block text-sm font-semibold mb-2 text-gray-600">Deskripsi Event</label>
                                <input type="text" name="event_description" id="event_description"
                                    class="@error('event_description') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="Deskripsi Event">
                                @error('event_description')
                                    <div class="invalid-feedback text-sm text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="location" class="block text-sm font-semibold mb-2 text-gray-600">Lokasi</label>
                                <input type="text" name="location" id="location"
                                    class="@error('location') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="Contoh: Surabaya">
                                @error('location')
                                    <div class="invalid-feedback text-sm text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6">
                                <div>
                                    <label for="start_date" class="block text-sm font-semibold mb-2 text-gray-600">Tanggal
                                        Mulai
                                        Event</label>
                                    <input type="date" name="start_date" id="start_date"
                                        class="@error('start_date') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
                                    @error('start_date')
                                        <div class="invalid-feedback text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="end_date" class="block text-sm font-semibold mb-2 text-gray-600">Tanggal
                                        Berakhir
                                        Event</label>
                                    <input type="date" name="end_date" id="end_date"
                                        class="@error('end_date') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
                                    @error('end_date')
                                        <div class="invalid-feedback text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6">
                                <div>
                                    <label for="start_time" class="block text-sm font-semibold mb-2 text-gray-600">Jam Mulai
                                        Event</label>
                                    <input type="time" name="start_time" id="start_time"
                                        class="@error('start_time') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
                                    @error('start_time')
                                        <div class="invalid-feedback text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="end_time" class="block text-sm font-semibold mb-2 text-gray-600">Jam
                                        Berakhir
                                        Event</label>
                                    <input type="time" name="end_time" id="end_time"
                                        class="@error('end_time') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
                                    @error('end_time')
                                        <div class="invalid-feedback text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="image" class="block text-sm font-semibold mb-2 text-gray-600">Banner</label>
                                <input type="file" name="image" id="image"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="text-lg text-gray-600 font-semibold mb-3 mt-4">Tiket</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="flex flex-col gap-6" id="ticket-forms">
                            <div>
                                <label for="ticket_name" class="block text-sm font-semibold mb-2 text-gray-600">Nama
                                    Tiket</label>
                                <input type="text" name="tickets[0][ticket_name]" id="ticket_name"
                                    class="@error('tickets.0.ticket_name') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="Maksimal 50 karakter">
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
                                    placeholder="0">
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
                                    placeholder="Rp0">
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
                                    placeholder="Deskripsi Tiket">
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
                                        class="@error('tickets.0.sell_start_date') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
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
                                        class="@error('tickets.0.sell_end_date') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
                                    @error('tickets.0.sell_end_date')
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
                    class="block py-2 px-4 inline-flex items-center gap-x-2 mt-4 text-sm font-semibold rounded-md border border-blue-600 text-blue-600 hover:border-blue-600 hover:text-white hover:bg-blue-600">
                    <i class="ti ti-circle-plus"></i> Tambah Jenis Tiket
                </button>
                <button class="block py-3 btn text-sm text-white font-medium w-fit hover:bg-blue-700 mt-8">Buat Event
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

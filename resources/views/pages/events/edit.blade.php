@extends('partials.app')

@section('content')
    <div class="card">
        <div class="card-body flex flex-col gap-6">
            <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h6 class="text-lg text-gray-600 font-semibold mb-3">Ubah Event</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="flex flex-col gap-6">
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <div>
                                <label for="event_name" class="block text-sm font-semibold mb-2 text-gray-600">Nama
                                    Event</label>
                                <input type="text" name="event_name" id="event_name"
                                    class="@error('event_name') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                    placeholder="Nama Event" value="{{ old('event_name', $event->event_name) }}">
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
                                        <option value="{{ $category->value }}"
                                            {{ old('category', $event->category) == $category->value ? 'selected' : '' }}>
                                            {{ $category->value }}
                                        </option>
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
                                    placeholder="Deskripsi Event"
                                    value="{{ old('event_description', $event->event_description) }}">
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
                                    placeholder="Contoh: Surabaya" value="{{ old('location', $event->location) }}">
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
                                        class="@error('start_date') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('start_date', $event->start_date) }}">
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
                                        class="@error('end_date') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('end_date', $event->end_date) }}">
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
                                        class="@error('start_time') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('start_time', $event->start_time) }}">
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
                                        class="@error('end_time') is-invalid @enderror py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        value="{{ old('end_time', $event->end_time) }}">
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
                <button class="block py-3 btn text-sm text-white font-medium w-fit hover:bg-blue-700 mt-4">Ubah
                    Event</button>
            </form>
        </div>
    </div>
@endsection

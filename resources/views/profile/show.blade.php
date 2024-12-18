@extends('partials.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6">
        {{-- First Column --}}
        <div class="card">
            <div class="card overflow-hidden">
                <div class="bg-white">
                    <img class="w-full h-auto rounded-t-xl" src="{{ asset('images/profile/user-1.jpg') }}" alt="Photo Profile">
                    <div class="card-body">
                        <h3 class="text-lg font-semibold text-gray-700">
                            {{ ucwords($user->name) }}
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Member sejak {{ $user->created_at->format('Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Second Column --}}
        <div class="col-span-2">
            <div class="card h-full">
                <div class="card-body">
                    <h3 class="text-gray-600 text-lg font-semibold mb-5">Informasi Profil</h3>
                    <div class="relative overflow-x-auto">
                        <h4 class="text-md font-medium text-gray-600 mb-2">
                            Alamat
                        </h4>
                        <div class="flex items-center mt-2 text-sm text-gray-500 mb-4">
                            <i class="ti ti-map-pin mr-4"></i>
                            <p class="font-normal">
                                {{ $user->address }}
                            </p>
                        </div>
                        <h4 class="text-md font-medium text-gray-600 mb-2">
                            Kontak
                        </h4>
                        <div class="flex items-center mt-2 text-sm text-gray-500 mb-4">
                            <i class="ti ti-phone mr-4"></i>
                            <p class="font-normal">
                                {{ $user->phone }}
                            </p>
                        </div>
                    </div>

                    <h3 class="text-gray-600 text-lg font-semibold mb-5 mt-4">Dashboard Event</h3>
                    <div class="relative overflow-x-auto">
                        <h4 class="text-md font-medium text-gray-600 mb-2">
                            Event yang Telah Dibuat
                        </h4>
                        <div class="flex items-center mt-2 text-sm text-gray-500 mb-4">
                            <i class="ti ti-calendar-event mr-4"></i>
                            <p class="font-normal">
                                {{-- {{ $user->events->count() }} --}}
                            </p>
                        </div>
                        <h4 class="text-md font-medium text-gray-600 mb-2">
                            Total Tiket Terjual
                        </h4>
                        <div class="flex items-center mt-2 text-sm text-gray-500 mb-4">
                            <i class="ti ti-ticket mr-4"></i>
                            <p class="font-normal">
                                {{-- {{ $user->phone }} --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

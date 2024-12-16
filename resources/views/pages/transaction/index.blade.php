@extends('partials.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6">
        {{-- First Column --}}
        <div class="card">
            <div class="card-body">
                <h4 class="text-gray-600 text-lg font-semibold mb-6">Recent Transactions</h4>
                <ul class="timeline-widget relative">
                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-600 text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-600 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-600 text-sm font-normal">Payment received from John
                                Doe of $385.90</p>
                        </div>
                    </li>
                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-600 min-w-[90px] py-[6px] text-sm pr-4 text-end">
                            10:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-300 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4 text-sm">
                            <p class="text-gray-600  font-semibold">New sale recorded</p>
                            <a href="javascript:void('')" class="text-blue-600">#ML-3467</a>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-600 min-w-[90px] text-sm py-[6px] pr-4 text-end">
                            12:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-teal-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-600 text-sm font-normal">Payment was made of $64.95
                                to Michael</p>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-600 min-w-[90px] text-sm py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-yellow-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4 text-sm">
                            <p class="text-gray-600 font-semibold">New sale recorded</p>
                            <a href="javascript:void('')" class="text-blue-600">#ML-3467</a>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-600 text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-red-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-600 text-sm font-semibold">New arrival recorded</p>
                        </div>
                    </li>
                    <li class="timeline-item flex relative overflow-hidden">
                        <div class="timeline-time text-gray-600 text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            12:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-teal-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-600 text-sm font-normal">Payment Done</p>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

        {{-- Second Column --}}
        <div class="col-span-2">
            <div class="card h-full">
                <div class="card-body">
                    <h4 class="text-gray-600 text-lg font-semibold mb-6">Recent Transaction</h4>
                    <div class="relative overflow-x-auto">
                        <!-- table -->
                        <table class="text-left w-full whitespace-nowrap text-sm">
                            <thead class="text-gray-700">
                                <tr class="font-semibold text-gray-600">
                                    <th scope="col" class="p-4">Id</th>
                                    <th scope="col" class="p-4">Event</th>
                                    <th scope="col" class="p-4">Qty</th>
                                    <th scope="col" class="p-4">Purchase On</th>
                                    <th scope="col" class="p-4">Price</th>
                                    <th scope="col" class="p-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-4 font-semibold text-gray-600 ">1</td>
                                    <td class="p-4">
                                        <h3 class=" font-semibold text-gray-600">Indonesia Vs Bahrain</h3>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-normal text-gray-500">2</span>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-normal text-gray-500">16-12-2024</span>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-semibold text-base text-gray-600">Rp1.700.000</span>
                                    </td>
                                    <td class="p-4">
                                        <button type="button"
                                            class="py-1 px-3 inline-flex items-center rounded-md border border-transparent bg-gray-600 text-white hover:bg-gray-700">
                                            <i class="ti ti-info-circle text-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-4 font-semibold text-gray-600 ">1</td>
                                    <td class="p-4">
                                        <h3 class=" font-semibold text-gray-600">Indonesia Vs Bahrain</h3>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-normal text-gray-500">2</span>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-normal text-gray-500">16-12-2024</span>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-semibold text-base text-gray-600">Rp1.700.000</span>
                                    </td>
                                    <td class="p-4">
                                        <button type="button"
                                        class="py-1 px-3 inline-flex items-center rounded-md border border-transparent bg-gray-600 text-white hover:bg-gray-700">
                                            <i class="ti ti-info-circle text-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-4 font-semibold text-gray-600 ">1</td>
                                    <td class="p-4">
                                        <h3 class=" font-semibold text-gray-600">Indonesia Vs Bahrain</h3>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-normal text-gray-500">2</span>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-normal text-gray-500">16-12-2024</span>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-semibold text-base text-gray-600">Rp1.700.000</span>
                                    </td>
                                    <td class="p-4">
                                        <button type="button"
                                        class="py-1 px-3 inline-flex items-center rounded-md border border-transparent bg-gray-600 text-white hover:bg-gray-700">
                                            <i class="ti ti-info-circle text-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

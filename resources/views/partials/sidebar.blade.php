<div class="p-5">
    @include('partials.logo-sidebar')
</div>
<div class="scroll-sidebar" data-simplebar="">
    <div class="px-6 mt-8">
        <nav class=" w-full flex flex-col sidebar-nav">
            <ul id="sidebarnav" class="text-gray-600 text-sm">
                <li class="text-xs font-bold pb-4">
                    <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                    <span>HOME</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-600 hover:bg-blue-500"
                        href="{{ route('dashboard') }}">
                        <i class="ti ti-home  text-xl"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="text-xs font-bold mb-4 mt-8">
                    <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                    <span>DISCOVER</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2 px-3  rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500"
                        href="{{ route('event.index') }}">
                        <i class="ti ti-calendar-event text-xl"></i> <span>Events</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2 px-3  rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500"
                        href="@@webRoot/components/alerts.html">
                        <i class="ti ti-ticket text-xl"></i> <span>Tickets</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
